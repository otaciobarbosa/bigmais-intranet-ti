<?php 
    $total    = "SELECT * FROM OBV_LICENSAS_RF_TOTAL_EM_USO";
    $sqlQuery = "SELECT * FROM OBV_LICENSAS_RF";

    try{
        if(!$stmt = oci_parse($con,$total)){
          $e = oci_error($stmt);
          throw new Exception("Erro ao preparar consulta - " . $e['message']);
          oci_close($con);
        }
        if(!oci_execute($stmt)){
          $e = oci_error($con);
          throw new Exception("Erro ao executar consulta - " . $e['message']);
          oci_close($con);
        }
        while (($row = oci_fetch_assoc($stmt)) != false) { 
            $totalEmUso = $row['TOTAL']; 
        }
    }catch(Exception $e){
        die("ERRO! Detalhes => " . $e->getMessage());
        oci_close($con);
    }
        
    try{
    
      if(!$con = oci_connect($usuario,$senha,"$host:$porta")){
        $e = oci_error();
        throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e['message']);
        oci_close($con);
      } 
      if(!$stmt = oci_parse($con,$sqlQuery)){
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