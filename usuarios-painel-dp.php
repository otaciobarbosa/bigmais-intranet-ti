<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>
<?php 
$oraServername = "192.168.0.245/bigmais";
$oraUsername   = "consinco";
$oraPassword   = "consinco";
$oraPorta      = "1521";

if (!$oraConn = oci_connect($oraUsername, $oraPassword, "$oraServername:$oraPorta")) {
    $e = oci_error();
    throw new Exception("Erro ao conectar ao servidor: " . $e['message']);
    oci_close($oraConn);
}

$query = "SELECT SEQUSUARIO,UPPER(CODUSUARIO) AS  CODUSUARIO , NOME FROM CONSINCO.GE_USUARIO ORDER BY NOME";
$stid = oci_parse($oraConn, $query);
oci_execute($stid);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <?php $title = 'Usuarios Painel DP  '; ?>
    <?php include 'custom/head.php'; ?>
</head>

<body class="container-fluid">
    <?php include 'custom/navbar.php'; ?>

    <div class="card">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Usuarios</h4>
        </div>
        <div class="card-body">
            <table id="sessionsTable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>SEQUSUARIO</th>
                        <th>CODUSUARIO</th>
                        <th>NOME</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = oci_fetch_assoc($stid)): ?>
                    <tr>
                        <td><?= $row['SEQUSUARIO'] ?></td>
                        <td><?= $row['CODUSUARIO'] ?></td>
                        <td><?= $row['NOME'] ?></td>
                        <td width='50'>
                            <a type="submit" class="btn btn-success btn-sm"
                                href="usuarios-painel-dp-permissoes.php?usuario=<?= $row['SEQUSUARIO'] ?>&nome=<?= $row['NOME'] ?>">Permissões</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include 'custom/footer.php'; ?>
</body>

</html>

<?php
oci_free_statement($stid);
oci_close($oraConn);
?>