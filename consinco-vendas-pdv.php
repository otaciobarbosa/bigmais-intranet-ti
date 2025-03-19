<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>
<?php
 include 'conexao-consinco.php';
 $usuario ='consinco';
 $senha = 'consinco';
 $host = '192.168.0.245/bigmais';
 $porta = '1521';

 $oracle = 'SELECT * FROM OBV_VALIDA_VENDA_LOJA ORDER BY LOJA';

 try{

     if(!$con = oci_connect($usuario,$senha,"$host:$porta")){
         $e = oci_error();
         throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e['message']);
         oci_close($con);
     } 

     if(!$stmt = oci_parse($con,$oracle)){
         $e = oci_error($stmt);
         throw new Exception("Erro ao preparar consulta - " . $e['message']);
         oci_close($con);
     }

     if(!oci_execute($stmt)){
         $e = oci_error($con);
         throw new Exception("Erro ao executar consulta - " . $e['message']);
         oci_close($con);
     }

     }catch(Exception $e){
     die("ERRO! Detalhes => " . $e->getMessage());
     oci_close($con);
 }?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <?php $title = 'Vendas PDV'; ?>
    <?php include 'custom/head.php'; ?>
</head>

<body class="container-fluid">
    <?php include 'custom/navbar.php'; ?>

    <div class="card">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Vendas PDV</h4>
        </div>
        <div class="card-body">
            <table id="sessionsTable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>LOJA</th>
                        <th style='text-align:center'>HORA</th>
                        <th style='text-align:center'>CUPONS</th>
                        <th style='text-align:center'>TEMPO</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    
                         while (($row = oci_fetch_assoc($stmt)) != false) {
                            echo "<tr class='size' style='padding:5px;line-height:10px;'>";    
                        
                            switch ($row['LOJA']) {
                            
                                case 1:
                                echo "<td>Loja 1 - Jardim Pérola</td>";	
                                break;
                                
                                case 2:
                                echo "<td>Loja 2 - Treze de Maio</td>";	
                                break; 
                                
                                case 4:
                                echo "<td>Loja 4 - Lagoa Santa</td>";	
                                break;	
                                
                                case 5:
                                echo "<td>Loja 5 - Altinópolis</td>";	;	
                                break;	
                                
                                case 8:
                                echo "<td>Loja 8 - Vila Isa</td>";	;	
                                break;	
                                
                                case 9:
                                echo "<td>Loja 9 - São Pedro</td>";	
                                break;			
                            }	
                        
                        
                            echo "<td style='text-align:center'>" . $row['HORA'] . "</td>";
                            echo "<td style='text-align:center'>" . $row['TOTAL'] . "</td>";
                            echo "<td style='text-align:center'>" . gmdate('H:i:s', $row['ULTIMAVENDA']) . "</td>";
                            if($row['ULTIMAVENDA'] >= 1800){echo "<td style='padding:0px;text-align:center'><img src='img/vermelha.png' style='width:30px;'></td>"; }else{ echo "<td><img src='img/verde.png' style='width:40px;'></td>";};
                            echo "</tr>";
                        };

                     ?>
        </div>
    </div>
    </div>

    <?php include 'custom/footer.php'; ?>
</body>

</html>