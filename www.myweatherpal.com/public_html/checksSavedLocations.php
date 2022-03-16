<?php 
$userID = $_SESSION['userId'];

//In case there are no records saved, this is a backup value for the defaultzip (essentially null) and units
$defaultZip = 1;
$unitOfMeasure = 'F';
$timeFmt = '12';

include "accountCheck.php";
if ($upgradeTier == "Standard") {
	include 'connection.php';
	//If account is standard, only allow user to have 1 saved locations, delete others 
	$sql = "update settings SET save_2_zip = null, save_3_zip = null, save_4_zip = null, save_5_zip = null where userId = '$userID'";
	$result = mysqli_query($conn, $sql);
	//close connection
	mysqli_close($conn);
}

for ($i = 1; $i <= 5; $i++) {
	include 'connection.php';
	$savedZip = 'save_' . $i . '_zip';

	// querying database
	$sql = "SELECT UserId, defaultZipCode, $savedZip, cityName, stateAbbr, latitude, longitude, tempUoM, timeFmt
	FROM settings, zip_code
	WHERE settings.$savedZip = zip_code.zipCode AND userId = '$userID'"; 
	
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result)==0) { 
		$zip[]      = null;
		$ziplat[]   = null;
		$ziplong[]  = null;
		$zipcity[]  = null;
		$zipstate[] = null;
	}
	else {
		//fetching result from query
		$savedLocations = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		//save variables for later usage 
		$defaultZip = $savedLocations['0']['defaultZipCode'];
		$zip[]      = $savedLocations['0'][$savedZip];
		$ziplat[]   = $savedLocations['0']['latitude'];
		$ziplong[]  = $savedLocations['0']['longitude'];
		$zipcity[]  = $savedLocations['0']['cityName'];
		$zipstate[] = $savedLocations['0']['stateAbbr'];
		$unitOfMeasure = $savedLocations['0']['tempUoM'];
		$timeFmt       = $savedLocations['0']['timeFmt'];
	}
	//free memory
	mysqli_free_result($result);
	//close connection
	mysqli_close($conn);
}
