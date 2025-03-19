<?php
$host = '192.168.0.251';
$usuario = 'econect';
$senha = '123456';
$banco = 'concentrador';

$ftpHost = '154.49.247.151';
$ftpUsuario = 'u422862821';
$ftpSenha = '6AFmo@R%TN^G$A*tBf%94u';
$ftpDiretorioRemoto = '/domains/bigmais.com.br/public_html';

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

$sql = "
SELECT
	tab.cliente AS cpf,
	tab.sequencial AS posicao
FROM
	(
		SELECT
			(@row_number := @row_number + 1) AS sequencial,
			cliente,
			total
		FROM
			viewAmstelHeineken
		JOIN (SELECT @row_number := 0) AS init
	) AS tab
WHERE
	tab.sequencial <= 250";
$resultado = $conn->query($sql);


if (!$resultado) {
    die("Erro na consulta: " . $conn->error);
}

$dados = array();
while ($row = $resultado->fetch_assoc()) {
    $dados[] = $row;
}

$conn->close();

$json = json_encode($dados);

$ftp = ftp_connect($ftpHost, $ftpPort);

if (!$ftp) {
    die("Erro na conexão FTP");
}

if (!ftp_login($ftp, $ftpUsuario, $ftpSenha)) {
    die("Erro na autenticação FTP");
}

ftp_pasv($ftp, true); 

$tempFile = tempnam(sys_get_temp_dir(), 'pontos.json');
file_put_contents($tempFile, $json);

ftp_put($ftp, $ftpDiretorioRemoto . '/pontos.json', $tempFile, FTP_ASCII);

ftp_close($ftp);

?>