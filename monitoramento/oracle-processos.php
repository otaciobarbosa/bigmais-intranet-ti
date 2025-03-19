<?php
 include 'conexao-consinco.php';
 include 'query-oracle-processos.php';
?>

<!doctype html>
<html lang="pt-br">

<head>
    <?php include 'head.php'; ?>
    <meta http-equiv="refresh" content="30; url=oracle-processos.php">
</head>

<body>
    <?php include 'nav.php'; ?>
    
    <div class="container-fluid">
        <div class="panel panel-default">
            <div class="panel-body" style="min-height:500px">
                <table id="painel" class="display">
                    <thead>
                        <tr>
                            <th>SID </th>
                            <th>PROGRAM</th>
                            <th>USERNAME</th>
                            <th>MACHINE</th>
                            <th>TIME</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while (($row = oci_fetch_assoc($stmt)) != false) { 
                            $data_logon = $row['LOGON_TIME'];  
                            $tempo = $row['LOGON_TIME'];	  
                        ?>
                        <tr>
                            <td><?php echo $row['SID']; ?></td>
                            <td><?php echo $row['PROGRAM']; ?></td>
                            <td><?php echo $row['USERNAME']; ?></td>
                            <td><?php echo $row['MACHINE']; ?></td>
                            <td><?php echo gmdate('H:i:s', $data_logon); ?></td>
                            <?php 
                            if($tempo >= 6000){
					         echo "<td><img src='../img/vermelha.png' style='height:30px;'></td>"; 
					         }else if($tempo < 6000 && $tempo >= 600){
					         echo "<td><img src='../img/amarelo.png' style='height:30px;'></td>";
					         }else{
					         echo "<td><img src='../img/verde.png' style='height:30px;'></td>";
					         };
                            ?>
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