<?php

$servername = "192.168.8.251";
$username = "root";
$password = "B4nc0my5q1";
$dbname = "concentrador";
$logFile = "/var/www/html/jobs/logs/socin-limpa-concentrador-08.log";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$intervalo_data = date('Y-m-d', strtotime('-3 months'));

$tabelas_campos_data = array(
    "mov_nfc" => "DATE(dat_hor_ems)",
    "ctr_env_xml_cup_nfc" => "dta_vda",
    "dados_adicionais_detalhe" => "data_venda",
    "ctr_int_vda" => "dat_mov",
    "detalhe_cupom_venda" => "data_venda",
    "mov_trn_cbk" => "dat_mov",
    "ips_daf" => "dat_mov",
    "mov_cup_nfc" => "dta_vda",
    "mov_ite_doc_etr" => "dat_mov",
    "movimento_finalizadora" => "data_movimento",
    "dados_adicionais_capa" => "data_venda",
);

$logHandle = fopen($logFile, 'a');

foreach ($tabelas_campos_data as $tabela => $campo_data) {
    $sql = "DELETE FROM $tabela WHERE $campo_data < '$intervalo_data' LIMIT 10000";
    $result = $conn->query($sql);

    $currentDateTime = date('Y-m-d H:i:s'); 

    if (!$result) {
        $errorMessage = "[$currentDateTime] - Erro ao apagar registros da tabela $tabela: " . $conn->error;
        fwrite($logHandle, $errorMessage . PHP_EOL);
    } else {
        $deleted_rows = $conn->affected_rows;
        $successMessage = "[$currentDateTime] - Registros da tabela $tabela: $deleted_rows apagados com sucesso.";
        fwrite($logHandle, $successMessage . PHP_EOL);
    }
}


fclose($logHandle);

$conn->close();
?>