<?php
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$where = "WHERE DATE(c.data) = CURRENT_DATE AND MONTH(c.data) = MONTH(NOW()) AND YEAR(c.data) = YEAR(NOW())";

if (isset($_GET['inicio']) && !empty($_GET['inicio']) && isset($_GET['final']) && !empty($_GET['final'])) {
    $inicio = mysqli_real_escape_string($conn, $_GET['inicio']);
    $final = mysqli_real_escape_string($conn, $_GET['final']);
    $where = "WHERE DATE(c.data) BETWEEN '$inicio' AND '$final'";
}

$sql = "SELECT 
            DATE_FORMAT(date(c.data),'%d/%m/%Y') as data,
            c.codigo_pre_venda,
            c.numero_pedido,
            c.codigo_loja,
            i.sequencia,
            i.codigo_produto,
            i.preco_produto,
            i.quantidade,
            i.descricao,
            c.cod_fin_dav AS usuario,
            c.nome AS order_id,
            c.situacao,
            CASE 
                WHEN c.situacao = 0 THEN 'cinza'
                WHEN c.situacao = 1 THEN 'verde'
                WHEN c.situacao = 5 THEN 'vermelha'
                ELSE 'azul'
            END AS status
        FROM concentrador.pre_venda c
        INNER JOIN concentrador.produtos_pre_venda i 
            ON c.codigo_loja = i.codigo_loja
            AND c.codigo_pre_venda = i.codigo_pre_venda
             $where
              ORDER BY c.data ASC";

$conn->set_charset("utf8mb4");
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}


?>
