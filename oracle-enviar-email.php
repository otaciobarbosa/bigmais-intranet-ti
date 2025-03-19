<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <?php $title = 'Oracle Enviar E-mail'; ?>
    <?php include 'custom/head.php'; ?>
</head>

<body class="container-fluid">
    <?php include 'custom/navbar.php'; ?>

    <div class="card">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Oracle Enviar E-mail</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Destinatário</label>
                    <input type="email" name="destinatario" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Assunto</label>
                    <input type="text" name="assunto" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Mensagem</label>
                    <textarea name="mensagem" class="form-control" rows="4" required></textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    <?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $oraServername = "192.168.0.245/bigmais";
        $oraUsername   = "consinco";
        $oraPassword   = "consinco";
        $oraPorta      = "1521";

        $destinatario = $_POST['destinatario'];
        $assunto = $_POST['assunto'];
        $mensagem = $_POST['mensagem'];
        
        $oraConn = oci_connect($oraUsername, $oraPassword, "$oraServername:$oraPorta");
        if (!$oraConn) {
            $e = oci_error();
            die("Erro ao conectar: " . htmlentities($e['message']));
        }

        $sql = "DECLARE 
                    obj_param_smtp c5_tp_param_smtp;
                BEGIN 
                    obj_param_smtp := c5_tp_param_smtp(76);
                    sp_envia_email(obj_param      => obj_param_smtp,
                                   psDestinatario => :destinatario,
                                   psAssunto      => :assunto,
                                   psMensagem     => :mensagem,
                                   psindusahtml   => 'N');
                END;";

        $stmt = oci_parse($oraConn, $sql);
        oci_bind_by_name($stmt, ":destinatario", $destinatario);
        oci_bind_by_name($stmt, ":assunto", $assunto);
        oci_bind_by_name($stmt, ":mensagem", $mensagem);
        
        $executado = oci_execute($stmt);
        
        if ($executado) {
            echo '<div class="alert alert-success mt-3">E-mail enviado com sucesso!</div>';
        } else {
            $e = oci_error($stmt);
            echo '<div class="alert alert-danger mt-3">Erro ao enviar e-mail: ' . htmlentities($e['message']) . '</div>';
        }

        oci_free_statement($stmt);
        oci_close($oraConn);
    }
    ?>
    <?php include 'custom/footer.php'; ?>
</body>

</html>