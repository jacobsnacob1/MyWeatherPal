import time
import os, os.path
import notf_module as nm

"""
!!! BEFORE EXECUTION !!!
test_run variable must be set to 'True' if running scripts locally

When deploying to Web Server:
test_run must be set to False

Function Details:
Called by Crontab scheduled Job; recieves 0 for success, 1 for failure

Frequency:
6am each day = 'Daily' alert type
7am, 11am, 3pm, 7pm each day = 'Event' based alert type
"""

#SET THIS VARIABLE TO 'True' IF RUNNING LOCAL TEST
test_run = True

current_path = os.getcwd() if test_run else "/var/www/myweatherpal.com/scripts"
current_hour = int(time.strftime("%H"))

#Set the weather alert type based on the job run time
notf_type = "daily" if current_hour < 7 else "event"
notf_type = "daily"  #TEST ONLY; use to test "daily" vs "event" types

#Set up results Log file
file_path = current_path + "//" + "cron_log"
f = open(file_path + ".txt","a+")

#Call Notification Module to pass alert type arguement; receive results
result = str(nm.send_notif(notf_type))

#Log results
f.write(time.strftime("%Y%m%d_%H%M%S") + " " + notf_type + " " + result + "\n")
f.close()
