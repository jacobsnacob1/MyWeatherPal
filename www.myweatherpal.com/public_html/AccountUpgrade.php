<?php 
session_start();
        
	include("connection.php");
	include("functions.php");

$user_data = check_login($con);
$userId = $_SESSION['userId'];

$AlreadyUpgraded = "";
$Success = "";

	//Upload fields to db if not empty
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Street = $_POST['Street'];
    $City = $_POST['City'];
    $State = $_POST['State'];
    $Zip_Code = $_POST['Zip_Code'];
    
    if (!empty($_POST['Street']) && !empty($_POST['City']) && !empty($_POST['State']) && !empty($_POST['Zip_Code'])) {
            
            $query = "update billing_address set billStreet = ('$Street'), billCity = ('$City'), billState = ('$State'), billZipCode = ('$Zip_Code') where userId ='$userId'";

        mysqli_query($con, $query);
    
}
    if (!empty($_POST['Street']) && !empty($_POST['City']) && !empty($_POST['State']) && !empty($_POST['Zip_Code'])) {
         $query = "update person set upgradeTier = ('Premium') where id ='$userId'";
         $Success = "Upgrade Complete!";

        mysqli_query($con, $query);
        
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        
        <title>Account Upgrade</title>
        <!-- CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="weatherpalCSS.css" rel="stylesheet" />
        
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

     
    </head>
  <header>
    <nav class="navbar navbar-inverse bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="homepage.php">MyWeatherPal</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="nav navbar-nav">
                    <li><a href="homepage.php">Home</a></li>
                    <li><a href="Settings.php">Settings</a></li>
                    <li class="active"><a href="AccountUpgrade.php">Account Upgrade</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
		    <li><a href = "ContactUs.php">Contact Us</a></li>
		    <li><a href = "logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

    <body class="site">
        <form class="form" action="AccountUpgrade.php" method="post">
             <div>
	     <br />
	     <br />
	     <br />
	     <br />
	     <br />
	     <br />
 	     <br />
 	     <br />

                <?php  
        if(isset($Success) && $Success != "")
        {
            echo "<span style='color:green'>$Success</span>";
             }
        
        ?>
            </div>

            <h1 class="headerBlue">Upgrade Account to Premium</h1>
            <br />
            <div class="fields">
                <p class="p">
                    <label class="label" for="Street"><b>Street</b></label>
                    <input class="input" type="text" size="32" placeholder="Enter Street" name="Street" required /><br />
                    <br />
                </p>
                <p class="p">
                    <label class="label" for="City"><b>City</b></label>
                    <input class="input" name="City" type="text" size="32" placeholder="Enter City" required /><br />
                    <br />
                </p>
                <p class="p">
                    <label class="label" for="State"><b>State</b></label>
                    <input class="input" name="State" type="text" size="32" placeholder="Enter State" required /><br />
                    <br />
                </p>
                <p class="p">
                    <label class="label" for="Zip_Code"><b>Zip Code</b></label>
                    <input class="input" name="Zip_Code" type="text" size="32" placeholder="Enter Zip Code" pattern="\d{5}" required /><br />
                    <br />
                </p>
                <p class="p">
                    <label class="label" for="cc_number"><b>Card Number</b></label>
                    <input class="input" name="cc_number" type="text" size="32" placeholder="Enter CC Number"  pattern="^(?:4[0-9]{12}(?:[0-9]{3})?|[25][1-7][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$" /><br />
                    <br />
                </p>
                <p class="p">
                    <label class="label" for="exp_date"><b>Expiration Date</b></label>
                    <input class="input" name="exp_date" type="text" size="32" placeholder="Enter Expiration Date" pattern="^(0[1-9]|1[0-2])\/?([0-9]{2})$" /><br />
                    <br />
                </p>
                <p class="p">
                    <label class="label" for="cvv"><b>CVV</b></label>
                    <input class="input" name="cvv" type="text" size="32" placeholder="Enter CVV" pattern="^[0-9]{3,4}$" /><br />
                    <br />
                </p>
                <p class="p">
                    <label class="label" for="agree_checkbox"><b>Agree to Terms and Conditions </b></label>
                    <input name="agree_checkbox" class="input" type="checkbox" required /><br />
                    <br />
                </p>
                </div>


            <div id="button_container">
                <button class="buttons" name="Submit" type="submit">Upgrade</button>
                
            </div>
        </form>
    </body>
</html>
