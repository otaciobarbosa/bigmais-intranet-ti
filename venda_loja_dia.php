<?php

include 'conn_oracle.php';
try {
    if (!$stmt = oci_parse($oraConn, "SELECT d.LOJA,
                                           TO_CHAR(d.DTAMOVIMENTO, 'DD/MM/YYYY HH24:MI:SS') AS DTAMOVIMENTO,
                                           'R$ ' || TO_CHAR(nvl(d.VLR_PDV,0), '999G999G999D99', 'NLS_NUMERIC_CHARACTERS='',.''') AS VLR_PDV,
                                           'R$ ' || TO_CHAR(nvl(d.VLR_ABC,0), '999G999G999D99', 'NLS_NUMERIC_CHARACTERS='',.''') AS VLR_ABC,
                                           'R$ ' || TO_CHAR(nvl(d.VLR_FISCAL,0), '999G999G999D99', 'NLS_NUMERIC_CHARACTERS='',.''') AS VLR_FISCAL,
                                           'R$ ' || TO_CHAR(nvl(d.VLR_TES,0), '999G999G999D99', 'NLS_NUMERIC_CHARACTERS='',.''') AS VLR_TES,
                                           'R$ ' || TO_CHAR(nvl(d.DIF_FISCAL_AUX,0), '999G999G999D99', 'NLS_NUMERIC_CHARACTERS='',.''') AS DIF_FISCAL_AUX,
                                           'R$ ' || TO_CHAR(nvl(d.DIF_PDV_ABC,0), '999G999G999D99', 'NLS_NUMERIC_CHARACTERS='',.''') AS DIF_PDV_ABC,
                                           'R$ ' || TO_CHAR(nvl(d.DIF_ABC_FISCAL,0), '999G999G999D99', 'NLS_NUMERIC_CHARACTERS='',.''') AS DIF_ABC_FISCAL,
                                           'R$ ' || TO_CHAR(nvl(d.DIF_PDV_TES,0), '999G999G999D99', 'NLS_NUMERIC_CHARACTERS='',.''') AS DIF_PDV_TES
                                      FROM obv_venda_por_loja_dia d")) {
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