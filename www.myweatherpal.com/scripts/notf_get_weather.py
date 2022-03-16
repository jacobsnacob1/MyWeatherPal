import requests
import json
import os, os.path

"""
!!! BEFORE EXECUTION !!!
test_run variable must be set to 'True' if running scripts locally
"""

def get_weather(zipCode):

    test_run = True

    current_path = os.getcwd() if test_run else "/var/www/myweatherpal.com/scripts"

    url = "https://weatherapi-com.p.rapidapi.com/forecast.json?"

    #Get Credentials
    with open(current_path + "/" + 'config_master.json') as f:
        cred_dict = json.load(f)
    f.close()

    querystring = {"q":zipCode,"days":"1"}

    api_key = cred_dict["weatherAPI_api_key"]
    headers = {
        'x-rapidapi-host': "weatherapi-com.p.rapidapi.com",
        'x-rapidapi-key': api_key
        }

    response = requests.request("GET", url, headers=headers, params=querystring)

    resp_dict = response.json()

    return(resp_dict)
