<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Exemplo de usuário e senha. Em um ambiente de produção, utilize um banco de dados.
    $valid_username = 'admin';
    $valid_password = 'password123';

    if ($username == $valid_username && $password == $valid_password) {
        $_SESSION['loggedin'] = true;
        header('Location: painel.php');
        exit;
    } else {
        $error = 'Nome de usuário ou senha inválidos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <?php if (isset($error)) { echo '<div class="alert alert-danger">' . $error . '</div>'; } ?>
                        <form method="post">
                            <div class="form-group">
                                <label for="username">Nome de Usuario</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
