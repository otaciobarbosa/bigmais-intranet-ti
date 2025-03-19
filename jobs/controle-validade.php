<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

date_default_timezone_set('America/Sao_Paulo');
$dataHoraAtual = date('Y-m-d H:i:s');

$servername = "192.168.0.210";
$username = "root";
$password = "bigmais.123";
$dbname = "bg-count-stock-base";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$oraServername   = "192.168.0.245/bigmais";
$oraUsername     = "consinco";
$oraPassword     = "consinco";
$oraPorta        = "1521";

  if(!$oraConn = oci_connect($oraUsername,$oraPassword,"$oraServername:$oraPorta")){
   $e = oci_error();
   throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e['message']);
    oci_close($oraConn);
  }

  try{      
      if(!$stmt = oci_parse($oraConn,"TRUNCATE TABLE BIGMAIS.OB_GESVAL_COLETA")){
        $e = oci_error($stmt);
        throw new Exception("Erro ao preparar consulta - " . $e['message']);
        oci_close($oraConn);
       }
    
      if(!oci_execute($stmt)){
        $e = oci_error($con);
        throw new Exception("Erro ao executar consulta - " . $e['message']);
        oci_close($con);
     }
     echo "Tabela BIGMAIS.OB_GESVAL_COLETA preparada para atualização...<br>";
    }catch(Exception $e){
      die("ERRO! Detalhes => " . $e->getMessage());
      oci_close($oraConn);
      mysqli_close($conn);
    }

$buscaProdutosColeta = "SELECT DISTINCT
            products.id AS IDCOLETA,
            products.code AS SEQPRODUTO,
            products.barcode AS CODIGOEAN,
            products.product AS DESCRICAO,
            products.product_validate AS DATAVALIDADE,
            products.store AS NROEMPRESA,
            products.location_store AS CODSETOR,
            sectors.name AS SETOR,
            products.amount AS QUANTIDADE,
            products.created_at AS CRIADO,
            products.updated_at AS ATUALIZADO,
            CURRENT_DATE AS INTEGRACAO,
            creater_by AS CODUSUARIO,
            UPPER(users.full_name) AS NOMEUSUARIO
            FROM
            products 
            INNER JOIN sectors ON sectors.id = products.location_store
            AND products.product_validate >= CURRENT_DATE
            LEFT JOIN users ON users.id = creater_by
            WHERE
            CODE > 0";
            $result = mysqli_query($conn, $buscaProdutosColeta);

if (mysqli_num_rows($result) > 0) {
  while($rowProdutosColeta = mysqli_fetch_assoc($result)) {
    try{    
        $dataValidade = date('Y-m-d', strtotime($rowProdutosColeta['DATAVALIDADE']));
        $criado = date('Y-m-d', strtotime($rowProdutosColeta['CRIADO']));
        $atualizado = date('Y-m-d', strtotime($rowProdutosColeta['ATUALIZADO']));
        $integracao = date('Y-m-d', strtotime($rowProdutosColeta['INTEGRACAO']));
        
        $cadastraValidade = "INSERT INTO BIGMAIS.OB_GESVAL_COLETA (IDCOLETA, SEQPRODUTO, CODIGOEAN, DESCRICAO, DATAVALIDADE, NROEMPRESA, CODSETOR, SETOR, QUANTIDADE, CRIADO, ATUALIZADO, INTEGRACAO, CODUSUARIO, NOMEUSUARIO) 
                             VALUES ('".$rowProdutosColeta["IDCOLETA"]."',
                                     '".$rowProdutosColeta["SEQPRODUTO"]."',
                                     '".$rowProdutosColeta["CODIGOEAN"]."',
                                     '".$rowProdutosColeta["DESCRICAO"]."',
                                     TO_DATE('".$dataValidade."', 'YYYY-MM-DD'),
                                     '".$rowProdutosColeta["NROEMPRESA"]."',
                                     '".$rowProdutosColeta["CODSETOR"]."',
                                     '".$rowProdutosColeta["SETOR"]."',
                                     '".$rowProdutosColeta["QUANTIDADE"]."',
                                     TO_DATE('".$criado."', 'YYYY-MM-DD'),
                                     TO_DATE('".$atualizado."', 'YYYY-MM-DD'),
                                     TO_DATE('".$integracao."', 'YYYY-MM-DD'),
                                     '".$rowProdutosColeta["CODUSUARIO"]."',
                                     '".$rowProdutosColeta["NOMEUSUARIO"]."')";
        
          if(!$stmt = oci_parse($oraConn,$cadastraValidade)){
            $e = oci_error($stmt);
            throw new Exception("Erro ao preparar consulta - " . $e['message']);
            oci_close($oraConn);
           }
        
          if(!oci_execute($stmt)){
            $e = oci_error($con);
            throw new Exception("Erro ao executar consulta - " . $e['message']);
            oci_close($con);
         }
        
        }catch(Exception $e){
          die("ERRO! Detalhes => " . $e->getMessage());
          oci_close($oraConn);
          mysqli_close($conn);
        }

  }
  echo "Atualizado com sucesso: ".$dataHoraAtual;
} else {
  echo "0 results";
}

mysqli_close($conn);
?>