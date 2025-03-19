<?php session_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br" translate="no">
	<?php include 'custom/header.php'; ?>
	<style>
		body{margin:2%;  background-image: url("img/bg_sand.jpg");}
	</style>
	<body>		
		<div class="containder">						
			<div class="card altura">					
				<div class="card-body"> 
					<div class="card-header d-flex align-items-center">
						<h1 class="h1" style="text-align:center;color:#000; width:100%;">MONITORAMENTO DOS SERVIDORES</h1>
					</div>
					<div class="row">
						<div class="col-md-6" id="intra_210"></div>					  
						<div class="col-md-6" id="conc_251"></div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6" id="loja1"></div>
						<div class="col-md-6" id="loja2"></div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6" id="loja4"></div>
						<div class="col-md-6" id="loja5"></div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-6" id="loja9"></div>
						<div class="col-md-6" id="glpi_100"></div>
						</div>
					</div>					
				</div>
			</div>			
			<div class="row">					
				<div class="col-lg-6">					
					<div class="card altura">
						<div class="card-body"> 
							<div class="card-header d-flex align-items-center">
								<h1 class="h1" style="text-align:center;color:#000; width:100%;">Monitoramento TVs FRIOS / AÇOUGUE</h1>
							</div>
							<div class="row">
								<div class="col-md-12">
									<table class="table table-hover">
										<thead>
											<tr>
												<th scope="col" width="10%">LOJAS</th>      
												<th scope="col">Dispositivos</th>      
												<th scope="col">IP</th>
												<th scope="col">status</th>            
											</tr>
										</thead>
										
										<!-- LOJA 1 -->
										
										<tbody style="border:5px solid #ccc;">
											<tr style="margin:2px !important;padding: 2px !important;">
												<td class="row_loja" rowspan="3"><span>LOJA 1</span></td>
												<td>TV 1 - AÇOUGUE</th>
												<td>192.168.<strong>1.143</strong></td>
												<td id="tv1a1"></td>
											</tr>
											<tr>
												<td>TV 2 - AÇOUGUE</th>
												<td>192.168.<strong>1.142</strong></td>
												<td id="tv2a1"></td>
											</tr>
											<tr>
												<td>TV 1 - FRIOS</th>
												<td>192.168.<strong>1.141</strong></td>
												<td id="tv1f1"></td>
											</tr>											
										</tbody>
										
										<!-- LOJA 2 -->
										
										<tbody style="border:5px solid #ccc;">
											<tr>
												<td class="row_loja" rowspan="4"><span>LOJA 2</span></td>
												<td>TV 1 - AÇOUGUE</th>
												<td>192.168.<strong>2.74</strong></td>
												<td id="tv1a2"></td>
											</tr>
											<tr>
												<td>TV 2 - AÇOUGUE</th>
												<td>192.168.<strong>2.60</strong></td>
												<td id="tv2a2"></td>
											</tr>
											<tr>
												<td>TV 1 - FRIOS</th>
												<td>192.168.<strong>2.56</strong></td>
												<td id="tv1f2"></td>
											</tr>
											<tr>
												<td>TV 2 - FRIOS</th>
												<td>192.168.<strong>2.59</strong></td>
												<td id="tv2f2"></td>
											</tr>
										</tbody>
										
										<!-- LOJA 4 -->
										
										<tbody style="border:5px solid #ccc;">
											<tr>
												<td class="row_loja" rowspan="4"><span>LOJA 4</span></td>
												<td>TV 1 - AÇOUGUE</th>
												<td>192.168.<strong>4.37</strong></td>
												<td id="tv1a4"></td>
											</tr>
											<tr>
												<td>TV 2 - AÇOUGUE</th>
												<td>192.168.<strong>4.38</strong></td>
												<td id="tv2a4"></td>
											</tr>
											<tr>
												<td>TV 1 - FRIOS</th>
												<td>192.168.<strong>4.39</strong></td>
												<td id="tv1f4"></td>
											</tr>
											<tr>
												<td>TV 2 - FRIOS</th>
												<td>192.168.<strong>4.40</strong></td>
												<td id="tv2f4"></td>
											</tr>
										</tbody>											
										
										<!-- LOJA 9 -->
										
										<tbody style="border:5px solid #ccc;">
											<tr>
												<td class="row_loja" rowspan="4"><span>LOJA 9</span></td>
												<td>TV 1 - AÇOUGUE</th>
												<td>192.168.<strong>9.179</strong></td>
												<td id="tv1a9"></td>
											</tr>
											<tr>
												<td>TV 2 - AÇOUGUE</th>
												<td>192.168.<strong>9.180</strong></td>
												<td id="tv2a9"></td>
											</tr>
											<tr>
												<td>TV 1 - FRIOS</th>
												<td>192.168.<strong>9.187</strong></td>
												<td id="tv1f9"></td>
											</tr>
											<tr>
												<td>TV 2 - FRIOS</th>
												<td>192.168.<strong>9.152</strong></td>
												<td id="tv2f9"></td>
											</tr>
										</tbody>
										
									</table>							
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">					
					<div class="card altura">
						<div class="card-body"> 
							<div class="card-header d-flex align-items-center">
								<h1 class="h1" style="text-align:center;color:#000; width:100%;">Monitoramento Ap. Promotor</h1>
							</div>
							<div class="row">
								<div class="col-md-12">
									<table class="table table-hover">
										<thead>
											<tr>
												<th scope="col" width="10%">LOJAS</th>            
												<th scope="col">IP</th>
												<th scope="col">status</th>            
											</tr>
										</thead>
										
										<!-- LOJA 1 -->
										
										<tbody style="border:5px solid #ccc;">
											<tr style="margin:2px !important;padding: 2px !important;">
												<td class="row_loja" rowspan="3"><span>LOJA 1</span></td>
												<td>192.168.<strong>1.171</strong></td>
												<td id="promotor_lj1"></td>
											</tr>
										</tbody>
										<tbody style="border:5px solid #ccc;">
											<tr>
												<td class="row_loja" rowspan="3"><span>LOJA 2</span></td>
												<td>192.168.<strong>2.225</strong></td>
												<td id="promotor_lj2"></td>
											</tr>
										</tbody>
										<tbody style="border:5px solid #ccc;">
											<tr>
												<td class="row_loja" rowspan="3"><span>LOJA 4</span></td>
												<td>192.168.<strong>4.157</strong></td>
												<td id="promotor_lj4"></td>
											</tr>
										</tbody>
										<tbody style="border:5px solid #ccc;">
											<tr>
												<td class="row_loja" rowspan="3"><span>LOJA 5</span></td>
												<td>192.168.<strong>0.000</strong></td>
												<td id="promotor_lj5"></td>
											</tr>
										</tbody>
										<tbody style="border:5px solid #ccc;">
											<tr>
												<td class="row_loja" rowspan="3"><span>LOJA 9</span></td>
												<td>192.168.<strong>9.101</strong></td>
												<td id="promotor_lj9"></td>
											</tr>
										</tbody>
										
									</table>							
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		
	</body>
</html>


<script>
	$(document).ready(function(){ 		
		///////////////////// Intranet 210 ///////////////////// 	
		$('#intra_210').load("server_intra_210.php").fadeIn("slow");  
		setInterval(function(){
			$('#intra_210').load("server_intra_210.php").fadeIn("slow");  
		},5000);
		
		///////////////////// Concentrador 251 ///////////////////// 	
		$('#conc_251').load("server_conc_251.php").fadeIn("slow");  
		setInterval(function(){
			$('#conc_251').load("server_conc_251.php").fadeIn("slow");  
		},5000); 
		
		///////////////////// Loja 1 ///////////////////// 	
		$('#loja1').load("server_loja1.php").fadeIn("slow");  
		setInterval(function(){
			$('#loja1').load("server_loja1.php").fadeIn("slow");  
		},5000); 	
		
		///////////////////// Loja 2 ///////////////////// 	
		$('#loja2').load("server_loja2.php").fadeIn("slow");  
		setInterval(function(){
			$('#loja2').load("server_loja2.php").fadeIn("slow");  
		},5000); 	
		
		///////////////////// Loja 4 ///////////////////// 	
		$('#loja4').load("server_loja4.php").fadeIn("slow");  
		setInterval(function(){
			$('#loja4').load("server_loja4.php").fadeIn("slow");  
		},5000); 	
		
		///////////////////// Loja 5 ///////////////////// 	
		$('#loja5').load("server_loja5.php").fadeIn("slow");  
		setInterval(function(){
			$('#loja5').load("server_loja5.php").fadeIn("slow");  
		},5000); 
		
		///////////////////// Loja 9 ///////////////////// 	
		$('#loja9').load("server_loja9.php").fadeIn("slow");  
		setInterval(function(){
			$('#loja9').load("server_loja9.php").fadeIn("slow");  
		},5000);
		
		///////////////////// GLPI ///////////////////// 	
		$('#glpi_100').load("server_glpi_100.php").fadeIn("slow");  
		setInterval(function(){
			$('#glpi_100').load("server_glpi_100.php").fadeIn("slow");  
		},5000);
		
		///////////////////// loja 1 ///////////////////// 
		var tv1a1 = '192.168.1.143';
		$('#tv1a1').load("dispositivos.php?ip="+tv1a1).fadeIn("slow");  
		setInterval(function(){
			$('#tv1a1').load("dispositivos.php?ip="+tv1a1).fadeIn("slow");  
		},5000); 
		
		var tv2a1 = '192.168.1.142';
		$('#tv2a1').load("dispositivos.php?ip="+tv2a1).fadeIn("slow");  
		setInterval(function(){
			$('#tv2a1').load("dispositivos.php?ip="+tv2a1).fadeIn("slow");  
		},5000); 
		
		var tv1f1 = '192.168.1.141';
		$('#tv1f1').load("dispositivos.php?ip="+tv1f1).fadeIn("slow");  
		setInterval(function(){
			$('#tv1f1').load("dispositivos.php?ip="+tv1f1).fadeIn("slow");  
		},5000); 
		
		///////////////////// loja 2 ///////////////////// 
		
		var tv1a2 = '192.168.2.74';
		$('#tv1a2').load("dispositivos.php?ip="+tv1a2).fadeIn("slow");  
		setInterval(function(){
			$('#tv1a2').load("dispositivos.php?ip="+tv1a2).fadeIn("slow");  
		},5000); 
		
		var tv2a2 = '192.168.2.60';
		$('#tv2a2').load("dispositivos.php?ip="+tv2a2).fadeIn("slow");  
		setInterval(function(){
			$('#tv2a2').load("dispositivos.php?ip="+tv2a2).fadeIn("slow");  
		},5000); 
		
		var tv1f2 = '192.168.2.56';
		$('#tv1f2').load("dispositivos.php?ip="+tv1f2).fadeIn("slow");  
		setInterval(function(){
			$('#tv1f2').load("dispositivos.php?ip="+tv1f2).fadeIn("slow");  
		},5000); 
		
		var tv2f2 = '192.168.2.59';
		$('#tv2f2').load("dispositivos.php?ip="+tv2f2).fadeIn("slow");  
		setInterval(function(){
			$('#tv2f2').load("dispositivos.php?ip="+tv2f2).fadeIn("slow");  
		},5000); 
		
		////////////////////// loja 4 //////////////////////
		
		var tv1a4 = '192.168.4.37';
		$('#tv1a4').load("dispositivos.php?ip="+tv1a4).fadeIn("slow");  
		setInterval(function(){
			$('#tv1a4').load("dispositivos.php?ip="+tv1a4).fadeIn("slow");  
		},5000); 
		
		var tv2a4 = '192.168.4.38';
		$('#tv2a4').load("dispositivos.php?ip="+tv2a4).fadeIn("slow");  
		setInterval(function(){
			$('#tv2a4').load("dispositivos.php?ip="+tv2a4).fadeIn("slow");  
		},5000); 	
		
		var tv1f4 = '192.168.4.39';
		$('#tv1f4').load("dispositivos.php?ip="+tv1f4).fadeIn("slow");  
		setInterval(function(){
			$('#tv1f4').load("dispositivos.php?ip="+tv1f4).fadeIn("slow");  
		},5000); 
		
		var tv2f4 = '192.168.4.40';
		$('#tv2f4').load("dispositivos.php?ip="+tv2f4).fadeIn("slow");  
		setInterval(function(){
			$('#tv2f4').load("dispositivos.php?ip="+tv2f4).fadeIn("slow");  
		},5000); 
		
		///////////////////// loja 9 ///////////////////// 
		
		var tv1a9 = '192.168.9.179';
		$('#tv1a9').load("dispositivos.php?ip="+tv1a9).fadeIn("slow");  
		setInterval(function(){
		$('#tv1a9').load("dispositivos.php?ip="+tv1a9).fadeIn("slow");  
		},5000); 
		
		var tv2a9 = '192.168.9.180';
		$('#tv2a9').load("dispositivos.php?ip="+tv2a9).fadeIn("slow");  
		setInterval(function(){
		$('#tv2a9').load("dispositivos.php?ip="+tv2a9).fadeIn("slow");  
		},5000); 	
		
		var tv1f9 = '192.168.9.187';
		$('#tv1f9').load("dispositivos.php?ip="+tv1f9).fadeIn("slow");  
		setInterval(function(){
		$('#tv1f9').load("dispositivos.php?ip="+tv1f9).fadeIn("slow");  
		},5000); 
		
		var tv2f9 = '192.168.9.152';
		$('#tv2f9').load("dispositivos.php?ip="+tv2f9).fadeIn("slow");  
		setInterval(function(){
		$('#tv2f9').load("dispositivos.php?ip="+tv2f9).fadeIn("slow");  
		},5000); 
		
		///////////////////// APARELHO PROMOTOR ///////////////////// 
		
		var promotor_lj1 = '192.168.1.171';
		$('#promotor_lj1').load("dispositivos.php?ip="+promotor_lj1).fadeIn("slow");  
		setInterval(function(){
		$('#promotor_lj1').load("dispositivos.php?ip="+promotor_lj1).fadeIn("slow");  
		},5000); 
		
		var promotor_lj2 = '192.168.2.225';
		$('#promotor_lj2').load("dispositivos.php?ip="+promotor_lj2).fadeIn("slow");  
		setInterval(function(){
		$('#promotor_lj2').load("dispositivos.php?ip="+promotor_lj2).fadeIn("slow");  
		},5000); 	
		
		var promotor_lj4 = '192.168.4.157';
		$('#promotor_lj4').load("dispositivos.php?ip="+promotor_lj4).fadeIn("slow");  
		setInterval(function(){
		$('#promotor_lj4').load("dispositivos.php?ip="+promotor_lj4).fadeIn("slow");  
		},5000); 
		
		// var promotor_lj5 = '192.168.0.000';
		// $('#promotor_lj5').load("dispositivos.php?ip="+promotor_lj5).fadeIn("slow");  
		// setInterval(function(){
		// $('#promotor_lj5').load("dispositivos.php?ip="+promotor_lj5).fadeIn("slow");  
		// },5000);
		
		var promotor_lj9 = '192.168.9.101';
		$('#promotor_lj9').load("dispositivos.php?ip="+promotor_lj9).fadeIn("slow");  
		setInterval(function(){
		$('#promotor_lj9').load("dispositivos.php?ip="+promotor_lj9).fadeIn("slow");  
		},5000);
		
		});
		</script>													