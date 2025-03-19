<?php
include 'data/conexao.php';

$apagarGT = "BEGIN
for t in (select DISTINCT RF_AUXNOTAMESTR.NRONOTA, RF_AUXNOTAMESTR.ROWID,
              RF_AUXNOTAMESTR.ENTRADASAIDA,
              DECODE(GE_PESSOA.SEQPESSOA,
                     NULL,
                     'Pessoa n? cadastrada',
                     GE_PESSOA.SEQPESSOA || ' - ' || GE_PESSOA.NOMERAZAO),
              RF_AUXNOTAMESTR.NROEMPRESA,
              RF_AUXNOTAMESTR.DTALANCAMENTO,
              RF_AUXNOTAMESTR.VLRTOTAL,
              RF_AUXNOTAMESTR.SEQNOTA,
              RF_AUXNOTAMESTR.SEQPESSOA,
              RF_AUXNOTAMESTR.VERSAO,
              DECODE(GE_PESSOA.SEQPESSOA,
                     NULL,
                     'Pessoa n? cadastrada',
                     GE_PESSOA.NOMERAZAO),
              RF_AUXNOTAMESTR.CODMODELO,
              RF_AUXNOTAMESTR.DTAEMISSAO,
              RF_AUXNOTAMESTR.CODSITDOC,
              RF_AUXNOTAMESTR.INDOPERACAO,
              NVL(GE_CGO.INDIMPORTEXPORT, 'N'),
              RF_AUXNOTAMESTR.CGO,
              RF_AUXNOTAMESTR.NFECHAVEACESSO,
              SERIE
from RF_AUXNOTAMESTR, GE_PESSOA, RF_INCONSISTENC, GE_CGO
where RF_AUXNOTAMESTR.SEQPESSOA = GE_PESSOA.SEQPESSOA(+)
 AND RF_INCONSISTENC.SEQNOTA = RF_AUXNOTAMESTR.SEQNOTA
 AND RF_INCONSISTENC.SEQINCONSIST = 33) loop
  delete rf_auxnotamestr z
   where z.rowid = t.rowid;
end loop;
end;";


try{
$oraServername   = "192.168.0.245/bigmais";
$oraUsername     = "consinco";
$oraPassword     = "consinco";
$oraPorta        = "1521";

  if(!$oraConn = oci_connect($oraUsername,$oraPassword,"$oraServername:$oraPorta")){
   $e = oci_error();
   throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e['message']);
    oci_close($oraConn);
  }

  if(!$stmt = oci_parse($oraConn,$apagarGT)){
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
}

header("Location: inconsistencia-33.php");
 exit;
?>