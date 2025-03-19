<?php
	require '../db/conexao.php';
	
	$stmt = $pdo->prepare("SELECT * FROM controle ORDER BY controle_id");
		
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
	