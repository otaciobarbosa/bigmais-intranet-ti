<?php
try {
    $oraServername = "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.0.245)(PORT = 1521))(CONNECT_DATA = (SERVER = DEDICATED)(SERVICE_NAME = bigmais)))";
    $oraUsername = "consinco";
    $oraPassword = "consinco";

    $oraConn = oci_connect($oraUsername, $oraPassword, $oraServername);

    if (!$oraConn) {
        $e = oci_error();
        throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e['message']);
    }

    $stmt = oci_parse($oraConn, "SELECT to_char(A.DTAMOVIMENTO, 'DD') AS DTAMOVIMENTO,
                                        NVL(count(B.SEQDOCTO), 0) AS DOCTOFID
                                    FROM pdv_docto a
                                    LEFT JOIN pdv_doctofidelidade b
                                     on a.seqdocto = b.seqdocto
                                    LEFT join mfl_doctofiscal c
                                     on c.numerodf = nvl(a.numeronf, a.numerodf)
                                    AND c.seriedf = nvl(a.serienf, a.seriedf)
                                    AND c.nroempresa = a.nroempresa
                                    AND c.nroserieecf =
                                        decode(a.nroserieecf,
                                               'NF',
                                               'NF',
                                               a.nroserieecf || to_char(a.dtamovimento, 'yymmdd'))
                                    LEFT join mfl_doctofidelidade f
                                     on c.seqnf = f.seqnf
                                    where a.dtamovimento between trunc(SYSDATE,'MM') and trunc(SYSDATE)-1
                                    GROUP BY A.DTAMOVIMENTO
                                    ORDER BY A.DTAMOVIMENTO");
                                    
    if (!$stmt) {
        $e = oci_error($oraConn);
        throw new Exception("Erro ao preparar consulta - " . $e['message']);
    }

    if (!oci_execute($stmt)) {
        $e = oci_error($stmt);
        throw new Exception("Erro ao executar consulta - " . $e['message']);
    }

    $data_series = array();
    $nroempresa_series = array();
    $doctofid_series = array();
    $mflfid_series = array();

    while (($row = oci_fetch_assoc($stmt)) != false) {
        $data_series[]     = $row['DTAMOVIMENTO'];
        $doctofid_series[] = $row['DOCTOFID'];
    }

    oci_free_statement($stmt);
    oci_close($oraConn);
} catch (Exception $e) {
    die("ERRO! Detalhes => " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-br" translate="no">
<meta name="google" content="notranslate">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIG MAIS SUPERMERCADOS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <link rel="stylesheet" type="text/css" href="custom/custom.css" />
    <meta http-equiv="refresh" content="10">
</head>

<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body" style="height:300px">
                        <div id="chart"></div>
                        <script>
                        var categories = <?php echo json_encode($data_series); ?>;
                        var dataDocto = <?php echo json_encode($doctofid_series); ?>;

                        var options = {
                            series: [{
                                name: 'DOCTOFID',
                                data: dataDocto
                            }],
                            chart: {
                                type: 'bar',
                                height: 250,
                                width: 675,
                                toolbar: {
                                    show: true
                                },
                                zoom: {
                                    enabled: true
                                }
                            },
                            plotOptions: {
                                horizontal: false,
                                columnWidth: '60%',
                                endingShape: 'rounded'
                            },
                            dataLabels: {
                                enabled: false,
                                orientation: 'horizontal'
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ['transparent']
                            },
                            xaxis: {
                                categories: categories
                            },
                            legend: {
                                position: 'top',
                                offsetY: 40
                            },
                            fill: {
                                opacity: 1
                            },
                            tooltip: {
                                y: {
                                    formatter: function(val) {
                                        return 'Total: ' + val + " Cupons"
                                    }
                                }
                            }
                        };

                        var chart = new ApexCharts(document.querySelector("#chart"), options);
                        chart.render();
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body" style="height:300px">
					<div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th style="font-size:10px;">LOJA</th>
                                    <th style="font-size:10px;">HORA</th>
                                    <th style="font-size:10px;">CUPONS</th>
                                    <th style="font-size:10px;">INTEGRACAO</th>
                                    <th style="font-size:10px;">STATUS</th>
                                </tr>
                            </thead>
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
							echo "<tbody>"; 
					        while (($row = oci_fetch_assoc($stmt)) != false) {
					            echo "<tr>";    
							
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
					            if($row['ULTIMAVENDA'] >= 1800){echo "<td><img src='img/vermelha.png' style='width:30px;'></td>"; }else{ echo "<td><img src='img/verde.png' style='width:30px;'></td>";};
					            echo "</tr>";
					        };
						
					        }catch(Exception $e){
					        die("ERRO! Detalhes => " . $e->getMessage());
					        oci_close($con);
					    }
					?>
                            </tbody>
                        </table>
						</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body" style="height:300px">
					<div class="table-responsive">
                        <table class="table table-bordered table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>TEMPO</th>
                                    <th>SID</th>
                                    <th>PROCESSO</th>
                                    <th>PROGRAM</th>
                                    <th>USUARIO</th>
                                    <th>LOGIN</th>
                                    <th>COMANDO</th>
                                    <th>CONTA</th>
                                    <th>MÁQUINA</th>
                                    <th>OBJECT_NAME</th>
                                    <th>STATUS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
             $usuario ='consinco';
             $senha = 'consinco';
             $host = '192.168.0.245/bigmais';
             $porta = '1521';
             
             $oracle = "SELECT * FROM OBV_VALIDA_STATUS_ORACLE WHERE MACHINE NOT IN ('oracle') ORDER BY LOGON_TIME DESC";
 
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
                $data_logon = $row['LOGON_TIME'];
                echo "<tr>";                
                  echo "<td>" . gmdate('H:i:s', $data_logon) . "</td>";
                  echo "<td>" . $row['SID'] . "</td>";
                  echo "<td>" . $row['PROCESS'] . "</td>";
                  echo "<td>" . $row['PROGRAM'] . "</td>";
                  echo "<td>" . $row['USUARIO'] . "</td>";
                  echo "<td>" . $row['USERNAME'] . "</td>";
                  echo "<td>" . $row['COMMAND'] . "</td>";                  
                  echo "<td>" . $row['OSUSER'] . "</td>";                  
                  echo "<td>" . $row['MACHINE'] . "</td>";
                  echo "<td>" . $row['OBJECT_NAME'] . "</td>";
                  if($row['LOGON_TIME'] >= 600){echo "<td><img src='img/vermelha.png' style='width:30px;'></td>"; }else{ echo "<td><img src='img/verde.png' style='width:30px;'></td>";};
                echo "</tr>";
              };
          
            }catch(Exception $e){
              die("ERRO! Detalhes => " . $e->getMessage());
              oci_close($con);
            }
             ?>
                            </tbody>
                        </table>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>