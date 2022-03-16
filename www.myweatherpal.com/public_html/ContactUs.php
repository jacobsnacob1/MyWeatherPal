<?php
//Checks to see if user is logged in
session_start();
include 'connection.php';
include 'functions.php';
$user_data = check_login($con);
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">



	<link href="weatherpalCSS.css" rel="stylesheet" type="text/css"/>


	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    </head>
<header>
    <nav class="navbar navbar-inverse bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- <img src = "logo.png" class = "img-responsive" alt = "MyWeatherPalLogo"> replace myweatherpal with this below -->
                <a class="navbar-brand" href="homepage.php">MyWeatherPal</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="nav navbar-nav">
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="Settings.php">Settings</a></li>
                    <li><a href="AccountUpgrade.php">Account Upgrade</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
		    <li><a href = "ContactUs.php">Contact Us</a></li>
		    <li><a href = "logout.php">Logout</a></li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


    <body class="site">
        <div>
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <h1 class="about">About Us</h1>
            <h3 class="about">
                Thank you for visiting our site. We are three Information Technology students attending the University of South <br> Florida. If you
                have any questions, concerns, or would like support, please do not hesitate to contact us at the email below. Thank you!
            </h3>
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
            <h2 class="contact">Contact Email Address: hello@myweatherpal.com</h2>
        </div>
    </body>
</html>
