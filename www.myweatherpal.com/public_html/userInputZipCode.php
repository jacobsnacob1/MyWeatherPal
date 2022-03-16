<?php
//Executes the following when user clicks the Add Location button
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$zipCode = $_POST['zipCode'];
	//database connection file 
	include 'connection.php';
	
	// querying database
	$sql = "SELECT * FROM zip_code WHERE zipCode = '$zipCode'";
	
	$result = mysqli_query($conn, $sql);

	//Checks to see if zip code exists in the database
	if (mysqli_num_rows($result)==0) { ?>
		<script>
			invalidZip();
		</script>
	<?php }
	//Executes this if the zip code exists
	else { 
	//fetching result from query
	$userZip = mysqli_fetch_all($result, MYSQLI_ASSOC);
	//freee memory
	mysqli_free_result($result);
	//close connection
	mysqli_close($conn);
	
	//Gets various location parameters of inputted location for later usage
	$userZipLong = $userZip['0']['longitude'];
	$userZipLat = $userZip['0']['latitude'];
	$userZipCity = $userZip['0']['cityName']; 
	$userZipState = $userZip['0']['stateAbbr'];
	
	//Database connection file 
	include 'connection.php';
	//Checks to see if location exists before inputting and where space is available
	include 'checkForLocation.php';
	} 
}