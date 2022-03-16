<?php 
$userID = $_SESSION['userId'];

include 'connection.php';

// querying database
$sql = "select upgradeTier from person where id ='$userID'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)!=0) { 
	//fetching result from query
	$account = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	//save variables for later usage 
	$upgradeTier = $account['0']['upgradeTier'];
}
else {
	$upgradeTier = "Standard";
}

//free memory
mysqli_free_result($result);
//close connection
mysqli_close($conn);