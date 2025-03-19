<?php
    $usuario ='consinco';
    $senha = 'consinco';
    $host = '192.168.0.245/bigmais';
    $porta = '1521';

    if(!$con = oci_connect($usuario,$senha,"$host:$porta")){
        $e = oci_error();
        throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e['message']);
        oci_close($con);
    } 
?>