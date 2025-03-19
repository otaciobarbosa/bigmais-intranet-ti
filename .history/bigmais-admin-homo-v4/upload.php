<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<?php include 'custom/header.php'; ?>
<body>
	<?php include 'custom/navigation.php'; ?>
	<div class="content-inner">
		<a href="index.php">VOLTAR</a>
		<center>
			<h1>LOG IMPORTAÇÃO:</h1>
		</center>
		<section class="dashboard-header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<?php
						//-- HABILITA MOSTRAR TODOS O ERROS --//
						ini_set('display_errors',1);
						ini_set('display_startup_erros',1);
						error_reporting(E_ALL);

						//--  INCLUE CONEXAO COM BANCO DE DADOS --//
						include 'data/conexao.php';

						$campanha = $_POST['campanha'];
						
						$QueryCodGrupoCampanha  = "SELECT MAX(group_screen_key)+1 AS novo_grupo FROM group_screen WHERE group_screen_key <> '100';";
						$rCodGrupoCampanha = mysqli_query($conn, $QueryCodGrupoCampanha);
						if (mysqli_num_rows($rCodGrupoCampanha) > 0) {
							while($rowCodGrupoCampanha = mysqli_fetch_assoc($rCodGrupoCampanha)) {
								$codGrupoCampanha =  $rowCodGrupoCampanha["novo_grupo"];
							}
						} 
						$nomeGrupoCampanha = $codGrupoCampanha . " - " . $campanha;

						//-- INICIO CADASTRA GRUPO DE PROMOCAO --//
						$InsertCadastraGrupoCampanha = "INSERT INTO group_screen (group_screen_key,group_screen_name,group_type)VALUES('$codGrupoCampanha','$nomeGrupoCampanha','1')";
						if ($conn->query($InsertCadastraGrupoCampanha) === TRUE) {
							echo "Grupo cadastrado corretamente";
							print("<pre>");
							print_r($InsertCadastraGrupoCampanha);
							print("</pre>");
						} else {
							echo "Erro ao cadastrar grupo : " . $InsertCadastraGrupoCampanha . "<br>" . $conn->error;
						}

						//-- FINAL CADASTRA GRUPO DE PROMOCAO --//
						if(isset($_FILES['arquivo'])){
							date_default_timezone_set("Brazil/East");
							$ext = strtolower(substr($_FILES['arquivo']['name'],-4)); 
							$new_name = date("YmdHis") . $ext;
							$dir = 'csv/';
							move_uploaded_file($_FILES['arquivo']['tmp_name'], $dir.$new_name);
							$arquivo = $dir.$new_name;
						}

						//-- LE E TRATA O CSV IMPORTADO --//
						$meuArray = Array();
						$file = fopen($arquivo, 'r');
						while (($line = fgetcsv($file)) !== false){
							$data = $meuArray[] = $line;
							$idProduto = $data[0];

						// PEGA O PLU_KEY DO ITEM --//
							$QueryPluKey  = "SELECT plu_key FROM plu WHERE id = '$idProduto';";
							$rPluKey = mysqli_query($conn, $QueryPluKey);
							if (mysqli_num_rows($rPluKey) > 0) {
								while($rowPluKey = mysqli_fetch_assoc($rPluKey)) {
									$pluKey =  $rowPluKey["plu_key"];

									//-- INICIO CADASTRA PRODUTOS AO GRUPO --//
									$InsertItensGrupo = "INSERT INTO plu_screen(plu_key,group_screen_key,group_type) VALUES ('$pluKey','$codGrupoCampanha','1');";
									if ($conn->query($InsertItensGrupo) === TRUE) {
										echo "Grupo cadastrado corretamente";
										print("<pre>");
										print_r($InsertItensGrupo);
										print("</pre>");
									} else {
										echo "Erro ao cadastrar grupo : " . $InsertItensGrupo . "<br>" . $conn->error;
									}
									//-- FINAL CADASTRA PRODUTOS AO GRUPO --//
								}
							} 
						}
						fclose($file);
						?>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php include 'custom/footer.php'; ?>
</body>
</html>