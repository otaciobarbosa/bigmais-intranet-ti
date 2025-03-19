<?php 
 include 'conexao.php'; 
 $query = 'SELECT * FROM pdv_doctofidelidade f 
            WHERE f.seqdocto IN 
            (SELECT seqdocto FROM (select a.seqdocto,
             a.codparceiro,
             min(dtahorinsercao),
             max(dtahorinsercao),
             count(1)
            from pdv_doctofidelidade a
            group by a.seqdocto, a.codparceiro
            having count(1) > 1) c)
            order by f.seqdocto DESC';         
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
                            <th>SEQDOCTO</th>
                            <th>CODPARCEIRO</th>
                            <th>SEQPESSOA</th>
                            <th>CNPJCPF</th>
                            <th>DESCPARCEIRO</th>
                            <th>CODCLIENTE</th>
                            <th>FONE</th>
                            <th>DTAHORINSERCAO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                     
                        while (($row = oci_fetch_assoc($stmt)) != false) {
                        echo "<tr>";                  
                            echo "<td>" . $row['SEQDOCTO'] . "</td>";
                            echo "<td>" . $row['CODPARCEIRO'] . "</td>";
                            echo "<td>" . $row['SEQPESSOA'] . "</td>";
                            echo "<td>" . $row['CNPJCPF'] . "</td>";
                            echo "<td>" . $row['DESCPARCEIRO'] . "</td>";
                            echo "<td>" . $row['CODCLIENTE'] . "</td>";
                            echo "<td>" . $row['FONE'] . "</td>";
                            echo "<td>" . $row['DTAHORINSERCAO'] . "</td>";
                            
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