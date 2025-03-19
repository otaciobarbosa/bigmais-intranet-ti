<?php
$servername = "192.168.0.251";
$username = "econect";
$password = "123456";
$dbname = "concentrador";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>