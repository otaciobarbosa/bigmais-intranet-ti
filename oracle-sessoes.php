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

// Finalizar sessão Oracle
if (isset($_POST['sid']) && isset($_POST['serial'])) {
    $sid = $_POST['sid'];
    $serial = $_POST['serial'];
    
    $killQuery = "ALTER SYSTEM KILL SESSION '$sid,$serial' IMMEDIATE";
    $killStmt = oci_parse($oraConn, $killQuery);
    
    if (oci_execute($killStmt)) {
        echo "<script>alert('Sessão $sid finalizada com sucesso!');</script>";
    } else {
        $e = oci_error($killStmt);
        echo "<script>alert('Erro ao finalizar sessão: " . $e['message'] . "');</script>";
    }
}

// Consulta Oracle
$query = "SELECT SID, SERIAL#, USERNAME, MACHINE, PROGRAM, CLIENT_IDENTIFIER, STATUS FROM V\$SESSION";
$stid = oci_parse($oraConn, $query);
oci_execute($stid);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <?php $title = 'Sessões Ativas'; ?>
    <?php include 'custom/head.php'; ?>
</head>

<body class="container-fluid">
    <?php include 'custom/navbar.php'; ?>

    <div class="card">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Sessões Ativas no Oracle</h4>
            <button id="clearSearch" class="btn btn-warning btn-sm">Limpar Pesquisa</button>
        </div>
        <div class="card-body">
            <table id="sessionsTable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>SID</th>
                        <th>SERIAL#</th>
                        <th>USERNAME</th>
                        <th>MACHINE</th>
                        <th>PROGRAM</th>
                        <th>CLIENT IDENTIFIER</th>
                        <th>STATUS</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = oci_fetch_assoc($stid)): ?>
                    <tr>
                        <td><?= $row['SID'] ?></td>
                        <td><?= $row['SERIAL#'] ?></td>
                        <td><?= $row['USERNAME'] ?></td>
                        <td><?= $row['MACHINE'] ?></td>
                        <td><?= $row['PROGRAM'] ?></td>
                        <td><?= $row['CLIENT_IDENTIFIER'] ?></td>
                        <td><?= $row['STATUS'] ?></td>
                        <td>
                            <form method="POST"
                                onsubmit="return confirm('Tem certeza que deseja finalizar a sessão <?= $row['SID'] ?>?');">
                                <input type="hidden" name="sid" value="<?= $row['SID'] ?>">
                                <input type="hidden" name="serial" value="<?= $row['SERIAL#'] ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Finalizar</button>
                            </form>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function() {
        var table = $('#sessionsTable').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
            },
            stateSave: true,
            initComplete: function() {

                var search = localStorage.getItem('datatable_search');
                if (search) {
                    table.search(search).draw();
                    $('#sessionsTable_filter input').val(search);
                }
            }
        });

        $('#sessionsTable_filter input').on('input', function() {
            localStorage.setItem('datatable_search', $(this).val());
        });

        $('#clearSearch').click(function() {
            table.search('').draw();
            $('#sessionsTable_filter input').val('');
            localStorage.removeItem('datatable_search');
        });
    });
    </script>
</body>

</html>

<?php
oci_free_statement($stid);
oci_close($oraConn);
?>