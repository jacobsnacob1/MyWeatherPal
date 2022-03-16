<?php 

	include("CreateAccountFunctions.php");

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="weatherpalCSS.css" />
        <title>Create an Account</title>
    </head>
    <body class="site">
        <form class="form" action="CreateAccount.php" method="post">
            <div>
                <?php  
        if(isset($Error) && $Error != "")
        {
            echo "<span style='color:red'>$Error</span>";
             }
        if(isset($Error2) && $Error2 != "")
        {
            echo $Error2;
             }
        if(isset($Error3) && $Error3 != "")
        {
            echo "<span style='color:red'>$Error3</span>";
             }
        if(isset($Error4) && $Error4 != "")
        {
            echo "<span style='color:red'>$Error4</span>";
             }
        ?>
            </div>

            <h1 class="headerBlue">Create an Account</h1>
            <br />
            <div class="fields">
                <p class="p">
                    <label class="label" for="fname"><b>First Name</b></label>
                    <input class="input" name="fname" type="text" size="32" placeholder="Enter First Name" required /><br />
                    <br />
                </p>
                <p class="p">
                    <label class="label" for="lname"><b>Last Name</b></label>
                    <input class="input" name="lname" type="text" size="32" placeholder="Enter Last Name" required /><br />
                    <br />
                </p>
                <p class="p">
                    <label class="label" for="email"><b>Email</b></label>
                    <input class="input" type="email" size="32" maxlength="50" placeholder="Enter Email" name="email" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" required /><br />
                    <br />
                </p>
                <p class="p">
                    <label class="label" for="psw"><b>Password</b></label>
                    <input class="input" name="psw" type="password" size="32" placeholder="Enter Password" required /><br />
                    <br />
                </p>
                <p class="p">
                    <label class="label" for="psw_confirm"><b>Verify Password</b></label>
                    <input class="input" name="psw_confirm" type="password" size="32" placeholder="Enter Password" required />
                    <br />
                    <br />
                </p>
            </div>

            <div id="button_container">
                <button class="buttons" name="Create_Account" type="submit">Create Account</button>
                <button class="buttons" type="button" onclick='window.location.href="LoginPage.php"'>Back</button>
            </div>
        </form>
    </body>
</html>
