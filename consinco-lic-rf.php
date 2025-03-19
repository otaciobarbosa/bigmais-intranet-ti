<?php
 include 'conexao-consinco.php';
 include 'query-consinco-lic-rf.php';
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <?php $title = 'Licenças RF'; ?>
    <?php include 'custom/head.php'; ?>
</head>

<body class="container-fluid">
    <?php include 'custom/navbar.php'; ?>
    <div class="card">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Total em uso:<span class="badge"><?php echo $totalEmUso; ?>/24</span></h4>
        </div>
        <div class="card-body">
            <table id="sessionsTable" class="table table-striped table-bordered">
                <thead class="table-dark">

                    <tr>
                        <th>LOGON_TIME</th>
                        <th>CLIENT_INFO </th>
                        <th>CLIENT_IDENTIFIER</th>
                        <th>TEMPO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while (($row = oci_fetch_assoc($stmt)) != false) { ?>
                    <tr>
                        <td><?php echo $row['LOGON_TIME']; ?></td>
                        <td><?php echo $row['CLIENT_INFO']; ?></td>
                        <td><?php echo $row['CLIENT_IDENTIFIER']; ?></td>
                        <td><?php echo $row['TEMPO']; ?></td>
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