<?php 

	include("LoginPageFunctions.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="weatherpalCSS.css" />
        <title>Login</title>
    </head>
    <body class="login">
        <form class="form" action="LoginPage.php" method="post">
            <div>
                <?php  
        if(isset($Success))
        {
            echo "<span style='color:green'>$Success</span>";
             }
        if(isset($Error2) && $Error2 != "")
        {
            echo "<span style='color:red'>$Error2</span>";
            $Error = "";
            }
        if(isset($Error) && $Error != "")
        {
            echo "<span style='color:red'>$Error</span>";
        }
        ?>
            </div>

	    <h1 class="center"><img src = "logo.png" alt = "MyWeatherPal" width = "75%" height = "75%"></h1>
            <div class="fields">
                <p class="p">
                    <label class="label" for="email"><b>Email</b></label>
                    <input class="input" type="email" size="32" maxlength="50" placeholder="Enter Email" name="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" required /><br />
                    <br />
                </p>
                <p class="p">
                    <label class="label" for="psw"><b>Password</b></label>
                    <input class="input" type="password" size="32" placeholder="Enter Password" name="psw" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,30}$" required /><br />
                    <br />
                </p>
            </div>
            <div id="button_container">
                <button class="buttons" type="submit">Login</button><br />
                <br />
            </div>
            <div class="links">
                <span><a href="CreateAccount.php" name="Create_Account">Create New Account</a></span><br />
                <br />
                <span><a href="ForgotPassword.php">Forgot password?</a></span>
            </div>
        </form>
    </body>
</html>
