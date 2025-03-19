<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">

<head>
    <?php include 'custom/ads/header.php'; ?>
</head>

<body>
    <?php include 'custom/ads/navbar.php'; ?>
    <div class="content-inner">
        <header class="page-header">
            <div class="container-fluid">
                <div class="no-margin-bottom">

                </div>
            </div>
        </header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                </div>
            </div>
        </div>
        <?php include 'custom/ads/footer.php'; ?>
</body>

</html>