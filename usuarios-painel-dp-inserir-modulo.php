<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $oraServername = "192.168.0.245/bigmais";
    $oraUsername   = "consinco";
    $oraPassword   = "consinco";
    $oraPorta      = "1521";

    $oraConn = oci_connect($oraUsername, $oraPassword, "$oraServername:$oraPorta");

    if (!$oraConn) {
        $e = oci_error();
        die("Erro na conexão: " . $e['message']);
    }

    $usuario = $_POST['usuario'];
    $seqModulo = $_POST['seqModulo'];

    // Verifica se o usuário já tem esse módulo
    $checkQuery = "SELECT COUNT(*) AS EXISTE FROM BIGMAIS.SSO_MODULE_USER WHERE SEQUSUARIO = :usuario AND SEQMODULO = :seqModulo";
    $checkStid = oci_parse($oraConn, $checkQuery);
    oci_bind_by_name($checkStid, ":usuario", $usuario);
    oci_bind_by_name($checkStid, ":seqModulo", $seqModulo);
    oci_execute($checkStid);
    $row = oci_fetch_assoc($checkStid);

    if ($row['EXISTE'] > 0) {
        echo "O usuário já possui esse módulo.";
    } else {
        // Faz o INSERT
        $insertQuery = "INSERT INTO BIGMAIS.SSO_MODULE_USER (SEQUSUARIO, SEQMODULO) VALUES (:usuario, :seqModulo)";
        $insertStid = oci_parse($oraConn, $insertQuery);
        oci_bind_by_name($insertStid, ":usuario", $usuario);
        oci_bind_by_name($insertStid, ":seqModulo", $seqModulo);

        if (oci_execute($insertStid)) {
            echo "Módulo adicionado com sucesso!";
        } else {
            $e = oci_error($insertStid);
            echo "Erro ao inserir: " . $e['message'];
        }

        oci_free_statement($insertStid);
    }

    oci_free_statement($checkStid);
    oci_close($oraConn);
}
?>