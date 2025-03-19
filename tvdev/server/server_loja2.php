				<?php 											
					require 'conexao.php';
					$stmt2 = $pdo->prepare("SELECT * FROM controle where controle_loja = '2'");
					if ($stmt2->execute())
					{	
					$row2 = $stmt2->fetch(); 
						$dados = $row2['controle_descricao'];							
						$dados = str_replace(' ', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = explode('*', $dados);
						
						$style2_disco = '';
						if(substr($dados[21],0,2) > 95){
							$style2_disco = 'danger';	
						}else{
							$style2_disco = 'success';
						}
						$style2_banco = '';
						if(substr($dados[46],0,2) > 95){
							$style2_banco = 'danger';	
						}else{
							$style2_banco = 'primary';
						}
						
						?>
					
					<div class="card z-index-2 bg-dark">
					
					<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
						
						<div class="bg-gradient-red shadow-info border-radius-lg p-3 pe-1">
						
							<h4 class="mb-0 ">
								Concentrador Loja 2 - 192.168.2.218	
							</h4>						
							
						<div class="row">	
						<div class="col-sm-6">
							Uso do disco:
								<div class="progress p-0" style="margin-bottom:15px;font-size:0.8em;padding: 0.5em;height:15px;">
									<div class="progress-bar progress-bar-animated bg-<?php echo $style2_disco; ?> progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo substr($dados[21],0,2); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo substr($dados[21],0,2); ?>%;height:15px;">
									<?php echo $dados[21]; ?>
									</div>
								</div>
						</div>
						<div class="col-sm-6">
							Uso do banco:
								<div class="progress p-0" style="margin-bottom:15px;font-size:0.8em;padding: 0.5em;height:15px;">
									<div class="progress-bar progress-bar-animated bg-<?php echo $style2_banco; ?> progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo substr($dados[46],0,2); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo substr($dados[46],0,2); ?>%;height:15px;">
									<?php echo $dados[46]; ?>
									</div>
								</div>
						</div>
						</div>
						</div>
					</div>
					<div class="card-body">
						
						
						<?php								
							$output = $row2['controle_descricao'];						   
					    	echo "<pre style='color:#33ff00;background-color:#2f2f2f;padding:5px;height:250px;'>$output</pre>";
						}	
						?>
						
						<hr class="dark horizontal">
						<div class="d-flex ">
							<i class="material-icons text-sm my-auto me-1">schedule</i>
							<p class="mb-0 text-sm">Última atualização: <?php echo date('d/m/Y \à\s\ H:i:s', strtotime ($row2['controle_log'])); ?></p>
						</div>
					</div>
				</div>
					