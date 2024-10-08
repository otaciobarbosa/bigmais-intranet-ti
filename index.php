<?php 
$urlIntegracaoVendas = "http://192.168.0.210/painel/integracao_vendas.php";
$urlDuplicidadePdvDocto = "http://192.168.0.210/painel/duplicidade_pdv_docto.php";
$urlVendaLojaDia = "http://192.168.0.210/painel/venda_loja_dia.php";
$urlJobs = "http://192.168.0.210/painel/jobs.php"; 

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/@mui/material@5.0.0-beta.2/dist/material-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>

    <div class="navbar">
        <span class="material-icons">dashboard</span>
    </div>
        <div class="panel-grid">
    <div class="panel">
        <h3>VENDAS TOTAIS POR LOJA</h3>
        <div class="table-container">
            <table class="custom-table">
                <thead>
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

        <div class="panel">
        <div class="card-grid">
            <?php 
            $classes = ['card-1', 'card-2', 'card-3', 'card-4', 'card-5', 'card-6']; // Classe dos cartões
            foreach ($dataIntegracaoVendas as $index => $loja): 
                $cardClass = $classes[$index % count($classes)];
            ?>
            <div class="card <?php echo $cardClass; ?>" >
                <table>
                    <tbody>
                        <tr>
                            <th>EMPRESA</th>
                            <td><?php echo $loja['NROEMPRESA']; ?></td>
                        </tr>
                        <tr>
                            <th>TOTAL SOCIN</th>
                            <td><?php echo $loja['SOCIN_TOTAL']; ?></td>
                        </tr>
                        <tr>
                            <th>TOTAL PDV DOCTO</th>
                            <td><?php echo $loja['PDV_DOCTO_TOTAL']; ?></td>
                        </tr>
                        <tr>
                            <th>TOTAL ABC</th>
                            <td><?php echo $loja['COMERCIAL_TOTAL']; ?></td>
                        </tr>
                        <tr>
                            <th>DIFF PDVDOCTO x SOCIN</th>
                            <td><?php echo $loja['PDVDOCTO_SOCIN']; ?></td>
                        </tr>
                        <tr>
                            <th>DIFF PDVDOCTO x COMERCIAL</th>
                            <td><?php echo $loja['PDVDOCTO_COMERCIAL']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <?php endforeach; ?>
        </div>
        </div>

    <div class="panel">
        <h3>VENDAS COM MAIS DE UMA LINHA NA PDV DOCTO</h3>
        <div class="table-container">
            <table class="custom-table">
                <thead>
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

    <div class="panel">
        <h3>JOB'S</h3>
        <div class="table-container">
            <table class="custom-table">
                <thead>
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
</div>

        </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.body.style.opacity = 1;
        });
    </script>

</body>
</html>
