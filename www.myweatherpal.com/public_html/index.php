<?php 
session_start();
        
	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Homepage</title>
      <!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="./Style.css" rel="stylesheet" type="text/css"/>
        
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
                    <li class="active"><a href="homepage.php">Home</a></li>
                    <li><a href="Settings.php">Settings</a></li>
                    <li><a href="AccountUpgrade.php">Account Upgrade</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="ContactUs.php"><span class="glyphicon glyphicon-envelope"></span> Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

    <body>
        <a href="logout.php">Logout</a>
        
        <h1>Hello World</h1>

        <br />
        Welcome,
        <?php echo $user_data['firstName']; ?>
    </body>
</html>
