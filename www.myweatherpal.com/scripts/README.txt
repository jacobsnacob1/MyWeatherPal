#TEAM 6 Senior Project: Weather App
----------------------------------------------------------
MyWeatherPal (MWP)
----------------------------------------------------------
David Scoggan,  U84011741; Point of Contact: 510-565-4152
Jacob Myers,  U24473110
Maxim Borukhov,  U43212503; Backup Point of Contact: 941-416-5465
----------------------------------------------------------
## SUMMAY
This readme will review two functional processes and the corresponding code files.
1) Sending Email and SMS Weather Notificaitons
2) Sending Reset Password Emails

## INSTALLATION
Use the Python package manager [pip](https://pip.pypa.io/en/stable/) to install dependencies.

```bash
pip install [package name]
```

The following Python packages are required to run MWP:

```python
import sys
import os
import pymysql
import time
import sendgrid
import requests
import json
```


The following internal Python function files are required to run MWP.
All files must be located in the same directory to be functional.

FILE 				USAGE
cron_helper.py			Receive Cron job triggers and pass arguements to notf_module.py
notf_get_weather.py		WeatherAPI.com API function code
notf_get_pollen.py		Ambeedata.com API function code
notf_module.py			Master controller module to call and recieve from helper mods
pw_reset_helper.py		Receive Cron job triggers, clear email queue
query_rds.py			AWS RDS MySQL function code
send_email.py			Sendgrid email service API code function

The following internal files are required to perform functions:
FILE				USAGE
config_master.json		Credentials and parameters for API services
message_body_daily.txt		Email / SMS message body template for daily notifications
message_body_event.txt		Email / SMS message body template for event notifications
phone_carrier_to_email.json	Mapping phone services to carrier domains
public_html/email_queue.txt	Holds queue of next reset password emails to send; clears every 1 min
logs/[all log files]		Execution logs
----------------------------------------------------------

## USAGE INSTRUCTIONS
If testing python scripts the variable "test_run" in each script must be set to "True."  This
allows scripts to use local file paths instead of web service absolute paths.

## FUNCTIONAL SUMMARY FOR PROCESS (1): Sending Email and SMS Weather Notificaitons

### START
cron_helper.py is initiated by daily Crontab jobs running on the AWS web server.
The Crontab job can be configured to run at any interval.  Currently set to once
a day for "Daily" Notifications and four times a day for "Event" Notifications.
No special parameters are sent from the jobs, they only serve to execute the file.
To execute the file in the place of the cron job, the user simply needs to run the file.

Based on the hour of day, cron_helper.py will pass arguements to the 
master controller file: notf_module.py.
-If the hour of the day is before 7 AM, the notifiation type will be "daily."
-If the hour of the day is 7 AM or later, the notifiation type will be "event."

cron_helper.py has a controller variable "test_run" which is defaulted to "True"
which allows local file execution.  When deployed to Production Web Server, the variable
is set to "False"

### EXECUTION STAGES
Given the notification type, notf_module.py will query the database (query_rds.py)
for users with matching active notifications.

Then notf_module.py will query the weather API (notf_get_weather.py)
with the user zip code for each user and store the results.

Then notf_module.py will parase the weather API payload, append the data to the list of users,
assemble the SMS and Email messages.

Finally, notf_module.py will call the SendGrid API Email Service (send_email.py) to 
send SMS and Email messages to the list of users with the stored results.

Logs are collected during the execution stages and stored in /logs/.


## FUNCTIONAL SUMMARY FOR PROCESS (2): Sending Reset Password Emails
### EXECUTION STAGES
A user utalizes the "Forgot Password" link on the Login Page to land on the ForgotPassword page 
(ForgotPassword.php). The user enters an email address which calls ForgotPasswordFunctions.php.
ForgotPasswordFunctions.php creates the new password, hashes it and updates the passwords table
record for the user.  ForgotPasswordFunctions.php writes the userId and the new plain text 
password to the txt file, email_queue.txt.

The Crontab jobs running on the AWS web server runs every 1 minute, and executes the  
pw_reset_helper.py script.  pw_reset_helper.py clears the email queue txt file, calls the 
database for the email address of the corresponding userId (query_rds.py) and sends 
the password to that user's email (send_email.py).


