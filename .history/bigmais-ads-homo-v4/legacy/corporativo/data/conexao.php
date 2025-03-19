<?php  
$bigServername = "192.168.0.210";
$bigUsername = "root";
$bigPassword = "bigmais.123";
$bigBbname = "bigmais_agenda";

$conn = mysqli_connect($bigServername, $bigUsername, $bigPassword, $bigBbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>