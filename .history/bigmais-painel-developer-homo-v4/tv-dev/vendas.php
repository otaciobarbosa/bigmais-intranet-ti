<!DOCTYPE html><html lang="pt-br" translate="no">
    <meta name="google" content="notranslate">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>BIG MAIS SUPERMERCADOS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <meta http-equiv="refresh" content="30; index.php">
  
  <style>
    html{background-image: url(img/fundo.png);background-size:cover;padding:1%;}
    
    table tr td, table tr th {max-width: 10vw;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;}
    
    table{width:100%;}    
    td, th{text-align:center !important;}    
    thead{background-color:#0074cc; color:white;}    
  </style>
  
  </head>
  <center><h1 style="padding-top:10px;font-weight:700;">INTEGRAÇÃO DE VENDAS EM LOJAS (por tempo)</h1></center>
  <body>    
    <div class="table-responsive">
    <div class="panel panel-default">
        <table class="table table-bordered table-hover">
         <thead>
           <tr>
              <th>LOJA</th>
              <th>HORA</th>
              <th>CUPONS</th>
              <th>INTEGRACAO</th>
              <th>STATUS</th>
	          </tr>
         </thead>
         <tbody id="processos"></tbody>
       </table>
      </div>
    </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    
  </body>


  <script>
     $(document).ready(function(){
     $('#processos').load("vendasloja.php").fadeIn("slow");  
     setInterval(function(){
      $('#processos').load("vendasloja.php").fadeIn("slow");  
     }, 10000);
});      
</script>


</html>