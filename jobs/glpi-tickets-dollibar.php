<?php
// Conexão com o Banco de Dados helpdesk
$servername_helpdesk = "192.168.0.100";
$username_helpdesk = "root";
$password_helpdesk = "bigmais.123";
$dbname_helpdesk = "helpdesk";

$conn_helpdesk = mysqli_connect($servername_helpdesk, $username_helpdesk, $password_helpdesk, $dbname_helpdesk);
if (!$conn_helpdesk) {
    die("Connection to helpdesk database failed: " . mysqli_connect_error());
}

// Conexão com o Banco de Dados dolibarr
$servername_dolibarr = "192.168.0.210";
$username_dolibarr = "root";
$password_dolibarr = "bigmais.123";
$dbname_dolibarr = "dolibarr";

$conn_dolibarr = mysqli_connect($servername_dolibarr, $username_dolibarr, $password_dolibarr, $dbname_dolibarr);
if (!$conn_dolibarr) {
    die("Connection to dolibarr database failed: " . mysqli_connect_error());
}

$truncateTable = "TRUNCATE TABLE llx_ticket";
$truncateTabledDolibarr = mysqli_query($conn_dolibarr, $truncateTable);

// Código principal para inserir dados do helpdesk no dolibarr
$sql = "SELECT DISTINCT
	`a`.`codigo` AS `codigo`,
	`a`.`local` AS `local`,
	`a`.`setor` AS `setor`,
	`a`.`categoria_descricao_completa` AS `categoria_descricao_completa`,
	`a`.`titulo` AS `titulo`,
	`a`.`requerente` AS `requerente`,
	`a`.`abertura` AS `abertura`,
	`a`.`abertura_x_agora` AS `abertura_x_agora`,
	`a`.`solucao` AS `solucao`,
	`a`.`tecnico` AS `tecnico`,
	`a`.`status` AS `status`,
	ucase( `b`.`name` ) AS `FORNECEDOR`,
	`SPLIT_STR` ( `a`.`categoria_descricao_completa`, '>', 1 ) AS `NIVEL1`,
	`SPLIT_STR` ( `a`.`categoria_descricao_completa`, '>', 2 ) AS `NIVEL2`,
	`SPLIT_STR` ( `a`.`categoria_descricao_completa`, '>', 3 ) AS `NIVEL3`,
	`SPLIT_STR` ( `a`.`categoria_descricao_completa`, '>', 4 ) AS `NIVEL4`,
	`SPLIT_STR` ( `a`.`categoria_descricao_completa`, '>', 5 ) AS `NIVEL5`,
	`e`.`id` AS `id`,
	`e`.`DESC1` AS `DESC1`,
	`e`.`DESC2` AS `DESC2`,
	`e`.`DESC3` AS `DESC3`,
	`e`.`DESC4` AS `DESC4`,
	`e`.`DESC5` AS `DESC5`,
	`e`.`DESC6` AS `DESC6`,
	`e`.`DESC7` AS `DESC7`,
	`e`.`DESC8` AS `DESC8`,
	`e`.`DESC9` AS `DESC9` 
FROM
	((((
					`helpdesk`.`view_info_chamados` `a`
					LEFT JOIN `helpdesk`.`view_fornecedor_chamados` `b` ON ( `b`.`codigo` = `a`.`codigo` ))
				LEFT JOIN `helpdesk`.`glpi_tickets` `c` ON ( `c`.`id` = `a`.`codigo` ))
			LEFT JOIN `helpdesk`.`glpi_groups_tickets` `d` ON ( `d`.`tickets_id` = `c`.`id` ))
	LEFT JOIN `helpdesk`.`view_content_tickets` `e` ON ( `e`.`id` = `c`.`id` )) 
WHERE
	`a`.`categoria_descricao_completa` IS NOT NULL 
	AND cast( `a`.`abertura` AS DATE ) >= '2024-02-01' 
	AND `d`.`type` = '2' 
	AND `d`.`groups_id` <> 0 
	AND `d`.`groups_id` IN ( 205, 81, 206, 43, 42, 80, 46, 207, 3, 8, 12, 14 ) ";

$result = mysqli_query($conn_helpdesk, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

    	$randon = mt_rand();
    	$track_id = md5($randon);
    	echo $track_id . "<br>";

        // Aqui, você precisa adaptar os campos conforme a estrutura da tabela llx_ticket
 		$codigo = mysqli_real_escape_string($conn_dolibarr, 'TS' . $row["codigo"]);
        $titulo = mysqli_real_escape_string($conn_dolibarr, $row["titulo"]);
        $message = mysqli_real_escape_string($conn_dolibarr, $row["DESC1"]);

        $grupotecnico = mysqli_real_escape_string($conn_dolibarr, $row["grupotecnico"]);
        
		$tecnico = mysqli_real_escape_string($conn_dolibarr, $row["tecnico"]);
		$requerente = mysqli_real_escape_string($conn_dolibarr, $row["requerente"]);

        $progress = mysqli_real_escape_string($conn_dolibarr, $progress);
		$track_id = mysqli_real_escape_string($conn_dolibarr, $track_id);

        $fk_soc = 0; 
        $fk_project = 0; 
        $fk_user_create = 1; 
        $fk_user_assign = NULL; 
        $fk_statut = 0; 
        $progress = 0;



		$insert_sql1 = "INSERT INTO llx_ticket (ref, fk_user_assign, subject, message, fk_statut,progress, track_id,origin_email)
               VALUES ('$codigo', NULL, '$titulo', '$message',  $fk_statut, '$progress', '$track_id','$grupotecnico')";

		$insert_sql2 = "INSERT INTO llx_user ( login)
               VALUES ( '$requerente')
			   ON DUPLICATE KEY UPDATE login = VALUES(login)";


        var_dump($insert_sql1 );
        echo "<br>";
        if (mysqli_query($conn_dolibarr, $insert_sql1)) {
            echo "Inserção bem-sucedida!";
            echo "<br>";
        } else {
            echo "Erro na inserção: " . mysqli_error($conn_dolibarr);
            echo "<br>";
        }
		var_dump($insert_sql2 );
        echo "<br>";
        if (mysqli_query($conn_dolibarr, $insert_sql2)) {
            echo "Inserção bem-sucedida!";
            echo "<br>";
        } else {
            echo "Erro na inserção: " . mysqli_error($conn_dolibarr);
            echo "<br>";
        }
    }
} else {
    echo "0 results";
    echo "<br>";
}

// Feche as conexões com os bancos de dados
mysqli_close($conn_helpdesk);
mysqli_close($conn_dolibarr);
?>
