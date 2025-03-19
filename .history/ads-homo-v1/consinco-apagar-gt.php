<?php
include 'data/conexao.php';
$tmpData = $_GET['data'];
$loja = $_GET['loja'];
$pdv  = $_GET['pdv'];


$dd = explode("-", $tmpData);

 $ano    = $dd[0];
 $tmpMes = $dd[1]; 
 $dia    = $dd[2];

if($tmpMes == '1'){
    $mes = 'Jan';
}elseif($tmpMes == '2'){
    $mes = 'Feb';
}elseif($tmpMes == '3'){
    $mes = 'Mar';
}elseif($tmpMes == '4'){
    $mes = 'Apr';
}elseif($tmpMes == '5'){
    $mes = 'May';
}elseif($tmpMes == '6'){
    $mes = 'Jun';
}elseif($tmpMes == '7'){
    $mes = 'Jul';
}elseif($tmpMes == '8'){
    $mes = 'Aug';
}elseif($tmpMes == '9'){
    $mes = 'Sep';
}elseif($tmpMes == '10'){
    $mes = 'Oct';
}elseif($tmpMes == '11'){
    $mes = 'Nov';
}elseif($tmpMes == '12'){
    $mes = 'Dec';
}else{
    $mes = '';
}

$data = $dia .'-'. $mes .'-'. $ano;


$apagarGT = "DELETE from PDV_MOVTOFINANCEIRO x
where x.seqmovimento in (
select a.seqmovimento from PDV_MOVIMENTO a
where a.dtamovimento = '$data'
and a.nroempresa = $loja
and a.nrocheckout = $pdv)";


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

header("Location: socin-movimento.php?data=$tmpData&loja=$loja&pdv=$pdv");
 exit;
?>