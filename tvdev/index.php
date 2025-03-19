<!DOCTYPE html><html lang="pt-br" translate="no">
    <meta name="google" content="notranslate">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <title>BIG MAIS SUPERMERCADOS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <meta http-equiv="refresh" content="30; vendas.php">
  
  <style>
    html{background-image: url(img/fundo.png);background-size:cover;padding:1%;}
    
    table tr td, table tr th {max-width: 10vw;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;}
    
    table{width:100%;}    
    td, th{text-align:center !important;}    
    thead{background-color:#0074cc; color:white;}    
  </style>
  
  </head>
  <center><h1 style="padding-top:10px;font-weight:700;">PROCESSOS ORACLE</h1></center>
  <body>
    <div class="table-responsive">
    <div class="panel panel-default">
        <table class="table table-bordered table-hover">
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
         <tbody id="processos"></tbody>
       </table>
      </div>
    </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    
  </body>


  <script>
     $(document).ready(function(){
     $('#processos').load("processos.php").fadeIn("slow");  
     setInterval(function(){
      $('#processos').load("processos.php").fadeIn("slow");  
     }, 10000);
});      
</script>


</html>