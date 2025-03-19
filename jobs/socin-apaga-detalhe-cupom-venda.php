<?php
header("Refresh: 30; url=apaga-detalhe-cupom-venda.php");
// Conexão com o banco de dados
$servername = "192.168.0.251";
$username = "econect";
$password = "123456";
$dbname = "concentrador";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Define o número máximo de linhas que serão apagadas em cada execução
$max_linhas = 100000;

// Define o tempo de espera entre as execuções (em segundos)
$tempo_espera = 35;

// Início do loop de execução
// do {
    // Captura o horário de início da execução
    $inicio_execucao = time();

    // Executa a query para apagar as linhas desejadas
    $sql = "DELETE FROM detalhe_cupom_venda_hst WHERE data_venda < '2023-03-01' LIMIT $max_linhas";

    if ($conn->query($sql) === TRUE) {
        // Captura a quantidade de linhas apagadas
        $linhas_apagadas = $conn->affected_rows;

        // Captura o horário de término da execução
        $fim_execucao = time();

        // Calcula o tempo de duração da execução (em segundos)
        $tempo_execucao = $fim_execucao - $inicio_execucao;

        // Exibe as informações da execução
        echo "Executado em: " . date('d/m/Y H:i:s', $inicio_execucao) . "<br>";
        echo "Linhas apagadas: " . $linhas_apagadas . "<br>";
        echo "Tempo de execução: " . $tempo_execucao . " segundos<br><br>";

        // Aguarda o tempo de espera antes de iniciar a próxima execução
        // sleep($tempo_espera);
    } else {
        // Exibe o erro, caso ocorra
        echo "Erro ao executar a query: " . $conn->error;
    }
// } while ($linhas_apagadas >= $max_linhas); // Executa o loop enquanto houver linhas a serem apagadas

// Fecha a conexão com o banco de dados
$conn->close();
?>
