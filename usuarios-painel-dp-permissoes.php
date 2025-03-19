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
}

$modulosQuery = "SELECT SEQMODULO, DESCRICAO FROM BIGMAIS.SSO_MODULE ORDER BY DESCRICAO";
$modulosStid = oci_parse($oraConn, $modulosQuery);
oci_execute($modulosStid);

$query = "SELECT m.SEQMODULO, m.MODULO, m.DESCRICAO 
          FROM bigmais.SSO_MODULE m, bigmais.SSO_MODULE_USER u 
          WHERE m.SEQMODULO = u.SEQMODULO 
          AND u.SEQUSUARIO = :usuario
          ORDER BY m.DESCRICAO";
$stid = oci_parse($oraConn, $query);
oci_bind_by_name($stid, ":usuario", $_GET['usuario']);
oci_execute($stid);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <?php $title = 'Usuarios Painel DP'; ?>
    <?php include 'custom/head.php'; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="container-fluid">
    <?php include 'custom/navbar.php'; ?>

    <a class="btn btn-info btn-sm" href='usuarios-painel-dp.php'>Voltar</a>

    <div class="card">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Usuário: <?php echo $_GET['usuario']; ?> - <?php echo $_GET['nome']; ?></h4>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center gap-2">
                <label for="moduloSelect" class="me-2 mb-0">Adicionar Módulo:</label>
                <select id="moduloSelect" class="form-control w-auto">
                    <option value="">Selecione um módulo</option>
                    <?php while ($modulo = oci_fetch_assoc($modulosStid)): ?>
                    <option value="<?= $modulo['SEQMODULO'] ?>"><?= $modulo['DESCRICAO'] ?></option>
                    <?php endwhile; ?>
                </select>
                <button id="addModulo" class="btn btn-success">Adicionar</button>
            </div>
            <hr>
            <table id="sessionsTable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>SEQMODULO</th>
                        <th>MODULO</th>
                        <th>DESCRICAO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = oci_fetch_assoc($stid)): ?>
                    <tr>
                        <td><?= $row['SEQMODULO'] ?></td>
                        <td><?= $row['MODULO'] ?></td>
                        <td><?= $row['DESCRICAO'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include 'custom/footer.php'; ?>

    <script>
    $(document).ready(function() {
        $("#addModulo").click(function() {
            var usuario = "<?= $_GET['usuario'] ?>";
            var seqModulo = $("#moduloSelect").val();

            if (seqModulo === "") {
                alert("Selecione um módulo para adicionar.");
                return;
            }

            $.post("usuarios-painel-dp-inserir-modulo.php", {
                usuario: usuario,
                seqModulo: seqModulo
            }, function(response) {
                console.log(response)
                alert(response);
                location.reload();
            });
        });
    });
    </script>
</body>

</html>

<?php
oci_free_statement($stid);
oci_free_statement($modulosStid);
oci_close($oraConn);
?>