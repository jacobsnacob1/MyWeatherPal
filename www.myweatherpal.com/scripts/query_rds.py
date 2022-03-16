import sys
import pymysql
import json
import os, os.path

"""
!!! BEFORE EXECUTION !!!
test_run variable must be set to 'True' if running scripts locally

Function Parameters:
sql == SQL query as string

Function Returns:
Query results formated as list of tuples
"""

def send_query(sql):

    test_run = True

    current_path = os.getcwd() if test_run else "/var/www/myweatherpal.com/scripts"

    #Get Credentials
    with open(current_path + "/" + 'config_master.json') as f:
        cred_dict = json.load(f)
    f.close()


    #RDS Settings
    rds_host  = cred_dict["rds_mysql"]["db_host"]
    name = cred_dict["rds_mysql"]["db_username"]
    password = cred_dict["rds_mysql"]["db_password"]
    db_name = cred_dict["rds_mysql"]["db_name"]

    results = []
    new_sql = sql

    try:
        conn = pymysql.connect(host=rds_host,
                               user=name,
                               passwd=password,
                               db=db_name,
                               connect_timeout=5)

    except pymysql.MySQLError as e:
        results.append("ERROR: Unexpected error: Could not connect to MySQL")
        sys.exit()

    #RDS Session
    with conn.cursor() as cur:
            cur.execute(new_sql)

            for row in cur:
                results.append(row)

    return(results)
