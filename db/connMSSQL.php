<?php 
    $ip = "192.168.0.203";
    $porta = "1433";
    $banco = "CORPORERM";
    $usuario = "sa";
    $senha = "bm0721rq@";
    $mes = $_GET['mes'];
    $ano = $_GET['ano'];
    $conexao = new PDO("odbc:Driver=FreeTDS; Server=$ip; Port=$porta; Database=$banco; UID=$usuario; PWD=$senha;");
?>