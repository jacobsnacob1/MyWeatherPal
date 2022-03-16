<?php
	include("ForgotPasswordFunctions.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="weatherpalCSS.css" />
        <title>Forgot Password</title>
    </head>

    <body class="site">
        <form class="form" action="ForgotPassword.php" method="post">
            <div>
                <?php  
        if(isset($Success) && $Success != "")
        {
            echo "<span style='color:green'>$Success</span>";
             }
         if(isset($Error) && $Error != "")
        {
            echo "<span style='color:red'>$Error</span>";
             }
        ?>
            </div>

            <h1 class="headerBlue">Forgot Password</h1>
            <br />
            <div class="fields">
                <p class="p">
                    <label class="label" for="email"><b>Email</b></label>
                    <input class="input" type="email" size="32" maxlength="50" placeholder="Enter Email" name="email" required /><br />
                    <br />
                </p>
            </div>

            <div id="button_container">
                <button class="buttons" type="submit">Enter</button>
                <button class="buttons" type="button" onclick='window.location.href="LoginPage.php"'>Back</button>
            </div>
        </form>
    </body>
</html>
