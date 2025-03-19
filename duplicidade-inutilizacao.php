<?php 
 include 'conexao.php'; 
 $query = 'SELECT *
             FROM MLF_NFINUTILIZACAO I
             WHERE I.NROEMPRESA || I.ANO || I.SERIENF || I.NRINICIALNF IN
               (SELECT O.NROEMPRESA || O.ANO || O.SERIENF || O.NRINICIALNF AS NF
                  FROM MLF_NFINUTILIZACAO O
                    GROUP BY O.NROEMPRESA, O.ANO, O.SERIENF, O.NRINICIALNF
                     HAVING COUNT(1) > 1)';         
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
                            <th>SEQ</th>
                            <th>FILIAL</th>
                            <th>ANO</th>
                            <th>SERIENF</th>
                            <th>NF</th>
                            <th>JUSTIFICATIVA</th>
                            <th>DTAINUTILIZACAO</th>
                            <th>USUINCLUSAO</th>
                            <th>DTAINCLUSAO</th>
                            <th>MODELODF</th>
                            <th>SEQINUTILIZACAOPDV</th>
                            <th>NROCHECKOUT</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php                     
                        while (($row = oci_fetch_assoc($stmt)) != false) {
                        echo "<tr>";                  
                             echo "<td>" . $row['SEQINUTILIZACAO'] . "</td>";
                             echo "<td>" . $row['NROEMPRESA'] . "</td>";
                             echo "<td>" . $row['ANO'] . "</td>";
                             echo "<td>" . $row['SERIENF'] . "</td>";
                             echo "<td>" . $row['NRINICIALNF'] . "</td>";
                             echo "<td>" . $row['JUSTIFICATIVA'] . "</td>";
                             echo "<td>" . $row['DTAINUTILIZACAO'] . "</td>";
                             echo "<td>" . $row['USUINCLUSAO'] . "</td>";
                             echo "<td>" . $row['DTAINCLUSAO'] . "</td>";
                             echo "<td>" . $row['MODELODF'] . "</td>";
                             echo "<td>" . $row['SEQINUTILIZACAOPDV'] . "</td>";
                             echo "<td>" . $row['NROCHECKOUT'] . "</td>";

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