#TEAM 6 Senior Project: Weather App
----------------------------------------------------------
MyWeatherPal (MWP)
----------------------------------------------------------
David Scoggan,  U84011741; Point of Contact: 510-565-4152
Jacob Myers,  U24473110
Maxim Borukhov,  U43212503; Backup Point of Contact: 941-416-5465
----------------------------------------------------------
## SUMMARY
This readme will review options for database usage with MyWeatherPal.


### OVERVIEW
All code files are pointing to the live instance of the MySQL database hosted on AWS.
The instructors public IP address has been whitelisted for access to this instance security group.

To use a local copy of a fresh database, install MySQL Workbench and run the included DDL and DML scripts.

The scripts must be executed in this order:
ddl_1.sql
ddl_create_db_user.sql
dml_insert_zip_codes.sql
dml_notifications.sql

In order to use this database instead of the live version, the following files must be modified:
public_html/config_master.json
scripts/config_master.json

Line 9 must have the db_host end point updated to use the new local database:
"db_host" : "[new-database-endpoint-here]"