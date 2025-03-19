<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<?php include 'custom/header.php'; ?>

<body>
    <?php include 'custom/navigation.php'; ?>
    <div class="content-inner">
        <section class="dashboard-header">
            <div class="container-fluid">
                <?php
		                	include 'data/conexao.php';
		                	$consultaRamal = "SELECT * FROM contatos 
                                               WHERE nome is not null
                                                ORDER BY  nome ASC";
					                    $result = mysqli_query($conn, $consultaRamal);
				          ?>
                <div class="card">
                    <div class="card-body">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>EMP</th>
                                    <th style="vertical-align: middle;text-align: left;font-size:12px;">NOME</th>
                                    <th style="vertical-align: middle;text-align: left;font-size:12px;">SETOR</th>
                                    <th style="vertical-align: middle;text-align: left;font-size:12px;">RAMAL</th>
                                    <th>CORP</th>
                                    <th>PESSOAL</th>
                                    <th>EMAIL</th>
                                    <th><i class="fa fa-whatsapp" aria-hidden="true"></i></th>
                                    <th><i class="fa fa-address-card-o" aria-hidden="true"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    while($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td style="vertical-align: middle;text-center: left;font-size:12px;">
                                        <?php echo $row["EMPRESA"]; ?></td>
                                    <td style="vertical-align: middle;text-align: left;font-size:12px;">
                                        <?php echo $row["NOME"]; ?></td>
                                    <td style="vertical-align: middle;text-align: left;font-size:12px;">
                                        <?php echo $row["SETOR"]; ?></td>
                                    <td style="vertical-align: middle;text-align: left;font-size:12px;">
                                        <?php echo $row["RAMAL"]; ?></td>
                                    <td style="vertical-align: middle;text-align: center;font-size:12px;">
                                        <?php echo $row["TELEFONE_CORPORATIVO"]; ?></td>
                                    <td style="vertical-align: middle;text-align: left;font-size:12px;">
                                        <?php echo $row["TELEFONE_PESSOAL"]; ?></td>
                                    <td style="vertical-align: middle;text-align: left;font-size:12px;">
                                        <?php echo $row["EMAIL"]; ?></td>
                                    <td style="vertical-align: middle;text-align: center;font-size:12px;">
                                        <?php if( $row["TELEFONE_WHATSAPP"] > 0){ ?>
                                        <a href="https://api.whatsapp.com/send?phone=55<?php echo $row["TELEFONE_WHATSAPP"]; ?>"
                                            target="_blank">
                                            <i class="fa fa-whatsapp" aria-hidden="true"></i>
                                        </a>
                                        <?php }  ?>
                                    </td>
                                    <td style="vertical-align: middle;text-align: center;font-size:12px;">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#myModal<?php echo $row["ID"]; ?>">
                                            <i class="fa fa-address-card-o" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                    <div class="modal fade" id="myModal<?php echo $row["ID"]; ?>" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">INFORMAÇÕES GERAIS</h4>
                                                </div>
                                                <div class="modal-body">
                                                    NOME:<input type="text" class="form-control"
                                                        value="<?php echo $row["NOME"]; ?>" readonly>
                                                    FANTASIA:<input type="text" class="form-control"
                                                        value="<?php echo $row["FANTASIA"]; ?>" readonly>
                                                    RAZAO:<input type="text" class="form-control"
                                                        value="<?php echo $row["RAZAO"]; ?>" readonly>
                                                    TELEFONE UM:<input type="text" class="form-control"
                                                        value="<?php echo $row["TELEFONE_UM"]; ?>" readonly>
                                                    TELEFONE DOIS:<input type="text" class="form-control"
                                                        value="<?php echo $row["TELEFONE_DOIS"]; ?>" readonly>
                                                    TELEFONE TRES:<input type="text" class="form-control"
                                                        value="<?php echo $row["TELEFONE_TRES"]; ?>" readonly>
                                                    TELEFONE QUATRO:<input type="text" class="form-control"
                                                        value="<?php echo $row["TELEFONE_QUATRO"]; ?>" readonly>
                                                    TELEFONE CINCO:<input type="text" class="form-control"
                                                        value="<?php echo $row["TELEFONE_CINCO"]; ?>" readonly>
                                                    OBS:<input type="text" class="form-control"
                                                        value="<?php echo $row["OBS"]; ?>" readonly>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">FECHAR</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="custom/dist/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="custom/dist/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="custom/dist/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="custom/dist/vendor/chart.js/Chart.min.js"></script>
    <script src="custom/dist/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="custom/dist/js/charts-home.js"></script>
    <script src="custom/dist/js/front.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <script>
    $('#table').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
        }
    });
    </script>

</body>

</html>