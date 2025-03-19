<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<?php include 'custom/header.php'; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<meta http-equiv="refresh" content="30;url=download.php">
<body>
    <?php include 'custom/nav.php'; ?>

    <div class="content-inner">

        <section class="dashboard-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="download" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center;">ARQUIVO</th>
                                            <th style="text-align:center;">DOWNLOAD</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
									$path = "downloads/";
									$diretorio = dir($path);
	
									while ($arquivo = $diretorio->read()) {
										if (is_file($path . $arquivo)) {
										echo "
										<tr>
                                        	<td>" . $arquivo . "</td>
                                        	<td>
											 <a class='btn btn-success btn-sm' href='" . $path . $arquivo . "' download>
											  <i class='fa fa-download' aria-hidden='true'></i>
											  BAIXAR
											 </a>
											</td>
                                        </tr>
										";
										}
									}
								
									$diretorio->close();
								   ?>
                                    </tbody>
                                </table>
                            
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <?php include 'custom/footer.php'; ?>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript"
        src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#download').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/pt-BR.json',
            },
        });
    });
    </script>
</body>

</html>