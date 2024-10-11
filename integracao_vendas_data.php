<?php
$data = $_GET['data'];
include 'conn_conc.php';
$sql = "SELECT 
          numero_loja AS NROEMPRESA,
          count(*) as SOCIN_TOTAL,
          max(hora_venda) as SOCIN_ULTIMAVENDA
        FROM capa_cupom_venda
        WHERE data_venda = '$data'
        GROUP BY numero_loja";

$result = mysqli_query($conn, $sql);

$response = [];

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response['socin'][$row['NROEMPRESA']] = $row;
    }
} else {
    $response['socin']['message'] = "0 results";
}

mysqli_close($conn);

include 'conn_oracle.php';
try {
    if (!$stmt = oci_parse($oraConn, "SELECT P.NROEMPRESA AS NROEMPRESA,
                                       COUNT(*) AS PDV_DOCTO_TOTAL,
                                       TO_CHAR(
                                           TRUNC(MAX(P.DTAHORAINSERCAO), 'MI') + 
                                           CASE WHEN TO_CHAR(MAX(P.DTAHORAINSERCAO), 'SS') >= 30 THEN INTERVAL '1' MINUTE ELSE INTERVAL '0' MINUTE END,
                                           'DD/MM/YYYY HH24:MI:SS'
                                       ) AS PDV_DOCTO_HORA
                                  FROM PDV_DOCTO P
                                 WHERE P.DTAMOVIMENTO = TO_DATE('$data', 'YYYY-MM-DD')
                                  and MODELODF = '65'
                                 GROUP BY P.NROEMPRESA")) {
        $e = oci_error($oraConn);
        throw new Exception("Erro ao preparar consulta - " . $e['message']);
    }

    if (!oci_execute($stmt)) {
        $e = oci_error($stmt);
        throw new Exception("Erro ao executar consulta - " . $e['message']);
    } else {
        while (($row = oci_fetch_assoc($stmt)) != false) {
            $response['pdv'][$row['NROEMPRESA']] = $row; 
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die("ERRO! Detalhes => " . $e->getMessage());
} finally {
    oci_close($oraConn); 
}

include 'conn_oracle.php';
try {
    if (!$stmt = oci_parse($oraConn, "SELECT C.NROEMPRESA, COUNT(*) AS COMERCIAL_TOTAL, '' AS COMERCIAL_HORA FROM MFL_DOCTOFISCAL C
 WHERE C.DTAMOVIMENTO = TO_DATE('$data', 'YYYY-MM-DD')
  AND MODELODF IN ('2D', '65') 
  GROUP BY C.NROEMPRESA")) {
        $e = oci_error($oraConn);
        throw new Exception("Erro ao preparar consulta - " . $e['message']);
    }

    if (!oci_execute($stmt)) {
        $e = oci_error($stmt);
        throw new Exception("Erro ao executar consulta - " . $e['message']);
    } else {
        while (($row = oci_fetch_assoc($stmt)) != false) {
            $response['comercial'][$row['NROEMPRESA']] = $row; 
        }
    }
} catch (Exception $e) {
    echo $e->getMessage();
    die("ERRO! Detalhes => " . $e->getMessage());
} finally {
    oci_close($oraConn); 
}

$finalResponse = [];
foreach ($response['socin'] as $nroempresa => $socinData) {
    $socinTotal = isset($socinData['SOCIN_TOTAL']) ? (int)$socinData['SOCIN_TOTAL'] : 0; 
    $pdvTotal = isset($response['pdv'][$nroempresa]['PDV_DOCTO_TOTAL']) ? (int)$response['pdv'][$nroempresa]['PDV_DOCTO_TOTAL'] : 0; 
    $comercialTotal = isset($response['comercial'][$nroempresa]['COMERCIAL_TOTAL']) ? (int)$response['comercial'][$nroempresa]['COMERCIAL_TOTAL'] : 0; 

    $socinUltimaVenda = isset($socinData['SOCIN_ULTIMAVENDA']) ? date('d/m/Y H:i:s', strtotime($socinData['SOCIN_ULTIMAVENDA'])) : null; 
    $pdvHora = isset($response['pdv'][$nroempresa]['PDV_DOCTO_HORA']) ? date('d/m/Y H:i:s', strtotime($response['pdv'][$nroempresa]['PDV_DOCTO_HORA'])) : null; 

    $finalResponse[$nroempresa] = [
        'NROEMPRESA' => $nroempresa,
        'SOCIN_TOTAL' => $socinTotal,
        'SOCIN_ULTIMAVENDA' => $socinUltimaVenda,
        'PDV_DOCTO_TOTAL' => $pdvTotal,
        'PDV_DOCTO_HORA' => $pdvHora,
        'COMERCIAL_TOTAL' => $comercialTotal,
        'COMERCIAL_HORA' => isset($response['comercial'][$nroempresa]['COMERCIAL_HORA']) ? $response['comercial'][$nroempresa]['COMERCIAL_HORA'] : null,
        'PDVDOCTO_SOCIN' => $socinTotal - $pdvTotal, 
        'PDVDOCTO_COMERCIAL' => $pdvTotal - $comercialTotal 
    ];
}

header('Content-Type: application/json');
echo json_encode(array_values($finalResponse)); 

?>
