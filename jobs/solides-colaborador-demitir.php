<?php
$ip = "192.168.0.203";
$porta = "1433";
$banco = "CORPORERM";
$usuario = "sa";
$senha = "bm0721rq@";
$conexao = new PDO("odbc:Driver={FreeTDS}; Server=$ip; Port=$porta; Database=$banco; UID=$usuario; PWD=$senha;");

$FuncionarioDemitir = $conexao->query("SELECT
CONVERT(varchar, FUN.DATADEMISSAO, 103) as DATADEMISSAO,
FUN.CHAPA,
PES.CPF,
FUN.NOME,
FUN.MOTIVODEMISSAO,
FUN.TIPODEMISSAO,
UPPER(MD.DESCRICAO) AS DESCRICAOFORM,
REPLACE(UPPER(DP.DESCRICAOSLD), '_', ' ') AS DECISAO,
CPL.CODSOLIDES AS id,
FUN.DATADEMISSAO AS dateDismissal,
DP.DESCRICAOSLD AS decisionDismissal,
MD.SOLIDES AS formDismissal,
( SELECT CODSOLIDES FROM OBVSLDMOTIVODEMISSAO where CODTOTVS = FUN.MOTIVODEMISSAO ) AS reasonDismissalId,
(SELECT TOTAL_CALCULADO
	FROM OBV_VALORES_RESCISAO
		WHERE CHAPA = FUN.CHAPA) AS terminationAmount
  FROM PFUNC AS FUN
  INNER JOIN PPESSOA AS PES ON PES.CODIGO = FUN.CODPESSOA
  INNER JOIN PFCOMPL AS CPL ON FUN.CHAPA  = CPL.CHAPA AND FUN.CODCOLIGADA = CPL.CODCOLIGADA
  LEFT JOIN ZMDSLDMOTIVODEMISSAODEPARA AS DP ON DP.CODIGORM = FUN.TIPODEMISSAO
  LEFT JOIN ZMDSLDMOTIVODEMISSAO AS MD ON MD.CODIGO = DP.CODIGOSLD
    WHERE FUN.DATADEMISSAO >= '2023-08-01'
      AND (FUN.MOTIVODEMISSAO IS NULL OR FUN.MOTIVODEMISSAO <> '08')
      AND FUN.CODCOLIGADA = '1'
      and CPL.CODSOLIDES > 0");
  
    while ($rowFuncionarioDemitir = $FuncionarioDemitir->fetch(PDO::FETCH_ASSOC)) {   
      include 'solides.config.php';

      $curl = curl_init();
      
      $url = $host . 'colaboradores/' . $rowFuncionarioDemitir["id"] . '/demitir';
           
      $data = array(
          "dateDismissal" => date("Y-m-d", strtotime($rowFuncionarioDemitir["dateDismissal"])),
          "formDismissal" => $rowFuncionarioDemitir["formDismissal"],
          "decisionDismissal" => $rowFuncionarioDemitir["decisionDismissal"],
          "reasonDismissalId" => $rowFuncionarioDemitir["reasonDismissalId"],
          "terminationAmount" => $rowFuncionarioDemitir["terminationAmount"]
      );
            
      $body = json_encode($data);
      
      curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $body,
          CURLOPT_HTTPHEADER => array(
              'Content-Type: application/json', 
              'Authorization: ' . $token
          ),
      ));
      
      $response = curl_exec($curl);
      
      curl_close($curl);
      
      $data = json_decode($response, true);
    }      
?>