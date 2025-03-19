<?php include 'data/conexao.php'; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<?php include 'custom/header.php'; ?>

<body>
    <?php include 'custom/navigation.php'; ?>

    <div class="content-inner">

        <section class="dashboard-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="data/cadastra.php">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-12">
                                                NOME:
                                                <input type="text" class="form-control" id="nome" name="nome">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                LOJA:
                                                <div class="form-group">
                                                    <select class="form-control" id="loja" name="loja">
                                                    <option>ESCOLHA UMA LOJA</option>
                                                    <option></option>
                                                    <?php
                                                    $listaLojas = "SELECT * FROM lojas ORDER BY loja_numero DESC";
                                                    $result = mysqli_query($conn, $listaLojas);
                                                        while($row = mysqli_fetch_assoc($result)) {
                                                            echo "<option value='".$row["loja_numero"]."'>".$row["loja_nome"]."</option>";
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                SETOR:
                                                <div class="form-group">
                                                    <select class="form-control" id="setor" name="setor">
                                                    <option>ESCOLHA UM SETOR</option>
                                                    <option></option>
                                                    <?php
                                                    $listaLojas = "SELECT * FROM setor ORDER BY area_desc ASC";
                                                    $result = mysqli_query($conn, $listaLojas);
                                                        while($row = mysqli_fetch_assoc($result)) {
                                                            echo "<option value='".$row["area_id"]."'>".$row["area_desc"]."</option>";
                                                        }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                RAMAL:
                                                <input type="text" class="form-control" id="ramal" name="ramal">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                LOGIN:
                                                <input type="text" class="form-control" id="login" name="login">
                                            </div>
                                            <div class="col-md-6">
                                                SENHA:
                                                <input type="password" class="form-control" id="senha" name="senha">
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" value="Enviar" class="btn btn-success btn-sm"
                                            style="float:right;">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            CADASTRAR
                                        </button>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </div>
    <?php include 'custom/footer.php'; ?>
</body>

</html>