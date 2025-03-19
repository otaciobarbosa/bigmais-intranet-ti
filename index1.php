<!DOCTYPE html><html lang="pt-br" translate="no">
    <meta name="google" content="notranslate">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>BIG MAIS SUPERMERCADOS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>    
    
    <!--meta http-equiv="refresh" content="30; vendas.php"-->
  
  <style>
    
    html{background-image: url(img/fundo.png);background-size:cover;padding:1%;}
    body{height:90vh;border-radius:10px;}
    table tr td, table tr th {max-width: 10vw;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;}
    
    table{width:100%;}    
    
    td, th{text-align:center !important;}    
    
    thead{background-color:#0074cc; color:white;}    
    
    .host{font-weight:700;font-size:1.2em;vertical-align:bottom;width:350px;    
        background: rgb(255,255,255);
        background: linear-gradient(90deg, rgba(255,255,166,0) 0%, rgba(205,227,255,0.9444152661064426) 100%);
        border-radius:10px;    
        list-style-type: none;
    }
    
    .vhost{font-weight:700;font-size:1.3em;vertical-align:bottom;width:200px;            
    
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
  padding:0 1.5em; /* indentation + .5em */
  line-height:2em; /* default list item's `line-height` */
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
    
  </style>
  
  </head>  
  <body>
  
    
    <div id="tabela_content" style="width:80%;">

    </div>
    
    <div id="tabela_content2" style="width:18%;position:fixed;right:20px;top:50px;">
            <div class="row">
            <ul class="host">
                
                <li><img src="img/icon_server.ico" style="width:50px;"> 192.168.0.225            
                    <ul class="tree">
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> AvancoNovo_236</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> AvancoUbuntu_240</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> C5ClientCont_248</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> NovoIntraNet_210</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> Proxy_250</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> SocinC5_251</li>
                        <li><img src="img/vm_icon_erro.png" style="width:30px;"> SrvDocs_150</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> SrvEmail</li>
                        <li><img src="img/vm_icon_erro.png" style="width:30px;"> Veltio_249</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> VipCommerce_242</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> VoipBig_220</li>
                    </ul>                
                 </li>

                <li><img src="img/icon_server.ico" style="width:50px;"> 192.168.0.226            
                    <ul class="tree">
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> BigSrvTotAntNaoLigar</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> IIS_TotvCorric_228</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> NDD_244</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> Python_209</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> SrvDpNovo_130</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> SrvGED_200</li>
                        <li><img src="img/vm_icon_erro.png" style="width:30px;"> Supervisorio_100</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> vCenter</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> VeltioBanco</li>
                        <li><img src="img/vm_icon_ok.png" style="width:30px;"> Vitruvio_205</li>
                    </ul>                
                 </li>                
                 
                 
                </ul>
            </div>
    </div>
    
    
    <script>
       $(document).ready(function(){
            var links=['tab_processos.php', 'tab_vendas.php'];
            var i=0;
            
            function loadlink(i){
                var url=links[i];

                $('#tabela_content').load( url, function() {
                     $(this).unwrap();
                });
            }
            loadlink(i);
            setInterval(function(){
                loadlink(i);
                i++;
                if( i > 1 ) i=0;
            }, 13000 );
        });
    </script>    
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>    
    
  </body>




</html>