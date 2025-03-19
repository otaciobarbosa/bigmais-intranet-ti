<!DOCTYPE html>
<html lang="pt">

<head>
    <?php $title = 'Usuarios Intranet'; ?>
    <?php include 'custom/head.php'; ?>
</head>

<body class="container-fluid">

    <?php include 'custom/navbar.php'; ?>

    <div class="card">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Alterar senha usuário</h4>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuário:</label>
                    <select id="usuario" name="usuario" class="form-select" required>
                        <option value="">Selecione um usuário</option>
                        <?php
                        $conn = mysqli_connect("192.168.0.210", "root", "bigmais.123", "bigcadgeral");
                        if (!$conn) {
                            die("Erro na conexão: " . mysqli_connect_error());
                        }
                        
                        $sql = "SELECT usu_login FROM usuarios ORDER BY usu_login ASC";
                        $result = mysqli_query($conn, $sql);

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row['usu_login'] . "'>" . $row['usu_login'] . "</option>";
                        }

                        mysqli_close($conn);
                        ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nova_senha" class="form-label">Nova Senha:</label>
                    <div class="input-group">
                        <input type="text" id="nova_senha" name="nova_senha" class="form-control">
                        <button type="button" class="btn btn-secondary" onclick="gerarSenha()">Gerar</button>
                        <button type="button" class="btn btn-primary" onclick="copiarSenha()">Copiar</button>
                    </div>
                </div>

                <button type="submit" name="alterar_senha" class="btn btn-success  w-100">Alterar Senha</button>
            </form>
        </div>
    </div>

    <script>
    function gerarSenha() {
        let caracteres = "abcdefghijklmnopqrstuvwxyz0123456789";
        let senha = "";
        for (let i = 0; i < 12; i++) {
            senha += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
        }
        document.getElementById("nova_senha").value = senha;
    }

    function copiarSenha() {
        let senhaInput = document.getElementById("nova_senha");
        senhaInput.select();
        document.execCommand("copy");
        alert("Senha copiada!");
    }
    </script>
    <?php include 'custom/footer.php'; ?>
</body>

</html>

<?php
if (isset($_POST['alterar_senha']) && !empty($_POST['usuario']) && !empty($_POST['nova_senha'])) {
    $conn = mysqli_connect("192.168.0.210", "root", "bigmais.123", "bigcadgeral");
    
    if (!$conn) {
        die("Erro na conexão: " . mysqli_connect_error());
    }

    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $nova_senha = md5($_POST['nova_senha']);

    $sql = "UPDATE usuarios SET usu_senha = '$nova_senha' WHERE usu_login = '$usuario'";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Senha alterada com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao alterar senha: " . mysqli_error($conn) . "');</script>";
    }

    mysqli_close($conn);
}
?>