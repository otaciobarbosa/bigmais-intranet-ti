<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">

<head>
    <?php include 'custom/header.php'; ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
</head>


<body>
    <?php include 'custom/navigation.php'; ?>

    <div class="content-inner">

        <section class="dashboard-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="operadoras" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>LOJA</th>
                                            <th>LOGIN</th>
                                            <th>NOME</th>
                                            <th>IDENTIFICACAO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include 'data/conexao.php';
                                        $listaOperadoras = "SELECT DISTINCT
                                            	a.id AS id,
                                            	b.codigo_loja AS loja,
                                            	a.login AS login,
                                            	a.senha AS senha,
                                            	a.nome AS nome,
                                            	a.codigo_identificacao AS identificacao,
                                            	data_ultima_atualizacao AS atualizacao,
                                            	-- c.id_perfil AS cod_perfil,
                                            	GROUP_CONCAT(d.nome SEPARATOR ' | ')  AS perfil
                                            FROM
                                            	usuario_security AS a
                                            INNER JOIN usuario_loja AS b ON b.login = a.login
                                            INNER JOIN usuario_perfil AS c ON c.id_usuario = a.id
                                            INNER JOIN perfil AS d ON d.id = c.id_perfil
                                            WHERE a.login < '1500'
                                            GROUP BY a.id
                                            ORDER BY a.login DESC
                                            ;";
                                        $result = mysqli_query($connSocin, $listaOperadoras);

                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {

                                        ?>
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['loja']; ?></td>
                                                    <td><?php echo $row['login']; ?></td>
                                                    <td><?php echo $row['nome']; ?></td>
                                                    <td><?php echo $row['identificacao']; ?></td>
                                                </tr>
                                        <?php
                                            }
                                        } else {
                                            echo "0 results";
                                        }

                                        mysqli_close($connSocin);
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
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#operadoras').DataTable();
        });
    </script>
</body>

</html>