<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>
<?php
 include 'conexao-consinco.php';
 include 'query-consinco-lic-erp.php';
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <?php $title = 'Licenças ERP'; ?>
    <?php include 'custom/head.php'; ?>
</head>

<body class="container-fluid">
    <?php include 'custom/navbar.php'; ?>
    <div class="card">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0"> Total em uso:<span class="badge"><?php echo $totalEmUso; ?>/117</span>
            </h4>
        </div>
        <div class="card-body">
            <table id="sessionsTable" class="table table-striped table-bordered">
                <thead class="table-dark">

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
    <?php include 'custom/footer.php'; ?>
</body>

</html>