<?php
 $ano = $_GET["ano"]; 
 $mes = $_GET["mes"]; 

 $fp = fopen("filtros/filtro.txt","wb");
 fwrite($fp, $mes."-".$ano);
 fclose($fp);

 header('Location: index.php');
exit;
?>