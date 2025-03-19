<?php
$servername = "192.168.0.210";
$username = "root";
$password = "bigmais.123";
$dbname = "super";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>