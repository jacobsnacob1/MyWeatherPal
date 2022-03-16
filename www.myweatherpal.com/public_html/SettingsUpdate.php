<?php
session_start();

include "connection.php";
include "functions.php";



$user_data = check_login($con);
$userId = $_SESSION['userId'];


//initial notification inserts into notification table on first settings page visit

$sql = "select * from notification where userId ='$userId' and name ='daily_temp'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'daily_temp')";
    mysqli_query($con, $query);
}

$sql = "select * from notification where userId ='$userId' and name ='event_temp_hi'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_temp_hi')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_temp_lo'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_temp_lo')";
    mysqli_query($con, $query);
    
$sql = "select * from notification where userId ='$userId' and name ='daily_rain'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'daily_rain')";
    mysqli_query($con, $query);
}
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_percent'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_rain_percent')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_weight' and ntf_value = 'light'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name, ntf_value) values ('$userId', 'event_rain_weight', 'light')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_weight' and ntf_value = 'medium'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name, ntf_value) values ('$userId', 'event_rain_weight', 'medium')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_weight' and ntf_value = 'heavy'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name, ntf_value) values ('$userId', 'event_rain_weight', 'heavy')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_thunder_percent'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_rain_thunder_percent')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_thunder'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_rain_thunder')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_hail'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_rain_hail')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_sleet'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_rain_sleet')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_rain_tropical_storm'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_rain_tropical_storm')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_wind_hi'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_wind_hi')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_snow_weight' and ntf_value = 'light'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name, ntf_value) values ('$userId', 'event_snow_weight', 'light')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_snow_weight' and ntf_value = 'medium'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name, ntf_value) values ('$userId', 'event_snow_weight', 'medium')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_snow_weight' and ntf_value = 'heavy'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name, ntf_value) values ('$userId', 'event_snow_weight', 'heavy')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_snow_percent'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_snow_percent')";
    mysqli_query($con, $query);
}
    $sql = "select * from notification where userId ='$userId' and name ='event_snow_hi'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_snow_hi')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_snow_blizzard'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_snow_blizzard')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_snow_hail'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_snow_hail')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_snow_sleet'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_snow_sleet')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='daily_pollen'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'daily_pollen')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_pollen_hi'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_pollen_hi')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_earthquake'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_earthquake')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_flooding'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_flooding')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_volcanoes'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_volcanoes')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_landslides'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_landslides')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_wildfires'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_wildfires')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_tornado'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_tornado')";
    mysqli_query($con, $query);
}
$sql = "select * from notification where userId ='$userId' and name ='event_tsunami'";
$query = mysqli_query($con, $sql);
if (mysqli_num_rows($query) === 0) {
    $query = "insert into notification (userId, name) values ('$userId', 'event_tsunami')";
    mysqli_query($con, $query);
}

//------------------------------------------------------------------------------------

$Error1 = "";
$Error2 = "";
$Error3 = "";
$Error4 = "";
$Error5 = "";
$Error6 = "";
$Success = "";
$psw_success = "";
$Cancel = "";


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    
    $Success = "All changes were successfully saved! <br><br>";
    
    
    
    $psw = $_POST['psw'];
    if (!empty($_POST['psw']) && !empty($_POST['psw_confirm'])) {
        if (!preg_match("/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,30}$/", $psw)) {
            $Error1 = "Password must be: <br> 8-30 characters <br> Contain one special character <br> Contain one number <br> Contain one uppercase letter <br> Contain one lowercase letter <br><br> ";
        }

        $hashed_psw = password_hash($psw, PASSWORD_DEFAULT);
        $verify_psw = $_POST['psw_confirm'];
        if (!empty($_POST['psw']) && !empty($_POST['psw_confirm'])) {
            if ($psw != $verify_psw) {
                $Error2 = "Password did not match! Try again. ";
            }
        }

        if ($Error1 == "" && $Error2 == "" && !empty($_POST['psw']) && !empty($_POST['psw_confirm'])) {
            $query = "update passwords set password = ('$hashed_psw') where userId ='$userId'";
            $psw_success = "Password changed successfully!";
            mysqli_query($con, $query);
        }
    }

    $home_location = $_POST['location'];
    if (!empty($_POST['location'])) {
        $query = "update settings set defaultZipCode = ('$home_location') where userId ='$userId'";

        mysqli_query($con, $query);
    } elseif (empty($_POST['location'])) {
        $query = "update settings set defaultZipCode = (NULL) where userId ='$userId'";

        mysqli_query($con, $query);
    }
    $UoM = $_POST['uom'];
    if (!empty($_POST['uom'])) {
        $query = "update settings set tempUoM = ('$UoM') where userId ='$userId'";

        mysqli_query($con, $query);
    }
    $Time = $_POST['time'];
    if (!empty($_POST['time'])) {
        $query = "update settings set timeFmt = ('$Time') where userId ='$userId'";

        mysqli_query($con, $query);
    }
    $phone_number = $_POST['phoneNo'];
    if (!empty($_POST['phoneNo'])) {
        $query = "update person set phoneNumber = ('$phone_number') where id ='$userId'";

        mysqli_query($con, $query);
    } elseif (empty($_POST['phoneNo'])) {
        $query = "update person set phoneNumber = (NULL) where id ='$userId'";

        mysqli_query($con, $query);
    }
    $phone_carrier = $_POST['phoneCarrier'];
    if (!empty($_POST['phoneCarrier'])) {
        $query = "update person set phoneCarrier = ('$phone_carrier') where id ='$userId'";
        mysqli_query($con, $query);
    }

    
    //Temp notification

    if (empty($_POST['high/low']) || !empty($_POST['high/low'])) {
        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'daily_temp';");

        if (mysqli_num_rows($query) === 0) {
            if (isset($_POST['high/low']) && $_POST['high/low'] == "yes") {
                $query = "insert into notification (userId, name, active) values ('$userId','daily_temp','1');";

                mysqli_query($con, $query);
            }
        } elseif (empty($_POST['high/low'])) {
            $query = "update notification set active = '0' where userId = '$userId' and name = 'daily_temp';";

            mysqli_query($con, $query);
        } elseif ($_POST['high/low'] == "yes") {
            $query = "update notification set active = '1' where userId = '$userId' and name = 'daily_temp';";

            mysqli_query($con, $query);
        }
    }

    $temp_hi = $_POST['temp_max'];

    if (empty($_POST['temp_max']) || !empty($_POST['temp_max'])) {
        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_temp_hi';");
        if (mysqli_num_rows($query) === 0) {
            if (!empty($_POST['temp_max'])) {
                $query = "insert into notification (userId, name, ntf_value, active) values ('$userId','event_temp_hi', '$temp_hi', '1');";

                mysqli_query($con, $query);
            }
        } elseif (empty($_POST['temp_max'])) {
            $query = "update notification set active = '0', ntf_value = (NULL) where userId = '$userId' and name = 'event_temp_hi';";

            mysqli_query($con, $query);
        } elseif ($_POST['temp_max'] !== "") {
            $query = "update notification set active = '1', ntf_value = '$temp_hi' where userId = '$userId' and name = 'event_temp_hi';";

            mysqli_query($con, $query);
        }
    }

    $temp_lo = $_POST['temp_min'];

    if (empty($_POST['temp_min']) || !empty($_POST['temp_min'])) {
        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_temp_lo';");
        if (mysqli_num_rows($query) === 0) {
            if (!empty($_POST['temp_min'])) {
                $query = "insert into notification (userId, name, ntf_value, active) values ('$userId','event_temp_lo', '$temp_lo', '1');";

                mysqli_query($con, $query);
            }
        } elseif (empty($_POST['temp_min'])) {
            $query = "update notification set active = '0', ntf_value = (NULL) where userId = '$userId' and name = 'event_temp_lo';";

            mysqli_query($con, $query);
        } elseif ($_POST['temp_min'] !== "") {
            $query = "update notification set active = '1', ntf_value = '$temp_lo' where userId = '$userId' and name = 'event_temp_lo';";

            mysqli_query($con, $query);
        }
    }

    //Rain notifications
    if (empty($_POST['daily_rain']) || !empty($_POST['daily_rain'])) {
        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'daily_rain';");

        if (mysqli_num_rows($query) === 0) {
            if (isset($_POST['daily_rain']) && $_POST['daily_rain'] == "yes") {
                $query = "insert into notification (userId, name, active) values ('$userId','daily_rain','1');";

                mysqli_query($con, $query);
            }
        } elseif (empty($_POST['daily_rain'])) {
            $query = "update notification set active = '0' where userId = '$userId' and name = 'daily_rain';";

            mysqli_query($con, $query);
        } elseif ($_POST['daily_rain'] == "yes") {
            $query = "update notification set active = '1' where userId = '$userId' and name = 'daily_rain';";

            mysqli_query($con, $query);
        }
    }

    $rain_chance = $_POST['rain_chance'];

    if (empty($_POST['rain_chance']) || !empty($_POST['rain_chance'])) {
        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_rain_percent';");
        if (mysqli_num_rows($query) === 0) {
            if (!empty($_POST['rain_chance'])) {
                $query = "insert into notification (userId, name, ntf_value, active) values ('$userId','event_rain_percent', '$rain_chance', '1');";

                mysqli_query($con, $query);
            }
        } elseif (empty($_POST['rain_chance'])) {
            $query = "update notification set active = '0', ntf_value = (NULL) where userId = '$userId' and name = 'event_rain_percent';";

            mysqli_query($con, $query);
        } elseif ($_POST['rain_chance'] !== "") {
            $query = "update notification set active = '1', ntf_value = '$rain_chance' where userId = '$userId' and name = 'event_rain_percent';";

            mysqli_query($con, $query);
        }
    }

//    if (empty($_POST['light_rain']) || !empty($_POST['light_rain'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_rain_weight' and ntf_value = 'light';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['light_rain']) && $_POST['light_rain'] == "yes") {
//                $query = "insert into notification (userId, name, ntf_value, active) values ('$userId','event_rain_weight', 'light', '1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['light_rain'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_rain_weight' and ntf_value = 'light';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['light_rain'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_rain_weight' and ntf_value = 'light';";
//
//            mysqli_query($con, $query);
//        }
//    }
//
//    if (empty($_POST['medium_rain']) || !empty($_POST['medium_rain'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_rain_weight' and ntf_value = 'medium';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['medium_rain']) && $_POST['medium_rain'] == "yes") {
//                $query = "insert into notification (userId, name, ntf_value, active) values ('$userId','event_rain_weight', 'medium', '1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['medium_rain'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_rain_weight' and ntf_value = 'medium';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['medium_rain'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_rain_weight' and ntf_value = 'medium';";
//
//            mysqli_query($con, $query);
//        }
//    }
//
//    if (empty($_POST['heavy_rain']) || !empty($_POST['heavy_rain'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_rain_weight' and ntf_value = 'heavy';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['heavy_rain']) && $_POST['heavy_rain'] == "yes") {
//                $query = "insert into notification (userId, name, ntf_value, active) values ('$userId','event_rain_weight', 'heavy', '1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['heavy_rain'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_rain_weight' and ntf_value = 'heavy';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['heavy_rain'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_rain_weight' and ntf_value = 'heavy';";
//
//            mysqli_query($con, $query);
//        }
//    }

//    $thunder_chance = $_POST['thunder_chance'];
//
//    if (empty($_POST['thunder_chance']) || !empty($_POST['thunder_chance'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_rain_thunder_percent';");
//        if (mysqli_num_rows($query) === 0) {
//            if (!empty($_POST['thunder_chance'])) {
//                $query = "insert into notification (userId, name, ntf_value, active) values ('$userId','event_rain_thunder_percent', '$thunder_chance', '1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['thunder_chance'])) {
//            $query = "update notification set active = '0', ntf_value = (NULL) where userId = '$userId' and name = 'event_rain_thunder_percent';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['thunder_chance'] !== "") {
//            $query = "update notification set active = '1', ntf_value = '$thunder_chance' where userId = '$userId' and name = 'event_rain_thunder_percent';";
//
//            mysqli_query($con, $query);
//        }
//    }

//    if (empty($_POST['thunder_alert']) || !empty($_POST['thunder_alert'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_rain_thunder';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['thunder_alert']) && $_POST['thunder_alert'] == "yes") {
//                $query = "insert into notification (userId, name, active) values ('$userId','event_rain_thunder','1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['thunder_alert'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_rain_thunder';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['thunder_alert'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_rain_thunder';";
//
//            mysqli_query($con, $query);
//        }
//    }
//
//    if (empty($_POST['hail_alert']) || !empty($_POST['hail_alert'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_rain_hail';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['hail_alert']) && $_POST['hail_alert'] == "yes") {
//                $query = "insert into notification (userId, name, active) values ('$userId','event_rain_hail','1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['hail_alert'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_rain_hail';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['hail_alert'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_rain_hail';";
//
//            mysqli_query($con, $query);
//        }
//    }
//
//    if (empty($_POST['sleet_alert']) || !empty($_POST['sleet_alert'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_rain_sleet';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['sleet_alert']) && $_POST['sleet_alert'] == "yes") {
//                $query = "insert into notification (userId, name, active) values ('$userId','event_rain_sleet','1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['sleet_alert'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_rain_sleet';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['sleet_alert'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_rain_sleet';";
//
//            mysqli_query($con, $query);
//        }
//    }
//
//    if (empty($_POST['tstorm_alert']) || !empty($_POST['tstorm_alert'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_rain_tropical_storm';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['tstorm_alert']) && $_POST['tstorm_alert'] == "yes") {
//                $query = "insert into notification (userId, name, active) values ('$userId','event_rain_tropical_storm','1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['tstorm_alert'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_rain_tropical_storm';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['tstorm_alert'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_rain_tropical_storm';";
//
//            mysqli_query($con, $query);
//        }
//    }

    //Wind notifications
    $wind_speed_hi = $_POST['wind_speed'];

    if (empty($_POST['wind_speed']) || !empty($_POST['wind_speed'])) {
        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_wind_hi';");
        if (mysqli_num_rows($query) === 0) {
            if (!empty($_POST['wind_speed'])) {
                $query = "insert into notification (userId, name, ntf_value, active) values ('$userId','event_wind_hi', '$wind_speed_hi', '1');";

                mysqli_query($con, $query);
            }
        } elseif (empty($_POST['wind_speed'])) {
            $query = "update notification set active = '0', ntf_value = (NULL) where userId = '$userId' and name = 'event_wind_hi';";

            mysqli_query($con, $query);
        } elseif ($_POST['wind_speed'] !== "") {
            $query = "update notification set active = '1', ntf_value = '$wind_speed_hi' where userId = '$userId' and name = 'event_wind_hi';";

            mysqli_query($con, $query);
        }
    }

    //Snow notifications
    $snow_chance = $_POST['snow_chance'];

    if (empty($_POST['snow_chance']) || !empty($_POST['snow_chance'])) {
        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_snow_percent';");
        if (mysqli_num_rows($query) === 0) {
            if (!empty($_POST['snow_chance'])) {
                $query = "insert into notification (userId, name, ntf_value, active) values ('$userId','event_snow_percent', '$snow_chance', '1');";

                mysqli_query($con, $query);
            }
        } elseif (empty($_POST['snow_chance'])) {
            $query = "update notification set active = '0', ntf_value = (NULL) where userId = '$userId' and name = 'event_snow_percent';";

            mysqli_query($con, $query);
        } elseif ($_POST['snow_chance'] !== "") {
            $query = "update notification set active = '1', ntf_value = '$snow_chance' where userId = '$userId' and name = 'event_snow_percent';";

            mysqli_query($con, $query);
        }
    }

    
//    if (empty($_POST['light_snow']) || !empty($_POST['light_snow'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_snow_weight' and ntf_value = 'light';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['light_snow']) && $_POST['light_snow'] == "yes") {
//                $query = "insert into notification (userId, name, ntf_value, active) values ('$userId','event_snow_weight', 'light', '1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['light_snow'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_snow_weight' and ntf_value = 'light';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['light_snow'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_snow_weight' and ntf_value = 'light';";
//
//            mysqli_query($con, $query);
//        }
//    }
//
//    if (empty($_POST['medium_snow']) || !empty($_POST['medium_snow'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_snow_weight' and ntf_value = 'medium';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['medium_snow']) && $_POST['medium_snow'] == "yes") {
//                $query = "insert into notification (userId, name, ntf_value, active) values ('$userId','event_snow_weight', 'medium', '1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['medium_snow'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_snow_weight' and ntf_value = 'medium';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['medium_snow'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_snow_weight' and ntf_value = 'medium';";
//
//            mysqli_query($con, $query);
//        }
//    }
//
//    if (empty($_POST['heavy_snow']) || !empty($_POST['heavy_snow'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_snow_weight' and ntf_value = 'heavy';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['heavy_snow']) && $_POST['heavy_snow'] == "yes") {
//                $query = "insert into notification (userId, name, ntf_value, active) values ('$userId','event_snow_weight', 'heavy', '1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['heavy_snow'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_snow_weight' and ntf_value = 'heavy';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['heavy_snow'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_snow_weight' and ntf_value = 'heavy';";
//
//            mysqli_query($con, $query);
//        }
//    }
//
//    $snowfall = $_POST['snow_height'];
//
//    if (empty($_POST['snow_height']) || !empty($_POST['snow_height'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_snow_hi';");
//        if (mysqli_num_rows($query) === 0) {
//            if (!empty($_POST['snow_height'])) {
//                $query = "insert into notification (userId, name, ntf_value, active) values ('$userId','event_snow_hi', '$snowfall', '1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['snow_height'])) {
//            $query = "update notification set active = '0', ntf_value = (NULL) where userId = '$userId' and name = 'event_snow_hi';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['snow_height'] !== "") {
//            $query = "update notification set active = '1', ntf_value = '$snowfall' where userId = '$userId' and name = 'event_snow_hi';";
//
//            mysqli_query($con, $query);
//        }
//    }
//
//    if (empty($_POST['blizzard_alert']) || !empty($_POST['blizzard_alert'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_snow_blizzard';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['blizzard_alert']) && $_POST['blizzard_alert'] == "yes") {
//                $query = "insert into notification (userId, name, active) values ('$userId','event_snow_blizzard','1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['blizzard_alert'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_snow_blizzard';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['blizzard_alert'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_snow_blizzard';";
//
//            mysqli_query($con, $query);
//        }
//    }
//
//    if (empty($_POST['snow_hail_alert']) || !empty($_POST['snow_hail_alert'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_snow_hail';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['snow_hail_alert']) && $_POST['snow_hail_alert'] == "yes") {
//                $query = "insert into notification (userId, name, active) values ('$userId','event_snow_hail','1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['snow_hail_alert'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_snow_hail';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['snow_hail_alert'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_snow_hail';";
//
//            mysqli_query($con, $query);
//        }
//    }
//
//    if (empty($_POST['snow_sleet_alert']) || !empty($_POST['snow_sleet_alert'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_snow_sleet';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['snow_sleet_alert']) && $_POST['snow_sleet_alert'] == "yes") {
//                $query = "insert into notification (userId, name, active) values ('$userId','event_snow_sleet','1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['snow_sleet_alert'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_snow_sleet';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['snow_sleet_alert'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_snow_sleet';";
//
//            mysqli_query($con, $query);
//        }
//    }

    //Pollen notifications
 $sql = "select * from person where id = '$userId' and upgradeTier = 'Standard';";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) === 1) {
       if (!empty($_POST['pollen_level'])) {
        $Error3 = "Please upgrade to premium to select Pollen Notifications";}  
    } elseif ( mysqli_num_rows($query) === 0){
    if (empty($_POST['pollen_level']) || !empty($_POST['pollen_level'])) {
        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'daily_pollen';");

        if (mysqli_num_rows($query) === 0) {
            if (isset($_POST['pollen_level']) && $_POST['pollen_level'] == "yes") {
                $query = "insert into notification (userId, name, active) values ('$userId','daily_pollen','1');";

                mysqli_query($con, $query);
            }
        } elseif (empty($_POST['pollen_level'])) {
            $query = "update notification set active = '0' where userId = '$userId' and name = 'daily_pollen';";

            mysqli_query($con, $query);
        } elseif ($_POST['pollen_level'] == "yes") {
            $query = "update notification set active = '1' where userId = '$userId' and name = 'daily_pollen';";

            mysqli_query($con, $query);
        }
    }}

    $pollen_hi = $_POST['pollen_exceeds'];
     $sql = "select * from person where id = '$userId' and upgradeTier = 'Standard';";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) === 1) {
       if (!empty($_POST['pollen_exceeds'])) {
        $Error3 = "Please upgrade to premium to select Pollen Notifications";}  
    } elseif ( mysqli_num_rows($query) === 0){

    if (empty($_POST['pollen_exceeds']) || !empty($_POST['pollen_exceeds'])) {
        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_pollen_hi';");
        if (mysqli_num_rows($query) === 0) {
            if (!empty($_POST['pollen_exceeds'])) {
                $query = "insert into notification (userId, name, ntf_value, active) values ('$userId','event_pollen_hi', '$pollen_hi', '1');";

                mysqli_query($con, $query);
            }
        } elseif (empty($_POST['pollen_exceeds'])) {
            $query = "update notification set active = '0', ntf_value = (NULL) where userId = '$userId' and name = 'event_pollen_hi';";

            mysqli_query($con, $query);
        } elseif ($_POST['pollen_exceeds'] !== "") {
            $query = "update notification set active = '1', ntf_value = '$pollen_hi' where userId = '$userId' and name = 'event_pollen_hi';";

            mysqli_query($con, $query);
        }}
    }

    //Natural Disaster Notifications
    
//    $sql = "select * from person where id = '$userId' and upgradeTier = 'Standard';";
//    $query = mysqli_query($con, $sql);
//    if (mysqli_num_rows($query) === 1) {
//       if (!empty($_POST['flood_alert'])) {
//        $Error3 = "Please upgrade to premium to select Natural Disaster Notifications";}  
//    } elseif ( mysqli_num_rows($query) === 0){
//    if (empty($_POST['flood_alert']) || !empty($_POST['flood_alert'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_flooding';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['flood_alert']) && $_POST['flood_alert'] == "yes") {
//                $query = "insert into notification (userId, name, active) values ('$userId','event_flooding','1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['flood_alert'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_flooding';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['flood_alert'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_flooding';";
//
//            mysqli_query($con, $query);
//        }
//    }
//    }
//    $sql = "select * from person where id = '$userId' and upgradeTier = 'Standard';";
//    $query = mysqli_query($con, $sql);
//    if (mysqli_num_rows($query) === 1) {
//       if (!empty($_POST['volcanoe_alert'])) {
//        $Error3 = "Please upgrade to premium to select Natural Disaster Notifications";}  
//    } elseif ( mysqli_num_rows($query) === 0){
//    if (empty($_POST['volcanoe_alert']) || !empty($_POST['volcanoe_alert'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_volcanoes';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['volcanoe_alert']) && $_POST['volcanoe_alert'] == "yes") {
//                $query = "insert into notification (userId, name, active) values ('$userId','event_volcanoes','1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['volcanoe_alert'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_volcanoes';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['volcanoe_alert'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_volcanoes';";
//
//            mysqli_query($con, $query);
//        }
//    }
//    }
//    $sql = "select * from person where id = '$userId' and upgradeTier = 'Standard';";
//    $query = mysqli_query($con, $sql);
//    if (mysqli_num_rows($query) === 1) {
//       if (!empty($_POST['landslide_alert'])) {
//        $Error3 = "Please upgrade to premium to select Natural Disaster Notifications";}  
//    } elseif ( mysqli_num_rows($query) === 0){
//    if (empty($_POST['landslide_alert']) || !empty($_POST['landslide_alert'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_landslides';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['landslide_alert']) && $_POST['landslide_alert'] == "yes") {
//                $query = "insert into notification (userId, name, active) values ('$userId','event_landslides','1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['landslide_alert'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_landslides';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['landslide_alert'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_landslides';";
//
//            mysqli_query($con, $query);
//        }
//    }
//    }
//    
//    $sql = "select * from person where id = '$userId' and upgradeTier = 'Standard';";
//    $query = mysqli_query($con, $sql);
//    if (mysqli_num_rows($query) === 1) {
//       if (!empty($_POST['wildfire_alert'])) {
//        $Error3 = "Please upgrade to premium to select Natural Disaster Notifications";}  
//    } elseif ( mysqli_num_rows($query) === 0){
//    if (empty($_POST['wildfire_alert']) || !empty($_POST['wildfire_alert'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_wildfires';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['wildfire_alert']) && $_POST['wildfire_alert'] == "yes") {
//                $query = "insert into notification (userId, name, active) values ('$userId','event_wildfires','1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['wildfire_alert'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_wildfires';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['wildfire_alert'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_wildfires';";
//
//            mysqli_query($con, $query);
//        }
//    }
//    }
//    
//    $sql = "select * from person where id = '$userId' and upgradeTier = 'Standard';";
//    $query = mysqli_query($con, $sql);
//    if (mysqli_num_rows($query) === 1) {
//        if (!empty($_POST['tornado_alert'])) {
//        $Error3 = "Please upgrade to premium to select Natural Disaster Notifications";}  
//    } elseif ( mysqli_num_rows($query) === 0){
//    if (empty($_POST['tornado_alert']) || !empty($_POST['tornado_alert'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_tornado';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['tornado_alert']) && $_POST['tornado_alert'] == "yes") {
//                $query = "insert into notification (userId, name, active) values ('$userId','event_tornado','1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['tornado_alert'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_tornado';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['tornado_alert'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_tornado';";
//
//            mysqli_query($con, $query);
//        }
//    }
//    }
//    
//    $sql = "select * from person where id = '$userId' and upgradeTier = 'Standard';";
//    $query = mysqli_query($con, $sql);
//    if (mysqli_num_rows($query) === 1) {
//        if (!empty($_POST['tsunami_alert'])) {
//        $Error3 = "Please upgrade to premium to select Natural Disaster Notifications";}  
//    } elseif ( mysqli_num_rows($query) === 0){
//    if (empty($_POST['tsunami_alert']) || !empty($_POST['tsunami_alert'])) {
//        $query = mysqli_query($con, "select * from notification where userId = '$userId' and name = 'event_tsunami';");
//
//        if (mysqli_num_rows($query) === 0) {
//            if (isset($_POST['tsunami_alert']) && $_POST['tsunami_alert'] == "yes") {
//                $query = "insert into notification (userId, name, active) values ('$userId','event_tsunami','1');";
//
//                mysqli_query($con, $query);
//            }
//        } elseif (empty($_POST['tsunami_alert'])) {
//            $query = "update notification set active = '0' where userId = '$userId' and name = 'event_tsunami';";
//
//            mysqli_query($con, $query);
//        } elseif ($_POST['tsunami_alert'] == "yes") {
//            $query = "update notification set active = '1' where userId = '$userId' and name = 'event_tsunami';";
//
//            mysqli_query($con, $query);
//        }
//    }
//    }
    
//cancel membership
    if (!empty($_POST['cancel'])) {
        $sql = "select * from person where id = '$userId' and upgradeTier = 'Premium';";
        $query = mysqli_query($con, $sql);}
    if (!empty($_POST['cancel']) && mysqli_num_rows($query) === 1) {
        $query = "update person set upgradeTier = ('Standard') where id ='$userId'";
        $Cancel = "Account has been downgraded to standard!";
        mysqli_query($con, $query);
    } elseif (!empty($_POST['cancel']) && mysqli_num_rows($query) === 0){
        $Error6 = "Account is not Premium!";
    }
        
    //medium update with phone number and carrier condition
    $query = "update notification set medium =(";

    if (isset($_POST['email_notifications']) && isset($_POST['sms_notifications']) && $_POST['email_notifications'] == "yes" && $_POST['sms_notifications'] == "yes" && empty($phone_number) && $_POST['phoneCarrier'] == "null"){
        $query .= "'Email'";
        $Error5 = "Please enter phone number and select phone carrier!";}
    elseif (isset($_POST['email_notifications']) && isset($_POST['sms_notifications']) && $_POST['email_notifications'] == "yes" && $_POST['sms_notifications'] == "yes" && empty($phone_number) && $_POST['phoneCarrier'] !== "null"){
        $query .= "'Email'";
        $Error5 = "Please enter phone number and select phone carrier!";}
    elseif (isset($_POST['email_notifications']) && isset($_POST['sms_notifications']) && $_POST['email_notifications'] == "yes" && $_POST['sms_notifications'] == "yes" && !empty($phone_number) && $_POST['phoneCarrier'] == "null"){
        $query .= "'Email'";
        $Error5 = "Please enter phone number and select phone carrier!";}
    elseif (isset($_POST['email_notifications']) && $_POST['email_notifications'] == "yes" && empty($_POST['sms_notifications'])){
        $query .= "'Email'";}
    
     elseif (isset($_POST['sms_notifications'])  && $_POST['sms_notifications'] == "yes" && empty($_POST['email_notifications']) && $_POST['phoneCarrier'] !== 'NULL' && !empty($phone_number)) {
        $query .= "'SMS'";}
    elseif (isset($_POST['sms_notifications'])  && $_POST['sms_notifications'] == "yes" && empty($_POST['email_notifications']) && $_POST['phoneCarrier'] == 'NULL' && !empty($phone_number)) {
        $query .= "NULL";
        $Error5 = "Please enter phone number and select phone carrier!";}
    elseif (isset($_POST['sms_notifications'])  && $_POST['sms_notifications'] == "yes" && empty($_POST['email_notifications']) && $_POST['phoneCarrier'] !== 'NULL' && empty($phone_number)) {
        $query .= "NULL";
        $Error5 = "Please enter phone number and select phone carrier!";}
    elseif (isset($_POST['sms_notifications'])  && $_POST['sms_notifications'] == "yes" && empty($_POST['email_notifications']) && $_POST['phoneCarrier'] == 'NULL' && empty($phone_number)) {
        $query .= "NULL";
        $Error5 = "Please enter phone number and select phone carrier!";}
    
    elseif (isset($_POST['sms_notifications']) && $_POST['sms_notifications'] == "yes" && isset($_POST['email_notifications']) && $_POST['email_notifications'] == "yes"  && $_POST['phoneCarrier'] !== "null" && !empty($phone_number)) {
        $query .= "'Email/SMS'";}
    

    elseif (empty($_POST['email_notifications']) && empty($_POST['sms_notifications'])) {
        $query .= "NULL";
        
    }
    
    $query .= ") where userId ='$userId';";

    mysqli_query($con, $query);
    
    if(empty($_POST['email_notifications']) && empty($_POST['sms_notifications'])){
       $query = "update notification set active = '0' where userId = '$userId' and name = 'daily_temp';";
         
        mysqli_query($con, $query);    
    }
    if(empty($_POST['email_notifications']) && empty($_POST['sms_notifications'])){
      
        
       $query = "update notification set active = '0', ntf_value = (NULL) where userId = '$userId' and name = 'event_temp_hi';";
  
        mysqli_query($con, $query);    
    }
    if(empty($_POST['email_notifications']) && empty($_POST['sms_notifications'])){
      
        
       $query = "update notification set active = '0', ntf_value = (NULL) where userId = '$userId' and name = 'event_temp_lo';";
  
        mysqli_query($con, $query);    
    }
    if(empty($_POST['email_notifications']) && empty($_POST['sms_notifications'])){
      
        
       $query = "update notification set active = '0' where userId = '$userId' and name = 'daily_rain';";
  
        mysqli_query($con, $query);    
    }
    if(empty($_POST['email_notifications']) && empty($_POST['sms_notifications'])){
      
        
       $query = "update notification set active = '0', ntf_value = (NULL) where userId = '$userId' and name = 'event_rain_percent';";
  
        mysqli_query($con, $query);    
    }
    if(empty($_POST['email_notifications']) && empty($_POST['sms_notifications'])){
      
        
       $query = "update notification set active = '0', ntf_value = (NULL) where userId = '$userId' and name = 'event_wind_hi';";
  
        mysqli_query($con, $query);    
    }
    if(empty($_POST['email_notifications']) && empty($_POST['sms_notifications'])){
      
        
       $query = "update notification set active = '0', ntf_value = (NULL) where userId = '$userId' and name = 'event_snow_percent';";
  
        mysqli_query($con, $query);    
    }
    if(empty($_POST['email_notifications']) && empty($_POST['sms_notifications'])){
      
        
       $query = "update notification set active = '0' where userId = '$userId' and name = 'daily_pollen';";
  
        mysqli_query($con, $query);    
    }
    if(empty($_POST['email_notifications']) && empty($_POST['sms_notifications'])){
      
        
       $query = "update notification set active = '0', ntf_value = (NULL) where userId = '$userId' and name = 'event_pollen_hi';";
  
        mysqli_query($con, $query);    
    }
    
        

//---------------------------------------------------------------------------------------------
   

        }
