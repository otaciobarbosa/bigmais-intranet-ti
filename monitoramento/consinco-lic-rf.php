<?php
 include 'conexao-consinco.php';
 include 'query-consinco-lic-rf.php';
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
                <span class="badge"><?php echo $totalEmUso; ?>/24</span>
            </button>
            <div class="panel-body" style="min-height:500px">
                <table id="painel" class="display">
                    <thead>
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

    <?php include 'footer.php'; ?>
</body>

</html>