<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<?php include 'custom/header.php'; ?>
<body>
    <?php include 'custom/nav.php'; ?>

    <div class="content-inner">
        <header class="page-header">
            <div class="container-fluid">
                <div class="no-margin-bottom">
                <form action="index.php" method="post" enctype="multipart/form-data">
                    <label style="font-size:12px;">ARQUIVO:&nbsp; </label>
                    <input type="file" name='arquivo' id='arquivo' style="font-size: 12px; width:300px;height:30px;">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-check-square-o"></i>
                            VALIDAR
                        </button>
                    </form>
                </div>
            </div>
        </header>
        <section class="dashboard-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body" style="text-align:center;">
                            <table class="table" id="myTable">
                         <thead>
                           <tr>
                             <th>SEQPRODUTO</th>
                             <th>TIPCODIGO</th>
                             <th>CODACESSO</th>
                             <th style='text-align:left'>DESCCOMPLETA</th>
                           </tr>
                         </thead>
                         <tbody>
                            <?php
                                error_reporting(0);
                                	$idintegracao = md5(date("YmdHis"));	
                                    $_UP['pasta']     = 'uploads/';
                                    $_UP['tamanho']   = 1024 * 1024 * 10; 
                                    $_UP['extensoes'] = array('txt');
                                    $_UP['renomeia']  = true;
                                    $_UP['erros'][0]  = 'Não houve erro';
                                    $_UP['erros'][1]  = 'O arquivo no upload é maior do que o limite do PHP';
                                    $_UP['erros'][2]  = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
                                    $_UP['erros'][3]  = 'O upload do arquivo foi feito parcialmente';
                                    $_UP['erros'][4]  = 'Não foi feito o upload do arquivo';	
                                if ($_FILES['arquivo']['error'] != 0) {
                                    die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
                                    exit; 
                                }

                                $oracleUsuario ='consinco';
                                $oracleSenha = 'consinco';
                                $oracleHost = '192.168.0.245/bigmais';
                                $oraclePorta = '1521';

                                if(!$oracleConexao = oci_connect($oracleUsuario,$oracleSenha,"$oracleHost:$oraclePorta")){
                                   $e = oci_error();
                                   throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e['message']);
                                   oci_close($oracleConexao);
                                 } 

                             
                                $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
                                if (array_search($extensao, $_UP['extensoes']) === false) {
                                     echo "Por favor, envie arquivos com as seguintes extensões: txt";
                                }
                                else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
                                    echo "O arquivo enviado é muito grande, envie arquivos de até 10Mb.";
                                }
                                else {
                                    if ($_UP['renomeia'] == true) {
                                        $nome_final = time().'.txt';
                                        } else {
                                        $nome_final = $_FILES['arquivo']['name'];
                                    }

                                    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
                                    
                                    $filename = $_UP['pasta'] . $nome_final;
                                    $lines = array();
                                    $fp = fopen($filename, "r");

                                    if(filesize($filename) > 0){
                                        $content = fread($fp, filesize($filename));
                                        $lines = explode("\n", $content);
                                        fclose($fp);
                                    }

                                    $arquivo = "txt/$nome_final";
                                    foreach ($lines as $value) {
                                        $ln =  explode(";",str_replace(' ',';',trim($value)));
                                        $ln0 =  ltrim($ln[0], '0');
                                    
                                       if(!$stmt = oci_parse($oracleConexao,"SELECT NVL(count(*),0) AS TOTAL
                                       FROM MAP_PRODCODIGO A,MAP_PRODUTO B
                                       Where A.SEQPRODUTO = B.SEQPRODUTO AND A.CODACESSO = '".$ln0."'             
                                       And A.TIPCODIGO in ( 'D', 'B', 'E')
                                       And Exists ( Select * From MRL_PRODUTOEMPRESA B
                                                         Where A.SEQPRODUTO = B.SEQPRODUTO
                                                         And B.NROEMPRESA = '1'                           
                                                         And B.INDAVALINCLUSAO = 'S' )")){
                                           $e = oci_error($stmt);
                                           throw new Exception("Erro ao preparar consulta - " . $e['message']);
                                           oci_close($oracleConexao);
                                       }             
                                       if(!oci_execute($stmt)){
                                           $e = oci_error($oracleConexao);
                                           throw new Exception("Erro ao executar consulta - " . $e['message']);
                                           oci_close($oracleConexao);
                                       }
                                       $fp = fopen($arquivo, "a+");
                                       while (($row = oci_fetch_assoc($stmt)) != false) {
                                        if($row['TOTAL'] == 0){
                                            fwrite($fp, $ln0.PHP_EOL);
                                        }
                                       fclose($fp);
                                      }
                                     }

                                $linesb = array();
                                $fileb= "txt/$nome_final";
                                $fpb = fopen($fileb, "r");
                                if(filesize($fileb) > 0){
                                    $contentb = fread($fpb, filesize($fileb));
                                    $linesb = explode("\n", $contentb);
                                    fclose($fpb);
                                }    
                                foreach ($linesb as $valueb) {

                                    if($valueb !='' ){

                                   
                                    $str = "SELECT A.SEQPRODUTO, A.TIPCODIGO, A.CODACESSO,B.DESCCOMPLETA
                                    FROM MAP_PRODCODIGO A,MAP_PRODUTO B
                                     Where A.SEQPRODUTO = B.SEQPRODUTO AND A.CODACESSO like '%".$valueb."%'";

                                    
                                    if(!$stmtb = oci_parse($oracleConexao,$str)){
                                        $e = oci_error($stmtb);
                                        throw new Exception("Erro ao preparar consulta - " . $e['message']);
                                        oci_close($oracleConexao);
                                    }             
                                    if(!oci_execute($stmtb)){
                                        $e = oci_error($oracleConexao);
                                        throw new Exception("Erro ao executar consulta - " . $e['message']);
                                        oci_close($oracleConexao);
                                    }
                                    
                                    while (($rowb = oci_fetch_assoc($stmtb)) != false) {
                                     echo "<tr>
                                        <td>".$rowb['SEQPRODUTO'] . "</td>
                                        <td>".$rowb['TIPCODIGO'] ."</td>
                                        <td>".$rowb['CODACESSO']."</td>
                                        <td style='text-align:left'>".$rowb['DESCCOMPLETA']."</td>
                                      </tr>";
                                    }
                                   }
                                  }
                                 }
                                } ?>
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <?php include 'custom/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min."></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
   <script>
   $(document).ready(function() {
    $('#myTable').DataTable({
     dom: 'Bfrtip',
     buttons: [
      'csv', 'excel'
     ],
     "paging": false,
     "language": {
      "sProcessing": "Procesando...",
      "sLengthMenu": "Exibir _MENU_ registros por página",
      "sZeroRecords": "Nenhum resultado encontrado",
      "sEmptyTable": "Nenhum resultado encontrado",
      "sInfo": "Exibindo do _START_ até _END_ de um total de _TOTAL_ registros",
      "sInfoEmpty": "Exibindo do 0 até 0 de um total de 0 registros",
      "sInfoFiltered": "(Filtrado de um total de _MAX_ registros)",
      "sInfoPostFix": "",
      "sSearch": "Buscar:",
      "sUrl": "",
      "sInfoThousands": ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
       "sFirst": "Primero",
       "sLast": "Último",
       "sNext": "Próximo",
       "sPrevious": "Anterior"
      },
      "oAria": {
       "sSortAscending": ": Ativar para ordenar a columna de maneira ascendente",
       "sSortDescending": ": Ativar para ordenar a columna de maneira descendente"
      }
     }
    });
   });
   </script>
</body>

</html>