<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = isset($_POST['text']) ? $_POST['text'] : '';

    switch ($_POST['action']) {
        case 'lowercase':
            $text = strtolower($text);
            break;
        case 'uppercase':
            $text = strtoupper($text);
            break;
        case 'capitalize':
            $text = ucfirst(strtolower($text));
            break;
        case 'alternate':
            $text = preg_replace_callback('/./', function ($match) {
                static $i = 0;
                return $i++ % 2 ? strtolower($match[0]) : strtoupper($match[0]);
            }, $text);
            break;
        case 'titlecase':
            $text = ucwords(strtolower($text));
            break;
        case 'inverse':
            $text = preg_replace_callback('/./', function ($match) {
                return ctype_upper($match[0]) ? strtolower($match[0]) : strtoupper($match[0]);
            }, $text);
            break;
        case 'download':
            header('Content-Type: text/plain');
            header('Content-Disposition: attachment; filename="texto_formatado.txt"');
            echo $text;
            exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <title>Formatador de Texto</title>
    <?php include 'custom/head.php'; ?>
    <script>
    function copyToClipboard() {
        let textArea = document.getElementById("text");
        textArea.select();
        document.execCommand("copy");
        alert("Texto copiado para a área de transferência!");
    }

    function clearText() {
        document.getElementById("text").value = "";
    }
    </script>
</head>

<body class="container-fluid">
    <?php include 'custom/navbar.php'; ?>

    <div class="card">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Usuarios</h4>
        </div>
        <div class="card-body">

            <h2 class="mb-3">Formatador de Texto</h2>
            <form method="post">
                <textarea id="text" name="text" class="form-control mb-3"
                    rows="5"><?php echo isset($text) ? htmlspecialchars($text) : ''; ?></textarea>
                <div class="d-flex flex-wrap gap-2">
                    <button type="submit" name="action" value="lowercase" class="btn btn-primary">minúsculas</button>
                    <button type="submit" name="action" value="uppercase" class="btn btn-primary">MAIÚSCULAS</button>
                    <button type="submit" name="action" value="capitalize" class="btn btn-primary">Formato
                        Frase</button>
                    <button type="submit" name="action" value="alternate" class="btn btn-primary">fOrMaTo
                        aLtErNaDo</button>
                    <button type="submit" name="action" value="titlecase" class="btn btn-primary">Title Case</button>
                    <button type="submit" name="action" value="inverse" class="btn btn-primary">InVeRsE CaSe</button>
                    <button type="submit" name="action" value="download" class="btn btn-success">Baixar</button>
                    <button type="button" onclick="copyToClipboard()" class="btn btn-info">Copiar para o
                        Clipboard</button>
                    <button type="button" onclick="clearText()" class="btn btn-danger">Clear</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    <?php include 'custom/footer.php'; ?>
</body>

</html>