<?php

$url = 'https://api.telegram.org/bot7022993965:AAE0ksYOlP1uY8HrfdpldWF_ZT-UC317Cr4/sendMessage';
$params = [
    'chat_id' => '-4132904728',
    'text' => 'TESTE'
];

// Inicializa o cURL
$ch = curl_init();

// Configura as opções da requisição
curl_setopt($ch, CURLOPT_URL, $url . '?' . http_build_query($params)); // Adiciona os parâmetros à URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Retorna a resposta como uma string
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Desativa a verificação do certificado SSL (use apenas temporariamente para testes)

// Executa a requisição
$response = curl_exec($ch);

// Verifica por erros
if(curl_errno($ch)){
    echo 'Erro ao fazer a requisição: ' . curl_error($ch);
}

// Fecha a sessão cURL
curl_close($ch);

// Imprime a resposta
echo $response;
