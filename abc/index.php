<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<?php include 'custom/header.php'; ?>
<meta http-equiv="refresh" content="30;url=index.php">

<body>
    <?php include 'custom/nav.php'; ?>

    <div class="content-inner">
        <header class="page-header">
            <div class="container-fluid">
                <div class="no-margin-bottom">
                    <?php 
                    $file_filtro = file_exists("filtros/filtro.txt"); 
                    if($file_filtro == 0){
                    ?>
                    <form action="job.php" method="get">
                        <label for="mes">MES :</label>
                        <select id="mes" name="mes" style="width:300px;height:40px;">
                            <option value="0">ESCOLHA UM MES</option>
                            <option value="01">JANEIRO</option>
                            <option value="02">FEVEREIRO</option>
                            <option value="03">MARCO</option>
                            <option value="04">ABRIL</option>
                            <option value="05">MAIO</option>
                            <option value="06">JUNHO</option>
                            <option value="07">JULHO</option>
                            <option value="08">AGOSTO</option>
                            <option value="09">SETEMBRO</option>
                            <option value="10">OUTUBRO</option>
                            <option value="11">NOVEMBRO</option>
                            <option value="12">DEZEMBRO</option>
                        </select>
                        <label for="ano">ANO :</label>
                        <select id="ano" name="ano" style="width:300px;height:40px;">
                            <option value="0">ESCOLHA UM ANO</option>
                            <?php 
                                $year = date("Y");
                                for ($i = $year; $i >= $year - 3; $i--) {
                                    echo "<option value='".$i."'>".$i."</option>";
                                }
                            ?>
                        </select>
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-search"></i>
                            PESQUISAR
                        </button>
                    </form>
                    <?php }else{
                        $periodo = file_get_contents("filtros/filtro.txt");
                        $periodo_array = explode("\n", $periodo);
                        foreach($periodo_array as $periodo_item) {                       
                         echo "
                           <div style='text-align:center;'>
                            AGUARDE PERIODO: "."$periodo_item"." ESTA SENDO GERADO
                            <div class='progress' style='width: 100%;text-align:center;'>
                             <div 
                              class='progress-bar progress-bar-striped progress-bar-animated' 
                               role='progressbar' 
                               aria-valuenow='100' 
                               aria-valuemin='0' 
                               aria-valuemax='100' 
                               style='width: 100%;text-align:center;'></div>
                            </div>
                           </div>";
                      }
                    } ?>
                </div>
            </div>
        </header>
        <section class="dashboard-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body" style="text-align:center;">
                                <img src="fluxo.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <?php include 'custom/footer.php'; ?>
</body>

</html>