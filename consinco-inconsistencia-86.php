<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">

<head>
    <?php include 'custom/header.php'; ?>
</head>

<body>
    <?php include 'custom/navbar.php'; ?>
    <div class="content-inner">
        <header class="page-header">
            <div class="container-fluid">
                <div class="no-margin-bottom">
                    <?php
$inconsistencias = "SELECT DISTINCT 
RF_INCONSISTENC.SEQINCONSIST,
RF_AUXNOTAMESTR.ROWID,
RF_AUXNOTAMESTR.NRONOTA AS NOTA,
RF_AUXNOTAMESTR.ENTRADASAIDA AS ENTRADASAIDA,
DECODE(GE_PESSOA.SEQPESSOA,NULL,'Pessoa n? cadastrada',GE_PESSOA.SEQPESSOA || ' - ' || GE_PESSOA.NOMERAZAO) AS  PESSOA,
DECODE(GE_PESSOA.SEQPESSOA,NULL,'Pessoa n? cadastrada',GE_PESSOA.NOMERAZAO),
RF_AUXNOTAMESTR.NROEMPRESA,
RF_AUXNOTAMESTR.DTALANCAMENTO,
RF_AUXNOTAMESTR.VLRTOTAL,
RF_AUXNOTAMESTR.SEQNOTA,
RF_AUXNOTAMESTR.SEQPESSOA,
RF_AUXNOTAMESTR.VERSAO,
RF_AUXNOTAMESTR.CODMODELO,
RF_AUXNOTAMESTR.DTAEMISSAO,
RF_AUXNOTAMESTR.CODSITDOC,
RF_AUXNOTAMESTR.INDOPERACAO,
NVL(GE_CGO.INDIMPORTEXPORT, 'N') AS INDIMPORTEXPORTCGO,
RF_AUXNOTAMESTR.CGO,
RF_AUXNOTAMESTR.NFECHAVEACESSO,
SERIE
from RF_AUXNOTAMESTR, GE_PESSOA, RF_INCONSISTENC, GE_CGO
where RF_AUXNOTAMESTR.SEQPESSOA = GE_PESSOA.SEQPESSOA(+)
AND RF_INCONSISTENC.SEQNOTA = RF_AUXNOTAMESTR.SEQNOTA
AND RF_INCONSISTENC.SEQINCONSIST = 86
ORDER BY RF_INCONSISTENC.SEQINCONSIST ASC
";


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
                    <div class="card">
                        <div class="card-body">
                            <h3>PAINEL DE INCONSISTENCIAS</h3>
                            <table class="table table-condensed table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style='font-size:12px;text-align:center;'>#</th>
                                        <th style='font-size:12px;text-align:center;'>EMP</th>
                                        <th style='font-size:12px;text-align:center;'>NOTA</th>
                                        <th style='font-size:12px;text-align:center;'>SEQ</th>
                                        <th style='font-size:12px;text-align:center;'>SERIE</th>
                                        <th style='font-size:12px;text-align:center;'>E/S</th>
                                        <th style='font-size:12px;text-align:center;'>SEQ</th>
                                        <th style='font-size:12px;text-align:left;'>PESSOA</th>
                                        <th style='font-size:12px;text-align:center;'>EMISSAO</th>
                                        <th style='font-size:12px;text-align:center;'>LANC</th>
                                        <th style='font-size:12px;text-align:center;'>VLRTOTAL</th>
                                        <th style='font-size:12px;text-align:center;'>VS</th>
                                        <th style='font-size:12px;text-align:center;'>MD</th>
                                        <th style='font-size:12px;text-align:center;'>CS</th>
                                        <th style='font-size:12px;text-align:center;'>IO</th>
                                        <th style='font-size:12px;text-align:center;'>IIC</th>
                                        <th style='font-size:12px;text-align:center;'>CGO</th>
                                        <th style='font-size:12px;text-align:left;'>NFECHAVEACESSO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  while (($row = oci_fetch_assoc($stmt)) != false) { ?>
                                    <tr>
                                        <td style='font-size:12px;text-align:center;'>
                                            <?php echo $row['SEQINCONSIST']; ?></td>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['NROEMPRESA']; ?>
                                        </td>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['NOTA']; ?></td>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['SEQNOTA']; ?>
                                        </td>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['SERIE']; ?></td>
                                        <td style='font-size:12px;text-align:center;'>
                                            <?php echo $row['ENTRADASAIDA']; ?></td>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['SEQPESSOA']; ?>
                                        </td>
                                        <td style='font-size:12px;text-align:left;'><?php echo $row['PESSOA']; ?></td>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['DTAEMISSAO']; ?>
                                        </td>
                                        <td style='font-size:12px;text-align:center;'>
                                            <?php echo $row['DTALANCAMENTO']; ?></td>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['VLRTOTAL']; ?>
                                        </td>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['VERSAO']; ?></td>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['CODMODELO']; ?>
                                        </td>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['CODSITDOC']; ?>
                                        </td>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['INDOPERACAO']; ?>
                                        </td>
                                        <td style='font-size:12px;text-align:center;'>
                                            <?php echo $row['INDIMPORTEXPORTCGO']; ?>
                                        </td>
                                        <td style='font-size:12px;text-align:center;'><?php echo $row['CGO']; ?></td>
                                        <td style='font-size:12px;text-align:left;'>
                                            <?php echo $row['NFECHAVEACESSO']; ?></td>

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
    <?php include 'custom/footer.php'; ?>
</body>

</html>