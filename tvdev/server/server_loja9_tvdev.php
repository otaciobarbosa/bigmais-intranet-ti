<?php					
	require 'conexao.php';
	$stmt9 = $pdo->prepare("SELECT * FROM controle where controle_loja = '9'");
	if ($stmt9->execute())
	{					
		$row9 = $stmt9->fetch(); 
		$dados = $row9['controle_descricao'];							
		$dados = str_replace(' ', '*', $dados); 
		$dados = str_replace('**', '*', $dados); 
		$dados = str_replace('**', '*', $dados); 
		$dados = str_replace('**', '*', $dados); 
		$dados = str_replace('**', '*', $dados); 
		$dados = explode('*', $dados);
		
		$style9_disco = '';
		
		if(strlen($dados[51] > 1)){
			$disco9 = $dados[51];
		}else{
			$disco9 = $dados[21];
		}
		
		
		if(substr($disco9,0,2) > 95){
			$style9_disco = 'danger';	
			}else{
			$style9_disco = 'success';
		}							
	?>	
	<div class="card z-index-2 bg-dark">		
		<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">			
			<div class="bg-gradient-purpple shadow-purpple border-radius-lg p-3 pe-1">				
				<h4 class="mb-0 " style="font-size:0.9em !important;">
					Lj 09 - <span class="stloja">192.168.</span>9.251
				</h4>				
				<div class="progress p-0" style="margin-bottom:15px;font-size:0.8em;padding: 0.5em;height:30px;">
					<div class="progress-bar progress-bar-animated progress-bar-<?php echo $style9_disco; ?> progress-bar-striped active" role="progressbar" aria-valuenow="<?php echo substr($disco9,0,2); ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo substr($disco9,0,2); ?>%;height:45px;padding-top:3px">
						<?php echo $disco9; ?>
					</div>
				</div>						
			</div>
		</div>
		<div class="card-body">											
		<?php }	?>												
		<div class="d-flex ">							
			<p class="mb-0 text-sm"><i class="fa fa-clock"></i> <?php echo date('d/m/Y \à\s\ H:i:s', strtotime ($row9['controle_log'])); ?></p>
		</div>
	</div>
</div>

