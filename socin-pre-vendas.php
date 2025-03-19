<?php
    include 'conexao-socin.php';
    include 'query-socin-pre-vendas.php';
?>

<!doctype html>
<html lang="pt-br">

<head>
    <?php include 'head.php'; ?>
    <meta http-equiv="refresh" content="60; url=socin-pre-vendas.php">
</head>

<body>
    <?php include 'nav.php'; ?>

    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-body" style="min-height:500px">

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

                <table id="painel" class="display">
                    <thead>
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
                                echo "<img src='../img/".$row['status'].".png' style='width:20px'>"; ?></td>
                        </tr>
                        <?php  }; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>