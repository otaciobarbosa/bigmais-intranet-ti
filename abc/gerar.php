<?php
$usuario ='consinco';
$senha = 'consinco';
$host = '192.168.0.245/bigmais';
$porta = '1521'; 

  $pasta = 'filtros/';
  $file = "filtro.txt";
  $arquivos = scandir($pasta);
  $numeroDeArquivos = count($arquivos) - 2;

  if($numeroDeArquivos > 0){
    $periodo = file_get_contents($pasta.$file);
    $periodo_array = explode("\n", $periodo);
    foreach($periodo_array as $periodo_item) {                       
     $prow = explode("-", $periodo_item);
     $fmes = $prow[0]; 
     $fano = $prow[1];                
     try {
        if (!$con = oci_connect($usuario, $senha, "$host:$porta")) {
            $e = oci_error();
            throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e['message']);
            oci_close($con);
        }
    
        if (!$stmt = oci_parse($con, "SELECT * from OBV_ABCDISTRIBBASE WHERE ANO = '$fano' AND MES = '$fmes'")) {
            $e = oci_error($stmt);
            throw new Exception("Erro ao preparar consulta - " . $e['message']);
            oci_close($con);
        }
    
        if (!oci_execute($stmt)) {
            $e = oci_error($con);
            throw new Exception("Erro ao executar consulta - " . $e['message']);
            oci_close($con);
        }

        $csvFile = fopen('downloads/'.$periodo_item.'.csv', 'w');
        $header = array_keys(oci_fetch_assoc($stmt));
        fputcsv($csvFile, $header, ';');
        while (($row = oci_fetch_assoc($stmt)) != false) {
            fputcsv($csvFile, $row, ';');
        }
        fclose($csvFile);
        unlink($pasta.$file);
    
    } catch (Exception $e) {
        die("ERRO! Detalhes => " . $e->getMessage());
        oci_close($con);
    }
    }
  }

?>