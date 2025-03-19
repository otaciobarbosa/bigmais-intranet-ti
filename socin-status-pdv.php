<!DOCTYPE html>
<html lang="pt">

<head>
    <?php $title = 'Socin Status PDV'; ?>
    <?php include 'custom/head.php'; ?>
    <style>
    .status-green {
        color: green;
        font-size: 1.5rem;
    }

    .status-red {
        color: red;
        font-size: 1.5rem;
    }
    </style>
</head>

<body class="container-fluid">
    <?php include 'custom/navbar.php'; ?>

    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Status dos PDVs</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="pdvTable" class="table table-striped table-bordered">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Número Loja</th>
                            <th>Número PDV</th>
                            <th>IP PDV</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                $servername = "192.168.0.251";
                $username = "root";
                $password = "bigmais.123";
                $dbname = "concentrador";

                $conn = mysqli_connect($servername, $username, $password, $dbname);

                if (!$conn) {
                    die("<tr><td colspan='4' class='text-danger'>Erro de conexão: " . mysqli_connect_error() . "</td></tr>");
                }

                $sql = "SELECT ip_pdv, numero_pdv, codigo_loja FROM pdv";
                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die("<tr><td colspan='4' class='text-danger'>Erro na consulta SQL: " . mysqli_error($conn) . "</td></tr>");
                }

                function ping($ip) {
                    $pingResult = exec("ping -c 1 -W 1 $ip", $output, $status);
                    return $status === 0;
                }

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $ip = $row["ip_pdv"];
                        $pingStatus = ping($ip);
                        $statusIcon = $pingStatus
                            ? "<span class='status-green'>&#9679;</span>"
                            : "<span class='status-red'>&#9679;</span>";

                        echo "<tr>
                                <td>{$row['codigo_loja']}</td>
                                <td>{$row['numero_pdv']}</td>
                                <td>{$row['ip_pdv']}</td>
                                <td>$statusIcon</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Nenhum dado encontrado</td></tr>";
                }
                mysqli_close($conn);
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include 'custom/footer.php'; ?>
    <script>
    setTimeout(function() {
        location.reload();
    }, 60000);
    </script>
</body>

</html>