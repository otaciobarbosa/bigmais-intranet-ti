				<?php
					require 'conexao.php';
					$stmt100 = $pdo->prepare("SELECT * FROM controle where controle_loja = '100'");
					if ($stmt100->execute())					
					{
					$row100 = $stmt100->fetch(); 
					$dados = $row100['controle_descricao'];							
						$dados = str_replace(' ', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = str_replace('**', '*', $dados); 
						$dados = explode('*', $dados);
												
						$style100 = '';
						if(substr($dados[21],0,2) > 95){
							$style100 = 'danger';	
						}else{
							$style100 = 'success';
						}	
						?>
					<div class="card z-index-2 bg-dark">
					<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
						<div class="bg-gradient-green shadow-dark border-radius-lg p-3 pe-1">                  
							<h4 class="mb-0 " style="font-size:0.9em !important;">			
								GLPI - <span class="stloja">192.168.</span>0.100								
							</h4>												
								<div class="progress p-0" style="margin-bottom:15px;font-size:0.8em;padding: 0.5em;height:30px;">
									<div class="progress-bar progress-bar-animated progress-bar-<?php echo $style100; ?> progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo substr($dados[21],0,2); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo substr($dados[21],0,2); ?>%;height:45px;padding-top:3px">
									<?php echo $dados[21]; ?>
									</div>
								</div>
						</div>
					</div>
					<div class="card-body">											
						<?php }	?>												
						<div class="d-flex ">							
							<p class="mb-0 text-sm"><i class="fa fa-clock"></i> <?php echo date('d/m/Y \à\s\ H:i:s', strtotime ($row100['controle_log'])); ?></p>
						</div>
					</div>
				</div>