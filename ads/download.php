<?php
include 'data/conexao.php';
 $numlot = $_GET['nfce'];
 $data = $_GET['data'];
 $loja = $_GET['loja'];
 $pdv = $_GET['pdv'];
 
 $qnfce = "SELECT xml_env,chv_acs FROM mov_nfc WHERE num_loj = '$loja' AND num_pdv = '$pdv' AND dat_hor_ems BETWEEN '$data 00:00:00' AND '$data 23:59:59' AND num_lot ='$numlot'";
 $resultnfce  = mysqli_query($conn, $qnfce);
 while($rownfce = mysqli_fetch_assoc($resultnfce)) {
     $xml   = $rownfce["xml_env"];
     $chave = $rownfce["chv_acs"];
      $fp = fopen("/var/www/html/intra/sistemas/fiscal/nfce/xml/xml-".$chave.".xml","wb");
       fwrite($fp,$xml);
       fclose($fp);

 }
 
 $file_url = "/var/www/html/intra/sistemas/fiscal/nfce/xml/xml-".$chave.".xml";
 header('Content-Type: application/octet-stream');
 header("Content-Transfer-Encoding: Binary"); 
 header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\""); 
 readfile($file_url); 

mysqli_close($conn)
?>