<?php
try {
    $mssql_ip = "192.168.0.203";
    $mssql_porta = "1433";
    $mssql_banco = "CORPORERM";
    $mssql_usuario = "sa";
    $mssql_senha = "bm0721rq@";
    $mssql_conexao = new PDO("odbc:Driver={FreeTDS}; Server=$mssql_ip; Port=$mssql_porta; Database=$mssql_banco; UID=$mssql_usuario; PWD=$mssql_senha;");
    $cadastroFuncionarios = "SELECT FILIAL, COLIGADA, CHAPA, SECAO, NSECAO, SITUACAO, FUNCAO, NOME, TELEFONE, CPF, SEXO, MOTIVODEMISSAO, CODPESSOA FROM VWFUNC  WHERE situacao <> 'D'";
    $funcionariosCadastrados = $mssql_conexao->query($cadastroFuncionarios);

    $oracle_usuario ='consinco';
    $oracle_senha = 'consinco';
    $oracle_host = '192.168.0.245/bigmais';
    $oracle_porta = '1521';

    if (!$con = oci_connect($oracle_usuario, $oracle_senha, "$oracle_host:$oracle_porta")) {
        $e = oci_error();
        throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e['message']);
    }

    $limpaTabela = "TRUNCATE TABLE BIGMAIS.APPS_PESSOA_RM";
    $stmtLimpar = oci_parse($con, $limpaTabela);
    if (!oci_execute($stmtLimpar)) {
        $e = oci_error($con);
        throw new Exception("Erro ao limpar a tabela - " . $e['message']);
    }

    $funcionariosInsert = "INSERT INTO BIGMAIS.APPS_PESSOA_RM (FILIAL, COLIGADA, CHAPA, SECAO, NSECAO, SITUACAO, FUNCAO, NOME, TELEFONE, CPF, SEXO, MOTIVODEMISSAO, CODPESSOA) 
                        VALUES (:filial, :coligada, :chapa, :secao, :nsecao, :situacao, :funcao, :nome, :telefone, :cpf, :sexo, :motivodemissao, :codpessoa)";

    $stmt = oci_parse($con, $funcionariosInsert);

    foreach ($funcionariosCadastrados as $funcionario) {
        oci_bind_by_name($stmt, ':filial', $funcionario['FILIAL']);
        oci_bind_by_name($stmt, ':coligada', $funcionario['COLIGADA']);
        oci_bind_by_name($stmt, ':chapa', $funcionario['CHAPA']);
        oci_bind_by_name($stmt, ':secao', $funcionario['SECAO']);
        oci_bind_by_name($stmt, ':nsecao', $funcionario['NSECAO']);
        oci_bind_by_name($stmt, ':situacao', $funcionario['SITUACAO']);
        oci_bind_by_name($stmt, ':funcao', $funcionario['FUNCAO']);
        oci_bind_by_name($stmt, ':nome', $funcionario['NOME']);
        oci_bind_by_name($stmt, ':telefone', $funcionario['TELEFONE']);
        oci_bind_by_name($stmt, ':cpf', $funcionario['CPF']);
        oci_bind_by_name($stmt, ':sexo', $funcionario['SEXO']);
        oci_bind_by_name($stmt, ':motivodemissao', $funcionario['MOTIVODEMISSAO']);
        oci_bind_by_name($stmt, ':codpessoa', $funcionario['CODPESSOA']);

        if (!oci_execute($stmt)) {
            $e = oci_error($con);
            throw new Exception("Erro ao executar consulta - " . $e['message']);
        }
    }

    echo "Dados inseridos com sucesso.";

    $mssql_conexao = null;
    oci_close($con);
} catch (Exception $e) {
    die("ERRO! Detalhes => " . $e->getMessage());
    $mssql_conexao = null;
    oci_close($con);
}
?>
