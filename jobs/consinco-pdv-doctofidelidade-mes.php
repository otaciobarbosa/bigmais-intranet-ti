<?php
$today = date("Y-m-d H:i:s");  
print($today ."<br/> Iniciando Atualização...<br/>");

/*
 # ----------------------------------------------------
 # CONECTA BANCO DE DADOS MYSQL.
 # ----------------------------------------------------
*/
$mysqlConn = mysqli_connect("192.168.0.251", "econect", "123456","concentrador");
 if (!$mysqlConn) {
  mysqli_close($mysqlConn);
  print mysqli_connect_error();
}

/*
 # ----------------------------------------------------
 # CONECTA BANCO DE DADOS ORACLE.
 # ----------------------------------------------------
*/
$oraConn = oci_connect("consinco","consinco", "192.168.0.245/bigmais:1521");
 if (!$oraConn) {
   $e = oci_error();
   print "Erro ao conectar ao servidor usando a extensão OCI - " . $e['message'] . "<br/>";
}

/*
 # ----------------------------------------------------
 # LIMPA A TABELA: OB_DADOS_ADICIONAIS_CAPA
 # ESSA E UMA TABELA TEMPORARIA PARA RECEBER OS DADOS
 # DA INTEGRAÇÃO.
 # ----------------------------------------------------
*/
if(!$stmt = oci_parse($oraConn,'DELETE FROM BIGMAIS.OB_DADOS_ADICIONAIS_CAPA')){
  $e = oci_error($stmt);
  throw new Exception("Erro ao preparar consulta - " . $e['message']);
  oci_close($oraConn);
 }
if(!oci_execute($stmt)){
  $e = oci_error($con);
  throw new Exception("Erro ao executar consulta - " . $e['message']);
  oci_close($con);
}else{
  $nrows = oci_num_rows($stmt);
  echo "limpa tabela integracao: " .$nrows. " apagadas.<br>";
}

/*
 # ----------------------------------------------------
 # BUSCA OS CLIENTES IDENTIFICADOS NO PDV.
 # ----------------------------------------------------
*/
$getDadosAdicionais = "SELECT * 
                        FROM dados_adicionais_capa 
                         WHERE  id_campo = 52 
                          AND data_venda >= '2024-02-31'
                          AND numero_loja IN ( 1, 2, 4, 5, 8, 9 ) 
                          AND numero_pdv > 0 
                          AND numero_cupom IS NOT NULL";


$resDA = mysqli_query($mysqlConn, $getDadosAdicionais);
  if (mysqli_num_rows($resDA) > 0) {

    echo " WHERE: " .$where . "<br/>";

    while($row = mysqli_fetch_assoc($resDA)) {
       /*
        # ----------------------------------------------------
        # CADASTRA NOVOS DADOS NA: OB_DADOS_ADICIONAIS_CAPA
        # ----------------------------------------------------
       */
       $query = "INSERT INTO BIGMAIS.OB_DADOS_ADICIONAIS_CAPA(data_venda, numero_loja, numero_pdv, numero_cupom, id_campo, valor_campo) values (TRUNC(TO_DATE('".$row['data_venda']."', 'YYYY-MM-DD')), ".$row['numero_loja'].", ".$row['numero_pdv'].", ".$row['numero_cupom'].",".$row['id_campo'].", '".$row['valor_campo']."')";
       if(!$stmt = oci_parse($oraConn,$query)){
        $e = oci_error($stmt);
        throw new Exception("Erro ao preparar consulta - " . $e['message']);
        oci_close($oraConn);
       }
      if(!oci_execute($stmt)){
        $e = oci_error($oraConn);
        throw new Exception("Erro ao executar consulta - " . $e['message']);
        oci_close($oraConn);
      }
    }
  } else {
    print " 0 resultados na dados_adicionais_capa.";
  }

/*
 # ----------------------------------------------------
 # BUSCA DADOS ATUALIZADOS PARA SEREM GRAVADOS 
 # NA PDV_DOCTOFIDELIDADE
 # ----------------------------------------------------
*/
$query = "SELECT * FROM BIGMAIS.OBV_CLI_FID";
 if(!$stmt = oci_parse($oraConn,$query)){
  $e = oci_error($stmt);
  throw new Exception("Erro ao preparar consulta - " . $e['message']);
  oci_close($oraConn);
 }
if(!oci_execute($stmt)){
  $e = oci_error($oraConn);
  throw new Exception("Erro ao executar consulta - " . $e['message']);
  oci_close($oraConn);
}

while (($row = oci_fetch_assoc($stmt)) != false) {

  /*
   # ----------------------------------------------------
   # CADASTRA NA PDV_DOCTOFIDELIDADE
   # ----------------------------------------------------
  */
  $insertCadastro = "INSERT INTO PDV_DOCTOFIDELIDADE(SEQDOCTO,CODPARCEIRO,SEQPESSOA,CNPJCPF,DESCPARCEIRO,CODCLIENTE,FONE,DTAHORINSERCAO) 
  values (".$row['SEQDOCTO'].",".$row['CODPARCEIRO'].",".$row['SEQPESSOA'].",".$row['CNPJCPF'].",'".$row['DESCPARCEIRO']."',".$row['CODCLIENTE'].",NULL,'".$row['DTAHORINSERCAO']."')";
  if(!$stmtInsert = oci_parse($oraConn,$insertCadastro)){
    $e = oci_error($stmtInsert);
    throw new Exception("Erro ao preparar consulta - " . $e['message']);
    oci_close($oraConn);
   }
  if(!oci_execute($stmtInsert)){
    $e = oci_error($oraConn);
    throw new Exception("Erro ao executar consulta - " . $e['message']);
    oci_close($oraConn);
  }
}

/*
 # ----------------------------------------------------
 # REMOVE OS DUPLICADOS
 # ----------------------------------------------------
*/
$delete = "CALL CONSINCO.SP_REM_DUP_FID('i')";
 if(!$stmt = oci_parse($oraConn,$delete)){
  $e = oci_error($stmt);
  throw new Exception("Erro ao preparar consulta - " . $e['message']);
  oci_close($oraConn);
 }
if(!oci_execute($stmt)){
  $e = oci_error($oraConn);
  throw new Exception("Erro ao executar consulta - " . $e['message']);
  oci_close($oraConn);
}else{
  echo "CALL CONSINCO.SP_REM_DUP_FID('i'): executado corretamente. <br>";
}

/*
 # ----------------------------------------------------
 # LIMPA A TABELA PARA RECEBER OS NOVOS REGISTROS
 # ----------------------------------------------------
*/
$deletem = "CALL CONSINCO.SP_REM_DUP_MFID(sysdate)";
 if(!$stmt = oci_parse($oraConn,$deletem)){
  $e = oci_error($stmt);
  throw new Exception("Erro ao preparar consulta - " . $e['message']);
  oci_close($oraConn);
 }
if(!oci_execute($stmt)){
  $e = oci_error($oraConn);
  throw new Exception("Erro ao executar consulta - " . $e['message']);
  oci_close($oraConn);
}else{
  echo "CALL CONSINCO.SP_REM_DUP_MFID(sysdate): executado corretamente. <br>";
}

/*
 # ----------------------------------------------------
 # INTEGRA: mfl_doctofidelidade
 # ----------------------------------------------------
*/
$integram = "CALL CONSINCO.SP_IMP_MFID(sysdate)";
 if(!$stmt = oci_parse($oraConn,$integram)){
  $e = oci_error($stmt);
  throw new Exception("Erro ao preparar consulta - " . $e['message']);
  oci_close($oraConn);
 }
if(!oci_execute($stmt)){
  $e = oci_error($oraConn);
  throw new Exception("Erro ao executar consulta - " . $e['message']);
  oci_close($oraConn);
}else{
  echo "CALL CONSINCO.SP_IMP_MFID(sysdate): executado corretamente. <br>";
}

/*
 # ----------------------------------------------------
 # FECHA A CONEXÃO COM MYSQL
 # ----------------------------------------------------
*/
mysqli_close($mysqlConn);
?>