<?php 
 include 'conexao.php'; 
 $query = 'SELECT * FROM GE_LOGWEB WHERE TRUNC(DATA) = TRUNC(SYSDATE)';         
 if(!$stmt = oci_parse($con,$query)){
   $e = oci_error($stmt);
   throw new Exception("Erro ao preparar consulta - " . $e['message']);
   oci_close($con);
 }             
 if(!oci_execute($stmt)){
   $e = oci_error($con);
   throw new Exception("Erro ao executar consulta - " . $e['message']);
   oci_close($con);
 }
?>
<!DOCTYPE html>
<html lang="pt-br" translate="no">
<head>
 <?php include 'head.php'; ?>
 <meta http-equiv="refresh" content="10">
</head>
<body>
    <div class="container-fluid">
        <?php include 'navbar.php'; ?>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="table" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>SEQLOGWEB</th>
                                <th>NROEMPRESA</th>
                                <th>SEQAPLICACAO</th>
                                <th>SEQUSUARIO</th>
                                <th>TABELA</th>
                                <th>IP</th>
                                <th>DATA</th>
                                <th>SEQLOGACAO</th>
                                <th>CHAVEAFETADA</th>
                                <!--<th>DESCRICAO</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php                     
                        while (($row = oci_fetch_assoc($stmt)) != false) {
                        echo "<tr>";                  
                            echo "<td>" . $row['SEQLOGWEB'] . "</td>";
                            echo "<td>" . $row['NROEMPRESA'] . "</td>";
                            echo "<td>" . $row['SEQAPLICACAO'] . "</td>";
                            echo "<td>" . $row['SEQUSUARIO'] . "</td>";
                            echo "<td>" . $row['TABELA'] . "</td>";
                            echo "<td>" . $row['IP'] . "</td>";
                            echo "<td>" . $row['DATA'] . "</td>";
                            echo "<td>" . $row['SEQLOGACAO'] . "</td>";
                            echo "<td>" . $row['CHAVEAFETADA'] . "</td>";
                            //echo "<td>" . $row['DESCRICAO'] . "</td>";
                        echo "</tr>";
                        };
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>