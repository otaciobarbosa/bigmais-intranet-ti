<?php
session_start();

$host = "192.168.0.210";
$dbname = "bigcadgeral";
$user = "root";
$pass = "bigmais.123";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro ao conectar ao banco: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = trim($_POST["login"]);
    $senha = md5($_POST["senha"]);

    $stmt = $pdo->prepare("SELECT id FROM usuarios_admin WHERE login = :login AND senha = :senha");
    $stmt->bindParam(":login", $login);
    $stmt->bindParam(":senha", $senha);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION["usuario"] = $login;
        header("Location: painel.php");
        exit;
    } else {
        $erro = "Login ou senha inválidos!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="custom/icon.png">
    <style>
    html,
    body {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #1b1f3b, #2e4c6d);
    }

    .form-signin {
        width: 100%;
        max-width: 350px;
        padding: 20px;
    }

    .card {
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        background: #fff;
    }

    .form-floating input {
        padding-left: 40px;
    }

    .input-group-text {
        background: transparent;
        border-right: none;
    }

    .btn-primary {
        background-color: #1b1f3b;
        border: none;
    }

    .btn-primary:hover {
        background-color: #2e4c6d;
    }
    </style>
</head>

<body>
    <main class="form-signin">
        <div class="card">
            <h4 class="text-center mb-4">Painel Administrativo</h4>
            <?php if (isset($erro)): ?>
            <div class="alert alert-danger text-center">
                <?= htmlspecialchars($erro) ?>
            </div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" name="login" required>
                            <label for="floatingInput">Login</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" name="senha" required>
                            <label for="floatingPassword">Senha</label>
                        </div>
                    </div>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Acessar o sistema</button>
            </form>
        </div>
    </main>
</body>

</html>