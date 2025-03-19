<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>
<?php 
$urlIntegracaoVendas = "http://192.168.0.210/suporte/painel-vendas-integracao-vendas.php";
$urlDuplicidadePdvDocto = "http://192.168.0.210/suporte/painel-vendas-duplicidade-pdv-docto.php";
$urlVendaLojaDia = "http://192.168.0.210/suporte/painel-vendas-venda-loja-dia.php";
$urlJobs = "http://192.168.0.210/suporte/painel-vendas-jobs.php"; 

function getDataFromApi($url) {
    $response = @file_get_contents($url);
    
    if ($response === FALSE) {
        die('Erro ao acessar a URL: ' . $url);
    }
    
    $data = json_decode($response, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        die("Erro ao decodificar JSON: " . json_last_error_msg());
    }
    
    return $data;
}

$dataIntegracaoVendas = getDataFromApi($urlIntegracaoVendas);
$dataDuplicidadePdvDocto = getDataFromApi($urlDuplicidadePdvDocto);
$dataVendaLojaDia = getDataFromApi($urlVendaLojaDia);
$dataJobs = getDataFromApi($urlJobs); 
if (!is_array($dataJobs)) {
    $dataJobs = []; 
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <?php $title = 'Painel de Vendas'; ?>
    <?php include 'custom/head.php'; ?>
</head>

<body class="container-fluid">
    <?php include 'custom/navbar.php'; ?>

    <div class="card mt-3">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">JOB'S</h4>
        </div>
        <div class="card-body">
            <table id="sessionsTable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th style="text-align:center;">JOB</th>
                        <th style="text-align:center;">SETOR</th>
                        <th>TITULO</th>
                        <th style="text-align:center;">PARADO</th>
                        <th style="text-align:center;">FALHOU</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($dataJobs) && is_array($dataJobs)) {
                        foreach ($dataJobs as $job) {
                            echo '<tr>';
                            echo '<td style="text-align:center;">' . $job['JOB'] . '</td>';
                            echo '<td style="text-align:center;">' . $job['SETOR'] . '</td>';
                            echo '<td>' . $job['TITULO'] . '</td>';
                            echo '<td style="text-align:center;">' . $job['PARADO'] . '</td>';
                            echo '<td style="text-align:center;">' . $job['FALHOU'] . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="3">Nenhum job encontrado.</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">COMPARATIVO DE VENDAS</h4>
        </div>
        <div class="card-body">
            <table id="sessionsTable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th style="text-align:center;">EMPRESA</th>
                        <th style="text-align:center;">TOTAL SOCIN</th>
                        <th style="text-align:center;">TOTAL PDV DOCTO</th>
                        <th style="text-align:center;">TOTAL ABC</th>
                        <th style="text-align:center;">DIFF PDVDOCTO x SOCIN</th>
                        <th style="text-align:center;">DIFF PDVDOCTO x COMERCIAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataIntegracaoVendas as $loja): ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $loja['NROEMPRESA']; ?></td>
                        <td style="text-align:center;"><?php echo $loja['SOCIN_TOTAL']; ?></td>
                        <td style="text-align:center;"><?php echo $loja['PDV_DOCTO_TOTAL']; ?></td>
                        <td style="text-align:center;"><?php echo $loja['COMERCIAL_TOTAL']; ?></td>
                        <td style="text-align:center;"><?php echo $loja['PDVDOCTO_SOCIN']; ?></td>
                        <td style="text-align:center;"><?php echo $loja['PDVDOCTO_COMERCIAL']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">VENDAS COM MAIS DE UMA LINHA NA PDV DOCTO</h4>
        </div>
        <div class="card-body">
            <table id="sessionsTable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th style="text-align:center;">NROEMPRESA</td>
                        <th style="text-align:center;">NUMERODF</td>
                        <th style="text-align:center;">NROCHECKOUT</td>
                        <th style="text-align:center;">QUANTIDADE</td>
                        <th style="text-align:center;">MIN_DTAHORAINSERCAO</td>
                        <th style="text-align:center;">MAX_DTAHORAINSERCAO</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataDuplicidadePdvDocto as $item): ?>
                    <tr style="<?php echo ($item['QUANTIDADE'] > 2) ? 'background-color: #ff3340;' : ''; ?>">
                        <td style="text-align:center;font-weight: bold;"><?php echo $item['NROEMPRESA']; ?></td>
                        <td style="text-align:center;"><?php echo $item['NUMERODF']; ?></td>
                        <td style="text-align:center;"><?php echo $item['NROCHECKOUT']; ?></td>
                        <td style="text-align:center;"><?php echo $item['QUANTIDADE']; ?></td>
                        <td style="text-align:center;"><?php echo $item['MIN_DTAHORAINSERCAO']; ?></td>
                        <td style="text-align:center;"><?php echo $item['MAX_DTAHORAINSERCAO']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"> VENDAS TOTAIS POR LOJA</h4>
        </div>
        <div class="card-body">
            <table id="sessionsTable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th style="text-align:center;">LOJA</td>
                        <th style="text-align:center;">VLR PDV</td>
                        <th style="text-align:center;">VLR ABC</td>
                        <th style="text-align:center;">VLR FISCAL</td>
                        <th style="text-align:center;">VLR TES</td>
                        <th style="text-align:center;">DIF FISCAL AUX</td>
                        <th style="text-align:center;">DIF PDV ABC</td>
                        <th style="text-align:center;">DIF ABC FISCAL</td>
                        <th style="text-align:center;">DIF PDV TES</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dataVendaLojaDia as $item): ?>
                    <tr>
                        <td style="text-align:center;font-weight: bold;"><?php echo $item['LOJA']; ?></td>
                        <td style="text-align:center;"><?php echo $item['VLR_PDV']; ?></td>
                        <td style="text-align:center;"><?php echo $item['VLR_ABC']; ?></td>
                        <td style="text-align:center;"><?php echo $item['VLR_FISCAL']; ?></td>
                        <td style="text-align:center;"><?php echo $item['VLR_TES']; ?></td>
                        <td style="text-align:center;"><?php echo $item['DIF_FISCAL_AUX']; ?></td>
                        <td style="text-align:center;"><?php echo $item['DIF_PDV_ABC']; ?></td>
                        <td style="text-align:center;"><?php echo $item['DIF_ABC_FISCAL']; ?></td>
                        <td style="text-align:center;"><?php echo $item['DIF_PDV_TES']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include 'custom/footer.php'; ?>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.body.style.opacity = 1;
    });
    </script>

</body>

</html>