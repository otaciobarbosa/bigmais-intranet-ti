<?php
 include 'conexao-consinco.php';
 include 'query-consinco-lic-erp.php';
?>

<!doctype html>
<html lang="pt-br">

<head>
    <?php include 'head.php'; ?>
</head>

<body>
    <?php include 'nav.php'; ?>

    <div class="container-fluid">
        <div class="panel panel-default">
            <button type="button" class="btn btn-primary">Total em uso
                <span class="badge"><?php echo $totalEmUso; ?>/117</span>
            </button>
            <div class="panel-body" style="min-height:500px">
                <table id="painel" class="display">
                    <thead>
                        <tr>
                            <th>TERMINAL</th>
                            <th>OSUSER </th>
                            <th>IDSESSION</th>
                            <th>CODIGO_USUARIO</th>
                            <th>MODULOS_LOGADOS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while (($row = oci_fetch_assoc($stmt)) != false) { ?>
                        <tr>
                            <td><?php echo $row['TERMINAL']; ?></td>
                            <td><?php echo $row['OSUSER']; ?></td>
                            <td><?php echo $row['IDSESSION']; ?></td>
                            <td><?php echo $row['CODIGO_USUARIO']; ?></td>
                            <td><?php echo $row['MODULOS_LOGADOS']; ?></td>
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