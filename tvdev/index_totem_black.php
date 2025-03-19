<!DOCTYPE html>
<html lang="pt-br" translate="no">
    <meta name="google" content="notranslate">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">  
		<title>BIG MAIS SUPERMERCADOS</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="http://192.168.0.210/intranet/assets/fontawesome/css/all.min.css" />  
		
		<style>
			.stloja{color:#999;}
			.nomeserver h4{font-size:0.8em !important;}	
			html{background-color:#222222 !important;background-size:cover;padding:0,8%;}
			body{background-color:#222222 !important;color:white !important;height:98vh;border-radius:10px;}
			table tr td, table tr th {max-width: 10vw;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;background-color:#111111 !important;color:white !important;}
			
			table{width:100%;}    
			
			td, th{text-align:center !important;}    
			
			thead{background-color:#0074cc; color:white;}    
			
			.host{font-weight:700;font-size:1.1em;vertical-align:bottom;width:95%;
			margin: 0 auto;
			background: rgb(255,255,255);
			background-color: #111111;
			border-radius:10px;    
			list-style-type: none;
			}
			
			.vhost{font-weight:700;font-size:1.1em;width:200px;
			list-style-type: none;
			}    
			
			.tree,
			.tree ul {
			margin:0 0 0 1em; /* indentation */
			padding:0;
			list-style:none;
			color:#FFF;
			position:relative;
			}
			
			.tree ul {margin-left:.5em} 
			
			.tree:before,
			.tree ul:before {
			content:"";
			display:block;
			width:0;
			position:absolute;
			top:0;
			bottom:0;
			left:0;
			border-left:1px solid;
			}
			
			.tree li {
			margin:0;
			padding:0 1.2em; /* indentation + .5em */
			line-height:1.8em; /* default list item's `line-height` */
			font-weight:bold;
			position:relative;
			}
			
			.tree li:before {
			content:"";
			display:block;
			width:10px; /* same with indentation */
			height:0;
			border-top:1px solid;
			margin-top:-1px; /* border top width */
			position:absolute;
			top:1em; /* (line-height/2) */
			left:0;
			}
			
			.tree li:last-child:before {
			border-left-width:1px;
			border-left-color:#000;
			
			}
			
			.tree li:after {
			content: "\2022";   /* bullet */
			position: absolute;
			left: 9px;
			top: -1px;
			}
			
			.tree:after {
			content: "\2022";   /* bullet */
			position: absolute;
			left: -3px;
			top: -8px;
			}
			
			.size{font-size:18px;font-weight:600;padding:0px;text-align:left;} 
			
			.coluna{width:205px;float:left;}
			h4{font-weight:700;}
			
			.progress-bar-success {
			background-color: #2e7c2e;
			font-size:1.6em;
			text-shadow:0px 0px 3px #000;
			height:30px;
			
			}
			.progress-bar-primary {	
			font-size:1.2em;
			text-shadow:0px 0px 3px #000;
			height:30px;
			}
			.progress-bar-success {	
			font-size:1.2em;
			text-shadow:0px 0px 3px #000;
			height:30px;
			}
			
			.progress-bar-danger {
			background-color: #9b1713;
			font-size:1.2em;
			text-shadow:0px 0px 3px #000;
			height:30px;
			}
			.legend_espaco{background-color: #1b5098;
			color: white;
			height: 20px;	
			letter-spacing: 0.05em;
			font-size: 1em;
			font-smooth:never;
			font-family:'Tahoma';
			position: absolute;
			border-radius: 3px;
			text-align: center;}
			
			
			
			.fundo_disco{font-size:13px;background-color:#0074cc;color:#FFF;padding:2px 10px;border-radius:3px;margin-right:5px;}	
			
			.desc_disco{position: absolute;font-size: 0.8em;top: 30px;left: 10px;font-weight: 700;}
			.desc_particao{position: absolute;font-size: 0.8em;top: 30px;right: 15px;font-weight: 700;}
			.desc_banco{position: absolute;font-size: 0.8em;bottom: 12px;left: 10px;font-weight: 700;}
			.list-group-item{padding-left:2px;padding-right:2px;}
			
			.list-group-item, .panel, .panel-default{background-color:#111111 !important;color:white !important;}
			
			
		</style>
		
	</head>  
	<body>
		<div style="width:95%;margin:0 auto;">  
			<div class="row">
				<div class="col-md-9">
					<center><h4 style="padding-top:10px;font-weight:700;">INTEGRAÇÃO DE VENDAS EM LOJAS (por tempo) <?php echo gethostbyaddr($_SERVER['REMOTE_ADDR']); ?></h4></center>
					<div class="table-responsive" style="overflow-y: auto;height:395px;">
						<div class="panel panel-default">
							<table class="table table-bordered table-hover table-condensed">
								<thead>
									<tr>
										<th width="30%">LOJA</th>
										<th>HORA</th>
										<th>CUPONS</th>
										<th>INTEGRACAO</th>
										<th>STATUS</th>
									</tr>
								</thead>
								<tbody id="tab_vendas"></tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-3">			
					<center><h4 style="padding-top:10px;font-weight:700;">Portas em uso 210</h4></center>
					<div class="table-responsive" style="overflow-y: auto;height:395px;">
						<div class="panel panel-default">
							<table class="table table-bordered table-hover table-condensed">
								<thead>
									<tr>
										<th>App</th>								
										<th>Porta</th>
									</tr>
								</thead>
								<tbody id="tab_portas" style="height:305px;"></tbody>
							</table>
						</div>
					</div> 
					
				</div>
			</div>
			<div class="row">			
				
				<div class="col-md-12">			
					
					<div id="tabela_content2">
						<div class="row">
							<ul class="host">                
								<li><img src="img/icon_server.ico" style="width:40px;"><img src="img/windows.png" width="25px"> 192.168.0.225            
									<ul class="tree">
										<li><span id="AvancoNovo_236"></span><img src="img/linux.png" width="25px"> AvancoNovo_236 <span id="AvancoNovo_236_disco"></span></li>
										<li><span id="AvancoUbuntu_240"></span><img src="img/linux.png" width="25px"> AvancoUbuntu_240 <span id="AvancoUbuntu_240_disco"></span></li>
										<li><span id="C5ColetCont_248"></span><img src="img/linux.png" width="25px"> Consinco Web 248 <span id="C5ColetCont_248_disco"></span></li>
										<li><span id="NovoIntraNet_210"></span><img src="img/linux.png" width="25px"> IntraNet_210 <span id="NovoIntraNet_210_disco"></span></li>
										<!--li><span id="Proxy_250"></span> Proxy_250</li-->
										<li><span id="SocinC5_251"></span><img src="img/linux.png" width="25px"> SocinC5_251 <span id="SocinC5_251_disco"></span></li>
										<li><span id="SrvDocs_150"></span><img src="img/linux.png" width="25px"> SrvDocs_150 <span id="SrvDocs_150_disco"></span></li>
										<!--li><span id="SrvEmail_250"></span> SrvEmail_250</li-->
										<li><span id="Veltio_249"></span><img src="img/linux.png" width="25px"> Veltio_249 <span id="Veltio_249_disco"></span></li>                        
										<li><span id="VoipBig_220"></span><img src="img/linux.png" width="25px"> VoipBig_220 <span id="VoipBig_220_disco"></span></li>
										<li><span id="VoipE1_222"></span><img src="img/linux.png" width="25px"> VoipE1_222 <span id="VoipE1_222_disco"></span></li>
									</ul>                
								</li>
								<li><span id="Antigo_Totvs_243"></span><img src="img/windows.png" width="25px"> Antigo_Totvs_243 <span id="Antigo_Totvs_243_disco"></li>
									<li><span id="Totvs_203"></span><img src="img/windows.png" width="25px"> Totvs_203 <span id="Totvs_203_disco"></li>
										<li><img src="img/icon_server.ico" style="width:40px;"><img src="img/linux.png" width="25px"> 192.168.0.226            
											<ul class="tree">                        
												<li><span id="IIS_TotvCurric_228"></span><img src="img/windows.png" width="25px">   IIS_TotvCurric_228 <span id="IIS_TotvCurric_228_disco"></span></li>
												<li><span id="NDD_244"></span><img src="img/windows.png" width="25px"> NDD_244 <span id="NDD_244_disco"></span></li>
												<!--li><span id="Python_209"></span> Python_209</li-->
												<li><span id="SrvDpNovo_130"></span><img src="img/windows.png" width="25px"> SrvDpNovo_130 <span id="SrvDpNovo_130_disco"></span></li>
												<li><span id="SrvGED_200"></span><img src="img/linux.png" width="25px"> SrvGED_200</li>
												<li><span id="Supervisorio_100"></span><img src="img/linux.png" width="25px"> Supervisorio_100 <span id="Supervisorio_100_disco"></span><span id="Supervisorio_100_banco"></span></li>
												<!--li><span id="vCenter_248"></span> vCenter_248</li-->
												<li><span id="VeltioBanco_149"></span><img src="img/linux.png" width="25px"> VeltioBanco_149</li>
												<li><span id="Vitruvio_205"></span><img src="img/linux.png" width="25px"> Vitruvio_205</li>
											</ul>                
										</li> 
										<li><span id="TEF_77"></span><img src="img/windows.png" width="25px"> TEF_77</li>            
										<li><span id="ServBackUp_142"></span><img src="img/windows.png" width="25px"> ServBackUp_142</li>            
									</ul>
								</div>
								
							</div>	
						</div>	
						<hr>
						
						
					</div>
					
					<div style="width:100%;">  	
						<center><h4 style="font-weight:700;">PROCESSOS ORACLE</h4></center>
						
						<div class="table-responsive" style="overflow-y: auto; height: 250px;">
							<div class="panel panel-default">
								<table class="table table-bordered table-hover table-condensed">
									<thead>
										<tr>
											<th>SID</th>
											<th>PROGRAM</th>
											<th>USERNAME</th>
											<th>MACHINE</th>
											<th>TEMPO</th>
											<th>STATUS</th>
										</tr>
									</thead>
									<tbody id="tab_processos"></tbody>
								</table>
							</div>
						</div>
					</div> 
					
					<div style="">  	
						<center><h3 style="font-weight:700;"> CONCENTRADORES </h3></center>
						<div class="panel panel-default" id="servidores" style="border:0px;width:95%;margin:0 auto;"></div> 
					</div> 
					
					<script>
						$(document).ready(function(){
							
							setInterval(function(){
								$('#tab_vendas').load("tab_vendas.php").fadeIn("slow");  
							}, 10000);
							
							setInterval(function(){
								$('#tab_processos').load("tab_processos.php").fadeIn("slow");  
							}, 10000);
							
							var Antigo_Totvs_243 = '192.168.0.243';
							$('#Antigo_Totvs_243').load("server_ping.php?ip="+Antigo_Totvs_243).fadeIn("slow");  
							setInterval(function(){
								$('#Antigo_Totvs_243').load("server_ping.php?ip="+Antigo_Totvs_243).fadeIn("slow");  
							},5000); 
							
							var Totvs_203 = '192.168.0.203';
							$('#Totvs_203').load("server_ping.php?ip="+Totvs_203).fadeIn("slow");  
							setInterval(function(){
								$('#Totvs_203').load("server_ping.php?ip="+Totvs_203).fadeIn("slow");  
							},5000); 		
							
							var AvancoNovo_236 = '192.168.0.236';
							$('#AvancoNovo_236').load("server_ping.php?ip="+AvancoNovo_236).fadeIn("slow");  
							setInterval(function(){
								$('#AvancoNovo_236').load("server_ping.php?ip="+AvancoNovo_236).fadeIn("slow");  
							},5000); 
							
							var AvancoUbuntu_240 = '192.168.0.240';
							$('#AvancoUbuntu_240').load("server_ping.php?ip="+AvancoUbuntu_240).fadeIn("slow");  
							setInterval(function(){
								$('#AvancoUbuntu_240').load("server_ping.php?ip="+AvancoUbuntu_240).fadeIn("slow");  
							},5000); 
							
							var C5ColetCont_248 = '192.168.0.248';
							$('#C5ColetCont_248').load("server_ping.php?ip="+C5ColetCont_248).fadeIn("slow");  
							setInterval(function(){
								$('#C5ColetCont_248').load("server_ping.php?ip="+C5ColetCont_248).fadeIn("slow");  
							},5000); 
							
							var NovoIntraNet_210 = '192.168.0.210';
							$('#NovoIntraNet_210').load("server_ping.php?ip="+NovoIntraNet_210).fadeIn("slow");  
							setInterval(function(){
								$('#NovoIntraNet_210').load("server_ping.php?ip="+NovoIntraNet_210).fadeIn("slow");  
							},5000); 
							
							var Proxy_250 = '192.168.0.250';
							$('#Proxy_250').load("server_ping.php?ip="+Proxy_250).fadeIn("slow");  
							setInterval(function(){
								$('#Proxy_250').load("server_ping.php?ip="+Proxy_250).fadeIn("slow");  
							},5000); 
							
							var SocinC5_251 = '192.168.0.251';
							$('#SocinC5_251').load("server_ping.php?ip="+SocinC5_251).fadeIn("slow");  
							setInterval(function(){
								$('#SocinC5_251').load("server_ping.php?ip="+SocinC5_251).fadeIn("slow");  
							},5000); 
							
							var SrvDocs_150 = '192.168.0.150';
							$('#SrvDocs_150').load("server_ping.php?ip="+SrvDocs_150).fadeIn("slow");  
							setInterval(function(){
								$('#SrvDocs_150').load("server_ping.php?ip="+SrvDocs_150).fadeIn("slow");  
							},5000); 
							
							var SrvEmail_250 = '192.168.0.250';
							$('#SrvEmail_250').load("server_ping.php?ip="+SrvEmail_250).fadeIn("slow");  
							setInterval(function(){
								$('#SrvEmail_250').load("server_ping.php?ip="+SrvEmail_250).fadeIn("slow");  
							},5000); 
							
							var Veltio_249 = '192.168.0.249';
							$('#Veltio_249').load("server_ping.php?ip="+Veltio_249).fadeIn("slow");  
							setInterval(function(){
								$('#Veltio_249').load("server_ping.php?ip="+Veltio_249).fadeIn("slow");  
							},5000); 
							
							var VipCommerce_242 = '192.168.0.242';
							$('#VipCommerce_242').load("server_ping.php?ip="+VipCommerce_242).fadeIn("slow");  
							setInterval(function(){
								$('#VipCommerce_242').load("server_ping.php?ip="+VipCommerce_242).fadeIn("slow");  
							},5000); 
							
							var VoipE1_222 = '192.168.0.222';
							$('#VoipE1_222').load("server_ping.php?ip="+VoipE1_222).fadeIn("slow");  
							setInterval(function(){
								$('#VoipE1_222').load("server_ping.php?ip="+VoipE1_222).fadeIn("slow");  
							},5000);
							
							var VoipBig_220 = '192.168.0.220';
							$('#VoipBig_220').load("server_ping.php?ip="+VoipBig_220).fadeIn("slow");  
							setInterval(function(){
								$('#VoipBig_220').load("server_ping.php?ip="+VoipBig_220).fadeIn("slow");  
							},5000); 		        
							
							var TEF_77 = '192.168.0.77';
							$('#TEF_77').load("server_ping.php?ip="+TEF_77).fadeIn("slow");  
							setInterval(function(){
								$('#TEF_77').load("server_ping.php?ip="+TEF_77).fadeIn("slow");  
							},5000);         
							
							var BigSrvTotAntNaoLigar = '192.168.0.236';
							$('#BigSrvTotAntNaoLigar').load("server_ping.php?ip="+BigSrvTotAntNaoLigar).fadeIn("slow");  
							setInterval(function(){
								$('#BigSrvTotAntNaoLigar').load("server_ping.php?ip="+BigSrvTotAntNaoLigar).fadeIn("slow");  
							},5000); 
							
							var IIS_TotvCurric_228 = '192.168.0.228';
							$('#IIS_TotvCurric_228').load("server_ping.php?ip="+IIS_TotvCurric_228).fadeIn("slow");  
							setInterval(function(){
								$('#IIS_TotvCurric_228').load("server_ping.php?ip="+IIS_TotvCurric_228).fadeIn("slow");  
							},5000);         
							
							var NDD_244 = '192.168.0.244';
							$('#NDD_244').load("server_ping.php?ip="+NDD_244).fadeIn("slow");  
							setInterval(function(){
								$('#NDD_244').load("server_ping.php?ip="+NDD_244).fadeIn("slow");  
							},5000);         
							
							var Python_209 = '192.168.0.209';
							$('#Python_209').load("server_ping.php?ip="+Python_209).fadeIn("slow");  
							setInterval(function(){
								$('#Python_209').load("server_ping.php?ip="+Python_209).fadeIn("slow");  
							},5000); 
							
							var SrvDpNovo_130 = '192.168.0.130';
							$('#SrvDpNovo_130').load("server_ping.php?ip="+SrvDpNovo_130).fadeIn("slow");  
							setInterval(function(){
								$('#SrvDpNovo_130').load("server_ping.php?ip="+SrvDpNovo_130).fadeIn("slow");  
							},5000); 
							
							var SrvGED_200 = '192.168.0.200';
							$('#SrvGED_200').load("server_ping.php?ip="+SrvGED_200).fadeIn("slow");  
							setInterval(function(){
								$('#SrvGED_200').load("server_ping.php?ip="+SrvGED_200).fadeIn("slow");  
							},5000); 
							
							var Supervisorio_100 = '192.168.0.100';
							$('#Supervisorio_100').load("server_ping.php?ip="+Supervisorio_100).fadeIn("slow");  
							setInterval(function(){
								$('#Supervisorio_100').load("server_ping.php?ip="+Supervisorio_100).fadeIn("slow");  
							},5000);                         
							
							// var vCenter_248 = '192.168.0.248';
							// $('#vCenter_248').load("server_ping.php?ip="+vCenter_248).fadeIn("slow");  
							// setInterval(function(){
							// $('#vCenter_248').load("server_ping.php?ip="+vCenter_248).fadeIn("slow");  
							// },5000); 
							
							var VeltioBanco_149 = '192.168.0.149';
							$('#VeltioBanco_149').load("server_ping.php?ip="+VeltioBanco_149).fadeIn("slow");  
							setInterval(function(){
								$('#VeltioBanco_149').load("server_ping.php?ip="+VeltioBanco_149).fadeIn("slow");  
							},5000); 
							
							var Vitruvio_205 = '192.168.0.205';
							$('#Vitruvio_205').load("server_ping.php?ip="+Vitruvio_205).fadeIn("slow");  
							setInterval(function(){
								$('#Vitruvio_205').load("server_ping.php?ip="+Vitruvio_205).fadeIn("slow");  
							},5000);
							
							var ServBackUp_142 = '192.168.0.142';
							$('#ServBackUp_142').load("server_ping.php?ip="+ServBackUp_142).fadeIn("slow");  
							setInterval(function(){
								$('#ServBackUp_142').load("server_ping.php?ip="+ServBackUp_142).fadeIn("slow");  
							},5000);
							///////////////////// Concentrador 251 ///////////////////// 	
							$('#conc_251').load("/intranet/server/server_conc_251_tvdev.php").fadeIn("slow");  
							setInterval(function(){
								$('#conc_251').load("/intranet/server/server_conc_251_tvdev.php").fadeIn("slow");  
							},5000); 					
						});    
						
					</script>    
					
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
					<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>    
					
				</body>
				
			</html>
			
			
			<script>
				
				///////////////// SERVIDORES E CONCENTRADORES /////////////////
				function getallConcentradores() {
					$('#servidores').html('');
					$.ajax({
						url: "ajax/getserver.php",
						method: "GET",
						dataType: "json",
						success: function(data) {
							
							var html = "";
							var disco = 0;
							var disco2 = 0;
							
							$.each(data, function(index, item) {
								
								if (['251'].includes(item.controle_loja)) {
									
									const matches = item.disco.match(/(\d+)%/);
									disco = matches[1];
									
									const matchesDisco2 = item.disco2.match(/(\d+)%/); // Extrai a porcentagem do campo disco2
									disco2 = matchesDisco2[1]; // Obtém a porcentagem
									
									const progressBar = document.querySelector(".progress-bar");
									
									var element_bar_disco = (disco > 95) ? "danger" : "success";
									var element_bar_disco2 = (disco2 > 95) ? "danger" : "success"; // Define a classe da barra de progresso para disco2
									
									const string = item.disco;
									const regex = /(\d+G)/;
									const match = string.match(regex);
									
									if (match && match.length > 0) {
										var tam_disco = match[0].toLowerCase();
									}
									
									// Código adicional para disco2
									const stringDisco2 = item.disco2;
									const matchDisco2 = stringDisco2.match(regex);
									
									if (matchDisco2 && matchDisco2.length > 0) {
										var tam_disco2 = matchDisco2[0].toLowerCase();
									}
									
									
									if(item.banco !== null){
										const matches = item.banco.match(/(\d+)%/);
										banco = matches[1];
										}else{
										banco = 0;
									}
									
									if(item.banco == null){
									var prog_banco = "display:none;";
									}else{
									var prog_banco = "display:flex;";
									
									const string = item.banco;
									const regex = /(\d+G)/;
									const match = string.match(regex);
									
									if (match && match.length > 0) {
										var tam_banco = match[0].toLowerCase();
									}
								}
								
								if(banco > 95)
								{
									element_bar_banco = "danger";
									}else{
									element_bar_banco = "success";
								}
								
								const dtOriginal = item.controle_log;
								
								const dat = new Date(dtOriginal);
								
								const dtFormatada = dat.toLocaleDateString('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric', hour: 'numeric', minute: 'numeric' });							
								
								html += '<div class="col-md-4" style="padding:3px;"><ul class="list-group">\
								<li class="list-group-item"><strong>'+ item.desc_server +'</strong><br>192.168.<strong>'+item.server+'</strong></li>\
								<li class="list-group-item">\
								<div class="d-flex align-items-center prog_disco" style="display: flex;justify-content: space-around;">\
								<i class="fa-solid fa-server" style="margin-top:4px;"></i>\
								<div class="col-md-6">\
								<div class="progress" style="margin-left:20px;width:90%;background-color: #c6c6c6;"><div class="progress-bar progress-bar-'+element_bar_disco+'" role="progressbar" aria-valuenow="'+disco+'" aria-valuemin="0" aria-valuemax="100" style="width: '+disco+'%;">'+disco+'%</div></div>\
								</div>\
								<div class="col-md-6">\
								<div class="progress" style="width:100%;background-color: #c6c6c6;"><div class="progress-bar progress-bar-'+element_bar_disco2+'" role="progressbar" aria-valuenow="'+disco2+'" aria-valuemin="0" aria-valuemax="100" style="width: '+disco2+'%;">'+disco2+'%</div></div>\
								</div>\
								<span class="desc_disco">Disco: '+ tam_disco +'b</span><span class="desc_particao">Partição: /server </span>\
								</div>\
								<div class="d-flex align-items-center" style="'+ prog_banco +';justify-content: space-around;">\
								<i class="fa-solid fa-database" style="margin-top:4px;"></i>\
								<div class="progress" style="width:85%;background-color: #c6c6c6;"><div class="progress-bar progress-bar-'+element_bar_banco+'" role="progressbar" aria-valuenow="'+ banco +'" aria-valuemin="0" aria-valuemax="100" style="width: '+ banco +'%;">'+ banco +'%</div></div>\
								<span class="desc_banco">Banco: '+ tam_banco +'b / '+item.desc_banco+'</span>\
								</div>\
								</li>\
								</ul></div>';
								
								}
								
								if (['1', '2', '5'].includes(item.controle_loja)) {
									
									const matches = item.disco.match(/(\d+)%/);
									disco = matches[1];
									
									const progressBar = document.querySelector(".progress-bar");
									
									if(disco > 95)
									{
										element_bar_disco = "danger";
										}else{
										element_bar_disco = "success";
									}
									
									const string = item.disco;
									const regex = /(\d+G)/;
									const match = string.match(regex);
									
									if (match && match.length > 0) {
										var tam_disco = match[0].toLowerCase();
									}
									
									if(item.banco !== null){
										const matches = item.banco.match(/(\d+)%/);
										banco = matches[1];
										}else{
										banco = 0;
									}
									
									if(item.banco == null){
										var prog_banco = "display:none;";
										}else{
										var prog_banco = "display:flex;";
										
										const string = item.banco;
										const regex = /(\d+G)/;
										const match = string.match(regex);
										
										if (match && match.length > 0) {
											var tam_banco = match[0].toLowerCase();
										}
									}
									
									if(banco > 95)
									{
										element_bar_banco = "danger";
										}else{
										element_bar_banco = "success";
									}
									
									const dtOriginal = item.controle_log;
									
									const dat = new Date(dtOriginal);
									
									const dtFormatada = dat.toLocaleDateString('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric', hour: 'numeric', minute: 'numeric' });							
									
									html += '<div class="col-md-4" style="padding:3px;"><ul class="list-group">\
									<li class="list-group-item"><strong>'+ item.desc_server +'</strong><br>192.168.<strong>'+item.server+'</strong></li>\
									<li class="list-group-item">\
									<div class="d-flex align-items-center prog_disco" style="display: flex;justify-content: space-around;">\
									<i class="fa-solid fa-server" style="margin-top:4px;"></i>\
									<div class="progress" style="width:85%;background-color: #c6c6c6;"><div class="progress-bar progress-bar-'+element_bar_disco+'" role="progressbar" aria-valuenow="'+disco+'" aria-valuemin="0" aria-valuemax="100" style="width: '+disco+'%;">'+disco+'%</div></div>\
									<span class="desc_disco">Disco: '+ tam_disco +'b</span>\
									</div>\
									<div class="d-flex align-items-center" style="'+ prog_banco +';justify-content: space-around;">\
									<i class="fa-solid fa-database" style="margin-top:4px;"></i>\
									<div class="progress" style="width:85%;background-color: #c6c6c6;"><div class="progress-bar progress-bar-'+element_bar_banco+'" role="progressbar" aria-valuenow="'+ banco +'" aria-valuemin="0" aria-valuemax="100" style="width: '+ banco +'%;">'+ banco +'%</div></div>\
									<span class="desc_banco">Banco: '+ tam_banco +'b / '+item.desc_banco+'</span>\
									</div>\
									</li>\
									</ul></div>';
									
								}
								
							});	
							
							$("#servidores").append('<div class="row"><div class="card-deck" style="display: flex;">'+ html +'</div></div>'); 
							
							html = '';
							
							$.each(data, function(index, item) {
								
								if (['4', '8', '9'].includes(item.controle_loja)) {
									
									const matches = item.disco.match(/(\d+)%/);
									disco = matches[1];
									
									const progressBar = document.querySelector(".progress-bar");
									
									if(disco > 95)
									{
										element_bar_disco = "danger";
										}else{
										element_bar_disco = "success";
									}
									
									const string = item.disco;
									const regex = /(\d+G)/;
									const match = string.match(regex);
									
									if (match && match.length > 0) {
										var tam_disco = match[0].toLowerCase();
									}
									
									if(item.banco !== null){
										const matches = item.banco.match(/(\d+)%/);
										banco = matches[1];
										}else{
										banco = 0;
									}
									
									if(item.banco == null){
										var prog_banco = "display:none;";
										}else{
										var prog_banco = "display:flex;";
										
										const string = item.banco;
										const regex = /(\d+G)/;
										const match = string.match(regex);
										
										if (match && match.length > 0) {
											var tam_banco = match[0].toLowerCase();
										}
									}
									
									if(banco > 95)
									{
										element_bar_banco = "danger";
										}else{
										element_bar_banco = "success";
									}
									
									const dtOriginal = item.controle_log;
									
									const dat = new Date(dtOriginal);
									
									const dtFormatada = dat.toLocaleDateString('pt-BR', { day: '2-digit', month: '2-digit', year: 'numeric', hour: 'numeric', minute: 'numeric' });							
									
									html += '<div class="col-md-3" style="padding:3px;"><ul class="list-group">\
									<li class="list-group-item"><strong>'+ item.desc_server +'</strong><br>192.168.<strong>'+item.server+'</strong></li>\
									<li class="list-group-item" style="min-height:110px;">\
									<div class="d-flex align-items-center prog_disco" style="display: flex;justify-content: space-around;">\
									<i class="fa-solid fa-server" style="margin-top:4px;"></i>\
									<div class="progress" style="width:85%;background-color: #c6c6c6;"><div class="progress-bar progress-bar-'+element_bar_disco+'" role="progressbar" aria-valuenow="'+disco+'" aria-valuemin="0" aria-valuemax="100" style="width: '+disco+'%;">'+disco+'%</div></div>\
									<span class="desc_disco">Disco: '+ tam_disco +'b</span>\
									</div>\
									<div class="d-flex align-items-center" style="'+ prog_banco +';justify-content: space-around;">\
									<i class="fa-solid fa-database" style="margin-top:4px;"></i>\
									<div class="progress" style="width:85%;background-color: #c6c6c6;"><div class="progress-bar progress-bar-'+element_bar_banco+'" role="progressbar" aria-valuenow="'+ banco +'" aria-valuemin="0" aria-valuemax="100" style="width: '+ banco +'%;">'+ banco +'%</div></div>\
									<span class="desc_banco">Banco: '+ tam_banco +'b / '+item.desc_banco+'</span>\
									</div>\
									</li>\
									</ul></div>';
									
								}											
								
							});	
							
							$("#servidores").append('<div class="row"><div class="card-deck" style="display: flex;">'+ html +'</div></div>'); 
						}
					});
				}			
				getallConcentradores();
				
				
				function calcularPercentualOcupacao(espacoTotal, espacoLivre) {
					var percentualOcupacao = ((espacoTotal - espacoLivre) / espacoTotal) * 100;
					return percentualOcupacao.toFixed(2); // Arredonda o resultado para 2 casas decimais
				}
				
				function getPortas() {
					$('#tab_portas').html(''); // Limpa o conteúdo da tabela				
					$.ajax({
						url: "http://192.168.0.210/intra/sistemas/bigmais/jobs/verifica_portas.php",
						method: "GET",
						dataType: "json", // Define o tipo de dados esperado como JSON
						success: function(data) {
							var gPortas = '';
							$.each(data, function(index, item) {	
								var porta = item.port.replace('intraweb2.bigmais.local','*');
								$('#tab_portas').append('<tr><td>'+item.name+'</td><td><strong>'+porta+'</strong></td></tr>');
							});
						}
					})
					
				}
				
				
				function get236() {
					$('#AvancoNovo_236_disco').html(''); // Limpa o conteúdo da tabela				
					$.ajax({
						url: "ajax/getserver.php",
						method: "GET",
						dataType: "json", // Define o tipo de dados esperado como JSON
						success: function(data) {
							var server100disco = "";						
							var server100banco = "";						
							var server210 = "";						
							var server203 = "";						
							var server243 = "";						
							var server248 = "";						
							var server228 = "";						
							var server236 = "";						
							var server240 = "";						
							var server244 = "";						
							var server130 = "";						
							
							var disco = 0;
							var banco = 0;
							
							$.each(data, function(index, item) {													
								
								if (['236'].includes(item.controle_loja)) {
									const matches = item.disco.match(/(\d+)%/);
									disco = matches[1];							
									
									const string = item.disco;
									const regex = /(\d+G)/;
									const match = string.match(regex);
									
									var caminho = item.disco;
									var colunas = caminho.split(" ");  // divide a string em partes separadas por espaços em branco
									var caminho = colunas[colunas.length - 1];  // seleciona o último elemento da matriz resultante
									
									
									if (match && match.length > 0) {
										var tam_disco = match[0].toLowerCase();							 
									}
									
									if(disco > 95){
										var fundo = "background-color:red !important;"
										}else{
										var fundo = ""
									}
									
									server236 = '<span class="fundo_disco" style="'+fundo+'">'+ caminho +' <span style="color:yellow;"> '+tam_disco + 'b / <span style="color:yellow;">'+disco + '% </span></span>';
								}
								
								if (['100'].includes(item.controle_loja)) {
									
									const matches_disco = item.disco.match(/(\d+)%/);
									disco = matches_disco[1];							
									
									const string_disco = item.disco;
									const regex_disco = /(\d+G)/;
									const match_disco = string_disco.match(regex_disco);
									
									
									if (match_disco && match_disco.length > 0) {
										var tam_disco = match_disco[0].toLowerCase();							 
									}
									
									if(disco > 95){
										var fundo = "background-color:red !important;"
										}else{
										var fundo = ""
									}
									
									server100disco = '<span class="fundo_disco" style="'+fundo+'">/ <span style="color:yellow;">'+tam_disco + 'b / <span style="color:yellow;">'+disco + '% </span></span>';							
									
									const matches_banco = item.banco.match(/(\d+)%/);
									banco = matches_banco[1];							
									
									const string_banco = item.banco;
									const regex_banco = /(\d+G)/;
									const match_banco = string_banco.match(regex_banco);
									
									if (match_banco && match_banco.length > 0) {
										var tam_banco = match_banco[0].toLowerCase();							 
									}
									
									if(banco > 95){
										var fundo = "background-color:red !important;"
										}else{
										var fundo = ""
									}
									
									server100banco = '<span class="fundo_disco" style="'+fundo+'">/var/www/ <span style="color:yellow;">'+tam_banco + 'b / <span style="color:yellow;">'+banco + '% </span></span>';							
									
									
								}
								
								if (['210'].includes(item.controle_loja)) {
									
									const matches = item.disco.match(/(\d+)%/);
									disco = matches[1];							
									
									const string = item.disco;
									const regex = /(\d+G)/;
									const match = string.match(regex);
									
									if (match && match.length > 0) {
										var tam_disco = match[0].toLowerCase();							 
									}
									
									if(disco > 95){
										var fundo = "background-color:red !important;"
										}else{
										var fundo = ""
									}
									
									server210 = '<span class="fundo_disco" style="'+fundo+'"><span style="color:yellow;"> '+ tam_disco + 'b </span> / <span style="color:yellow;">'+ disco + '% </span></span>';							
									
								}
								
								if (['240'].includes(item.controle_loja)) {
									const matches = item.disco.match(/(\d+)%/);
									disco = matches[1];							
									
									var caminho = item.disco;
									var colunas = caminho.split(" ");  // divide a string em partes separadas por espaços em branco
									var caminho = colunas[colunas.length - 1];  // seleciona o último elemento da matriz resultante
									
									const string = item.disco;
									const regex = /(\d+G)/;
									const match = string.match(regex);
									
									if (match && match.length > 0) {
										var tam_disco = match[0].toLowerCase();							 
									}
									
									if(disco > 95){
										var fundo = "background-color:red !important;"
										}else{
										var fundo = ""
									}
									
									server240 = '<span class="fundo_disco" style="'+fundo+'">'+ caminho +'<span style="color:yellow;">'+tam_disco + 'b / <span style="color:yellow;">'+disco + '% </span></span>';
								}
								
								if (['203'].includes(item.controle_loja)) {																
									
									var informacao = item.disco;
									var disco = informacao.split(" ");							
									
									//DISCO C
									var tam_disco = disco[0].replace("c(livre=","");
									tam_disco = tam_disco.replace("tamanho=","");
									tam_disco = tam_disco.replace(")","");							
									var v_disco = tam_disco.split(",");							
									var espacoTotal = v_disco[1];
									var espacoLivre = v_disco[0];							
									var percentualOcupacao = calcularPercentualOcupacao(espacoTotal, espacoLivre);													
									
									if(percentualOcupacao > 95){
										var fundo = "background-color:red !important;"
										}else{
										var fundo = ""
									}
									
									var espacoTotal = espacoTotal / 1073741824;
									
									server203 += '<span class="fundo_disco" style="'+fundo+'"><span style="color:yellow;">C: '+ espacoTotal.toFixed(0) + 'gb  / <span style="color:yellow;">'+ percentualOcupacao + '% </span></span>';
									
									//DISCO D
									var tam_disco = disco[1].replace("d(livre=","");
									tam_disco = tam_disco.replace("tamanho=","");
									tam_disco = tam_disco.replace(")","");							
									var v_disco = tam_disco.split(",");							
									var espacoTotal = v_disco[1];
									var espacoLivre = v_disco[0];							
									var percentualOcupacao = calcularPercentualOcupacao(espacoTotal, espacoLivre);													
									
									if(percentualOcupacao > 95){
										var fundo = "background-color:red !important;"
										}else{
										var fundo = ""
									}
									
									var espacoTotal = espacoTotal / 1073741824;
									
									server203 += '<span class="fundo_disco" style="'+fundo+'"><span style="color:yellow;">D: '+ espacoTotal.toFixed(0) + 'gb  / <span style="color:yellow;">'+ percentualOcupacao + '% </span></span>';
									
									//DISCO E
									var tam_disco = disco[2].replace("e(livre=","");
									tam_disco = tam_disco.replace("tamanho=","");
									tam_disco = tam_disco.replace(")","");							
									var v_disco = tam_disco.split(",");							
									var espacoTotal = v_disco[1];
									var espacoLivre = v_disco[0];							
									var percentualOcupacao = calcularPercentualOcupacao(espacoTotal, espacoLivre);													
									
									if(percentualOcupacao > 95){
										var fundo = "background-color:red !important;"
										}else{
										var fundo = ""
									}
									
									var espacoTotal = espacoTotal / 1073741824;
									
									server203 += '<span class="fundo_disco" style="'+fundo+'"><span style="color:yellow;">E: '+ espacoTotal.toFixed(0) + 'gb  / <span style="color:yellow;">'+ percentualOcupacao + '% </span></span>';
									
								}
								
								if (['243'].includes(item.controle_loja)) {																
									
									var informacao = item.disco;
									var disco = informacao.split(" ");
									
									//DISCO C
									var tam_disco = disco[0].replace("c(livre=","");
									tam_disco = tam_disco.replace("tamanho=","");
									tam_disco = tam_disco.replace(")","");
									
									var v_disco = tam_disco.split(",");
									
									var espacoTotal = v_disco[1];
									var espacoLivre = v_disco[0];							
									var percentualOcupacao = calcularPercentualOcupacao(espacoTotal, espacoLivre);						
									
									if(percentualOcupacao > 95){
										var fundo = "background-color:red !important;"
										}else{
										var fundo = ""
									}
									
									var espacoTotal = espacoTotal / 1073741824;
									
									server243 += '<span class="fundo_disco" style="'+fundo+'"><span style="color:yellow;"> C: '+ espacoTotal.toFixed(0) + 'gb </span> / <span style="color:yellow;">'+ percentualOcupacao + '% </span></span>';
									
									//DISCO D
									var tam_disco = disco[1].replace("d(livre=","");
									tam_disco = tam_disco.replace("tamanho=","");
									tam_disco = tam_disco.replace(")","");
									
									var v_disco = tam_disco.split(",");
									
									var espacoTotal = v_disco[1];
									var espacoLivre = v_disco[0];							
									var percentualOcupacao = calcularPercentualOcupacao(espacoTotal, espacoLivre);						
									
									if(percentualOcupacao > 95){
										var fundo = "background-color:red !important;"
										}else{
										var fundo = ""
									}
									
									var espacoTotal = espacoTotal / 1073741824;
									
									server243 += '<span class="fundo_disco" style="'+fundo+'"><span style="color:yellow;"> D: '+ espacoTotal.toFixed(0) + 'gb </span> / <span style="color:yellow;">'+ percentualOcupacao + '% </span></span>';
									
									//DISCO F
									var tam_disco = disco[2].replace("f(livre=","");
									tam_disco = tam_disco.replace("tamanho=","");
									tam_disco = tam_disco.replace(")","");
									
									var v_disco = tam_disco.split(",");
									
									var espacoTotal = v_disco[1];
									var espacoLivre = v_disco[0];							
									var percentualOcupacao = calcularPercentualOcupacao(espacoTotal, espacoLivre);						
									
									if(percentualOcupacao > 95){
										var fundo = "background-color:red !important;"
										}else{
										var fundo = ""
									}
									
									var espacoTotal = espacoTotal / 1073741824;
									
									server243 += '<span class="fundo_disco" style="'+fundo+'"><span style="color:yellow;"> F: '+ espacoTotal.toFixed(0) + 'gb </span> / <span style="color:yellow;">'+ percentualOcupacao + '% </span></span>';
									
									//DISCO H
									var tam_disco = disco[3].replace("h(livre=","");
									tam_disco = tam_disco.replace("tamanho=","");
									tam_disco = tam_disco.replace(")","");
									
									var v_disco = tam_disco.split(",");
									
									var espacoTotal = v_disco[1];
									var espacoLivre = v_disco[0];							
									var percentualOcupacao = calcularPercentualOcupacao(espacoTotal, espacoLivre);						
									
									if(percentualOcupacao > 95){
										var fundo = "background-color:red !important;"
										}else{
										var fundo = ""
									}
									
									var espacoTotal = espacoTotal / 1073741824;
									
									server243 += '<span class="fundo_disco" style="'+fundo+'"><span style="color:yellow;"> H: '+ espacoTotal.toFixed(0) + 'gb </span> / <span style="color:yellow;">'+ percentualOcupacao + '% </span></span>';
									
								}
								
								if (['248'].includes(item.controle_loja)) {																
									
									var informacao = item.disco;
									var disco = informacao.split(" ");
									
									//DISCO C
									var tam_disco = disco[0].replace("c(livre=","");
									tam_disco = tam_disco.replace("tamanho=","");
									tam_disco = tam_disco.replace(")","");
									
									var v_disco = tam_disco.split(",");
									
									var espacoTotal = v_disco[1];
									var espacoLivre = v_disco[0];							
									var percentualOcupacao = calcularPercentualOcupacao(espacoTotal, espacoLivre);						
									
									if(percentualOcupacao > 95){
										var fundo = "background-color:red !important;"
										}else{
										var fundo = ""
									}
									
									var espacoTotal = espacoTotal / 1073741824;
									
									server248 += '<span class="fundo_disco" style="'+fundo+'"><span style="color:yellow;"> C: '+ espacoTotal.toFixed(0) + 'gb </span> / <span style="color:yellow;">'+ percentualOcupacao + '% </span></span>';
									
								}
								
								if (['130'].includes(item.controle_loja)) {																
									
									var informacao = item.disco;
									var disco = informacao.split(" ");
									
									//DISCO C
									var tam_disco = disco[0].replace("c(livre=","");
									tam_disco = tam_disco.replace("tamanho=","");
									tam_disco = tam_disco.replace(")","");
									
									var v_disco = tam_disco.split(",");
									
									var espacoTotal = v_disco[1];
									var espacoLivre = v_disco[0];							
									var percentualOcupacao = calcularPercentualOcupacao(espacoTotal, espacoLivre);						
									
									if(percentualOcupacao > 95){
										var fundo = "background-color:red !important;"
										}else{
										var fundo = ""
									}
									
									var espacoTotal = espacoTotal / 1073741824;
									
									server130 += '<span class="fundo_disco" style="'+fundo+'"><span style="color:yellow;"> C: '+ espacoTotal.toFixed(0) + 'gb </span> / <span style="color:yellow;">'+ percentualOcupacao + '% </span></span>';
									
								}
								
								if (['244'].includes(item.controle_loja)) {																
									
									var informacao = item.disco;
									var disco = informacao.split(" ");
									
									//DISCO C
									var tam_disco = disco[0].replace("c(livre=","");
									tam_disco = tam_disco.replace("tamanho=","");
									tam_disco = tam_disco.replace(")","");
									
									var v_disco = tam_disco.split(",");
									
									var espacoTotal = v_disco[1];
									var espacoLivre = v_disco[0];							
									var percentualOcupacao = calcularPercentualOcupacao(espacoTotal, espacoLivre);						
									
									if(percentualOcupacao > 95){
										var fundo = "background-color:red !important;"
										}else{
										var fundo = ""
									}
									
									var espacoTotal = espacoTotal / 1073741824;
									
									server244 += '<span class="fundo_disco" style="'+fundo+'"><span style="color:yellow;"> C: '+ espacoTotal.toFixed(0) + 'gb </span> / <span style="color:yellow;">'+ percentualOcupacao + '% </span></span>';
									
								}
								
								if (['228'].includes(item.controle_loja)) {																
									
									var informacao = item.disco;
									var disco = informacao.split(" ");
									
									//DISCO C
									var tam_disco = disco[0].replace("c(livre=","");
									tam_disco = tam_disco.replace("tamanho=","");
									tam_disco = tam_disco.replace(")","");
									
									var v_disco = tam_disco.split(",");
									
									var espacoTotal = v_disco[1];
									var espacoLivre = v_disco[0];							
									var percentualOcupacao = calcularPercentualOcupacao(espacoTotal, espacoLivre);						
									
									if(percentualOcupacao > 95){
										$('.fundo_disco').css("background-color","red");
									}
									
									var espacoTotal = espacoTotal / 1073741824;
									
									server228 += '<span class="fundo_disco"><span style="color:yellow;"> C: '+ espacoTotal.toFixed(0) + 'gb </span> / <span style="color:yellow;">'+ percentualOcupacao + '% </span></span>';							
								}
							});
							
							$('#AvancoNovo_236_disco').html(server236);
							$('#AvancoUbuntu_240_disco').html(server240);
							$('#Supervisorio_100_disco').html(server100disco);
							$('#Supervisorio_100_banco').html(server100banco);
							$('#NovoIntraNet_210_disco').html(server210);
							$('#Totvs_203_disco').html(server203);
							$('#Antigo_Totvs_243_disco').html(server243);
							$('#C5ColetCont_248_disco').html(server248);
							$('#IIS_TotvCurric_228_disco').html(server228);
							$('#NDD_244_disco').html(server244);
							$('#SrvDpNovo_130_disco').html(server130);
						}
					});
				}
				
				get236();
				
				$(document).ready(function(){
					setInterval(function(){
						get236();
						getPortas();
						getallConcentradores();
					},10000);		
				});
				
			</script>
			
			
			
			
				