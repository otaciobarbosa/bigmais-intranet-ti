<?php
$servername = "192.168.0.246";
$username = "emporium";
$password = "emporium";
$dbname = "emporium";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>