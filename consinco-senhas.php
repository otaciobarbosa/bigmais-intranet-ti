<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'custom/header.php'; ?>
</head>

<body style='background-color:#d9d9d9;'>
    <?php include 'custom/navbar.php'; ?><br><br><br>
    <div class="container-fluid">
        <?php
$inconsistencias = "SELECT 
 NROEMPRESA,
 CODUSUARIO,
 LOGINID,
 UPPER(NOME) AS NOME,
 UPPER(EMAIL) AS EMAIL
 FROM GE_USUARIO";


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

  if(!$stmt = oci_parse($oraConn,$inconsistencias)){
    $e = oci_error($stmt);
    throw new Exception("Erro ao preparar consulta - " . $e['message']);
    oci_close($oraConn);
   }

  if(!oci_execute($stmt)){
    $e = oci_error($con);
    throw new Exception("Erro ao executar consulta - " . $e['message']);
    oci_close($con);

 }else{ ?>

        <div class="panel panel-default">
            <div class="panel-heading">PAINEL DE INCONSISTENCIAS</div>
            <div class="panel-body">

                <table id="senhas" class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style='font-size:12px;text-align:center;'>NROEMPRESA</th>
                            <th style='font-size:12px;text-align:center;'>CODUSUARIO</th>
                            <th style='font-size:12px;text-align:center;'>LOGINID</th>
                            <th style='font-size:12px;text-align:center;'>NOME</th>
                            <th style='font-size:12px;text-align:center;'>EMAIL</th>
                            <th style='font-size:12px;text-align:center;'>ALTERAR SENHA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  while (($row = oci_fetch_assoc($stmt)) != false) { ?>
                        <tr>
                            <td style='font-size:12px;text-align:center;'><?php echo $row['NROEMPRESA']; ?></td>
                            <td style='font-size:12px;text-align:center;'><?php echo $row['CODUSUARIO']; ?></td>
                            <td style='font-size:12px;text-align:center;'><?php echo $row['LOGINID']; ?></td>
                            <td style='font-size:12px;text-align:left;'><?php echo $row['NOME']; ?></td>
                            <td style='font-size:12px;text-align:left;'><?php echo $row['EMAIL']; ?></td>
                            <td style='text-align:center;'>

                                <form class="form-inline" action="consinco-alterar-senha.php" method='GET'>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="senha" name="senha">
                                        <input type="hidden" id="usuario" name="usuario" value="<?php echo $row["CODUSUARIO"]; ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                                        ALTERAR SENHA
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
    <?php include 'custom/footer.php'; ?>

</body>

</html>