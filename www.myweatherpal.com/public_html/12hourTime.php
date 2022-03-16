<?php
//Converts to 12 hour format
if (strlen($time) == 5) {
	$formattedTime = date("g:i A", strtotime("$time"));
	echo $formattedTime;
}
//Converts to 24 hour format
else {
	$formattedTime = date("H:i", strtotime("$time"));
	echo $formattedTime;
}