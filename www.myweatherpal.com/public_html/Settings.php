<?php

include "SettingsUpdate.php";


//Display Current settings from db

$sql = "select * from settings where userId ='$userId'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $current_default_location = $row['defaultZipCode'];
    $current_UoM = $row['tempUoM'];
    $current_time = $row['timeFmt'];
}
$sql = "select * from person where id ='$userId'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $current_phone_number = $row['phoneNumber'];
    $current_phone_carrier = $row['phoneCarrier'];
}

$sql = "select * from notification where userId ='$userId'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $current_notification_medium = $row['medium'];
}

$sql = "select * from notification where userId ='$userId' and name ='daily_temp'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $daily_hi_lo = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_temp_hi'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $temp_hi = $row['ntf_value'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_temp_lo'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $temp_lo = $row['ntf_value'];
}
    $sql = "select * from notification where userId ='$userId' and name ='daily_rain'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $daily_rain = $row['active'];
}

$sql = "select * from notification where userId ='$userId' and name ='event_rain_percent'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $rain_chance = $row['ntf_value'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_weight' and ntf_value = 'light'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $rain_light = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_weight' and ntf_value = 'medium'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $rain_medium = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_weight' and ntf_value = 'heavy'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $rain_heavy = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_thunder_percent'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $thunder_chance = $row['ntf_value'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_thunder'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $thunder_alert = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_hail'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $hail_alert = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_sleet'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $sleet_alert = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_tropical_storm'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $tstorm_alert = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_wind_hi'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $wind_speed = $row['ntf_value'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_snow_percent'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $snow_chance = $row['ntf_value'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_snow_weight' and ntf_value = 'light'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $snow_light = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_snow_weight' and ntf_value = 'medium'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $snow_medium = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_snow_weight' and ntf_value = 'heavy'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $snow_heavy = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_snow_hi'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $snow_level = $row['ntf_value'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_snow_blizzard'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $blizzard_alert = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_snow_hail'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $snow_hail_alert = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_snow_sleet'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $snow_sleet_alert = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='daily_pollen'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $daily_pollen = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_pollen_hi'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $pollen_level = $row['ntf_value'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_earthquake'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $earthquake_alert = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_flooding'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $flood_alert = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_volcanoes'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $volcanoe_alert = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_landslides'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $landslide_alert = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_wildfires'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $wildfire_alert = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_tornado'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $tornado_alert = $row['active'];
}
$sql = "select * from notification where userId ='$userId' and name ='event_tsunami'";
$query = mysqli_query($con, $sql);

if ($row = mysqli_fetch_assoc($query)) {
    $tsunami_alert = $row['active'];
}
?>



<!DOCTYPE html>
<html>
    <head>
        
        <title>Settings</title>
        
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
                <!-- <img src = "logo.png" class = "img-responsive" alt = "MyWeatherPalLogo"> replace myweatherpal with this below -->
                <a class="navbar-brand" href="homepage.php">MyWeatherPal</a>
            </div>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="nav navbar-nav">
                    <li><a href="homepage.php">Home</a></li>
                    <li class="active"><a href="Settings.php">Settings</a></li>
                    <li><a href="AccountUpgrade.php">Account Upgrade</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="ContactUs.php">Contact Us</a></li>
		    <li><a href="Logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>


    <body class="site" onload = "function()">
        <form name="Form" class="form" action="Settings.php" method="post"  >
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
	    <br />
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
        if(isset($Error1) && $Error1 != "")
        {
            echo $Error1;
             }
        if(isset($Error2) && $Error2 != "")
        {
            echo "<span style='color:red'>$Error2</span>";
             }
        if(isset($Error3) && $Error3 != "")
        {
            echo "<span style='color:red'>$Error3</span>";
             }
        if(isset($Error4) && $Error4 != "")
        {
            echo "<span style='color:red'>$Error4</span>";
             }
        if(isset($Error5) && $Error5 != "")
        {
            echo "<span style='color:red'>$Error5</span>";
             }
        if(isset($Error6) && $Error6 != "")
        {
            echo "<span style='color:red'>$Error6</span>";
             }
        if(isset($Cancel) && $Cancel != "")
        {
            echo "<span style='color:green'>$Cancel</span>";
             }
        if(isset($psw_success) && $psw_success != "")
        {
            echo "<span style='color:green'>$psw_success</span>";
             }
      
                ?>
            </div>
            <div class="fields">
                <h1 class="headerBlue">
                    Settings for
                  <?php echo $user_data['firstName']; ?>
                </h1>

                <p class="p">
                    <label class="label" for="psw"><b>Password</b></label>
                    <input class="input" name="psw" type="password" size="32" placeholder="Enter Password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,30}$" /><br />
                    <br />
                </p>

                <p class="p">
                    <label class="label" for="psw_confirm"><b>Verify Password</b></label>
                    <input class="input" name="psw_confirm" type="password" size="32" placeholder="Enter Password" /><br />
                    <br />
                    <button class="buttons" type="submit">Save</button>
                    <br />
                    <br />
                </p>
<!--
               <p class="p">
                    <label class="label" for="location"><b>Home Location</b></label>
                    <input class="input" name="location" value="<?= $current_default_location ?>" type="text" size="32" pattern="\d{5}" placeholder="Enter Zipcode" /><br />
                    <br />
                </p>
-->
                <p class="p">
                    <label class="label" for="uom"><b>Unit of Measure</b></label>
                    <select name="uom" class="input">
                        <option value="F" <?php if($current_UoM=="F") echo 'selected="selected"';?> >Imperial</option>
                        
                        <option value="C" <?php if($current_UoM=="C") echo 'selected="selected"';?> >Metric</option>
                    </select>
                    <br />
                    <br />
                </p>
                <p class="p">
                    <label class="label" for="time"><b>Hour Format</b></label>
                    <select name="time" class="input">
                        <option value="12" <?php if($current_time=="12") echo 'selected="selected"';?> >12 Hour</option>
                        
                        <option value="24" <?php if($current_time=="24") echo 'selected="selected"';?> >24 Hour</option>
                    </select>
                    <br />
                    <br />
                </p>
                <p class="p">
                    <label class="label" for="phoneNo"><b>Phone Number</b></label>
                    <input class="input" name="phoneNo" id="phoneNo "value="<?= $current_phone_number ?>" type="text" size="32" pattern="\d{10}" placeholder="Enter Phone Number" onkeyup="userTyped('sms_notifications', this)"/><br />
                    <br />
                </p>
                
                <p class="p">
                    <label class="label" for="phoneCarrier"><b>Phone Carrier</b></label>
                    <select name="phoneCarrier" class="input" id="phoneCarrier"  >
                        <option value=null>Choose Phone Carrier</option>
                        <option value="T-mobile" <?php if($current_phone_carrier=="T-mobile") echo 'selected="selected"';?> >T-mobile</option>
                        
                        <option value="Verizon" <?php if($current_phone_carrier=="Verizon") echo 'selected="selected"';?> >Verizon</option>
                        
                        <option value="Sprint" <?php if($current_phone_carrier=="Sprint") echo 'selected="selected"';?> >Sprint</option>
                        
                        <option value="metroPCS" <?php if($current_phone_carrier=="metroPCS") echo 'selected="selected"';?> >metroPCS</option>
                        
                        <option value="Cricket" <?php if($current_phone_carrier=="Cricket") echo 'selected="selected"';?> >Cricket</option>
                        
                        <option value="AT&T" <?php if($current_phone_carrier=="AT&T") echo 'selected="selected"';?> >AT&T</option>
                        
                        <option value="Boost Mobile"<?php if($current_phone_carrier=="Boost Mobile") echo 'selected="selected"';?> >Boost Mobile</option>
                    </select>
                    <br />
                    <br />
                </p>
               

                <p class="p">
                    <label class="label" for="email_notifications" ><b>Email notifications </b></label>
                    <input name="email_notifications" id="email_notifications" class="input" type="checkbox" value="yes" onClick="disableChecked()" <?php if ($current_notification_medium == "Email") echo "checked='checked'";
                          if ($current_notification_medium == "Email/SMS") echo "checked='checked'";
                           ?>/><br />
                    <br />
                </p>
                <p class="p">
                    <label class="label" for="sms_notifications"><b>SMS notifications</b></label>
                    <input name="sms_notifications" id="sms_notifications" class="input" type="checkbox" value="yes" onClick="disableChecked()"  <?php if ($current_notification_medium == "SMS") echo "checked='checked'";
                           if ($current_notification_medium == "Email/SMS") echo "checked='checked'"; ?> /><br />
                    <br />
                </p>
               
                <p class="p">
                    <label class="label"><b>User Notification Settings:</b></label><br />
                    <br />
                </p>
                
                
                <p class="p">
                    <?php
                    $categories = isset($_POST["categories"]) ? $_POST["categories"] : '';
                    ?>
                    <label class="label" for="" >
                        <div>
                            <select id="notifications" name="categories">
                                <option  <?php if (isset($categories) && $categories=="choose") echo "selected";?> value="choose">Choose Category</option>
                                <option <?php if (isset($categories) && $categories=="temp") echo "selected";?> value="temp">Temperature Notifications</option>
                                <option <?php if (isset($categories) && $categories=="rain") echo "selected";?> value="rain">Rain Notifications</option>
                                <option <?php if (isset($categories) && $categories=="wind") echo "selected";?> value="wind">Wind Notifications</option>
                                <option <?php if (isset($categories) && $categories=="snow") echo "selected";?> value="snow">Snow Notifications</option>
                                <option <?php if (isset($categories) && $categories=="pollen") echo "selected";?> value="pollen">Pollen Notifications (Premium)</option>
<!--                                <option ?php if (isset($categories) && $categories=="disaster") echo "selected";?> value="disaster">Natural Disaster Notifications (Premium)</option>-->
                            </select>
                        </div>
                    </label>
                    <br />
                </p>
<!--       disable notif dropdown if email or sms are not selected         -->
<script>
   window.onload = function(){
       disableChecked(); 
       }
   function disableChecked()
   {
   
       
       
     if($("#email_notifications").is(':checked')){
       $("#notifications").attr("disabled", false);
     }else if($("#sms_notifications").is(':checked'))
     {$("#notifications").attr("disabled", false);}
       
       else
     {$("#notifications").attr("disabled", true);
      $(".box").hide();
     }
       
    }
     
    

   </script>
                <div class="choose box"></div>
                <div class="temp box">
                    <p class="p">
                        <label class="label" for="high/low"><b>Daily High/Low Temperature: </b></label><input name="high/low" type="checkbox" value="yes" <?php if ($daily_hi_lo == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="temp_max"><b>Temperature Exceeds: </b></label>
                        <input class="input" name="temp_max" type="text" size="32" placeholder="Enter Temperature" pattern="[+-]?\d+(?:\.\d+)?" value="<?= $temp_hi ?>"/><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="temp_min"><b>Temperature Falls Below: </b></label>
                        <input class="input" name="temp_min" type="text" size="32" placeholder="Enter Temperature" pattern="[+-]?\d+(?:\.\d+)?" value="<?= $temp_lo ?>" />
                    </p>
                </div>

                <div class="rain box">
                    <p class="p">
                        <label class="label" for="daily_rain"><b>Daily Rain Chance: </b></label><input name="daily_rain" type="checkbox" value="yes" <?php if ($daily_rain == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="rain_chance">
                            <b>Rain Chance Exceeds: </b><br />
                            <br />
                        </label>
                        <input class="input" name="rain_chance" type="text" size="32" placeholder="Enter Rain Chance" pattern="^\d{1,3}$" value="<?= $rain_chance ?>"/>
                    </p>
<!--
                    <p class="p">
                        <label class="label"><b>Rain Level:</b></label><br />
                        <br />
                    </p>
-->

<!--
                    <p class="p">
                        <label class="label" for="light_rain"><input name="light_rain" type="checkbox" value = "yes" ?php if ($rain_light == "1") echo "checked='checked'";?>/><b>Light </b></label>
                    </p>

                    <p class="p">
                        <label class="label" for="medium_rain"><input name="medium_rain" type="checkbox" value = "yes" ?php if ($rain_medium == "1") echo "checked='checked'";?>/><b>Medium </b></label>
                    </p>
                    <p class="p">
                        <label class="label" for="heavy_rain"><input name="heavy_rain" type="checkbox" value = "yes" ?php if ($rain_heavy == "1") echo "checked='checked'";?>/><b>Heavy </b></label><br />
                        <br />
                    </p>
-->

<!--
                    <p class="p">
                        <label class="label" for="thunder_chance">
                            <b>Thunder Chance Exceeds: </b><br />
                            <br />
                        </label>
                        <input class="input" name="thunder_chance" type="text" size="32" placeholder="Enter Thunder Chance" pattern="^\d{1,3}$" value="?= $thunder_chance ?>"/>
                    </p>
                    <p class="p">
                        <label class="label" for="thunder_alert"><b>Thunder Alert: </b></label><input name="thunder_alert" type="checkbox" value = "yes" ?php if ($thunder_alert == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="hail_alert"><b>Hail Alert: </b></label><input name="hail_alert" type="checkbox" value = "yes" ?php if ($hail_alert == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="sleet_alert"><b>Sleet Alert: </b></label><input name="sleet_alert" type="checkbox" value = "yes" ?php if ($sleet_alert == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="tstorm_alert"><b>Tropical Storm Alert: </b></label><input name="tstorm_alert" type="checkbox" value = "yes" ?php if ($tstorm_alert == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
-->
                </div>
                <div class="wind box">
                    <p class="p">
                        <label class="label" for="wind_speed">
                            <b>Wind Speed Exceeds: </b><br />
                            <br />
                        </label>
                        <input class="input" name="wind_speed" type="text" size="32" placeholder="Enter Wind Speed" pattern="^\d{1,3}$" value="<?= $wind_speed ?>"/>
                    </p>
                </div>
                <div class="snow box">
                    
                    <p class="p">
                        <label class="label" for="snow_chance">
                            <b>Snow Chance Exceeds: </b><br />
                            <br />
                        </label>
                        <input class="input" name="snow_chance" type="text" size="32" placeholder="Enter Snow Chance" pattern="^\d{1,3}$" value="<?= $snow_chance ?>"/>
                    </p>
<!--
                    <p class="p">
                        <label class="label"><b>Snow Level:</b></label><br />
                        <br />
                    </p>
-->
<!--
                    <p class="p">
                        <label class="label" for="light_snow"><input name="light_snow" type="checkbox"  value = "yes" ?php if ($snow_light == "1") echo "checked='checked'";?>/><b>Light </b></label>
                    </p>

                    <p class="p">
                        <label class="label" for="medium_snow"><input name="medium_snow" type="checkbox"  value = "yes" ?php if ($snow_medium == "1") echo "checked='checked'";?>/><b>Medium </b></label>
                    </p>
                    <p class="p">
                        <label class="label" for="heavy_snow"><input name="heavy_snow" type="checkbox"  value = "yes" ?php if ($snow_heavy == "1") echo "checked='checked'";?>/><b>Heavy </b></label><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="snow_height">
                            <b>Snowfall Height Exceeds: </b><br />
                            <br />
                        </label>
                        <input class="input" name="snow_height" type="text" size="32" placeholder="Enter Snowfall Level" pattern="^\d{1,3}$" value="?= $snow_level ?>"/>
                    </p>
                    <p class="p">
                        <label class="label" for="blizzard_alert"><b>Blizzard Alert: </b></label><input name="blizzard_alert" type="checkbox" value = "yes" ?php if ($blizzard_alert == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="snow_hail_alert"><b>Hail Alert: </b></label><input name="snow_hail_alert" type="checkbox" value = "yes" ?php if ($snow_hail_alert == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="snow_sleet_alert"><b>Sleet Alert: </b></label><input name="snow_sleet_alert" type="checkbox" value = "yes" ?php if ($snow_sleet_alert == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
-->
                </div>
                <div class="pollen box">
                    <p class="p">
                        <label class="label" for="pollen_level"><b>Daily Pollen Level: </b></label><input name="pollen_level" type="checkbox" value = "yes" <?php if ($daily_pollen == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="pollen_exceeds">
                            <b>Pollen Level Exceeds: </b><br />
                            <br />
                        </label>
                        <input class="input" name="pollen_exceeds" type="text" size="32" placeholder="Enter Pollen Level" pattern="^\d{1,3}$" value="<?= $pollen_level ?>"/>
                    </p>
                </div>
<!--
                <div class="disaster box">
                    <p class="p">
                        <label class="label" for="Earthquake_alert"><b>Earthquake Alert: </b></label><input name="Earthquake_alert" type="checkbox" value = "yes" ?php if ($earthquake_alert == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="flood_alert"><b>Flood Alert: </b></label><input name="flood_alert" type="checkbox" value = "yes" ?php if ($flood_alert == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="volcanoe_alert"><b>Volcanoe Eruption Alert: </b></label><input name="volcanoe_alert" type="checkbox" value = "yes" ?php if ($volcanoe_alert == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="landslide_alert"><b>Landslide Alert: </b></label><input name="landslide_alert" type="checkbox" value = "yes" ?php if ($landslide_alert == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="wildfire_alert"><b>Wildfire Alert: </b></label><input name="wildfire_alert" type="checkbox" value = "yes" ?php if ($wildfire_alert == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="tornado_alert"><b>Tornado Alert: </b></label><input name="tornado_alert" type="checkbox" value = "yes" ?php if ($tornado_alert == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
                    <p class="p">
                        <label class="label" for="tsunami_alert"><b>Tsunami Alert: </b></label><input name="tsunami_alert" type="checkbox" value = "yes" ?php if ($tsunami_alert == "1") echo "checked='checked'";?>/><br />
                        <br />
                    </p>
                </div>
-->
 
            <div id="button_settings">
            <p class="p">
                <label class="label">Click here to upgrade account:</label>
                <button class="buttons" type="button" onclick='window.location.href="AccountUpgrade.php"'>Account Upgrade</button><br /><br />
                    </p>
            </div>
            <p class="p">
                <label class="label" for="cancel"><b>Cancel Premium Membership: </b></label><input class="input "name="cancel" type="checkbox" value = "yes" /><br />
                        <br />
                    </p>
</div>
<!--           keep notif dropdown selected on submit-->
            
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $("select")
                        .change(function () {
                            $(this)
                                $("#notifications").find("option:selected")
                                .each(function () {
                                    var optionValue = $(this).attr("value");
                                    if (optionValue) {
                                        $(".box")
                                            .not("." + optionValue)
                                            .hide();
                                        $("." + optionValue).show();
                                    } else {
                                        $(".box").show();
                                    }
                                });
                        })
                        .change();
                });
            </script>
            <div id="button_container">
                <button class="buttons" type="submit" >Save Settings</button>
            </div>
        </form>
    </body>
</html>
