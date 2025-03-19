<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>
<?php
    include 'conexao-socin.php';
    include 'query-socin-pre-vendas.php';
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <?php $title = 'Pré-Vendas'; ?>
    <?php include 'custom/head.php'; ?>
</head>

<body class="container-fluid">
    <?php include 'custom/navbar.php'; ?>
    <div class="card">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Pré-Vendas</h4>
        </div>
        <div class="card-body">

            <form class="form-inline" action="socin-pre-vendas.php" method="GET">
                <div class="form-group">
                    <label for="inicio">INICIO:</label>
                    <input type="date" class="form-control" id="inicio" name="inicio">
                </div>
                <div class="form-group">
                    <label for="final">FINAL:</label>
                    <input type="date" class="form-control" id="final" name="final">
                </div>
                <button type="submit" class="btn btn-default">PESQUISAR</button>
            </form>

            <table id="sessionsTable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>DATA</th>
                        <th>LOJA</th>
                        <th>CODIGO</th>
                        <th>PEDIDO</th>
                        <th>SEQ</th>
                        <th>COD PRODUTO</th>
                        <th>DESCRICAO</th>
                        <th>QUANT</th>
                        <th>PRECO</th>
                        <th>USUARIO</th>
                        <th>ORDER</th>
                        <th>SIT</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['data']; ?></td>
                        <td><?php echo $row['codigo_loja']; ?></td>
                        <td><?php echo $row['codigo_pre_venda']; ?></td>
                        <td><?php echo $row['numero_pedido']; ?></td>
                        <td><?php echo $row['sequencia']; ?></td>
                        <td><?php echo $row['codigo_produto']; ?></td>
                        <td><?php echo $row['descricao']; ?></td>
                        <td><?php echo $row['quantidade']; ?></td>
                        <td><?php echo $row['preco_produto']; ?></td>
                        <td><?php echo $row['usuario']; ?></td>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['situacao']; ?></td>
                        <td><?php 
                                echo "<img src='img/".$row['status'].".png' style='width:20px'>"; ?></td>
                    </tr>
                    <?php  }; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

    <?php include 'custom/footer.php'; ?>
</body>

</html>