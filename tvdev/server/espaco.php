<?php

// Recebe o endereço IP do servidor como um parâmetro GET
$ip = $_GET['ip'];

// Define a senha de login do servidor
$password = 'root';

// Define o comando que será executado no servidor
$command = "df -h | grep /dev/sda1 | awk '{print $5}'; df -h | grep /dev/sdb1 | awk '{print $5}'";

// Executa o comando usando o sshpass para fazer login com a senha "root"
exec("sshpass -p '$password' ssh -o StrictHostKeyChecking=no root@$ip '$command'", $output);

// Inicializa um array associativo vazio
$disk_usage = array();

// Loop pelos resultados da saída do comando
foreach ($output as $line) {

    // Procura pelos resultados que correspondem aos discos que queremos
    if (strpos($line, '/dev/sda1') !== false) {
        // Extrai o percentual de uso do disco sda1 usando o comando "awk"
        $disk_usage['sda1'] = trim(shell_exec("echo '$line' | awk '{print $5}'"));
    } elseif (strpos($line, '/dev/sdb1') !== false) {
        // Extrai o percentual de uso do disco sdb1 usando o comando "awk"
        $disk_usage['sdb1'] = trim(shell_exec("echo '$line' | awk '{print $5}'"));
    }
}

// Imprime o resultado em formato JSON
echo json_encode($disk_usage);
?>