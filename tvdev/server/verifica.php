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
                    
					<?php
					$stmt210 = $pdo->prepare("SELECT * FROM controle where controle_loja = '210'");
					if ($stmt210->execute())
					
					{					
						while($row210 = $stmt210->fetch()){ 
							$dados = $row210['controle_descricao'];
							
							$dados = str_replace(' ', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							
							$dados = explode('*', $dados); 
							
							
							echo "<br>".$dados[21];
							
							
						}
					}
					
					 											
					$stmt1 = $pdo->prepare("SELECT * FROM controle where controle_loja = '1'");
					if ($stmt1->execute())
					
					{					
						while($row1 = $stmt1->fetch()){ 
							$dados = $row1['controle_descricao'];
							
							$dados = str_replace(' ', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							
							$dados = explode('*', $dados); 
							
							 echo "<br>".$dados[11]; 
							
						}
					}
					
					?>					
					
					<?php					
					$stmt2 = $pdo->prepare("SELECT * FROM controle where controle_loja = '2'");
					if ($stmt2->execute())					
					{					
						while($row2 = $stmt2->fetch()){ 
							$dados = $row2['controle_descricao'];
							
							$dados = str_replace(' ', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							
							$dados = explode('*', $dados); 
							
							echo "<br>".$dados[21]; 
						}
					}
					
					?>					
						
					
					<?php					
					$stmt4 = $pdo->prepare("SELECT * FROM controle where controle_loja = '4'");
					if ($stmt4->execute())
					
					{					
						while($row4 = $stmt4->fetch()){ 
							$dados = $row4['controle_descricao'];
							
							$dados = str_replace(' ', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							
							$dados = explode('*', $dados); 
							
								  
							echo "<br>".$dados[21]; 		
						}
					}
					
					
					$stmt5 = $pdo->prepare("SELECT * FROM controle where controle_loja = '5'");
					if ($stmt5->execute())
				
					{					
						while($row5 = $stmt5->fetch()){ 
							$dados = $row5['controle_descricao'];
							
							$dados = str_replace(' ', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							
							$dados = explode('*', $dados); 
							
							echo "<br>".$dados[11]; 
						}
					}
					
					?>					
										
					<?php					
					$stmt9 = $pdo->prepare("SELECT * FROM controle where controle_loja = '9'");
					if ($stmt9->execute())
					
					{					
						while($row9 = $stmt9->fetch()){ 
							$dados = $row9['controle_descricao'];
							
							$dados = str_replace(' ', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 
							$dados = str_replace('**', '*', $dados); 							
							$dados = explode('*', $dados); 
							
							echo "<br>".$dados[21]; 
						
						}
					}
					
					?>	
