import requests
import json
import os, os.path

"""
!!! BEFORE EXECUTION !!!
test_run variable must be set to 'True' if running scripts locally

Function to get Pollen data on a given location

Function Parameters:
Latitude as string
Longitude as string

Function Returns:
APi response data as dictionary
"""


def get_pollen(lat,lng):

    test_run = True

    current_path = os.getcwd() if test_run else "/var/www/myweatherpal.com/scripts"

    #Get Credentials
    with open(current_path + "/" + 'config_master.json') as f:
        cred_dict = json.load(f)
    f.close()

    api_key = cred_dict["ambee_api_key"]


    #Format query
    url = "https://api.ambeedata.com/latest/pollen/by-lat-lng"

    querystring = {"lat":lat,"lng":lng}  

    headers = {
        'x-api-key': api_key,
        'Content-type': "application/json"
        }

    response = requests.request("GET", url, headers=headers, params=querystring)

    resp_dict = response.json()
    #print(response.text)

    return(resp_dict)
