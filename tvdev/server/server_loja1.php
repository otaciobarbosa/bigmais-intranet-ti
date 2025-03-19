				<?php 											
					require 'conexao.php';
					$stmt1 = $pdo->prepare("SELECT * FROM controle where controle_loja = '1'");
					if ($stmt1->execute())
					{	
					$row1 = $stmt1->fetch(); 
						$dados = $row1['controle_descricao'];							
						$dados = str_replace(' ', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = explode('*', $dados);
						
						$style1_disco = '';
						if(substr($dados[21],0,2) > 95){
							$style1_disco = 'danger';	
						}else{
							$style1_disco = 'success';
						}
						$style1_banco = '';
						if(substr($dados[46],0,2) > 95){
							$style1_banco = 'danger';	
						}else{
							$style1_banco = 'primary';
						}
						
						?>
					
					<div class="card z-index-2 bg-dark">
					
					<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
						
						<div class="bg-gradient-azul-royal shadow-royal border-radius-lg p-3 pe-1">
						
							<h4 class="mb-0 ">
								Concentrador Loja 1 - 192.168.0.10	
							</h4>						
							
						<div class="row">	
						<div class="col-sm-6">
							Uso do disco:
								<div class="progress p-0" style="margin-bottom:15px;font-size:0.8em;padding: 0.5em;height:15px;">
									<div class="progress-bar progress-bar-animated bg-<?php echo $style1_disco; ?> progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo substr($dados[21],0,2); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo substr($dados[21],0,2); ?>%;height:15px;">
									<?php echo $dados[21]; ?>
									</div>
								</div>
						</div>
						<div class="col-sm-6">
							Uso do banco:
								<div class="progress p-0" style="margin-bottom:15px;font-size:0.8em;padding: 0.5em;height:15px;">
									<div class="progress-bar progress-bar-animated bg-<?php echo $style1_banco; ?> progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo substr($dados[46],0,2); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo substr($dados[46],0,2); ?>%;height:15px;">
									<?php echo $dados[46]; ?>
									</div>
								</div>
						</div>
						</div>
						</div>
					</div>
					<div class="card-body">
						
						
						<?php								
							$output = $row1['controle_descricao'];						   
					    	echo "<pre style='color:#33ff00;background-color:#2f2f2f;padding:5px;height:250px;'>$output</pre>";
						}	
						?>
						
						<hr class="dark horizontal">
						<div class="d-flex ">
							<i class="material-icons text-sm my-auto me-1">schedule</i>
							<p class="mb-0 text-sm">Última atualização: <?php echo date('d/m/Y \à\s\ H:i:s', strtotime ($row1['controle_log'])); ?></p>
						</div>
					</div>
				</div>
					