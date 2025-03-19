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

    
    <meta http-equiv="refresh" content="120">
  
  <style>
	.stloja{color:#999;}
	.nomeserver h4{font-size:0.8em !important;}	
    html{background-image: url(img/fundo.png);background-size:cover;padding:0.5%;}
    body{height:95vh;border-radius:10px;}
    table tr td, table tr th {max-width: 10vw;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;}
    
    table{width:100%;}    
    
    td, th{text-align:center !important;}    
    
    thead{background-color:#0074cc; color:white;}    
    
    .host{font-weight:700;font-size:1.1em;vertical-align:bottom;width:580px;    
        background: rgb(255,255,255);
        background: linear-gradient(90deg, rgba(255,255,166,0) 0%, rgba(205,227,255,0.9444152661064426) 100%);
        border-radius:10px;    
        list-style-type: none;
    }
    
    .vhost{font-weight:700;font-size:1.1em;vertical-align:bottom;width:200px;            
    
    list-style-type: none;
            
    }    
    
.tree,
.tree ul {
  margin:0 0 0 1em; /* indentation */
  padding:0;
  list-style:none;
  color:#1f1f1f;
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
   
   .size{font-size:24px;font-weight:600;padding:0px;text-align:left;} 
   
   .coluna{width:205px;float:left;}
   h4{font-weight:700;}
  
  .progress-bar-success {
		background-color: #2e7c2e;
		font-size:1.6em;
		text-shadow:0px 0px 3px #000;
		height:30px;
	}
	
	.progress-bar-danger {
		background-color: #9b1713;
		font-size:1.6em;
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
  </style>
  
  </head>  
  <body>
  
<div style="width:70%;">  
  <center><h4 style="padding-top:10px;font-weight:700;">INTEGRAÇÃO DE VENDAS EM LOJAS (por tempo)</h4></center>
    <div class="table-responsive">
    <div class="panel panel-default">
        <table class="table table-bordered table-hover table-condensed">
         <thead>
           <tr>
            <th>LOJA</th>
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
    
	<hr>
<div style="width:70%;">  	
<center><h4 style="font-weight:700;">PROCESSOS ORACLE</h4></center>
<div class="table-responsive">
	<div class="panel panel-default">
	<table class="table table-bordered table-hover table-condensed">
	 <thead>
	   <tr>
		  <th>TEMPO</th>
		  <th>SID</th>
		  <th>PROCESSO</th>
		  <th>PROGRAM</th>
		  <th>USUARIO</th>
		  <th>LOGIN</th>
		  <th>COMANDO</th>              
		  <th>CONTA</th>              
		  <th>MÁQUINA</th>
		  <th>OBJECT_NAME</th>
		  <th>STATUS</th>
	   </tr>
	 </thead>
	 <tbody id="tab_processos"></tbody>
   </table>
  </div>
</div> 
</div> 
<hr>

	
    
    <div id="tabela_content2" style="width:30%;position:fixed;right:20px;top:20px;">
            <div class="row">
            <ul class="host">
                <center><h3 style="padding-top:10px;font-weight:700;">STATUS DE SERVIÇOS</h3></center>
                <li><img src="img/icon_server.ico" style="width:40px;"> 192.168.0.225            
                    <ul class="tree">
                        <li><span id="AvancoNovo_236"></span> AvancoNovo_236</li>
                        <li><span id="AvancoUbuntu_240"></span> AvancoUbuntu_240</li>
                        <li><span id="C5ColetCont_248"></span> C5ColetCont_248</li>
                        <li><span id="NovoIntraNet_210"></span> NovoIntraNet_210</li>
                        <li><span id="Proxy_250"></span> Proxy_250</li>
                        <li><span id="SocinC5_251"></span> SocinC5_251</li>
                        <li><span id="SrvDocs_150"></span> SrvDocs_150</li>
                        <li><span id="SrvEmail_250"></span> SrvEmail_250</li>
                        <li><span id="Veltio_249"></span> Veltio_249</li>
                        <li><span id="VipCommerce_242"></span> VipCommerce_242</li>
                        <li><span id="VoipBig_220"></span> VoipBig_220</li>
                        <li><span id="VoipE1"></span> VoipE1_222</li>
                    </ul>                
                 </li>
				<li><span id="Antigo_Totvs_243"></span> Antigo_Totvs_243</li>
				<li><span id="Totvs_203"></span> Totvs_203</li>
                <li><img src="img/icon_server.ico" style="width:40px;"> 192.168.0.226            
                    <ul class="tree">                        
                        <li><span id="IIS_TotvCurric_228"></span> IIS_TotvCurric_228</li>
                        <li><span id="NDD_244"></span> NDD_244</li>
                        <li><span id="Python_209"></span> Python_209</li>
                        <li><span id="SrvDpNovo_130"></span> SrvDpNovo_130</li>
                        <li><span id="SrvGED_200"></span> SrvGED_200</li>
                        <li><span id="Supervisorio_100"></span> Supervisorio_100</li>
                        <li><span id="vCenter_248"></span> vCenter_248</li>
                        <li><span id="VeltioBanco_149"></span> VeltioBanco_149</li>
                        <li><span id="Vitruvio_205"></span> Vitruvio_205</li>
                    </ul>                
                 </li> 
                <li><span id="TEF_77"></span> TEF_77</li>            
                <li><span id="ServBackUp_142"></span> ServBackUp_142</li>            
                </ul>
            </div>
    </div>
    
	<div style="width:98%;position:absolute;bottom:30px;right:15px;">  	
	<center><h3 style="font-weight:700;"> SERVIDORES / CONCENTRADORES </h3></center>

	<div class="panel panel-default">	
	<div class="mt-4 mb-4 coluna" id="intra_210"></div>	
	<div class="mt-4 mb-4 coluna" id="conc_251"></div>	
	<div class="mt-4 mb-4 coluna" id="glpi_100"></div>	
	<div class="mt-4 mb-4 coluna" id="loja1"></div>	
	<div class="mt-4 mb-4 coluna" id="loja2"></div>	
	<div class="mt-4 mb-4 coluna" id="loja4"></div>	
	<div class="mt-4 mb-4 coluna" id="loja5"></div>	
	<div class="mt-4 mb-4 coluna" id="loja8"></div>	
	<div class="mt-4 mb-4 coluna" id="loja9"></div>	
	</div> 
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
        
        var VipCommerce_242 = '192.168.0.236';
		$('#VipCommerce_242').load("server_ping.php?ip="+VipCommerce_242).fadeIn("slow");  
		setInterval(function(){
		$('#VipCommerce_242').load("server_ping.php?ip="+VipCommerce_242).fadeIn("slow");  
		},5000); 
        
        var VoipBig_220 = '192.168.0.236';
		$('#VoipBig_220').load("server_ping.php?ip="+VoipBig_220).fadeIn("slow");  
		setInterval(function(){
		$('#VoipBig_220').load("server_ping.php?ip="+VoipBig_220).fadeIn("slow");  
		},5000); 
        
        var VoipE1 = '192.168.0.222';
		$('#VoipE1').load("server_ping.php?ip="+VoipE1).fadeIn("slow");  
		setInterval(function(){
		$('#VoipE1').load("server_ping.php?ip="+VoipE1).fadeIn("slow");  
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
        
        var vCenter_248 = '192.168.0.248';
		$('#vCenter_248').load("server_ping.php?ip="+vCenter_248).fadeIn("slow");  
		setInterval(function(){
		$('#vCenter_248').load("server_ping.php?ip="+vCenter_248).fadeIn("slow");  
		},5000); 
                
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
		
		
		
		
		
		///////////////// SERVIDORES E CONCENTRADORES /////////////////
		
		///////////////////// Intranet 210 ///////////////////// 	
		$('#intra_210').load("/intranet/server/server_intra_210_tvdev.php").fadeIn("slow");  
		setInterval(function(){
			$('#intra_210').load("/intranet/server/server_intra_210_tvdev.php").fadeIn("slow");  
		},5000);
		
		///////////////////// Concentrador 251 ///////////////////// 	
		$('#conc_251').load("/intranet/server/server_conc_251_tvdev.php").fadeIn("slow");  
		setInterval(function(){
			$('#conc_251').load("/intranet/server/server_conc_251_tvdev.php").fadeIn("slow");  
		},5000); 
		
		///////////////////// Loja 1 ///////////////////// 	
		$('#loja1').load("/intranet/server/server_loja1_tvdev.php").fadeIn("slow");  
		setInterval(function(){
			$('#loja1').load("/intranet/server/server_loja1_tvdev.php").fadeIn("slow");  
		},5000); 	
		
		///////////////////// Loja 2 ///////////////////// 	
		$('#loja2').load("/intranet/server/server_loja2_tvdev.php").fadeIn("slow");  
		setInterval(function(){
			$('#loja2').load("/intranet/server/server_loja2_tvdev.php").fadeIn("slow");  
		},5000); 	
		
		///////////////////// Loja 4 ///////////////////// 	
		$('#loja4').load("/intranet/server/server_loja4_tvdev.php").fadeIn("slow");  
		setInterval(function(){
			$('#loja4').load("/intranet/server/server/server_loja4_tvdev.php").fadeIn("slow");  
		},5000); 	
		
		///////////////////// Loja 5 ///////////////////// 	
		$('#loja5').load("/intranet/server/server_loja5_tvdev.php").fadeIn("slow");  
		setInterval(function(){
			$('#loja5').load("/intranet/server/server_loja5_tvdev.php").fadeIn("slow");  
		},5000); 
		
		///////////////////// Loja 8 ///////////////////// 	
		$('#loja8').load("/intranet/server/server_loja8_tvdev.php").fadeIn("slow");  
		setInterval(function(){
			$('#loja8').load("/intranet/server/server_loja8_tvdev.php").fadeIn("slow");  
		},5000); 
		
		
		///////////////////// Loja 9 ///////////////////// 	
		$('#loja9').load("/intranet/server/server_loja9_tvdev.php").fadeIn("slow");  
		setInterval(function(){
			$('#loja9').load("/intranet/server/server_loja9_tvdev.php").fadeIn("slow");  
		},5000);
		
		///////////////////// GLPI ///////////////////// 	
		$('#glpi_100').load("/intranet/server/server_glpi_100_tvdev.php").fadeIn("slow");  
		setInterval(function(){
			$('#glpi_100').load("/intranet/server/server_glpi_100_tvdev.php").fadeIn("slow");  
		},5000);
		
		        
        });    
    
    </script>    
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>    
    
  </body>




</html>



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

$stmt250 = $pdo->prepare("SELECT * FROM controle where controle_loja = '250'");
$stmt250->execute();

$row250 = $stmt250->fetch(); 
$dados = $row250['controle_descricao'];							
$dados = str_replace(' ', '*', $dados); 
$dados = str_replace('**', '*', $dados); 
$dados = str_replace('**', '*', $dados); 
$dados = str_replace('**', '*', $dados); 
$dados = str_replace('**', '*', $dados); 
$dados = explode('*', $dados);
						
$style250 = '';
if(substr($dados[31],0,2) > 95){
	$style250 = 'danger';	
}else{
	$style250 = 'success';
} 


$stmt240 = $pdo->prepare("SELECT * FROM controle where controle_loja = '240'");
$stmt240->execute();

$row240 = $stmt240->fetch(); 
$dados240 = $row240['controle_descricao'];							
$dados240 = str_replace(' ', '*', $dados240); 
$dados240 = str_replace('**', '*', $dados240); 
$dados240 = str_replace('**', '*', $dados240); 
$dados240 = str_replace('**', '*', $dados240); 
$dados240 = str_replace('**', '*', $dados240); 
$dados240 = explode('*', $dados240);
						
$style240 = '';
if(str_replace('%', '', $dados240[51]) > 95){
	$style240 = '#a20000';	
}else{
	$style240 = '#1b5098';
} 

$style240_1 = '';
if(str_replace('%', '', $dados240[46]) > 95){
	$style240_1 = '#a20000';	
}else{
	$style240_1 = '#1b5098';
}

$stmt251 = $pdo->prepare("SELECT * FROM controle where controle_loja = '251'");
$stmt251->execute();

$row251 = $stmt251->fetch(); 
$dados251 = $row251['controle_descricao'];							
$dados251 = str_replace(' ', '*', $dados251); 
$dados251 = str_replace('**', '*', $dados251); 
$dados251 = str_replace('**', '*', $dados251); 
$dados251 = str_replace('**', '*', $dados251); 
$dados251 = str_replace('**', '*', $dados251); 
$dados251 = explode('*', $dados251);
						
$style251 = '';

if(substr($dados251[40],0,3) > 95){
	$style251 = '#a20000';	
}else{
	$style251 = '#1b5098';
}
?>							


<div class="legend_espaco" style="background-color:<?php echo $style240_1; ?>; width: 80px;right: 248px;top: 155px;">/u <strong style="color:yellow;"><?php echo $dados240[46]; ?></strong></div>
	
<div class="legend_espaco" style="background-color:<?php echo $style240; ?>; width: 200px;right: 45px;top: 155px;">/u/sistemas/bigmais <strong style="color:yellow;"><?php echo $dados240[51]; ?></strong></div>


<div class="legend_espaco" style="background-color:<?php echo $style250; ?>; width: 73px;right: 300px;top: 318px;">/var <strong style="color:yellow;"><?php echo $dados[26]; ?></strong></div>

<div class="legend_espaco" style="background-color:<?php echo $style250; ?>; width: 123px;right: 170px;top: 318px;">/var/mail <strong style="color:yellow;"><?php echo $dados[31]; ?></strong></div>

<div class="legend_espaco" style="background-color:<?php echo $style251; ?>; width: 170px;right: 210px;top: 263px;">/var/lib/mysql <strong style="color:yellow;"><?php echo $dados251[40]; ?></strong></div>


