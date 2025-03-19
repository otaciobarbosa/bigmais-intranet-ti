<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <title>PAINEL DE MONITORAMENTO</title>
    <meta http-equiv="refresh" content="10">
    <style>
     body {
            background: linear-gradient(to bottom, #000000, #333333);
        }
    </style>
  </head>
  <body >

<?php
include 'conexao.php';

$sql = "SELECT
            id,
            sistema,
            protocolo,
            url,
            porta,
            CONCAT(protocolo, '://', url, ':', porta) AS rota
        FROM
            monitoramento_aplicativos
        WHERE monitoramento_status = '1'
         order by status asc";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erro na consulta SQL: " . mysqli_error($conn));
}
?>

<table class="table table-dark">
  <thead>
    <tr>
      <th style="font-size:25px" cope="col">URL</th>
      <th style="font-size:25px" cope="col">PORTA</th>
      <th style="font-size:25px" cope="col">SISTEMA</th>
      <th style="font-size:25px; text-align:center;" cope="col"><img src='img/cinza.png' style='width:35px;'></th>
    </tr>
  </thead>
  <tbody>
<?php 
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response = @file_get_contents($row["rota"]);

        echo "<tr style='font-size:25px'>";
        echo "<th style='font-size:25px'>".$row["url"]."</th>";
        echo "<th style='font-size:25px'>".$row["porta"]."</th>";
        echo "<th style='font-size:25px'>".$row["sistema"]."</th>";
        echo "<th style='font-size:25px; text-align:center;'>";

        if ($response !== false) {
            $updateSql = "UPDATE monitoramento_aplicativos SET status = '1' WHERE id = " . $row["id"];
            if (mysqli_query($conn, $updateSql)) {
                echo "<img src='img/verde.png' style='width:50px;'></td>";
            } else {
                echo "<br><li> Erro ao atualizar o status para a rota do sistema " . $row["sistema"] . ": " . mysqli_error($conn) . PHP_EOL  . "</li>";
            }
        } else {
            $updateSql = "UPDATE monitoramento_aplicativos SET status = '0' WHERE id = " . $row["id"];
            if (mysqli_query($conn, $updateSql)) {
                echo "<img src='img/vermelha.png' style='width:50px;'></td>";
            } else {
                echo "<br><li> Erro ao atualizar o status para a rota do sistema " . $row["sistema"] . ": " . mysqli_error($conn) . PHP_EOL  . "</li>";
            }
        }
        echo "</th>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
  </body>
</html>