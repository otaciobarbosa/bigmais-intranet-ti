<?php
function verificaColaboradorExitesSolides($cpf){

  include 'solides.config.php';
  
    $curl = curl_init();
    $url = $host.'colaboradores/existe/'. $cpf;
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => $url, 
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_HTTPHEADER => array(
        'Accept: application/json',
        'Authorization: '.$token
      ),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);

    $data = json_decode($response, true);
    
    if ($data !== null && isset($data['id'])) {
        $solides = $data['id'];
    } else {
        $solides = null;
    }
    
    return $solides;
}

$ip = "192.168.0.203";
$porta = "1433";
$banco = "CORPORERM";
$usuario = "sa";
$senha = "bm0721rq@";
$conexao = new PDO("odbc:Driver={FreeTDS}; Server=$ip; Port=$porta; Database=$banco; UID=$usuario; PWD=$senha;");

$funcionariosSemCodigo = $conexao->query("SELECT
                                            FUN.CHAPA,
                                            PES.CPF,
                                            CODSOLIDES
                                              FROM PFUNC AS FUN
                                                INNER JOIN PPESSOA AS PES ON PES.CODIGO = FUN.CODPESSOA
                                                INNER JOIN PFCOMPL AS CPL ON CPL.CHAPA = FUN.CHAPA AND CPL.CODCOLIGADA = FUN.CODCOLIGADA
                                                WHERE (FUN.CODSITUACAO <> 'D' OR FUN.DATADEMISSAO >= '2023-09-01')
                                                AND LEN(FUN.CHAPA) <= 6
                                                AND FUN.CODCOLIGADA = 1
                                                AND (CPL.CODSOLIDES IS NULL OR TYPE_NAME(CODSOLIDES) = 'void type')");

    while ($rowFuncionariosSemCodigo = $funcionariosSemCodigo->fetch(PDO::FETCH_ASSOC)) {

       $ip = "192.168.0.203";
       $porta = "1433";
       $banco = "CORPORERM";
       $usuario = "sa";
       $senha = "bm0721rq@";
       $conexao = new PDO("odbc:Driver={FreeTDS}; Server=$ip; Port=$porta; Database=$banco; UID=$usuario; PWD=$senha;");


       $chapa = $rowFuncionariosSemCodigo["CHAPA"];
       $cpf   = $rowFuncionariosSemCodigo["CPF"];
       $solides = verificaColaboradorExitesSolides($cpf);
    
       $query = "UPDATE PFCOMPL SET CODSOLIDES = '$solides' WHERE CHAPA = '$chapa' AND CODCOLIGADA = 1";
       $cadastra = $conexao->query($query);

       $conexao = null;
    }      
?>