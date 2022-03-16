import os,os.path
import sys
import time
import json
import query_rds as rds
import send_email as se
import notf_get_weather as ngw
import notf_get_pollen as pollen

"""
!!! BEFORE EXECUTION !!!
test_run variable must be set to 'True' if running scripts locally

Function Called By:
cron_helper.py;  Crontab job running on AWS Web Server

Function Parameters:
alert_type;  allowed values: "daily", "event"

Function Returns:
0 if successful
1 if unsuccessful

Function Tasks:
1) query the AWS RDS MySQL database
2) use the results to query the WeatherAPI.com API
3) use the combined results to query the SendGrid API messaing services
4) log all results at /logs/

Function Calls To (in order):
query_rds.py;  Recieves a List of Tuples for each user record
notf_get_weather.py;  Recieves JSON of weather conditions for agruement zip code
notf_get_pollen.py;  Recieves JSON of pollen values for agrument lat-lng
send_email.py;  Recieves a List containing API service results (202 is success)

Function Helper Files:
message_body_daily.txt;  SMS/Email plain text for message body content for daily type alerts
message_body_event.txt;  SMS/Email plain text for message body content for event type alerts
phone_carrier_to_email.json;  JSON file mapping phone carriers to carrier email domains
"""


def send_notif(alert_type):

    #SET THIS VARIABLE TO 'True' IF RUNNING LOCAL TEST (updates file paths)
    test_run = True
    #alert_type = "event"  #can be used for testing to override passed function arguement

    #Raise Error if alert type not valid
    VALID_TYPES = {"daily","event"}
    if alert_type not in VALID_TYPES:
        raise ValueError("Invalid Alert Type. Types: %r." % VALID_TYPES)
        return(1)
    else:
        notf_type = alert_type

    #log file info
    current_path = os.getcwd() if test_run else "/var/www/myweatherpal.com/scripts"
    current_hour = int(time.strftime("%H"))

    #alert_type = "event"  #TESTING ONLY


    #Code Master Log File Path
    exe_log_path = (current_path + "//logs//" + time.strftime("%Y%m%d_%H%M%S") + "_master_log")
    master_log_file = open(exe_log_path + '.txt',"w",encoding="utf-8")
    master_log_file.write(time.strftime("%I:%M:%S") + " start" + "\n")

    #SQL Results Log File Path
    sql_log_path = (current_path + "//logs//"
             + time.strftime("%Y%m%d_%H%M%S") + "_" + notf_type + "_sql")

    #Weather API Results Log File Path
    weather_log_path = (current_path + "//logs//"
             + time.strftime("%Y%m%d_%H%M%S") + "_" + notf_type + "_weather")

    #SMS Notification API Results Log File Path
    sms_log_path = (current_path + "//logs//"
             + time.strftime("%Y%m%d_%H%M%S") + "_" + notf_type + "_sms_api_log")

    #Email Notification API Results Log File Path
    email_log_path = (current_path + "//logs//"
             + time.strftime("%Y%m%d_%H%M%S") + "_" + notf_type + "_email_api_log")

    #Sent Messages Log File Path
    messages_log_path = (current_path + "//logs//"
             + time.strftime("%Y%m%d_%H%M%S") + "_" + notf_type + "_message_log")    


    #############################################################
    #Get and Log Weather Notification Users from Database
    #############################################################

    #structure query; get list user records for specific notification type
    notf_query = "SELECT person.id, name, medium, ntf_value, emailAddress, \
                        phoneNumber, phoneCarrier, defaultZipCode, \
                        friendlyName, latitude, longitude \
                        FROM notification, person, settings, notification_category, zip_code \
                        WHERE notification.userId = person.id AND \
                        notification.name = notification_category.notificationName AND \
                        settings.userId = person.id AND \
                        zip_code.zipCode = settings.defaultZipCode AND \
                        active = 1 AND \
                        name LIKE " + "'" + notf_type + "%' \
                        order by defaultZipCode, name;"

    #query RDS; returns list of tuples
    notf_list = rds.send_query(notf_query)
    master_log_file.write(time.strftime("%I:%M:%S") + " rds query executed" + "\n")

    #log query results
    sql_log_file = open(sql_log_path + '.txt',"w",encoding="utf-8")
    for row in notf_list:
        sql_log_file.write(str(row).replace("(","")
                       .replace(")","").replace("'","") + "\n")
    sql_log_file.close()
    master_log_file.write(time.strftime("%I:%M:%S") + " rds query log file completed" + "\n")


    #############################################################
    #Get and Log Weather API Results
    #############################################################
    weather_log_file = open(weather_log_path + '.txt',"w",encoding="utf-8")

    weather_chance_list = []
    previous_zip = ""
    previous_notf = ""
    chance_max = 0
    forecast_hour = current_hour
    forecast_day = 0
    notf_list_final = []
    pollen_vals = ("Low", "Moderate", "High", "Very High")

    #loop list of notifcation users
    for tup in notf_list:
        i = list(tup)  #convert tuple to list

        #check if zip already called; set value to previous zip data
        if i[7] == previous_zip and i[1] == previous_notf:
            i.append(event_weather_val)
            notf_list_final.append(i)
            weather_log_file.write(str(i) + "\n")
            continue
        else:
            #call weather API w/ record zipcode or lat-lng
            if i[1] != "daily_pollen":
                weather_dict = ngw.get_weather(i[7])
            elif i[1] == "daily_pollen":
                pollen_dict = pollen.get_pollen(i[9],i[10])

                #Testing Only - so you don't use up Pollen API calls (max 100 / day); uncomment below line
                #pollen_dict = {'Count': {'grass_pollen': 0, 'tree_pollen': 0, 'weed_pollen': 16}, 'Risk': {'grass_pollen': 'Low', 'tree_pollen': 'Low', 'weed_pollen': 'Low'}, 'Species': {'Grass': {'Grass / Poaceae': 0}, 'Others': 0, 'Tree': {'Ash': 0, 'Birch': 0, 'Cypress / Juniper / Cedar': 0, 'Elm': 0, 'Maple': 0, 'Mulberry': 0, 'Oak': 0, 'Pine': 0, 'Poplar / Cottonwood': 0}, 'Weed': {'Ragweed': 16}}, 'updatedAt': '2021-11-27T03:49:52.000Z'}
            else: continue #unknown weather type

            #Weather Daily parsing (these are sub types of "daily" notifications)
            if "daily" in i[1]:
                if i[1] == "daily_rain":
                    event_weather_val = weather_dict["forecast"]["forecastday"][0]["day"]["daily_chance_of_rain"]
                elif i[1] == "daily_temp":
                    event_weather_val = weather_dict["forecast"]["forecastday"][0]["day"]["avgtemp_f"]              
                elif i[1] == "daily_pollen":
                    event_weather_val = pollen_dict["data"][0]["Risk"]["tree_pollen"]

                    #Testing Only; for use when not using Pollen API live calls
                    #event_weather_val = pollen_dict["Risk"]["tree_pollen"]
                else: continue  #unknown daily weather type

            #Weather Event parsing (these are sub types of "event" notifications)
            if "event" in i[1]:
                if i[1] == "event_temp_hi": event_weather = "temp_f"
                elif i[1] == "event_temp_lo": event_weather = "temp_f"
                elif i[1] == "event_wind_hi": event_weather = "wind_mph"
                elif i[1] == "event_snow_percent": event_weather = "chance_of_snow"
                elif i[1] == "event_rain_percent": event_weather = "chance_of_rain"
                else: continue  #unknown event weather type

                #get highest weather value/chance in next 4 hours; up to midnight
                j = 0
                for j in range(4):
                    forecast_hour = forecast_hour + j

                    #API only returns up to midnight; skip hours past that value
                    #Latest Cron job in production runs at 7pm
                    if forecast_hour >= 23:
                        continue
                    
                    weather_chance_list.append(weather_dict["forecast"]["forecastday"]
                                               [forecast_day]['hour'][forecast_hour][event_weather])

                forecast_hour = current_hour
                
                event_weather_val = max(weather_chance_list)
                weather_chance_list.clear()
                
            #Set Weather Value; append to record in list
            i.append(event_weather_val)
            notf_list_final.append(i)

            weather_log_file.write(str(i) + "\n")
            previous_notf = i[1]
            previous_zip = i[7]

    weather_log_file.close()
    master_log_file.write(time.strftime("%I:%M:%S") + " weather query log file completed" + "\n")

    #############################################################
    #call SendGrid Messaging Functions
    #############################################################
    log_sms_file = open(sms_log_path + '.txt',"w",encoding="utf-8")
    log_email_file = open(email_log_path + '.txt',"w",encoding="utf-8")
    message_list = []

    with open(current_path + "/" + "message_body_event.txt", "r") as txt_file:
        message_body_event = txt_file.read()
    txt_file.close()

    with open(current_path + "/" + "message_body_daily.txt", "r") as txt_file:
        message_body_daily = txt_file.read()
    txt_file.close()

    with open(current_path + "/" + 'phone_carrier_to_email.json', "r") as carrier_json:
        carrier_dict = json.load(carrier_json)
    carrier_json.close()

    for i in notf_list_final:
        if "None" in i[2]:  #no message format (e.g. email or sms)
            i.append("no message format")
            message_list.append(i)
            continue

        #check if event based weather values meet required notification threshold
        if "event" in i[1]:
            #weather threshold above returned value in "hi" type alerts
            if ("hi" in i[1] or "percent" in i[1]) and float(i[11]) < float(i[3]):
                i.append("weather value below hi threshold")
                message_list.append(i)
                continue
            #weather threshold below returned value in "lo" type alerts
            if "lo" in i[1] and float(i[11]) > float(i[3]):
                i.append("weather value above lo threshold")
                message_list.append(i)
                continue
            #no threshold set
            if "none" in i[3]:
                i.append("no threshold set")
                message_list.append(i)
                continue

        #set message body content based on alert type
        message_body = message_body_daily if "daily" in i[1] else message_body_event
        
        #map phone number w/ carrier domain as email-to-text
        #send SMS
        if "SMS" in i[2]:
            
            #TESTING ONLY; skip emails that don't match this value
            #if i[4] != "davidscoggan@gmail.com":
            #    i.append("skipped for testing")
            #    message_list.append(i)
            #    continue

            sms_email = i[5] + "@" + carrier_dict[i[6]]
            sms_results = se.send_email_mod("hello@myweatherpal.com",
                                                      sms_email,
                                                      "MyweatherPal Weather Alert: " + \
                                                      i[8],
                                                      message_body.format(i[8],i[11]))
            i.append(sms_results[0])
            message_list.append(i)
            log_sms_file.write(str(sms_results) + "\n")

        #send email
        if "Email" in i[2]:
            
            #TESTING ONLY; skip emails that don't match this value
            #if i[4] != "davidscoggan@gmail.com":
            #    i.append("skipped for testing")
            #    message_list.append(i)
            #    continue
            
            email_results = se.send_email_mod("hello@myweatherpal.com",
                                                      i[4],
                                                      "MyweatherPal Weather Alert: " + \
                                                      i[8],
                                                      message_body.format(i[8],i[11]))
            i.append(email_results[0])
            message_list.append(i)
            log_email_file.write(str(email_results) + "\n")

        #unknown value; skip
        if "None" not in i[2] and "SMS" not in i[2] and "Email" not in i[2]:
            master_log_file.write(time.strftime("%I:%M:%S") + " unknown value: " + str(i) + "\n")
            continue

    #Log all messages send results
    message_file = open(messages_log_path + '.txt',"w")
    for i in message_list:
        message_file.write(str(i) + "\n")
    message_file.close()
    
    master_log_file.write(time.strftime("%I:%M:%S") + " sendgrid messages sent" + "\n")
    log_sms_file.close()
    log_email_file.close()

    master_log_file.write(time.strftime("%I:%M:%S") + " end")
    master_log_file.close()
    return(0)


