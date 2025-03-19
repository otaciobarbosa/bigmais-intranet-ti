<?php 
 include 'conexao.php'; 
 $query = 'SELECT * FROM GE_LOGXML WHERE TRUNC(DTAREGISTRO) = TRUNC(SYSDATE)';         
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
                                <th>SEQLOG</th>
                                <th>DTAREGISTRO</th>
                                <th>DTAHORREGISTRO</th>
                                <th>OPERACAO</th>
                                <th>TABELA</th>
                                <th>CHAVE_PRIMARIA</th>
                                <th>CODUSUARIO</th>
                                <th>SEQUSUARIO</th>
                                <th>USUARIOBANCO</th>
                                <th>TERMINAL</th>
                                <th>MODULO</th>
                                <th>EXECUTAVEL</th>
                                <th>IP</th>
                                <!--<th>REGISTROXML</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php                     
                        while (($row = oci_fetch_assoc($stmt)) != false) {
                        echo "<tr>";                  
                            echo "<td>" . $row['SEQLOG'] . "</td>";
                            echo "<td>" . $row['DTAREGISTRO'] . "</td>";
                            echo "<td>" . $row['DTAHORREGISTRO'] . "</td>";
                            echo "<td>" . $row['OPERACAO'] . "</td>";
                            echo "<td>" . $row['TABELA'] . "</td>";
                            echo "<td>" . $row['CHAVE_PRIMARIA'] . "</td>";
                            echo "<td>" . $row['CODUSUARIO'] . "</td>";
                            echo "<td>" . $row['SEQUSUARIO'] . "</td>";
                            echo "<td>" . $row['USUARIOBANCO'] . "</td>";
                            echo "<td>" . $row['TERMINAL'] . "</td>";
                            echo "<td>" . $row['MODULO'] . "</td>";
                            echo "<td>" . $row['EXECUTAVEL'] . "</td>";
                            echo "<td>" . $row['IP'] . "</td>";
                            //echo "<td>" . $row['REGISTROXML'] . "</td>";
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