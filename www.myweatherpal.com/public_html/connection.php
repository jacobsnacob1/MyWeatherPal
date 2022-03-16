<?php

//$dbhost = "localhost";
//$dbuser = "root";
//$dbpass = "";
//$dbname = "mwp_1";
////$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//
//if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
//    {
//
//	   die("failed to connect!");
//
//}

$json = file_get_contents('config_master.json');
$jsonData = json_decode($json, true);

$dbhost = $jsonData["rds_mysql"]["db_host"];
$dbuser = $jsonData["rds_mysql"]["db_username"];
$dbpass = $jsonData["rds_mysql"]["db_password"];
$dbname = $jsonData["rds_mysql"]["db_name"];
 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
 
    die("failed to connect!");
}