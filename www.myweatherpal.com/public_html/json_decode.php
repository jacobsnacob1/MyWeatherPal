<?php
//getting sendgrid api key from master json file
$json = file_get_contents("config_master.json");
$Key = json_decode($json);
$sendgridkey = $Key->sendgrid_api_key;