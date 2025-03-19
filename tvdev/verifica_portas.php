<?php

// Executa o comando para listar os nomes das aplicações gerenciadas pelo PM2
$output = shell_exec("pm2 jlist | jq -r '.[].name'");

// Verifica se o comando foi executado com sucesso
if ($output === null) {
    echo json_encode(["error" => "Failed to execute command"]);
    exit;
}

// Divide a saída do comando em linhas individuais
$lines = explode(PHP_EOL, trim($output));

// Array para armazenar as aplicações formatadas
$applications = [];

// Itera sobre as linhas e formata o JSON de saída
foreach ($lines as $line) {
    // Verifica se a linha não está vazia
    if (!empty($line)) {
        // Usa expressão regular para capturar o nome da aplicação e a porta
        if (preg_match('/^(.+)\s-\s(\d{4})$/', $line, $matches)) {
            $applications[] = [
                "app" => trim($matches[1]),
                "port" => trim($matches[2])
            ];
        }
    }
}

// Retorna o JSON formatado
echo json_encode($applications, JSON_PRETTY_PRINT);

?>
