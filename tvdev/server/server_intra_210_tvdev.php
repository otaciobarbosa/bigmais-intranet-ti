<?php
	require 'conexao.php';
	$stmt = $pdo->prepare("SELECT * FROM controle WHERE controle_loja NOT IN ('250','240')");
	if ($stmt->execute())					
	{
	
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);	
	
	$groupedData = array();	
	
		foreach ($result as $row) {
			$groupedData = $result;		
		}
	}
	echo json_encode($groupedData);
	
	?>
	