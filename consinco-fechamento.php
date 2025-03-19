<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>
<?php 

$tmpDataInicial = $_GET['datainicial'];
$tmpDataFinal = $_GET['datafinal'];

$dd = explode("-", $tmpDataInicial);
 $anoInicial    = $dd[0];
 $tmpMesInicial = $dd[1]; 
 $diaInicial    = $dd[2];
if($tmpMesInicial == '1'){
    $mesInicial = 'Jan';
}elseif($tmpMesInicial == '2'){
    $mesInicial = 'Feb';
}elseif($tmpMesInicial == '3'){
    $mesInicial = 'Mar';
}elseif($tmpMesInicial == '4'){
    $mesInicial = 'Apr';
}elseif($tmpMesInicial == '5'){
    $mesInicial = 'May';
}elseif($tmpMesInicial == '6'){
    $mesInicial = 'Jun';
}elseif($tmpMesInicial == '7'){
    $mesInicial = 'Jul';
}elseif($tmpMesInicial == '8'){
    $mesInicial = 'Aug';
}elseif($tmpMesInicial == '9'){
    $mesInicial = 'Sep';
}elseif($tmpMesInicial == '10'){
    $mesInicial = 'Oct';
}elseif($tmpMesInicial == '11'){
    $mesInicial = 'Nov';
}elseif($tmpMesInicial == '12'){
    $mesInicial = 'Dec';
}else{
    $mesInicial = '';
}

$ddFinal = explode("-", $tmpDataFinal);
 $anoFinal    = $ddFinal[0];
 $tmpMesFinal = $ddFinal[1]; 
 $diaFinal    = $ddFinal[2];
if($tmpMesFinal == '1'){
    $mesFinal = 'Jan';
}elseif($tmpMesFinal == '2'){
    $mesFinal = 'Feb';
}elseif($tmpMesFinal == '3'){
    $mesFinal = 'Mar';
}elseif($tmpMesFinal == '4'){
    $mesFinal = 'Apr';
}elseif($tmpMesFinal == '5'){
    $mesFinal = 'May';
}elseif($tmpMesFinal == '6'){
    $mesFinal = 'Jun';
}elseif($tmpMesFinal == '7'){
    $mesFinal = 'Jul';
}elseif($tmpMesFinal == '8'){
    $mesFinal = 'Aug';
}elseif($tmpMesFinal == '9'){
    $mesFinal = 'Sep';
}elseif($tmpMesFinal == '10'){
    $mesFinal = 'Oct';
}elseif($tmpMesFinal == '11'){
    $mesFinal = 'Nov';
}elseif($tmpMesFinal == '12'){
    $mesFinal = 'Dec';
}else{
    $mesFinal = '';
}

$datainicial = $diaInicial .'-'. $mesInicial .'-'. $anoInicial;
$datafinal = $diaFinal .'-'. $mesFinal .'-'. $anoFinal;

$inconsistencias = "SELECT *
  FROM (SELECT TBDOCTONFCE.NROEMPRESA AS LOJA,
               TBDOCTONFCE.DTAMOVIMENTO AS DTAMOVIMENTO,
               NVL(TBDOCTONFCE.VLRDOCTONFCE, 0) AS VLR_PDV,
               NVL(TBMFLDOCTOFISCAL.VLRDOCTOFISCAL, 0) AS VLR_ABC,
               NVL(TBFISCAL.VLRFISCAL, 0) AS FISCAL,
               NVL(TBFISCALAUX.VLRFISCAL, 0) AS FISCAL_AUX,
               NVL(TBTESOURARIA.Vlr_Tesouraria, 0) AS VLR_TES,
               NVL((TBDOCTONFCE.VLRDOCTONFCE -
                   TBMFLDOCTOFISCAL.VLRDOCTOFISCAL),
                   0) AS DIF_PDV_ABC,
               NVL((TBMFLDOCTOFISCAL.VLRDOCTOFISCAL -
                   nvl(TBFISCAL.VLRFISCAL, 0) -
                   nvl(TBFISCALAUX.VLRFISCAL, 0)),
                   0) AS DIF_ABC_FISCAL,
               NVL((TBDOCTONFCE.VLRDOCTONFCE - TBTESOURARIA.Vlr_Tesouraria),
                   0) AS DIF_PDV_TES
          FROM (SELECT A.NROEMPRESA,
                       A.DTAMOVIMENTO,
                       SUM(C.VLRITEM + C.Vlracrescimo - c.vlrdesconto) VLRDOCTONFCE,
                       'PDV_DOCTO'
                  FROM PDV_DOCTO A, PDV_DOCTOITEM C
                 WHERE A.SERIEDF = 'CF'
                   AND A.SEQDOCTO = C.SEQDOCTO
                   AND A.STATUSDOCTO = 'V'
                   AND C.STATUSITEM = 'V'
                   AND A.NROEMPRESA IN (1, 2, 4, 5, 9)
                   AND A.DTAMOVIMENTO BETWEEN '$datainicial' AND '$datafinal'
                 GROUP BY A.NROEMPRESA, A.DTAMOVIMENTO) TBDOCTONFCE,
               (SELECT A.NROEMPRESA,
                       A.DTAMOVIMENTO,
                       SUM(B.VLRITEM + B.VLRACRESCIMO - B.VLRDESCONTO) VLRDOCTOFISCAL,
                       'SM'
                  FROM CONSINCO.MFL_DOCTOFISCAL A, CONSINCO.MFL_DFITEM B
                 WHERE A.NUMERODF = B.NUMERODF
                   AND A.SERIEDF = B.SERIEDF
                   AND A.NROSERIEECF = B.NROSERIEECF
                   AND A.NROEMPRESA = B.NROEMPRESA
                   AND A.MODELODF IN ('2D', '65')
                   AND A.STATUSDF = 'V'
                   AND B.STATUSITEM = 'V'
                   AND A.NROEMPRESA IN (1, 2, 4, 5, 9)
                   AND A.DTAMOVIMENTO BETWEEN '$datainicial' AND '$datafinal'
                 GROUP BY A.DTAMOVIMENTO, A.NROEMPRESA) TBMFLDOCTOFISCAL,
               (SELECT A.NROEMPRESA,
                       A.DTAEMISSAO,
                       SUM(B.VLRTOTAL - B.VLRDESCONTO + B.VLRACRESCIMOS) VLRFISCAL,
                       'FISCAL'
                  FROM RF_NOTAMESTRE A, RF_NOTAITEM B
                 WHERE A.SEQNOTA = B.SEQNOTA
                   AND A.CODMODELO = '65'
                   AND A.NROEMPRESA IN (1, 2, 4, 5, 9)
                   AND a.DTAEMISSAO BETWEEN '$datainicial' AND '$datafinal'
                   and a.dtacancelamento is null
                 GROUP BY A.NROEMPRESA, A.DTAEMISSAO) TBFISCAL,
               (SELECT A.NROEMPRESA,
                       A.DTAEMISSAO,
                       SUM(B.VLRTOTAL - B.VLRDESCONTO + B.VLRACRESCIMOS) VLRFISCAL,
                       'FISCALAUX'
                  FROM RF_AUXNOTAMESTR A, RF_AUXNOTAITEM B
                 WHERE A.SEQNOTA = B.SEQNOTA
                   AND A.CODSITDOC = 0
                   AND A.CODMODELO = '65'
                   and a.Nroempresa IN (1, 2, 4, 5, 9)
                   AND a.DTAEMISSAO BETWEEN '$datainicial' AND '$datafinal'
                 GROUP BY A.NROEMPRESA, A.DTAEMISSAO) TBFISCALAUX,
               (SELECT a.Nroempresa,
                       a.Dtamovimento,
                       SUM(a.Total) -
                       (SELECT NVL(SUM(b.Valor), 0)
                          FROM Fi_Tsmovtoopedetalhe b
                         WHERE a.Nroempresa = b.Nroempresa
                           AND a.Dtamovimento = b.Dtamovimento
                           AND b.Codmovimento IN (4, 10)) Vlr_Tesouraria
                  FROM Fi_Tsmovtooperador a
                 WHERE a.Nroempresa IN (1, 2, 4, 5, 9)
                   AND a.Dtamovimento BETWEEN '$datainicial' AND '$datafinal'
                 GROUP BY a.Dtamovimento, A.NROEMPRESA) TBTESOURARIA
         WHERE TBDOCTONFCE.NROEMPRESA = TBMFLDOCTOFISCAL.NROEMPRESA(+)
           AND TBDOCTONFCE.DTAMOVIMENTO = TBMFLDOCTOFISCAL.DTAMOVIMENTO(+)
           AND TBMFLDOCTOFISCAL.NROEMPRESA = TBFISCAL.NROEMPRESA(+)
           AND TBMFLDOCTOFISCAL.DTAMOVIMENTO = TBFISCAL.DTAEMISSAO(+)
           AND TBMFLDOCTOFISCAL.NROEMPRESA = TBFISCALAUX.NROEMPRESA(+)
           AND TBMFLDOCTOFISCAL.DTAMOVIMENTO = TBFISCALAUX.DTAEMISSAO(+)
           AND TBDOCTONFCE.NROEMPRESA = TBTESOURARIA.NROEMPRESA(+)
           AND TBDOCTONFCE.DTAMOVIMENTO = TBTESOURARIA.DTAMOVIMENTO(+)
           AND TBDOCTONFCE.DTAMOVIMENTO BETWEEN '$datainicial' AND '$datafinal'
         ORDER BY 1, 2) VENDA
 WHERE (VENDA.FISCAL_AUX <> 0 OR VENDA.DIF_PDV_ABC <> 0 OR
       VENDA.DIF_ABC_FISCAL <> 0 OR VENDA.DIF_PDV_TES <> 0)";
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

?>

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

                    <form action='#'>
                        <label style="font-size:12px;">DATA INICIAL:&nbsp; </label>
                        <input type='date' name='datainicial' id='datainicial'
                            style='font-size: 12px; width:160px;height:30px;'>&nbsp;
                        <label style="font-size:12px;">DATA FINAL:&nbsp; </label>
                        <input type='date' name='datafinal' id='datafinal'
                            style='font-size: 12px; width:160px;height:30px;'>&nbsp;
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-search"></i>
                            PESQUISAR
                        </button>
                        <a href="consinco-fechamento.php" class="btn btn-info btn-sm">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                            LIMPAR
                        </a>
                        &nbsp;&nbsp;
                    </form>
                </div>
            </div>
        </header>
        <?php if(isset($_GET['datainicial'])) { ?>
        <div class="card">
            <div class="card-body">
                <h3>CONSULTA VENDAS POR LOJA</h3>
                <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style='font-size:12px;text-align:center;'>LOJA</th>
                            <th style='font-size:12px;text-align:center;'>DTAMOVIMENTO</th>
                            <th style='font-size:12px;text-align:center;'>VLR_PDV</th>
                            <th style='font-size:12px;text-align:center;'>VLR_ABC</th>
                            <th style='font-size:12px;text-align:center;'>FISCAL</th>
                            <th style='font-size:12px;text-align:center;'>VLR_TES</th>
                            <th style='font-size:12px;text-align:center;'>FISCAL_AUX</th>
                            <th style='font-size:12px;text-align:left;'>DIF_PDV_ABC</th>
                            <th style='font-size:12px;text-align:center;'>DIF_ABC_FISCAL</th>
                            <th style='font-size:12px;text-align:center;'>DIF_PDV_TES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   
                                    if(!oci_execute($stmt)){
                                        $e = oci_error($con);
                                        throw new Exception("Erro ao executar consulta - " . $e['message']);
                                        oci_close($con);

                                     }else{ 
                                          while (($row = oci_fetch_assoc($stmt)) != false) { ?>
                        <tr>
                            <td style='font-size:12px;text-align:center;'><?php echo $row['LOJA']; ?></td>
                            <td style='font-size:12px;text-align:center;'><?php echo $row['DTAMOVIMENTO']; ?></td>
                            <td style='font-size:12px;text-align:center;'><?php echo $row['VLR_PDV']; ?></td>
                            <td style='font-size:12px;text-align:center;'><?php echo $row['VLR_ABC']; ?></td>
                            <td style='font-size:12px;text-align:center;'><?php echo $row['FISCAL']; ?></td>
                            <td style='font-size:12px;text-align:center;'><?php echo $row['VLR_TES']; ?></td>
                            <td style='font-size:12px;text-align:center;'><?php echo $row['FISCAL_AUX']; ?></td>
                            <td style='font-size:12px;text-align:left;'><?php echo $row['DIF_PDV_ABC']; ?></td>
                            <td style='font-size:12px;text-align:center;'><?php echo $row['DIF_ABC_FISCAL']; ?></td>
                            <td style='font-size:12px;text-align:center;'><?php echo $row['DIF_PDV_TES']; ?></td>
                        </tr>
                        <?php } } ?>
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