<?php 
	//Gets information based on the user's logged in session
	session_start();
	include 'connection.php';
	include 'functions.php';
	$user_data = check_login($con);
	$userID = $_SESSION['userId'];
	
	//Checks to see what locations are saved to this user
	include "checksSavedLocations.php";
	
	//Getting Api Keys
	$json = file_get_contents('config_master.json');
	$jsonData = json_decode($json, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title> MyWeatherPal - Home</title>
	<!-- CSS -->
	<link href="weatherpalCSS.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="homeJS.js"></script>
</head>
<header>
<nav class = "navbar navbar-inverse bg-dark">
	<div class = "container-fluid">
		<div class = "navbar-header">
			<!--  <img src = "logo2.png" class = "img-responsive" alt = "MyWeatherPalLogo"> replace myweatherpal with this below -->
			<a class = "navbar-brand" href = "homepage.php">MyWeatherPal</a>
		</div>
		<div class = "collapse navbar-collapse" id = "navbarMenu">				
			<ul class="nav navbar-nav">
				<li class = "active"><a href="homepage.php">Home</a></li>
				<li><a href="Settings.php">Settings</a></li>
				<li><a href="AccountUpgrade.php">Account Upgrade</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href = "ContactUs.php">Contact Us</a></li>
				<li><a href = "logout.php">Logout</a></li>
			</ul>
		</div>
	</div>
</nav>
</header>

<body>

<h1>Get your weather here!</h1>
<br>
<div class = "row container-fluid">
	<div class = "col-sm-5">
	
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">						  
			<!-- restricts input to only numbers and less than 5 while keeping string type -->
			<input type="text" id="zipCode" name="zipCode" placeholder="Enter Zip Code" maxlength="5" pattern="[0-9]+" 
			oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" /><br>
			  
			<!-- onclick="getInputFromTextBox();" insert below in the input -->
			<input class="buttons" type="submit" value="Add Location"><br>
			<?php 
				include "accountCheck.php"; //Checks account status - standard or premium
				include "userInputZipCode.php";
				include 'phpButtons.php';
				// Setting unit of measure to metric or imperial
				if ($unitOfMeasure == 'C') {
					$unitWind = 'kph'; //change above to M when made to metric/imperial in DB
					$unitTemp = 'c';
					$unitT = 'C';
				}
				else {
					$unitWind = 'mph';
					$unitTemp = 'f';
					$unitT = 'F';
				} ?> 
		</form>
	</div>
</div>

<br>
<h2>Saved Locations: </h2>

<div class="tab">
<?php if ($zipcity[0] != NULL) { ?>
	<button class="tablinks" onclick="openCity(event, 'Location1')"><?php echo $zipcity[0] . ", " . $zipstate[0];?></button>
<?php } if ($zipcity[1] != NULL) { ?>
	<button class="tablinks" onclick="openCity(event, 'Location2')"><?php echo $zipcity[1] . ", " . $zipstate[1];?></button>
<?php } if ($zipcity[2] != NULL) { ?>
	<button class="tablinks" onclick="openCity(event, 'Location3')"><?php echo $zipcity[2] . ", " . $zipstate[2];?></button>
<?php } if ($zipcity[3] != NULL) { ?>
	<button class="tablinks" onclick="openCity(event, 'Location4')"><?php echo $zipcity[3] . ", " . $zipstate[3];?></button>
<?php } if ($zipcity[4] != NULL) { ?>
	<button class="tablinks" onclick="openCity(event, 'Location5')"><?php echo $zipcity[4] . ", " . $zipstate[4];?></button>
<?php } ?>
</div>
	

<div>

<?php if ($upgradeTier == "Premium") {
	$limit = count($zip);
} else {
	$limit = 1;
}

for ($j = 0, $k = 1; $j < $limit; $j++, $k++) {?>

	<!-- save variables to pass to the apis here, need this above each location -->
		<?php 
		if ($zip[$j] != null) { 
			$latitude = $ziplat[$j];
			$longitude = $ziplong[$j];
			include 'WeatherAPIForecast.php';
			include 'PollenAPI.php';
		}
		?>

		<?php if ($zip[$j] == $defaultZip && $zip[$j] != null) { //Checks to see if it is default to show the contents by default ?>
		<div id="Location<?=$k?>" class="tabContent">
		<?php } else { ?>
		<div id="Location<?=$k?>" class="tabContent" style="display:none">
		<?php } ?>
		
		
		<h3><?php echo "Viewing: " . $zipcity[$j] . ", " . $zipstate[$j];?></h3>
			<br>
			<button><a href='homepage.php?delete<?=$k?>=true'>Remove Saved Location</a></button>
			<button><a href='homepage.php?default<?=$k?>=true'>Make Default Location</a></button>
			<br>
			
			<div class="tab">
			  <button class="tablinks<?=$k?>" onclick="openCity<?=$k?>(event, 'Hourly<?=$k?>')">Hourly</button>
			  <button class="tablinks<?=$k?>" onclick="openCity<?=$k?>(event, 'Weekly<?=$k?>')">Weekly</button>
			</div>
			<?php if ($zip[$j] == $defaultZip && $zip[$j] != null) { //Checks to see if it is default to show the contents by default?>
			<div id="Hourly<?=$k?>" class = "row container-fluid tabContent<?=$k?>">
			<?php } else { ?>
			<div id="Hourly<?=$k?>" class = "row container-fluid tabContent<?=$k?>" style="display:none">
			<?php } ?>
				<div id="Hourly<?=$k?>" class = "table-responsive col-sm-7">
					<table class = "table table-bordered table-striped table-hover">
						<tr class = "info">
							<th><?php echo substr($responseJson['forecast']['forecastday'][0]['hour'][$i]['time'], 0, 10); ?></th>
							<th>Temp</th>
							<th>Feels Like</th>
							<th>Rain %</th>
							<th>Snow %</th>
							<th>Humidity</th>
							<th>Wind</th>
						</tr>
						<?php for ($i = 0; $i <= 23; $i++) { //have an if loop above this to get channel option?>
						<tr>
							<?php $time = substr($responseJson['forecast']['forecastday'][0]['hour'][$i]['time'], -5);
							//setting the time format
							if ($timeFmt == '24') { ?>
								<td><?php echo $time; ?></td>
							<?php } else { ?>
								<td><?php include '12hourTime.php'; ?></td>
							<?php } ?>
							<td><?php echo $responseJson['forecast']['forecastday'][0]['hour'][$i]['temp_' . $unitTemp] . '&#176' . $unitT; ?></td>
							<td><?php echo $responseJson['forecast']['forecastday'][0]['hour'][$i]['feelslike_' . $unitTemp] . '&#176' . $unitT; ?></td>
							<td><?php echo $responseJson['forecast']['forecastday'][0]['hour'][$i]['chance_of_rain'] . '%'; ?></td>
							<td><?php echo $responseJson['forecast']['forecastday'][0]['hour'][$i]['chance_of_snow'] . '%'; ?></td>
							<td><?php echo $responseJson['forecast']['forecastday'][0]['hour'][$i]['humidity'] . '%'; ?></td>
							<!-- have an if for the temp above units as well as the mph/km below? -->
							<td><?php echo $responseJson['forecast']['forecastday'][0]['hour'][$i]['wind_' . $unitWind] . $unitWind . ' ' .  
							$responseJson['forecast']['forecastday'][0]['hour'][$i]['wind_dir']; ?></td>
						</tr>
						<?php } ?>
					</table>
				</div>

				<div class = "col-sm-4">
					<table class = "table table-bordered table-striped table-hover">
						<tr>
							<th class = "info">Time</th>
							<?php $time = substr($responseJson['current']['last_updated'], -5);
							//setting the time format
							if ($timeFmt == '24') { ?>
								<td><?php echo $responseJson['current']['last_updated']; ?></td>
							<?php } else { ?>
								<td><?php echo substr($responseJson['current']['last_updated'], 0, 11) ;
								include '12hourTime.php'; ?></td>
							<?php } ?>
							</th>
						</tr>												
						<tr>
							<th class = "info">Sunrise/Sunset</th>
							<?php //setting the time format
								if ($timeFmt == '24') { ?>
								<td><?php $time = $responseJson['forecast']['forecastday'][0]['astro']['sunrise'];
								include '12hourTime.php'; 
								echo " / ";
								$time = $responseJson['forecast']['forecastday'][0]['astro']['sunset'];
								include '12hourTime.php'; ?></td>							
							<?php } else { ?>						
								<td><?php echo $responseJson['forecast']['forecastday'][0]['astro']['sunrise'] . " / " .
								$responseJson['forecast']['forecastday'][0]['astro']['sunset']; ?></td>
								<?php } ?>
						</tr>										
						<tr>
							<th class = "info">Hi/Lo Temp</th>
							<td><?php echo $responseJson['forecast']['forecastday'][0]['day']['maxtemp_' . $unitTemp] . '&#176' . $unitT . ' / ' .
							$responseJson['forecast']['forecastday'][0]['day']['mintemp_' . $unitTemp] . '&#176' . $unitT; ?></td>
						</tr>
						<tr>
							<th class = "info">Current Temp</th>
							<td><?php echo $responseJson['current']['temp_' . $unitTemp] . '&#176' . $unitT; ?></td></td>
						</tr>
						<tr>
							<th class = "info">Feels Like</th>
							<td><?php echo $responseJson['current']['feelslike_' . $unitTemp] . '&#176' . $unitT; ?></td></td>
						</tr>
						<tr>
							<th class = "info">Condition</th>
							<td><?php echo $responseJson['current']['condition']['text']; ?></td></td>
						</tr>
						<tr>
							<th class = "info">Wind</th>
							<td><?php echo $responseJson['current']['wind_' . $unitWind] . $unitWind . " " . 
							$responseJson['current']['wind_dir']; ?></td>
						</tr>
						<tr>
							<th class = "info">Humidity</th>
							<td><?php echo $responseJson['current']['humidity'] . "%"; ?></td>
						</tr>
						<tr>
							<th class = "info">Pollen Level</th>
							<td><?php echo $pollenJson['data']['0']['Risk']['tree_pollen']; ?></td>
						</tr>
						<tr>
							<th class = "info">UV Index</th>
							<td><?php echo $responseJson['current']['uv']; ?></td>
						</tr>
					</table>
				</div>
			</div>
			</div>
		</div>
		</div>
			
			<div id="Weekly<?=$k?>" class = "row container-fluid tabContent<?=$k?>" style="display:none">
				<div id="Weekly<?=$k?>" class = "table-responsive col-sm-11">
					<table class = "table table-bordered table-striped table-hover">
						<tr class = "info">
							<th>Date</th>
							<th>Hi/Lo Temp</th>
							<th>Max Wind Speed</th>
							<th>Rain Chance</th>
							<th>Snow Chance</th>
							<th>Sunrise/Sunset Time</th>
						</tr>
						<?php
							for ($i = 0; $i <= 6; $i++) {
								$date = $responseJson['forecast']['forecastday'][$i]['date'];
								include 'getWeekday.php'; 
						?>
						<tr>
							<td><?php echo $date . ' ' . $weekday; ?></td>
							<td><?php echo $responseJson['forecast']['forecastday'][$i]['day']['maxtemp_' . $unitTemp] . '&#176' . $unitT . ' / ' .
							$responseJson['forecast']['forecastday'][$i]['day']['mintemp_' . $unitTemp] . '&#176' . $unitT; ?></td>
							<td><?php echo $responseJson['forecast']['forecastday'][$i]['day']['maxwind_' . $unitWind] . $unitWind?></td>
							<td><?php echo $responseJson['forecast']['forecastday'][$i]['day']['daily_chance_of_rain'] . '%'; ?></td>
							<td><?php echo $responseJson['forecast']['forecastday'][$i]['day']['daily_chance_of_snow'] . '%'; ?></td>
							<td><?php echo $responseJson['forecast']['forecastday'][$i]['astro']['sunrise'] . ' / ' .
							$responseJson['forecast']['forecastday'][$i]['astro']['sunset']; ?></td>
						</tr>	
						<?php } ?>
					</table>
				</div>
			</div>
<?php } ?>	
</div>

</body>
</html>
