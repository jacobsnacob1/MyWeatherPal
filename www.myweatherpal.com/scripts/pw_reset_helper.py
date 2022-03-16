import time
import os, os.path
import query_rds as rds
import send_email as se
import hashlib

"""
!!! BEFORE EXECUTION !!!
test_run variable must be set to 'True' if running scripts locally

When deploying to Web Server:
test_run must be set to False

Function Details:
Called by Crontab scheduled Job every 1 min;
Checks for records in email reset password queue file;
Sends passwords reset emails and clears queue

"""

#SET THIS VARIABLE TO 'True' IF RUNNING LOCAL TEST
test_run = True

current_path = os.getcwd() if test_run else "/var/www/myweatherpal.com/public_html"
#current_hour = int(time.strftime("%H"))

#Email Queue Default Value
run_queue = False

#Get email queue file
file_path = current_path + "\\"
 
f = open(file_path + "email_queue.txt","r+")

#list for emails in queue
email_queue = []

#add emails from file to list
for line in f.readlines():
    email_queue.append(line.split(', '))

#check queue content
if email_queue:
    run_queue = True

#clear queue file
#f.truncate(0)
f.close()

#iterate list to generate new pass, place in db, email to user
if run_queue:
    for line in email_queue:
        if line[0] == '\n':
            continue  #check if line is blank; skip
        userId = line[0]
        newPass = line[1]

        #query to update user password
        notf_query = "SELECT emailAddress FROM person WHERE id = " + userId + ";"

        #query RDS; update user record w/ new password
        notf_list = rds.send_query(notf_query)
        toEmail = notf_list[0][0]
        
        #send password in email to user
        email_results = se.send_email_mod("hello@myweatherpal.com",
                                                              toEmail,
                                                              "MyWeatherPal Password Reset",
                                                              "New Password: " + newPass + "\n\n \
       Use this Password to log back in.\n \
       You can change your password in the Settings page.")


