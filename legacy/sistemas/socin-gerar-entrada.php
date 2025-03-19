<?php
include 'data/conexao.php';
$data = $_GET['data'];
$loja = $_GET['loja'];
$pdv  = $_GET['pdv'];
$sequencia =  $_GET['sequencia'];
$hora =  $_GET['hora'];
$cupom =  $_GET['cupom'];
$operador =  $_GET['operador'];

$gerarMovimento  = "INSERT INTO movimento_entrada_operador  VALUES ('$data','$loja','$pdv','$sequencia','$operador' ,'$hora','123466.21','123466.21','999','999','3','15.22' ,'13.33','$cupom',0);";
mysqli_query($conn, $gerarMovimento);

 header("Location: socin-movimento.php?data=$data&loja=$loja&pdv=$pdv");
 exit;
?>