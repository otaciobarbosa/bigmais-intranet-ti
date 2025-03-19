<?php
    $conexao = mysqli_connect("192.168.0.210", "root", "bigmais.123", "controle_cafe");
    $filial = '1';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Café</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <style>
    body{
        background: linear-gradient(to bottom right, #A52A2A, #8B4513);
        background-attachment:fixed;
        background-image: url('coffee.jpg');
        background-repeat: repeat;
        background-size:500px;
        
    }
    .status-dot {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        display: inline-block;
    }

    .bg-success {
        background-color: green;
    }

    .bg-warning {
        background-color: yellow;
    }

    .bg-danger {
        background-color: red;
    }
    </style>
</head>

<body onload="atualizarTabela();">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body" style="text-align:center;">
                <h2>
                    <i class="fas fa-coffee"></i>
                    Controle de Café
                </h2>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <form method="post" id="coffeeForm" class="form-inline">
                    <div class="form-group mr-2">
                        <label for="chapa" class="mr-2">Chapa:</label>
                        <input type="text" class="form-control" id="chapa" name="chapa" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2" name="submit" id="submitBtn">
                        <i class="fas fa-sign-in-alt"></i> Registrar Entrada
                    </button>

                    <button type="submit" class="btn btn-success" name="checkout" id="checkoutBtn">
                        <i class="fas fa-sign-out-alt"></i> Registrar Saída
                    </button>
                </form>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Registros Ativos</h5>
                <div class="table-responsive">
                    <table id="tabelaRegistros" class="table"></table>
                </div>
            </div>
        </div>
    </div>


    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['submit'])) {
                $chapa = $_POST['chapa'];
                $chapa = substr(ltrim($chapa, '0'), -6);
                $query_insere = "INSERT INTO registros_cafe (chapa, status, entrada,filial) VALUES (LPAD('$chapa', 6, '0'), 1, NOW(),'$filial')";
                mysqli_query($conexao, $query_insere);
                echo "<script>alert('Entrada registrada com sucesso!');</script>";
                echo "<script>window.location.replace('controle-cafe.php');</script>";
                exit; 
            } elseif (isset($_POST['checkout'])) {
                $chapa = $_POST['chapa'];
                $chapa = substr(ltrim($chapa, '0'), -6);
                $query_atualiza = "UPDATE registros_cafe SET status = 2, saida = NOW() WHERE chapa = LPAD('$chapa', 6, '0') AND status = 1 and filial = '$filial'";
                mysqli_query($conexao, $query_atualiza);
                echo "<script>alert('Saída registrada com sucesso!');</script>";
                echo "<script>window.location.replace('controle-cafe.php');</script>";
                exit;
            }
        }
        mysqli_close($conexao);
        ?>
    </div>

    <script>
    document.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
        }
    });

    document.getElementById("submitBtn").addEventListener("click", function(event) {
        document.getElementById("coffeeForm").setAttribute("action", "controle-cafe.php?submit");
    });

    document.getElementById("checkoutBtn").addEventListener("click", function(event) {
        document.getElementById("coffeeForm").setAttribute("action", "controle-cafe.php?checkout");
    });
    </script>

    <script>
    function atualizarTabela() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                document.getElementById("tabelaRegistros").innerHTML = this.responseText;
            }
        };
        xhr.open("GET", "atualizar-tabela.php?filial=" + <?php echo $filial; ?>, true);
        xhr.send();
    }
    setInterval(function() {
        atualizarTabela();
    }, 10000);
    </script>

</body>

</html>