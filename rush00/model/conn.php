<?php
$conn = mysqli_connect("localhost","root","qwerty","organes");
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
require_once("function.php");
session_start();
date_default_timezone_set('Europe/Paris');
?>
