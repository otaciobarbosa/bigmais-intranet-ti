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
                                <table>
                                    <thead>
                                        <tr>
                                            <th>NOME</th>
                                            <th>LOGIN</th>
                                            <th>SETOR</th>
                                            <th>LOJA</th>
                                            <th>RAMAL</th>
                                            <th>AÇÕES</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include 'data/conexao.php';
                                    $listaUsuarios = "SELECT * FROM view_dados_usuarios ORDER BY usu_nome ASC";
                                    $result = mysqli_query($conn, $listaUsuarios);
                                    
                                    if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                            
                                    ?>
                                        <tr>
                                            <td style="width:650px;text-align:left;"><?php echo $row['usu_nome']; ?></td>
                                            <td><?php echo $row['usu_login']; ?></td>
                                            <td><?php echo $row['area_desc']; ?></td>
                                            <td><?php echo $row['loja_nome']; ?></td>
                                            <td><?php echo $row['usu_ramal']; ?></td>
                                            <td style="width:20px;">
                                                <div class="dropdown">
                                                    <button class="btn btn-secondary btn-sm dropdown-toggle"
                                                        type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        AÇÕES
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="data/excluir-usuario.php?usuario=<?php echo $row['usu_id']; ?>">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                            Excluir
                                                        </a>
                                                        <a class="dropdown-item" href="#"></a>
                                                        <a class="dropdown-item" href="permissoes-controle.php?usuario=<?php echo $row['usu_id']; ?>">
                                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                            Editar Permissões
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }

                                        mysqli_close($conn);
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </div>
    <?php include 'custom/footer.php'; ?>
</body>

</html>