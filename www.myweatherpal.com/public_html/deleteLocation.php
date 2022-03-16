<?php
include 'checksSavedLocations.php';
include 'connection.php';
$userID = $_SESSION['userId'];

//Set a value $deleteSpot (based on which tab its in) for use in the database query based on the $spot flag
$deleteSpot = 'save_' . $spot .'_zip';

//checking to see if this is the default location to delete the default as well
$sql = "SELECT $deleteSpot FROM settings WHERE userId = '$userID'"; 
$result = mysqli_query($conn, $sql);


if ($conn->query($sql) == TRUE) {
	$default = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$theZip = $default['0'][$deleteSpot];
	//free memory
	mysqli_free_result($result);
	//close connection
	mysqli_close($conn);
	
	include 'connection.php';
	if ($theZip == $defaultZip) {
		$sql = "UPDATE settings SET $deleteSpot = NULL, defaultZipCode = NULL WHERE userId = '$userID'";
	}
	else {
		$sql = "UPDATE settings SET $deleteSpot = NULL WHERE userId = '$userID'";
	}
	
	//deleting locations
	$result = mysqli_query($conn, $sql);
	
	if ($conn->query($sql) === TRUE) { 
		//close connection_aborted
		mysqli_close($conn); ?>
		<script>
		alert("Location deleted successfully");
		reload();
		</script>
	<?php } 
	else {
		//close connection
		mysqli_close($conn); ?>
		<script>
		alert("Error deleting record, please try again");
		</script>
		<?php
		//echo "Error deleting record: " . $conn->error;
	} 
} 
else { ?>
	<script>
	alert("Error deleting record, please try again");
	</script>
	<?php
	//echo "Error reading record: " . $conn->error;
	//echo $spot;
}