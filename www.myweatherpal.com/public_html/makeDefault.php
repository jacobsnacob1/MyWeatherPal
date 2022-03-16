<?php
include 'connection.php';
$userID = $_SESSION['userId'];

//Set a value $updateSpot (based on which tab its in) for use in the database query based on the $spot flag
$updateSpot = 'save_' . $spot .'_zip';

$sql = "UPDATE settings SET defaultZipCode = $updateSpot WHERE userId = '$userID'";
$result = mysqli_query($conn, $sql);

if ($conn->query($sql) === TRUE) {
	?>
	<script>
	alert("Default location updated successfully");
	reload();
	</script>
	<?php
} 
else {
	?>
	<script>
	alert("Error updating default location, please try again");
	</script>
	<?php
	//echo "Error deleting record: " . $conn->error;
} 
//close connection
mysqli_close($conn);
