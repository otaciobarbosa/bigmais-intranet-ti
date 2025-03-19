<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Arquivos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	    <style>
        body {
            background-image: url('bg.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
			padding:5%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card mt-3">
			<div class="card-header" style="font-size:20px">File Transfer Protocol</div>
            <div class="card-body">
                <table id="fileTable" class="table">
                    <thead>
                        <tr>
                            <th>Arquivo</th>
                            <th>Data de Modificação</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $diretorio = 'files';
                        $arquivos = scandir($diretorio);

                        foreach ($arquivos as $arquivo) {
                            if ($arquivo !== 'index.php' && !is_dir($arquivo)) {
                                $caminho_arquivo = $diretorio . '/' . $arquivo;
                                $data_modificacao = date('d/m/Y', filemtime($caminho_arquivo));

                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($arquivo) . '</td>';
                                echo '<td>' . $data_modificacao . '</td>';
                                echo '<td><a href="' . htmlspecialchars($caminho_arquivo) . '" download class="btn btn-primary">Download</a></td>';
                                echo '</tr>';
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"></script>
    <script>
        $(document).ready(function() {
            $('#fileTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Portuguese-Brasil.json"
                },
		"paging": false 
            });
        });
    </script>
</body>
</html>
