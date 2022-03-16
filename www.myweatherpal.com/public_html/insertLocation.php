<?php
include 'connection.php';

//Takes emptyspot flat from checkForLocation to determine where to save this location
$zipInsert   = 'save_' . $emptySpot . '_zip';
//Updating the database with the location
$sql = "UPDATE settings SET $zipInsert = '$zipCode' WHERE userId = $userID";
$result = mysqli_query($conn, $sql);

if ($conn->query($sql) === TRUE) { ?>
		<script>
		alert("Location Added Successfully");
		reload();
		</script>
		<?php
} else { ?>
		<script>
		alert("Error adding location: ");
		reload();
		</script>
		<?php
  //echo "Error updating record: " . $conn->error;
}

//close connection
mysqli_close($conn);