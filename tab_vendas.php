<?php
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
        
        while (($row = oci_fetch_assoc($stmt)) != false) {
            echo "<tr class='size'>";    
            
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
            
            
            echo "<td>" . $row['HORA'] . "</td>";
            echo "<td>" . $row['TOTAL'] . "</td>";
            echo "<td>" . gmdate('H:i:s', $row['ULTIMAVENDA']) . "</td>";
            if($row['ULTIMAVENDA'] >= 1800){echo "<td><img src='img/vermelha.png' style='width:40px;'></td>"; }else{ echo "<td><img src='img/verde.png' style='width:40px;'></td>";};
            echo "</tr>";
        };
        
        }catch(Exception $e){
        die("ERRO! Detalhes => " . $e->getMessage());
        oci_close($con);
    }
?>