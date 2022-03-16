<?php
session_start();

include "connection.php";
include "functions.php";


$Error = "";
$Success = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userEmail = $_POST['email'];
    
    $New_Password = generate_password($length = 20); //generate new pw
    $hashed_psw = password_hash($New_Password, PASSWORD_DEFAULT); //hash new pw

    if ($Error == "") {
        $query = mysqli_query($con, "select id from person where emailAddress='" . $userEmail . "' limit 1");
	$row = mysqli_fetch_assoc($query);
	$userId = $row['id'];
//	echo $userIdVal;


        if (!$query) {
            die('Error: ' . mysqli_error($con));
        }

        if (mysqli_num_rows($query) === 0) {
            $Error = "Email is not linked to a registered account!";
        } else {
            $Success = "Please check your email for new password!";
            
            //update db with new pw
            $query = "update passwords inner join person on passwords.userId = person.id set password = ('$hashed_psw') where (emailAddress) = ('$userEmail');";
            mysqli_query($con, $query);

            $myfile = fopen("email_queue.txt", "a") or die ("Unable to open file");
            fwrite($myfile, $userId);
            fwrite($myfile, ", ");
            fwrite($myfile, $New_Password);
            fwrite($myfile, "\n");

        }
    }
}

?>
