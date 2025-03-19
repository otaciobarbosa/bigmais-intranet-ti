<?php
    $usuario ='consinco';
    $senha = 'consinco';
    $host = '192.168.0.245/bigmais';
    $porta = '1521';
    
    $oracle = 'SELECT 
				P.NROEMPRESA AS LOJA,
				ROUND((SYSDATE - MAX(P.DTAHORAEMISSAO)) * 60 * 60 * 24) AS ULTIMAVENDA,
				TO_CHAR(MAX(P.DTAHORAEMISSAO), \'HH24:MI:SS\') AS HORA,
				SYSDATE AS HORAAGORA,
				MAX(P.DTAHORAEMISSAO) AS HORAVENDA,
				TO_CHAR(
					NUMTODSINTERVAL(SYSDATE - MAX(P.DTAHORAEMISSAO), \'DAY\'), 
					\'HH24:MI:SS\'
				) AS INTEGRACAO,
				COUNT(*) AS TOTAL
			FROM 
				PDV_DOCTO P
			WHERE 
				P.DTAMOVIMENTO = TRUNC(SYSDATE)
			GROUP BY 
				P.NROEMPRESA
			ORDER BY 
				P.NROEMPRESA';
    
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
            echo "<tr class='size' style='padding:5px;line-height:10px;vertical-align:middle;text-align:left;'>";    
            
            switch ($row['LOJA']) {
                
                case 1:
                echo "<td style='font-size:0.9em !important;vertical-align:middle;padding-top:10px;text-align:left;'>Loja 1 - Jardim Pérola </td>";
                break;
                
                case 2:
                echo "<td style='font-size:0.9em !important;vertical-align:middle;padding-top:10px;text-align:left;'>Loja 2 - Treze de Maio </td>";
                break; 
                
                case 4:
                echo "<td style='font-size:0.9em !important;vertical-align:middle;padding-top:10px;text-align:left;'>Loja 4 - Lagoa Santa   </td>";
                break;	
                
                case 5:
                echo "<td style='font-size:0.9em !important;vertical-align:middle;padding-top:10px;text-align:left;'>Loja 5 - Altinópolis   </td>";
                break;	
                
                case 8:
                echo "<td style='font-size:0.9em !important;vertical-align:middle;padding-top:10px;text-align:left;'>Loja 8 - Vila Isa      </td>";
                break;	
                
                case 9:
                echo "<td style='font-size:0.9em !important;vertical-align:middle;padding-top:10px;text-align:left;'>Loja 9 - São Pedro     </td>";
                break;			
            }	
            
			$Integracao = str_replace('+000000000','', $row['INTEGRACAO']);
			$Integracao = str_replace('-000000000','', $Integracao);
			$Integracao = str_replace('.000000000','', $Integracao);
            
            echo "<td style='font-size:0.9em !important;vertical-align:middle;padding-top:10px;'>" . $row['HORA'] . "</td>";
            echo "<td style='font-size:0.9em !important;vertical-align:middle;padding-top:10px;'>" . $row['TOTAL'] . "</td>";
            echo "<td style='font-size:0.9em !important;vertical-align:middle;padding-top:10px;'>" . $Integracao. "</td>";
            if($row['HORAVENDA'] >= 1800){echo "<td style='padding:0px;'><img src='img/vermelha.png' style='width:30px;'></td>"; }else{ echo "<td><img src='img/verde.png' style='width:40px;'></td>";};
            echo "</tr>";
        };
        
        }catch(Exception $e){
        die("ERRO! Detalhes => " . $e->getMessage());
        oci_close($con);
    }
?>