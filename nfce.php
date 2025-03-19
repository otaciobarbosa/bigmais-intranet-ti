<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>
<?php
include 'data/conexao.php';
$data = $_GET['data'];
$loja = $_GET['loja'];
$pdv  = $_GET['pdv'];
$cupom  = $_GET['nfce'];
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
                        <label style="font-size:12px;">DATA:&nbsp; </label>
                        <input type='date' name='data' id='data'
                            style='font-size: 12px; width:160px;height:30px;'>&nbsp;


                        <select id='loja' name='loja' style="font-size: 12px;height:30px;">
                            <option value='0'>LOJA</option>
                            <?php
				 			$qloja = "SELECT codigo_loja,bairro FROM loja WHERE codigo_loja < 99";
				 			$resultloja  = mysqli_query($conn, $qloja);
                            if (mysqli_num_rows($resultloja) > 0) {
                            while($rowloja = mysqli_fetch_assoc($resultloja)) {
								echo "<option value='".$rowloja["codigo_loja"]."'>".$rowloja["bairro"]."</option>";
							}
						}
                            ?>
                        </select>&nbsp;

                        <select id='pdv' name='pdv' style="font-size: 12px;height:30px;">
                            <option value='0'>PDV</option>
                            <?php
				 			$qpdv = "SELECT numero_pdv FROM pdv GROUP BY numero_pdv ORDER BY numero_pdv";
				 			$resultpdv  = mysqli_query($conn, $qpdv);
                            if (mysqli_num_rows($resultpdv) > 0) {
                            while($rowpdv = mysqli_fetch_assoc($resultpdv)) {
								echo "<option value='".$rowpdv["numero_pdv"]."'>".$rowpdv["numero_pdv"]."</option>";
							}
						}
                            ?>

                        </select>&nbsp;
                        <input type='text' name='nfce' id='nfce' placeholder="NFCE">
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-search"></i>
                            PESQUISAR
                        </button>
                        <a href="index.php" class="btn btn-info btn-sm">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                            LIMPAR
                        </a>
                        &nbsp;&nbsp;
                    </form>
                </div>
            </div>
        </header>
        <?php  if($_GET['loja'] !=''){ ?>
        <div class="card">
            <div class="card-body">
                <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style='text-align:center;'>LOJA</th>
                            <th style='text-align:center;'>PDV</th>
                            <th style='text-align:center;'>CUPOM</th>
                            <th style='text-align:center;'>NFCE</th>
                            <th style='text-align:center;'>CHAVE</th>
                            <th style='text-align:center;'>PROTOCOLO</th>
                            <th style='text-align:center;'>STATUSL</th>
                            <th style='text-align:center;'>MENSAGEM</th>
                            <th style='text-align:center;'>XML</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                                        if($cupom > 0 ){
                                        $where=" WHERE
									    num_loj = '$loja'
										AND num_pdv = '$pdv'
                                        AND num_lot = '$cupom'
                                        AND dat_hor_ems BETWEEN '$data 00:00:00'
										AND '$data 23:59:59'
										AND cod_sfz = '100'";
                                        }else{
                                        $where=" WHERE
											num_loj = '$loja'
										AND num_pdv = '$pdv'
                                        AND dat_hor_ems BETWEEN '$data 00:00:00'
										AND '$data 23:59:59'
										AND cod_sfz = '100'";
                                        }

										$nfce = "SELECT
										 num_loj   AS loja,
										  num_pdv  AS pdv,
										  num_nfc  AS cupom,
										  num_lot  AS nfce,
										  chv_acs  AS chave,
										  num_ptc  AS protocolo,
										  cod_sfz  AS status_sefaz,
										  msg_sfz  AS mensagem_sefaz,
										  xml_env,
										  xml_ret,
										  qrcode
										FROM
											mov_nfc" . $where;
											$resultnfce  = mysqli_query($conn, $nfce);
                        				    if (mysqli_num_rows($resultnfce) > 0) {
                        				    while($rownfce = mysqli_fetch_assoc($resultnfce)) {
                        				    ?>
                        <tr>
                            <td style='text-align:center;'>
                                <?php echo $rownfce["loja"]; ?>
                            </td>
                            <td style='text-align:center;'>
                                <?php echo $rownfce["pdv"]; ?>
                            </td>
                            <td style='text-align:center;'>
                                <?php echo $rownfce["cupom"]; ?>
                            </td>
                            <td style='text-align:center;'>
                                <?php echo $rownfce["nfce"]; ?>
                            </td>
                            <td style='text-align:center;'>
                                <?php echo $rownfce["chave"]; ?>
                            </td>
                            <td style='text-align:center;'>
                                <?php echo $rownfce["protocolo"]; ?>
                            </td>
                            <td style='text-align:center;'>
                                <?php echo $rownfce["status_sefaz"]; ?>
                            </td>
                            <td style='text-align:center;'>
                                <?php echo $rownfce["mensagem_sefaz"]; ?>
                            </td>

                            <td style='text-align:center;'>
                                <a class="btn btn-default"
                                    href="download.php?nfce=<?php echo $rownfce["nfce"]; ?>&data=<?php echo $data; ?>&loja=<?php echo $loja; ?>&pdv=<?php echo $pdv; ?>">
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                    XML
                                </a>
                            </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php } ?>
    </div>
    </div>
    <?php include 'custom/ads/footer.php'; ?>
</body>

</html>