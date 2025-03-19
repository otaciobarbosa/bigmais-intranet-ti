<?php
header("Refresh: 5");

try {
    $oraServername = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.0.245)(PORT = 1521))(CONNECT_DATA = (SERVER = DEDICATED)(SERVICE_NAME = bigmais)))";
    $oraUsername = "consinco";
    $oraPassword = "consinco";

    $oraConn = oci_connect($oraUsername, $oraPassword, $oraServername);

    if (!$oraConn) {
        $e = oci_error();
        throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e['message']);
    }

    $stmt = oci_parse($oraConn, "SELECT to_char(A.DTAMOVIMENTO, 'DD/MM/YYYY') AS DTAMOVIMENTO,
                                        NVL(count(B.SEQDOCTO), 0) AS DOCTOFID
                                    FROM pdv_docto a
                                    LEFT JOIN pdv_doctofidelidade b
                                     on a.seqdocto = b.seqdocto
                                    LEFT join mfl_doctofiscal c
                                     on c.numerodf = nvl(a.numeronf, a.numerodf)
                                    AND c.seriedf = nvl(a.serienf, a.seriedf)
                                    AND c.nroempresa = a.nroempresa
                                    AND c.nroserieecf =
                                        decode(a.nroserieecf,
                                               'NF',
                                               'NF',
                                               a.nroserieecf || to_char(a.dtamovimento, 'yymmdd'))
                                    LEFT join mfl_doctofidelidade f
                                     on c.seqnf = f.seqnf
                                    where a.dtamovimento between trunc(SYSDATE,'MM') and trunc(SYSDATE)-1
                                    GROUP BY A.DTAMOVIMENTO
                                    ORDER BY A.DTAMOVIMENTO");
                                    
    if (!$stmt) {
        $e = oci_error($oraConn);
        throw new Exception("Erro ao preparar consulta - " . $e['message']);
    }

    if (!oci_execute($stmt)) {
        $e = oci_error($stmt);
        throw new Exception("Erro ao executar consulta - " . $e['message']);
    }

    $data_series = array();
    $nroempresa_series = array();
    $doctofid_series = array();
    $mflfid_series = array();

    while (($row = oci_fetch_assoc($stmt)) != false) {
        $data_series[]     = $row['DTAMOVIMENTO'];
        $doctofid_series[] = $row['DOCTOFID'];
        $mflfid_series[]   = $row['MFLFID'];
    }

    oci_free_statement($stmt);
    oci_close($oraConn);
} catch (Exception $e) {
    die("ERRO! Detalhes => " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integração Docto Fidelidade</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
    @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Quicksand&display=swap');

    html {
        background-image: url(img/fundo.png);
        background-size: cover;
        padding: 0.5%;
        overflow: hidden;
    }

    h3 {
        font-family: 'Lora', sans-serif;
        font-weight: 700;
        font-style: normal;
        font-size: 20x;
        line-height: 1.15;
        letter-spacing: -.02em;
        color: rgba(0, 0, 0, 0.8);
        -webkit-font-smoothing: antialiased;
        padding-top:20px;

    .panel-default {
        box-shadow: #000 3px 3px 2px;
        height: 95vh
    }
    </style>
</head>

<body>
    <div style="text-align:center">
        <h3>INTEGRAÇÃO DOCTO FIDELIDADE</h3>
    </div>
    <div id="chart"></div>
    <script>
    var categories = <?php echo json_encode($data_series); ?>;
    var dataDocto  = <?php echo json_encode($doctofid_series); ?>;
    var dataMFL    = <?php echo json_encode($mflfid_series); ?>;

    

    var options = {
        series: [{
            name: 'DOCTOFID',
            data: dataDocto
        }],
        chart: {
            type: 'bar',
            height: 500,
            toolbar: {
                show: true
            },
            zoom: {
                enabled: true
            }
        },
        plotOptions: {
            horizontal: false,
            columnWidth: '60%',
            endingShape: 'rounded'
        },
        dataLabels: {
            enabled: false,
            orientation: 'horizontal'
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: categories
        },
        legend: {
            position: 'top',
            offsetY: 40
        },
        fill: {
            opacity: 1
        },
        tooltip: {
            y: {
                formatter: function(val) {
                    return 'Total: ' + val + " Cupons"
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
    </script>
</body>

</html>