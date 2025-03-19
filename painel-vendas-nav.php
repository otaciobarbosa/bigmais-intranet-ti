<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>
<div class="navbar">
    <!-- Link para Home -->
    <a href="index.php">
        <span class="material-icons">home</span>
        Home
    </a>
    <!-- Link para Vendas Hoje -->
    <a href="vendas_hoje.php">
        <span class="material-icons">today</span>
        Vendas Hoje
    </a>
    <!-- Link para Vendas por Data -->
    <a href="vendas_data.php">
        <span class="material-icons">calendar_today</span>
        Vendas por Data
    </a>

</div>