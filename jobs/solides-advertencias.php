<?php
try {
    include 'corporerm.config.php';

    $logDir = __DIR__ . '/logs';
    if (!is_dir($logDir)) {
        mkdir($logDir, 0755, true);
    }

    $logFile = $logDir . '/solides_advertencias_' . date('Ymd') . '.log';

    function logMessage($message) {
        global $logFile;
        file_put_contents($logFile, date('Y-m-d H:i:s') . ' - ' . $message . PHP_EOL, FILE_APPEND);
    }

    $dadosFuncionario = $conexao->query("SELECT * FROM OBVSLDADV");

    $classification = 'Negativo';  
    $value = '0.00';
    $typeIncidentId = '8';

    while ($row = $dadosFuncionario->fetch(PDO::FETCH_ASSOC)) {
        include 'solides.config.php'; 
        $curl = curl_init();
        $url = $host . 'ocorrencias';

        $comment = "Escrita - " . mb_convert_encoding(addslashes($row["DESCRICAO"]), "UTF-8", "ISO-8859-1");
        $idNumber = mb_convert_encoding(addslashes($row["CPF"]), "UTF-8", "ISO-8859-1");
        $incidentDate = mb_convert_encoding(addslashes($row["DATAHORA"]), "UTF-8", "ISO-8859-1");

        $jsonEnviado = json_encode([
            "idNumber" => $idNumber,
            "incidentDate" => $incidentDate,
            "classification" => $classification,
            "comment" => $comment,
            "value" => $value,
            "typeIncidentId" => $typeIncidentId
        ]);

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonEnviado,
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $token,
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        if ($response === false) {
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            logMessage("Erro na requisição CURL. Código HTTP: " . $httpCode . " - Erro: " . curl_error($curl));
        } else {
            $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            logMessage("Requisição CURL realizada. Código HTTP: " . $httpCode . " - Resposta: " . $response);
        }
        
        curl_close($curl);
    }

} catch (Exception $e) {
    logMessage("Erro: " . $e->getMessage());
}

$conexao = null;
?>
