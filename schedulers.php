<?php

include 'conn_oracle.php';
try {
    if (!$stmt = oci_parse($oraConn, "SELECT TO_CHAR(MAX(LOG_DATE), 'DD/MM/YYYY HH24:MI:SS') AS LAST_RUN, 
                                             owner, 
                                             CASE job_name  
                                              WHEN 'INTEGRA_PDV_COMERCIAL_LJ_01' THEN 'Schedule: Comercial LJ 01'
                                              WHEN 'INTEGRA_PDV_COMERCIAL_LJ_02' THEN 'Schedule: Comercial LJ 02'
                                              WHEN 'INTEGRA_PDV_COMERCIAL_LJ_04' THEN 'Schedule: Comercial LJ 04'
                                              WHEN 'INTEGRA_PDV_COMERCIAL_LJ_05' THEN 'Schedule: Comercial LJ 05'
                                              WHEN 'INTEGRA_PDV_COMERCIAL_LJ_08' THEN 'Schedule: Comercial LJ 08'
                                              WHEN 'INTEGRA_PDV_COMERCIAL_LJ_09' THEN 'Schedule: Comercial LJ 09'
                                              ELSE '' END AS job_name,


                                             CASE WHEN MAX(status) = 'SUCCEEDED' THEN 'OK' ELSE 'FALHA' END AS STATUS
                                      FROM DBA_SCHEDULER_JOB_LOG
                                      WHERE OWNER != 'SYS'
                                        AND job_name IN ('INTEGRA_PDV_COMERCIAL_LJ_01', 
                                                         'INTEGRA_PDV_COMERCIAL_LJ_02', 
                                                         'INTEGRA_PDV_COMERCIAL_LJ_04', 
                                                         'INTEGRA_PDV_COMERCIAL_LJ_05', 
                                                         'INTEGRA_PDV_COMERCIAL_LJ_08', 
                                                         'INTEGRA_PDV_COMERCIAL_LJ_09')
                                      GROUP BY job_name, owner 
                                      ORDER BY job_name")) {
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