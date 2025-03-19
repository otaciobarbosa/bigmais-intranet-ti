  <center><h1 style="padding-top:10px;font-weight:700;">INTEGRAÇÃO DE VENDAS EM LOJAS (por tempo)</h1></center>
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
  
<script>
$(document).ready(function(){
  $('#processos').load("vendasloja.php").fadeIn("slow");  
  setInterval(function(){
  $('#processos').load("vendasloja.php").fadeIn("slow");  
  }, 10000);
});      
</script>
