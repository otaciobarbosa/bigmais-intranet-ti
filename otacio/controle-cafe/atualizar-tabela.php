<?php
$filial = $_GET['filial'];
$conexao = mysqli_connect("192.168.0.210", "root", "bigmais.123", "controle_cafe");

$query_select = "SELECT chapa, DATE_FORMAT(entrada, '%d/%m/%Y %H:%i:%s') AS entrada_formatada, TIMESTAMPDIFF(SECOND, entrada, NOW()) AS tempo_cafe_segundos FROM registros_cafe WHERE status = 1 and filial = '$filial'";
$resultado = mysqli_query($conexao, $query_select);

echo "<thead>";
echo "<tr>";
echo "<th style='text-align:center;'></th>";
echo "<th style='text-align:center;'>Chapa</th>";
echo "<th style='text-align:center;'>Data/Hora de Entrada</th>";
echo "<th style='text-align:center;'>Tempo no Café (min:seg)</th>";
echo "<th style='text-align:center;'>Status</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while ($row = mysqli_fetch_assoc($resultado)) {
    $tempo_cafe_minutos = floor($row['tempo_cafe_segundos'] / 60);
    $tempo_cafe_segundos = $row['tempo_cafe_segundos'] % 60;

    $classe_status = '';
    if ($tempo_cafe_minutos <= 9) {
        $classe_status = 'bg-success';
    } elseif ($tempo_cafe_minutos <= 15) {
        $classe_status = 'bg-warning';
    } else {
        $classe_status = 'bg-danger';
    }

    $bolinha_html = "<div class='status-dot $classe_status'></div>";

    echo "<tr>";
    echo "<td style='text-align:center;'>
        <img src='http://192.168.0.210/intra/sistemas/do/getfoto.php?chapa=".$row['chapa']."' style='width:45px'>
    </td>";
    echo "<td style='text-align:center;vertical-align:middle;'>{$row['chapa']}</td>";
    echo "<td style='text-align:center;vertical-align:middle;'>{$row['entrada_formatada']}</td>";
    echo "<td style='text-align:center;vertical-align:middle;'>{$tempo_cafe_minutos}:{$tempo_cafe_segundos}</td>";
    echo "<td style='text-align:center;vertical-align:middle;'>$bolinha_html</td>";
    echo "</tr>";
}

echo "</tbody>";

mysqli_close($conexao);
?>
