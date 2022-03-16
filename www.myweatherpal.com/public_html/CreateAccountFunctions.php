<?php
session_start();

include "connection.php";
include "functions.php";

$Error = "";
$Error2 = "";
$Error3 = "";
$Error4 = "";

//create account with entered fields
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)) {
        $Error = "Please enter a valid email! <br><br>";
    }
    $psw = $_POST['psw'];
    if (!preg_match("/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,30}$/", $psw)) {
        $Error2 = "Password must be: <br> 8-30 characters <br> Contain one special character <br> Contain one number <br> Contain one uppercase letter <br> Contain one lowercase letter <br><br> ";
    }
    $hashed_psw = password_hash($psw, PASSWORD_DEFAULT);
    $verify_psw = $_POST['psw_confirm'];
    if ($psw != $verify_psw) {
        $Error3 = "Password did not match! Try again. ";
    }

    if ($Error == "" && $Error2 == "" && $Error3 == "") {
        $query = "select * from person where emailAddress=?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $Error4 = "That email address is already in use, please enter a different one <br><br>";
            $stmt->close();

        } else {
        $Standard = 'Standard';
        $query = "insert into person (firstName,lastName,emailAddress,upgradeTier) values (?,?,?,?);";
        $stmt = $con->prepare($query);
        $stmt->bind_param('ssss', $fname, $lname, $email, $Standard);
        $stmt->execute();
        $stmt->close();
            
        $query = "insert into passwords (userId) select id from person where (emailAddress) = (?);";
        $stmt = $con->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->close(); 
            
        $query = "update passwords inner join person on passwords.userId = person.id set password = (?) where (emailAddress) = (?);";
        $stmt = $con->prepare($query);
        $stmt->bind_param('ss', $hashed_psw, $email);
        $stmt->execute();
        $stmt->close();
            
        $query = "insert into settings (userId) select id from person where (emailAddress) = (?);";
        $stmt = $con->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->close();
            
        $query = "insert into billing_address (userId) select id from person where (emailAddress) = (?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->close();
            
            
           
            header("Location: LoginPage.php?success=1");
            die();
        }
    }
}
?>
