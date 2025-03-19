<?php

function verificarStatusURL($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_exec($ch);
    $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    return $statusCode;
}

$url = "https://intraweb.bigmais.com.br/intra/sistemas/";
$status = verificarStatusURL($url);

echo "Status: $status";
?>