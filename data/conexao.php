<?php
$servername = "192.168.0.210";
$username = "root";
$password = "bigmais.123";
$dbname = "bigcadgeral";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>