					<?php
					require 'conexao.php';
					$stmt251 = $pdo->prepare("SELECT * FROM controle where controle_loja = '251'");
					if ($stmt251->execute())					
					{					
						$output='';
						$row251 = $stmt251->fetch(); 
						$dados = $row251['controle_descricao'];							
						$dados = str_replace(' ', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = explode('*', $dados);
						
						$style251_disco = '';
						if(substr($dados[35],0,2) > 95){
							$style251_disco = 'danger';	
						}else{
							$style251_disco = 'success';
						}
						
						$style251_banco = '';
						if(substr($dados[40],0,2) > 95){
							$style251_banco = 'danger';	
						}else{
							$style251_banco = 'primary';
						}
						
						
						?>
					<div class="card z-index-2 bg-dark">
					<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
						<div class="bg-gradient-info shadow-info border-radius-lg p-3 pe-1">                  
							<h4 class="mb-0 ">
								Concentrador Matriz - 192.168.0.251	
							</h4>						
						<div class="row">	
						<div class="col-sm-6">
							Uso do disco:
								<div class="progress p-0" style="margin-bottom:15px;font-size:0.8em;padding: 0.5em;height:15px;">
									<div class="progress-bar progress-bar-animated bg-<?php echo $style251; ?> progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo substr($dados[35],0,2); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo substr($dados[35],0,2); ?>%;height:15px;">
									<?php echo $dados[35]; ?>
									</div>
								</div>
						</div>
						<div class="col-sm-6">
							Uso do banco:
								<div class="progress p-0" style="margin-bottom:15px;font-size:0.8em;padding: 0.5em;height:15px;">
									<div class="progress-bar progress-bar-animated bg-<?php echo $style251; ?> progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo substr($dados[40],0,2); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo substr($dados[40],0,2); ?>%;height:15px;">
									<?php echo $dados[40]; ?>
									</div>
								</div>
						</div>
						</div>
						</div>
					</div>
					<div class="card-body">
						
						
						<?php								
							$output = $row251['controle_descricao'];						   
					    	echo "<pre style='color:#33ff00;background-color:#2f2f2f;padding:5px;height:250px;'>$output</pre>";
						}	
						?>
						
						<hr class="dark horizontal">
						<div class="d-flex ">
							<i class="material-icons text-sm my-auto me-1">schedule</i>
							<p class="mb-0 text-sm">Última atualização: <?php echo date('d/m/Y \à\s\ H:i:s', strtotime ($row251['controle_log'])); ?></p>
						</div>
					</div>
				</div>
					