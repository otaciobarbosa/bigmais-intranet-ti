<?php 
$urlDuplicidadePdvDocto = "http://192.168.0.210/painel/duplicidade_pdv_docto_painel.php";
$urlJobs = "http://192.168.0.210/painel/jobs.php"; 
$urlSchedulers = "http://192.168.0.210/painel/schedulers.php"; 

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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="30">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@mui/material@5.0.0-beta.2/dist/material-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">


    <style>
    .status-dot {
        height: 15px;
        width: 15px;
        border-radius: 50%;
        display: inline-block;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="panel-grid">

            <div class="panel">

                <div class="row">
                    <div class="col-md-6">

                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <h3 style="display: flex; align-items: center;">
                                    <span class="material-icons" style="margin-right: 8px;">double_arrow</span>
                                    JOB'S
                                </h3>
                            </div>
                            <div class="panel-body" style="min-height:350px">

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

                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <h3 style="display: flex; align-items: center;">
                                    <span class="material-icons" style="margin-right: 8px;">double_arrow</span>
                                    SCHEDULER'S
                                </h3>
                            </div>
                            <div class="panel-body" style="max-height:350px">
                                <div class="table-container">
                                    <table class="custom-table">
                                        <thead>
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

                        <div class="panel panel-default">
                            <div class="panel-heading">

                                <h3 style="display: flex; align-items: center;">
                                    <span class="material-icons" style="margin-right: 8px;">double_arrow</span>
                                    VENDAS COM MAIS DE UMA LINHA NA PDV DOCTO
                                </h3>
                            </div>
                            <div class="panel-body">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.body.style.opacity = 1;
    });
    </script>

</body>

</html>