<?php
include 'data/conexao.php';
$data = $_GET['data'];
$loja = $_GET['loja'];
$pdv  = $_GET['pdv'];
$sequencia  = $_GET['sequencia'];
$codigo  = $_GET['codigo'];

$apagarMovimento  = "DELETE FROM movimento_saida_operador
             WHERE  data_movimento = '$data' 
              AND numero_loja = '$loja' 
              AND numero_pdv = '$pdv' 
              AND sequencia_operador = '$sequencia'
              AND codigo_operador =  $codigo";
mysqli_query($conn, $apagarMovimento);

 header("Location: socin-movimento.php?data=$data&loja=$loja&pdv=$pdv");
 exit;
?>