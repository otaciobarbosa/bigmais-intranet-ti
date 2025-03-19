<?php 
$urlDuplicidadePdvDocto = "http://192.168.0.210/suporte/painel-vendas-duplicidade-pdv-docto-painel.php";
$urlJobs = "http://192.168.0.210/suporte/painel-vendas-jobs.php"; 
$urlSchedulers = "http://192.168.0.210/suporte/painel-vendas-schedulers.php"; 

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

$dataDuplicidadePdvDocto = getDataFromApi($urlDuplicidadePdvDocto);
$dataJobs = getDataFromApi($urlJobs); 
if (!is_array($dataJobs)) {
    $dataJobs = []; 
}
$dataSchedulers = getDataFromApi($urlSchedulers); 
if (!is_array($dataSchedulers)) {
    $dataSchedulers = []; 
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <?php $title = 'Painel de Vendas'; ?>
    <?php include 'custom/head.php'; ?>
    <meta http-equiv="refresh" content="10">
</head>

<body class="container-fluid">
    <div class="container-fluid">
        <div class="panel-grid">
            <div class="panel">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mt-3">
                            <div
                                class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> JOBS</h4>
                            </div>
                            <div class="card-body" style="min-height:340px">
                                <div class="table-container">
                                    <table class="table table-striped table-bordered">
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
                                                        $paradoColor = $job['PARADO'] == 'S' ? 'red' : 'green';
                                                        echo '<td style="text-align:center;"><span class="status-dot" style="background-color: ' . $paradoColor . ';"></span></td>';
                                                        $falhouColor = $job['FALHOU'] > 0 ? 'red' : 'green';
                                                        echo '<td style="text-align:center;"><span class="status-dot" style="background-color: ' . $falhouColor . ';"></span></td>';
                                                    
                                                        echo '</tr>';
                                                    }
                                                } else {
                                                    echo '<tr><td colspan="5">Nenhum job encontrado.</td></tr>';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mt-3">
                            <div
                                class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                                <h4 class="mb-0"> SCHEDULER'S</h4>
                            </div>
                            <div class="card-body" style="min-height:340px">
                                <div class="table-container">
                                    <table class="table table-striped table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th style="text-align:center;">ULTIMA EXECUÇÃO</th>
                                                <th style="text-align:center;">NOME</th>
                                                <th>STATUS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if (isset($dataSchedulers) && is_array($dataSchedulers)) {
                                                    foreach ($dataSchedulers as $scheduler) {
                                                        echo '<tr>';
                                                        echo '<td style="text-align:center;">' . $scheduler['LAST_RUN'] . '</td>';
                                                        echo '<td style="text-align:center;">' . $scheduler['JOB_NAME'] . '</td>';
                                                        $statusColor = $scheduler['STATUS'] == 'OK' ? 'green' : 'red';
                                                        echo '<td style="text-align:center;"><span class="status-dot" style="background-color: ' . $statusColor . ';"></span></td>';
                                                        echo '</tr>';
                                                    }
                                                } else {
                                                    echo '<tr><td colspan="3">Nenhum scheduler encontrado.</td></tr>';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">

                        <div class="card mt-3">
                            <div
                                class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                                <h4 class="mb-0">VENDAS COM MAIS DE UMA LINHA NA PDV DOCTO</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-container">
                                    <table class="table table-striped table-bordered">
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
                                            <tr
                                                style="<?php echo ($item['QUANTIDADE'] > 2) ? 'background-color: #ff3340;' : ''; ?>">
                                                <td style="text-align:center;font-weight: bold;">
                                                    <?php echo $item['NROEMPRESA']; ?></td>
                                                <td style="text-align:center;"><?php echo $item['NUMERODF']; ?></td>
                                                <td style="text-align:center;"><?php echo $item['NROCHECKOUT']; ?></td>
                                                <td style="text-align:center;"><?php echo $item['QUANTIDADE']; ?></td>
                                                <td style="text-align:center;">
                                                    <?php echo $item['MIN_DTAHORAINSERCAO']; ?></td>
                                                <td style="text-align:center;">
                                                    <?php echo $item['MAX_DTAHORAINSERCAO']; ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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