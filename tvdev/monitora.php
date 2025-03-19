<?php 

// Configuração de erro e timezone
error_reporting(E_ALL); 
date_default_timezone_set('America/Sao_Paulo');

// Configuração do banco de dados
$host = "192.168.0.210";
$user = "root";
$password = "bigmais.123";
$database = "bigmais_admin";

// Conexão com o banco de dados
$conn = new mysqli($host, $user, $password, $database);

// Verifica conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consulta para verificar o status do serviço
$sql = "SELECT status FROM servicos WHERE name = 'NDD'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $status = $row['status'];

    // Verifica se o status é "PARADO"
    if ($status === "PARADO") {
        // Configuração para envio do alerta no Telegram
        $apiKey      = "616509024:AAGnnoL4gmFSWWBA1KrEonWWVcf531bQ9Us";
        $groupChatID = "-313168333";
        $alerta      = "SERVICO: NDD PARADO!";
        $url         = "https://api.telegram.org/bot" . $apiKey . "/sendMessage?chat_id=" . $groupChatID . "&text=" . urlencode($alerta);

        // Envia a notificação com cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code == 200) {
            echo "Notificação enviada com sucesso!";
        } else {
            echo "Falha ao enviar notificação. Código HTTP: $http_code. Resposta: $response";
        }
    } else {
        echo "Serviço está ativo, nenhuma notificação enviada.";
    }
} else {
    echo "Serviço não encontrado no banco de dados.";
}

// Fecha a conexão com o banco de dados
$conn->close();

?>
