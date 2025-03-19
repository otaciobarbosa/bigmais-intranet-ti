<?php
$servername = "192.168.0.210";
$username = "root";
$password = "bigmais.123";
$dbname = "bigcadgeral";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$servernameSocin = "192.168.0.135";
$usernameSocin = "root";
$passwordSocin = "123456";
$dbnameSocin = "concentrador";

$connSocin = mysqli_connect($servernameSocin, $usernameSocin, $passwordSocin, $dbnameSocin);
if (!$connSocin) {
    die("Connection failed: " . mysqli_connect_error());
}
?>