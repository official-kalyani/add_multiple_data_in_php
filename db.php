<?php
$host = "localhost:3308";
$username = "root";
$password = "";
$dbname = "auro_employee";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>
