<?php
//Getting account status
include "accountCheck.php";

//querying for first empty spot in the database to insert into
include 'connection.php';

// querying database
$sql = 'SELECT save_1_zip, save_2_zip, save_3_zip, save_4_zip, save_5_zip FROM settings WHERE userId = "'.$userID.'"';
$result = mysqli_query($conn, $sql);

if ($upgradeTier == "Premium") {
	if (mysqli_num_rows($result)==0 || $conn->query($sql) != TRUE) { 
		//echo "No Rows / Error connecting to DB";
	}
	else { 					
		//fetching result from query
		$location = mysqli_fetch_all($result, MYSQLI_ASSOC);
		//free memory
		mysqli_free_result($result);
		//close connection
		mysqli_close($conn);
		
		$zip1 = $location['0']['save_1_zip'];
		$zip2 = $location['0']['save_2_zip'];
		$zip3 = $location['0']['save_3_zip'];
		$zip4 = $location['0']['save_4_zip'];
		$zip5 = $location['0']['save_5_zip'];
		
		//echo $zipCode;
		
		// Checking to see if the zip is already in the table, then checking to find an empty spot for it if one exists
		if ($zipCode != $zip1 && $zipCode != $zip2 && $zipCode != $zip3 && $zipCode != $zip4 && $zipCode != $zip5) {
			if ($zip1 == null) {
				$emptySpot = '1';
				include 'insertLocation.php';
			}
			elseif ($zip2 == null) {
				$emptySpot = '2';
				include 'insertLocation.php';
			}
			elseif ($zip3 == null) {
				$emptySpot = '3';
				include 'insertLocation.php';
			}
			elseif ($zip4 == null) {
				$emptySpot = '4';
				include 'insertLocation.php';
			}
			elseif ($zip5 == null) {
				$emptySpot = '5';
				include 'insertLocation.php';
			}
			else { ?>
				<script>
				fullZip();
				</script>
			<?php
			}
		}
		else { 
			?>
			<script>
			duplicateZip();
			</script>
			<?php
		}
	}
}

else {
	if (mysqli_num_rows($result)==0 || $conn->query($sql) != TRUE) { 
	//echo "No Rows / Error connecting to DB";
	}
	else { 					
		//fetching result from query
		$location = mysqli_fetch_all($result, MYSQLI_ASSOC);
		//free memory
		mysqli_free_result($result);
		//close connection
		mysqli_close($conn);
		
		$zip1 = $location['0']['save_1_zip'];
		
		
		// Checking to see if the zip is already in the table, then checking to find an empty spot for it if one exists
		if ($zipCode != $zip1) {
			if ($zip1 == null) {
				$emptySpot = '1';
				include 'insertLocation.php';
			}
			else { ?>
				<script>
				fullZipFree();
				</script>
			<?php
			}
		}
		else { 
			?>
			<script>
			duplicateZip();
			</script>
			<?php
		}
	}
}