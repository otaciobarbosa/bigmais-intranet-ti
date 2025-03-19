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
    <?php $title = 'Gerador de Senhas'; ?>
    <?php include 'custom/head.php'; ?>
</head>

<body class="container-fluid">
    <?php include 'custom/navbar.php'; ?>

    <div class="card">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Gerador de Senha</h4>
        </div>
        <div class="card-body">

            <div class="mb-3">
                <label for="passwordOutput" class="form-label">Senha Gerada:</label>
                <input type="text" id="passwordOutput" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label for="passwordLength" class="form-label">Número de Caracteres: <span
                        id="lengthValue">12</span></label>
                <input type="range" id="passwordLength" class="form-range" min="1" max="20" value="12">
            </div>

            <div class="mb-3">
                <label class="form-label">Opções:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="pronounceable">
                    <label class="form-check-label" for="pronounceable">Fácil de pronunciar</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="readable">
                    <label class="form-check-label" for="readable">Fácil de ler</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="allChars">
                    <label class="form-check-label" for="allChars">Todos os caracteres</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="uppercase" checked>
                    <label class="form-check-label" for="uppercase">Letra maiúscula</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="lowercase" checked>
                    <label class="form-check-label" for="lowercase">Letra minúscula</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="numbers" checked>
                    <label class="form-check-label" for="numbers">Números</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="symbols">
                    <label class="form-check-label" for="symbols">Símbolos</label>
                </div>
            </div>

            <button class="btn btn-primary w-100" onclick="generatePassword()">Gerar Senha</button>
        </div>
    </div>

    <?php include 'custom/footer.php'; ?>
    <script>
    document.getElementById("passwordLength").addEventListener("input", function() {
        document.getElementById("lengthValue").textContent = this.value;
    });

    function generatePassword() {
        let length = document.getElementById("passwordLength").value;
        let uppercase = document.getElementById("uppercase").checked;
        let lowercase = document.getElementById("lowercase").checked;
        let numbers = document.getElementById("numbers").checked;
        let symbols = document.getElementById("symbols").checked;
        let allChars = document.getElementById("allChars").checked;
        let readable = document.getElementById("readable").checked;
        let pronounceable = document.getElementById("pronounceable").checked;

        let uppercaseChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        let lowercaseChars = "abcdefghijklmnopqrstuvwxyz";
        let numberChars = "0123456789";
        let symbolChars = "!@#$%^&*()-_=+[]{}|;:'\",.<>?/";

        let chars = "";

        if (allChars) {
            chars = uppercaseChars + lowercaseChars + numberChars + symbolChars;
        } else {
            if (uppercase) chars += uppercaseChars;
            if (lowercase) chars += lowercaseChars;
            if (numbers) chars += numberChars;
            if (symbols) chars += symbolChars;
        }

        if (readable) {
            chars = chars.replace(/[Il1O0]/g, "");
        }
        if (pronounceable) {
            chars = "bcdfghjklmnpqrstvwxyzBCDFGHJKLMNPQRSTVWXYZaeiouAEIOU";
        }

        if (chars.length === 0) {
            alert("Selecione pelo menos um tipo de caractere!");
            return;
        }

        let password = "";
        for (let i = 0; i < length; i++) {
            let randomIndex = Math.floor(Math.random() * chars.length);
            password += chars[randomIndex];
        }

        document.getElementById("passwordOutput").value = password;
    }
    </script>
</body>

</html>