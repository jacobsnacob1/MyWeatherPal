<?php
function removeLocation($spot) {
	include 'deleteLocation.php';
}
function makeDefault($spot) {
	include 'makeDefault.php';
}
if (isset($_GET['delete1'])) {
	$spot = 1;
    removeLocation($spot);
}
if (isset($_GET['default1'])) {
	$spot = 1;
    makeDefault($spot);
}
if (isset($_GET['delete2'])) {
	$spot = 2;
    removeLocation($spot);
}
if (isset($_GET['default2'])) {
	$spot = 2;
    makeDefault($spot);
}
if (isset($_GET['delete3'])) {
	$spot = 3;
    removeLocation($spot);
}
if (isset($_GET['default3'])) {
	$spot = 3;
    makeDefault($spot);
}
if (isset($_GET['delete4'])) {
	$spot = 4;
    removeLocation($spot);
}
if (isset($_GET['default4'])) {
	$spot = 4;
    makeDefault($spot);
}
if (isset($_GET['delete5'])) {
	$spot = 5;
    removeLocation($spot);
}
if (isset($_GET['default5'])) {
	$spot = 5;
    makeDefault($spot);
}