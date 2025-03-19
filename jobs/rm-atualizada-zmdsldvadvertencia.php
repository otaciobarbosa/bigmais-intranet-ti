<?php
try {
    $ip = "192.168.0.203";
    $porta = "1433";
    $banco = "CORPORERM";
    $usuario = "sa";
    $senha = "bm0721rq@";
    $conexao = new PDO("odbc:Driver={FreeTDS}; Server=$ip; Port=$porta; Database=$banco; UID=$usuario; PWD=$senha;");

    $queryLimpaTabelaIntegracao = "TRUNCATE TABLE ZMDSLDVADVERTENCIA";
    $limpaTabelaIntegracao = $conexao->query($queryLimpaTabelaIntegracao);

    $queryAtualizaAdvertencia = "INSERT INTO ZMDSLDVADVERTENCIA SELECT * FROM VADVERTENCIA";
    $atualizaAdvertencia = $conexao->query($queryAtualizaAdvertencia);

}
catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

$conexao = null;
?>
