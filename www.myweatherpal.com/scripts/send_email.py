#!/usr/bin/python3

import sys
import sendgrid
import json
import os, os.path

"""
!!! BEFORE EXECUTION !!!
test_run variable must be set to 'True' if running scripts locally

Function Parameters:
fromEmail == "from" email as string
toEmail == "to" email as string
subj == email subject line as string
body == email body content as plain text string

Function Returns:
Sendgrid API results messaging (202 is success)
"""

def send_email_mod(fromEmail,toEmail,subj,body):

    test_run = True

    current_path = os.getcwd() if test_run else "/var/www/myweatherpal.com/scripts"

    #Get Credentials
    with open(current_path + "/" + 'config_master.json') as f:
        cred_dict = json.load(f)
    f.close()

    #establish SendGrid connection
    sg_key = cred_dict["sendgrid_api_key"]
    sg = sendgrid.SendGridAPIClient(sg_key)

    from_email = fromEmail
    to_email = toEmail
    subj_email = subj
    body_email = body
    
    #config email
    data = {
      "personalizations": [
        {
          "to": [
            {
              "email": to_email
            }
          ],
          "subject": subj_email
        }
      ],
      "from": {
        "email": from_email
      },
      "content": [
        {
          "type": "text/plain",
          "value": body_email
        }
      ]
    }
    response = sg.client.mail.send.post(request_body=data)

    #Format Return Results
    result = [response.status_code,
              str(response.body),
              str(response.headers)]

    return(result)
