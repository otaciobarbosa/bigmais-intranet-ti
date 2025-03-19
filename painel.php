<?php
/*
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
*/
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <?php $title = 'Bem Vindo!'; ?>
    <?php include 'custom/head.php'; ?>
</head>

<body class="container-fluid">
    <?php include 'custom/navbar.php'; ?>
    <?php include 'custom/footer.php'; ?>
</body>

</html>