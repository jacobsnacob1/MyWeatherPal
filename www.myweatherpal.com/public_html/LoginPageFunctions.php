<?php

session_start();

include "connection.php";
include "functions.php";

$Error = "";
$Error2 = "";

if (isset($_GET['success']) && $_GET['success'] == 1) {
    $Success = "Account successfully created, please log in!";
}
//checks db for account and logs in if found
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $psw = $_POST['psw'];

    if (!empty($email) && !empty($psw) && $Error == "" && $Error2 == "") {
        $query = "select * from person where emailAddress=?";
        $stmt = $con->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 0) {
            $Error2 = "Email is not linked to an existing account, please register!";
            $stmt->close();
        } else {
            $query = "select firstName, lastName, emailAddress, password, userId from person join passwords on person.id = passwords.userId where emailAddress =? limit 1";

            $stmt = $con->prepare($query);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->bind_result($firstName, $lastName, $emailAddress, $password, $userId);
            $result = $stmt->fetch();
            $stmt->close();


            if ($result) {
                if (password_verify($psw, $password)) {
                    $_SESSION['userId'] = $userId;
                    header("Location: homepage.php");
                    die();
                }
            }
        }
        $Error = "Wrong email or password! <br><br>";
    }
}

?>
