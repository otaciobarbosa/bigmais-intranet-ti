<?php
     $usuario ='consinco';
     $senha = 'consinco';
     $host = '192.168.0.245/bigmais';
     $porta = '1521';
     
     $oracle = "SELECT * FROM OBV_VALIDA_STATUS_ORACLE WHERE MACHINE NOT IN ('oracle') ORDER BY LOGON_TIME DESC";
    
     try{
                
      if(!$con = oci_connect($usuario,$senha,"$host:$porta")){
        $e = oci_error();
        throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e['message']);
        oci_close($con);
      } 
      
      if(!$stmt = oci_parse($con,$oracle)){
        $e = oci_error($stmt);
        throw new Exception("Erro ao preparar consulta - " . $e['message']);
        oci_close($con);
      }
                
      
      if(!oci_execute($stmt)){
        $e = oci_error($con);
        throw new Exception("Erro ao executar consulta - " . $e['message']);
        oci_close($con);
      }
              
    }catch(Exception $e){
        die("ERRO! Detalhes => " . $e->getMessage());
        oci_close($con);
    }
?>