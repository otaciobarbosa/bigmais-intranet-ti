<?php 
$oraServername = "192.168.0.245/bigmais";
$oraUsername   = "consinco";
$oraPassword   = "consinco";
$oraPorta      = "1521";
if (!$oraConn = oci_connect($oraUsername, $oraPassword, "$oraServername:$oraPorta")) {
    $e = oci_error();
    throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e['message']);
    oci_close($oraConn);
}
?>