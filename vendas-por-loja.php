<?php 
 include 'conexao.php'; 
 $query = 'SELECT * FROM OBV_VALIDA_VENDA_LOJA ORDER BY LOJA';         
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
                                <th>LOJA</th>
                                <th>HORA</th>
                                <th>CUPONS</th>
                                <th>INTEGRACAO</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php                     
                        while (($row = oci_fetch_assoc($stmt)) != false) {
                            echo "<tr>";                  
                            echo "<td>" . $row['LOJA'] . "</td>";
                            echo "<td>" . $row['HORA'] . "</td>";
                            echo "<td>" . $row['TOTAL'] . "</td>";
                            echo "<td>" . gmdate('H:i:s', $row['ULTIMAVENDA']) . "</td>";
                           if($row['ULTIMAVENDA'] >= 1800){
                               echo "<td><img src='img/vermelha.png' style='width:40px;'></td>"; 
                            }else{ 
                                echo "<td><img src='img/verde.png' style='width:40px;'></td>";
                            };
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