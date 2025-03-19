<?php
$host = '192.168.0.210';
$usuario = 'root';
$senha = 'bigmais.123';
$banco = "bigmais_admin";
$dsn = "mysql:host={$host};dbname={$banco};charset=utf8";
try
{
	// Conectando
	$pdo = new PDO($dsn, $usuario, $senha);
}
catch (PDOException $e)
{
	// Se ocorrer algum erro na conexão
	die($e->getMessage());
}
?>