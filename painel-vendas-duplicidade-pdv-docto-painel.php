<?php

include 'painel-vendas-conn-oracle.php';
try {
    if (!$stmt = oci_parse($oraConn, "SELECT TO_CHAR(c.DTAMOVIMENTO, 'DD/MM/YYYY HH24:MI:SS') AS DTAMOVIMENTO,
                                       c.NROEMPRESA,
                                       c.NUMERODF,
                                       c.NROCHECKOUT,
                                       c.QUANTIDADE,
                                       TO_CHAR(c.min_dtahorainsercao, 'DD/MM/YYYY HH24:MI:SS') AS min_dtahorainsercao,
                                       TO_CHAR(c.max_dtahorainsercao, 'DD/MM/YYYY HH24:MI:SS') AS max_dtahorainsercao
                                            FROM obv_duplicidade_pdv_docto c
                                                where c.DTAMOVIMENTO = trunc(sysdate) and quantidade >= 2")) {
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