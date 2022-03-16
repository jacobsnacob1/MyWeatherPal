<?php
//the below gets the day as a number 0-6, 0 sunday 6 saturday etc
$weekday = date('w', strtotime($date));

if ($weekday == 0) {
	$weekday = 'Sunday';
}
elseif ($weekday == 1) {
	$weekday = 'Monday';
}
elseif ($weekday == 2) {
	$weekday = 'Tuesday';
}
elseif ($weekday == 3) {
	$weekday = 'Wednesday';
}
elseif ($weekday == 4) {
	$weekday = 'Thursday';
}
elseif ($weekday == 5) {
	$weekday = 'Friday';
}
elseif ($weekday == 6) {
	$weekday = 'Saturday';
}
else {
	echo "Invalid date entered?";
}