<?php
$servername = "192.168.0.251";
$username = "econect";
$password = "123456";
$dbname = "concentrador";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>