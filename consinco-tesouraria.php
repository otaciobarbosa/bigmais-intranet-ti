<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>
<?php
include 'data/conexao.php';
$tmpData = $_GET['data'];
$loja = $_GET['loja'];
$pdv  = $_GET['pdv'];
$exec  = $_GET['exec'];

if($exec == '1'){
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
 echo '<script language="javascript">';
 echo 'alert(GT DELETADO)'; 
 echo '</script>';

}catch(Exception $e){
  die("ERRO! Detalhes => " . $e->getMessage());
  oci_close($oraConn);
}

header("Location: consinco-tesouraria.php?exec=0");
 exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">

<head>
    <?php include 'custom/ads/header.php'; ?>
</head>

<body>
    <?php include 'custom/ads/navbar.php'; ?>
    <div class="content-inner">
        <header class="page-header">
            <div class="container-fluid">
                <div class="no-margin-bottom">
                    <form action="consinco-tesouraria.php">
                        <div class="form-group">
                            <label for="email">DATA:</label>
                            <input type="date" class="form-control" id="data" name="data">
                        </div>
                        <div class="form-group">
                            <label for="loja">LOJA:</label>
                            <select class="form-control" id="loja" name="loja">
                                <option></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pdv">PDV:</label>
                            <select class="form-control" id="pdv" name="pdv">
                                <option></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <input type="hidden" id="exec" name="exec" value="1">
                        <button type="submit" class="btn btn-danger btn-block">EXECUTAR</button>
                    </form>
                </div>
            </div>
    </div>
    <?php include 'custom/ads/footer.php'; ?>
</body>

</html>