<?php

include 'conn_oracle.php';
try {
    if (!$stmt = oci_parse($oraConn, "SELECT job,
       case job
         when 1 then
          'Job: 1 - Importa/Integra Nota Fiscal'
         when 2 then
          'Job: 2 - Integracao do Cupom Fiscal'
       end as titulo,
        case job
         when 1 then
          'FISCAL'
         when 2 then
          'FISCAL'
       end as setor,
       BROKEN as parado,
       FAILURES as falhou
  from all_jobs a
 where a.JOB in (1, 2 )")) {
        $e = oci_error($oraConn);
        throw new Exception("Erro ao preparar consulta - " . $e['message']);
    }

    if (!oci_execute($stmt)) {
        $e = oci_error($stmt);
        throw new Exception("Erro ao executar consulta - " . $e['message']);
    } else {
        $oraResponse = []; 
        while (($row = oci_fetch_assoc($stmt)) != false) {
            $oraResponse[] = $row; 
        }
        header('Content-Type: application/json');
        echo json_encode(array_values($oraResponse)); 
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die("ERRO! Detalhes => " . $e->getMessage());
} finally {
    oci_close($oraConn); 
}
?>