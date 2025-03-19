<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>
<?php
 include 'conexao-consinco.php';
 include 'query-oracle-processos.php';
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <?php $title = 'Bem Vindo!'; ?>
    <?php include 'custom/head.php'; ?>
</head>

<body class="container-fluid">
    <?php include 'custom/navbar.php'; ?>

    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Processos Oracle</h4>
        </div>
        <div class="card-body">
            <table id="sessionsTable" class="table table-striped table-bordered">
                <thead class="table-dark">
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
					         echo "<td><img src='img/vermelha.png' style='height:30px;'></td>"; 
					         }else if($tempo < 6000 && $tempo >= 600){
					         echo "<td><img src='img/amarelo.png' style='height:30px;'></td>";
					         }else{
					         echo "<td><img src='img/verde.png' style='height:30px;'></td>";
					         };
                            ?>
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