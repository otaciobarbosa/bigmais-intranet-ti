<?php

// Lê o conteúdo do arquivo de texto gerado pelo shell script
$result = file_get_contents('/tmp/portas.txt');

if ($result === false) {
    echo json_encode(["error" => "Failed to read file"]);
    exit;
}

// Divide o conteúdo em linhas individuais
$lines = explode(PHP_EOL, trim($result));

// Array para armazenar as aplicações formatadas
$applications = [];

// Itera sobre as linhas e formata o JSON de saída
foreach ($lines as $line) {
    // Verifica se a linha não está vazia
    if (!empty($line)) {
        // Usa expressão regular para capturar o nome da aplicação e a porta
        if (preg_match('/^(.+)\s-\s(\d{4})$/', $line, $matches)) {
            $applications[] = [
                'app' => trim($matches[1]),
                'port' => trim($matches[2])
            ];
        }
    }
}

// Retorna o JSON formatado
echo json_encode($applications, JSON_PRETTY_PRINT);

?>
