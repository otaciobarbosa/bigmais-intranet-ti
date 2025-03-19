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
                    <?php
$pedidos = "SELECT p.situacaoped, P.* FROM MAD_PEDVENDA P WHERE P.NROEMPRESA = 9 AND P.SITUACAOPED = 'P'";


try{
error_reporting(E_ALL);
ini_set("display_errors", 1);

$oraServername   = "192.168.0.245/bigmais";
$oraUsername     = "consinco";
$oraPassword     = "consinco";
$oraPorta        = "1521";

  if(!$oraConn = oci_connect($oraUsername,$oraPassword,"$oraServername:$oraPorta")){
   $e = oci_error();
   throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e['message']);
    oci_close($oraConn);
  }

  if(!$stmt = oci_parse($oraConn,$pedidos)){
    $e = oci_error($stmt);
    throw new Exception("Erro ao preparar consulta - " . $e['message']);
    oci_close($oraConn);
   }

  if(!oci_execute($stmt)){
    $e = oci_error($con);
    throw new Exception("Erro ao executar consulta - " . $e['message']);
    oci_close($con);

 }else{ ?>

                    <div class="card">
                        <div class="card-body">
                            <h3>INFO: D=Digitacao | A=Analise | L=Liberado | C=Cancelado | S=Separacao | P=Pre-separacao
                                | R=Roteirizacao | W=Separado | F=Faturado</h3>

                            <table id="senhas" class="table table-condensed table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style='font-size:12px;text-align:center;'>SITUACAOPED</th>
                                        <th style='font-size:12px;text-align:center;'>NROPEDVENDA</th>
                                        <th style='font-size:12px;text-align:center;'>NROEMPRESA</th>
                                        <th style='font-size:12px;text-align:center;'>SEQPESSOA</th>
                                        <th style='font-size:12px;text-align:center;width:100px;'>AJUSTAR</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  while (($row = oci_fetch_assoc($stmt)) != false) { ?>
                                    <tr>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['SITUACAOPED']; ?>
                                        </td>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['NROPEDVENDA']; ?>
                                        </td>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['NROEMPRESA']; ?>
                                        </td>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['SEQPESSOA']; ?>
                                        </td>
                                        <td style='font-size:12px;text-align:center;'>

                                            <form class="form-inline" action="consinco-pedido-ajustar.php" method='GET'>
                                                <div class="form-group">
                                                    <input type="hidden" id="pedido" name="pedido"
                                                        value="<?php echo $row["NROPEDVENDA"]; ?>">
                                                </div>
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                                    AJUSTAR PEDIDO
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <?php
     }
 

}catch(Exception $e){
  die("ERRO! Detalhes => " . $e->getMessage());
  oci_close($oraConn);
}
?>
                </div>
            </div>
    </div>
    <?php include 'custom/ads/footer.php'; ?>
</body>

</html>