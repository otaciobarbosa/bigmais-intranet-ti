<?php
    include 'data/conexao.php';
    $id = $_GET['usuario'];
    $listaUsuarios = "SELECT * FROM view_dados_usuarios WHERE usu_id = '$id'";
    $result = mysqli_query($conn, $listaUsuarios);

    if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    $id = $row['usu_id'];
    $nome = $row['usu_nome'];
    $login = $row['usu_login'];
    $setor = $row['area_desc'];
    $nomeLoja =  $row['loja_nome'];
    $ramal =  $row['usu_ramal'];
    $setorID = $row['usu_setor'];
    $secaoTotvs = $row['usu_secao_totvs'];
    $lojaID = $row['usu_loja_id'];
    $status = $row['usu_status'];
    $admin = $row['usu_nivel_admin'];
    $intranet = $row['usu_nivel_intra'];
    $convenio = $row['usu_nivel_conv'];
    $eos = $row['usu_nivel_eos'];
    $chamados = $row['usu_nivel_helpdesk'];
    $setorChamados = $row['usu_setor_helpdesk'];
    $cafe = $row['usu_nivel_cafe'];
    $ponto = $row['usu_nivel_ponto'];
    $vasilhames = $row['usu_nivel_impvas'];
    $rep = $row['usu_nivel_rep'];
    $checklist = $row['usu_nivel_checklist'];
    $checklistAdmin = $row['usu_area_admin_checklist'];
    $checklistPainel = $row['usu_nivel_pchecklist'];
    $dp = $row['area_dp'];
    $rh = $row['usu_nivel_rh'];
    $advertencia = $row['usu_nivel_controladv'];
    $telefonia = $row['usu_nivel_telefonia'];
    $cancelamentos = $row['usu_nivel_cancelamento'];
    $telemark = $row['usu_nivel_telemark'];
    $folheto = $row['usu_nivel_folheto'];
    $trocapdv = $row['usu_nivel_trocapdv'];
    $trocapdvCons = $row['usu_nivel_con_trocapdv'];
    $expProdutor = $row['usu_nivel_produtor'];
    $tv = $row['painel_tv'];
    $meliuzPainel = $row['usu_painel_meliuz'];
    $appAuditoria = $row['usu_nivel_app'];
    $appPainel = $row['usu_nivel_app_painel'];
    $promotor = $row['usu_nivel_promotor'];
    }
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
<?php include 'custom/header.php'; ?>

<body>
    <?php include 'custom/navigation.php'; ?>

    <div class="content-inner">

        <section class="dashboard-header">
            <div class="container-fluid">
                <form method="GET" action="data/manutencao-permissoes.php">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">

                                    &emsp;<strong>ID: </strong><?php echo $id; ?>
                                    &emsp;<strong>NOME: </strong><?php echo $nome; ?>
                                    &emsp;<strong>LOGIN: </strong><?php echo $login; ?>

                                    <button type="submit" value="Enviar" class="btn btn-success btn-sm"
                                        style="float:right;">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        SALVAR
                                    </button>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">

                                            NOVA SENHA<input type="password" class="form-control" id="senha"
                                                name="senha">
                                                <span style="color:red;">Informar somente se for alterar</span>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" value="<?php echo $id; ?>" id='usuario' name='usuario'>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">

                                            <label>STATUS</label>
                                            <br>
                                            <?php
                                        if($status == 0){
                                        echo "<input type='radio' value='1' id='status' name='status'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='status' name='status' checked>LIBERADO";
                                        }
                                        if($status == 0){
                                        echo "&ensp;<input type='radio' value='0' id='status' name='status' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='status' name='status'>BLOQUEADO";
                                        }
                                    ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">

                                            NUMERO LOJA
                                            <input type="text" class="form-control" id="loja" name="loja"
                                                value="<?php echo $lojaID; ?>">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">

                                            SETOR:

                                            <select class="form-control" id="setor" name="setor">
                                                <?php
                                            echo "<option value='$setorID'>$setor</option>";
                                            $listaLojas = "SELECT * FROM setor ORDER BY area_desc ASC";
                                            $result = mysqli_query($conn, $listaLojas);
                                            while($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='".$row["area_id"]."'>".$row["area_desc"]."</option>";
                                                 }
                                             ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            RAMAL:
                                            <input type="text" class="form-control" id="ramal" name="ramal"
                                                value="<?php echo $ramal; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            SECAO TOTVS:
                                            <input type="text" class="form-control" id="secaoTotvs" name="secaoTotvs"
                                                value="<?php echo $secaoTotvs; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">

                                            <label>AREA ADMIN</label>
                                            <br>
                                            <?php
                                        if($admin == 0){
                                        echo "<input type='radio' value='1' id='admin' name='admin'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='admin' name='admin' checked>LIBERADO";
                                        }
                                        if($admin == 0){
                                        echo "&ensp;<input type='radio' value='0' id='admin' name='admin' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='admin' name='admin'>BLOQUEADO";
                                        }
                                    ?>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">

                                            <label>ACESSO A INTRANET</label>
                                            <br>
                                            <?php
                                        if($intranet == 0){
                                        echo "<input type='radio' value='1' id='intranet' name='intranet'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='intranet' name='intranet' checked>LIBERADO";
                                        }
                                        if($intranet == 0){
                                        echo "&ensp;<input type='radio' value='0' id='intranet' name='intranet' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='intranet' name='intranet'>BLOQUEADO";
                                        }
                                    ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>EXPORTAÇÃO CONVENIO</label>
                                            <br>
                                            <?php
                                        if($convenio == 0){
                                        echo "<input type='radio' value='1' id='convenio' name='convenio'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='convenio' name='convenio' checked>LIBERADO";
                                        }
                                        if($convenio == 0){
                                        echo "&ensp;<input type='radio' value='0' id='convenio' name='convenio' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='convenio' name='convenio'>BLOQUEADO";
                                        }
                                    ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>EOS</label>
                                            <br>
                                            <?php
                                        if($eos == 0){
                                        echo "<input type='radio' value='1' id='eos' name='eos'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='eos' name='eos' checked>LIBERADO";
                                        }
                                        if($eos == 0){
                                        echo "&ensp;<input type='radio' value='0' id='eos' name='eos' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='eos' name='eos'>BLOQUEADO";
                                        }
                                    ?>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!--INICIO BLOCO-->
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            CODIGO PAINEL CHAMADOS:
                                            <input type="text" class="form-control" id="chamados" name="chamados"
                                                value="<?php echo $chamados; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            CODIGO OCOMON:
                                            <input type="text" class="form-control" id="ocomon" name="ocomon"
                                                value="<?php echo $setorChamados; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">

                                            <label>CONTROLE CAFE</label>
                                            <br>
                                            <?php
                                        if($cafe == 0){
                                        echo "<input type='radio' value='1' id='cafe' name='cafe'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='cafe' name='cafe' checked>LIBERADO";
                                        }
                                        if($cafe == 0){
                                        echo "&ensp;<input type='radio' value='0' id='cafe' name='cafe' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='cafe' name='cafe'>BLOQUEADO";
                                        }
                                    ?>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--FINAL BLOCO-->

                            <!--INICIO BLOCO-->
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>SISTEMA DE PONTO</label>
                                            <br>
                                            <?php
                                        if($ponto == 0){
                                        echo "<input type='radio' value='1' id='ponto' name='ponto'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='ponto' name='ponto' checked>LIBERADO";
                                        }
                                        if($ponto == 0){
                                        echo "&ensp;<input type='radio' value='0' id='ponto' name='ponto' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='ponto' name='ponto'>BLOQUEADO";
                                        }
                                    ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>VASILHAMES</label>
                                            <br>
                                            <?php
                                        if($vasilhames == 0){
                                        echo "<input type='radio' value='1' id='vasilhames' name='vasilhames'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='vasilhames' name='vasilhames' checked>LIBERADO";
                                        }
                                        if($vasilhames == 0){
                                        echo "&ensp;<input type='radio' value='0' id='vasilhames' name='vasilhames' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='vasilhames' name='vasilhames'>BLOQUEADO";
                                        }
                                    ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>PLANILHA REPOSICAO</label>
                                            <br>
                                            <?php
                                        if($rep == 0){
                                        echo "<input type='radio' value='1' id='rep' name='rep'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='rep' name='rep' checked>LIBERADO";
                                        }
                                        if($rep == 0){
                                        echo "&ensp;<input type='radio' value='0' id='rep' name='rep' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='rep' name='rep'>BLOQUEADO";
                                        }
                                    ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--FINAL BLOCO-->

                            <!--INICIO BLOCO-->
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>CHECKLIST</label>
                                            <br>
                                            <?php
                                        if($checklist == 0){
                                        echo "<input type='radio' value='1' id='checklist' name='checklist'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='checklist' name='checklist' checked>LIBERADO";
                                        }
                                        if($checklist == 0){
                                        echo "&ensp;<input type='radio' value='0' id='checklist' name='checklist' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='checklist' name='checklist'>BLOQUEADO";
                                        }
                                    ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>CHECKLIST ADMIN</label>
                                            <br>
                                            <?php
                                        if($checklistAdmin == 0){
                                        echo "<input type='radio' value='1' id='checklistAdmin' name='checklistAdmin'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='checklistAdmin' name='checklistAdmin' checked>LIBERADO";
                                        }
                                        if($checklistAdmin == 0){
                                        echo "&ensp;<input type='radio' value='0' id='checklistAdmin' name='checklistAdmin' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='checklistAdmin' name='checklistAdmin'>BLOQUEADO";
                                        }
                                    ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>CHECKLIST PAINEL</label>
                                            <br>
                                            <?php
                                        if($checklistPainel == 0){
                                        echo "<input type='radio' value='1' id='checklistPainel' name='checklistPainel'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='checklistPainel' name='checklistPainel' checked>LIBERADO";
                                        }
                                        if($checklistPainel == 0){
                                        echo "&ensp;<input type='radio' value='0' id='checklistPainel' name='checklistPainel' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='checklistPainel' name='checklistPainel'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--FINAL BLOCO-->

                            <!--INICIO BLOCO-->
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>DP</label>
                                            <br>
                                            <?php
                                        if($dp == 0){
                                        echo "<input type='radio' value='1' id='dp' name='dp'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='dp' name='dp' checked>LIBERADO";
                                        }
                                        if($dp == 0){
                                        echo "&ensp;<input type='radio' value='0' id='dp' name='dp' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='dp' name='dp'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>RH</label>
                                            <br>
                                            <?php
                                        if($rh == 0){
                                        echo "<input type='radio' value='1' id='rh' name='rh'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='rh' name='rh' checked>LIBERADO";
                                        }
                                        if($rh == 0){
                                        echo "&ensp;<input type='radio' value='0' id='rh' name='rh' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='rh' name='rh'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>PAINEL ADVERTENCIA</label>
                                            <br>
                                            <?php
                                        if($advertencia == 0){
                                        echo "<input type='radio' value='1' id='advertencia' name='advertencia'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='advertencia' name='advertencia' checked>LIBERADO";
                                        }
                                        if($advertencia == 0){
                                        echo "&ensp;<input type='radio' value='0' id='advertencia' name='advertencia' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='advertencia' name='advertencia'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--FINAL BLOCO-->

                            <!--INICIO BLOCO-->
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>TELEFONIA</label>
                                            <br>
                                            <?php
                                        if($telefonia == 0){
                                        echo "<input type='radio' value='1' id='telefonia' name='telefonia'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='telefonia' name='telefonia' checked>LIBERADO";
                                        }
                                        if($telefonia == 0){
                                        echo "&ensp;<input type='radio' value='0' id='telefonia' name='telefonia' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='telefonia' name='telefonia'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>CANCELAMENTOS [TANIA]</label>
                                            <br>
                                            <?php
                                        if($advertencia == 0){
                                        echo "<input type='radio' value='1' id='cancelamentos' name='cancelamentos'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='cancelamentos' name='cancelamentos' checked>LIBERADO";
                                        }
                                        if($cancelamentos == 0){
                                        echo "&ensp;<input type='radio' value='0' id='cancelamentos' name='cancelamentos' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='cancelamentos' name='cancelamentos'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>TELEMARK</label>
                                            <br>
                                            <?php
                                        if($telemark == 0){
                                        echo "<input type='radio' value='1' id='telemark' name='telemark'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='telemark' name='telemark' checked>LIBERADO";
                                        }
                                        if($telemark == 0){
                                        echo "&ensp;<input type='radio' value='0' id='telemark' name='telemark' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='telemark' name='telemark'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--FINAL BLOCO-->

                            <!--INICIO BLOCO-->
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>FOLHETO</label>
                                            <br>
                                            <?php
                                        if($folheto == 0){
                                        echo "<input type='radio' value='1' id='folheto' name='folheto'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='folheto' name='folheto' checked>LIBERADO";
                                        }
                                        if($folheto == 0){
                                        echo "&ensp;<input type='radio' value='0' id='folheto' name='folheto' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='folheto' name='folheto'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>CANC / DEV [FISCAL]</label>
                                            <br>
                                            <?php
                                        if($trocapdvCons == 0){
                                        echo "<input type='radio' value='1' id='trocapdvCons' name='trocapdvCons'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='trocapdvCons' name='trocapdvCons' checked>LIBERADO";
                                        }
                                        if($trocapdvCons == 0){
                                        echo "&ensp;<input type='radio' value='0' id='trocapdvCons' name='trocapdvCons' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='trocapdvCons' name='trocapdvCons'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>CANC / DEV [LOJAS]</label>
                                            <br>
                                            <?php
                                        if($trocapdv == 0){
                                        echo "<input type='radio' value='1' id='trocapdv' name='trocapdv'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='trocapdv' name='trocapdv' checked>LIBERADO";
                                        }
                                        if($trocapdv == 0){
                                        echo "&ensp;<input type='radio' value='0' id='trocapdv' name='trocapdv' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='trocapdv' name='trocapdv'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--FINAL BLOCO-->

                            <!--INICIO BLOCO-->
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>EXPORTA PR [CONTABIL]</label>
                                            <br>
                                            <?php
                                        if($expProdutor == 0){
                                        echo "<input type='radio' value='1' id='expProdutor' name='expProdutor'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='expProdutor' name='expProdutor' checked>LIBERADO";
                                        }
                                        if($expProdutor == 0){
                                        echo "&ensp;<input type='radio' value='0' id='expProdutor' name='expProdutor' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='expProdutor' name='expProdutor'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>PAINEL TV</label>
                                            <br>
                                            <?php
                                        if($tv == 0){
                                        echo "<input type='radio' value='1' id='tv' name='tv'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='tv' name='tv' checked>LIBERADO";
                                        }
                                        if($tv == 0){
                                        echo "&ensp;<input type='radio' value='0' id='tv' name='tv' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='tv' name='tv'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>PAINEL MELIUZ</label>
                                            <br>
                                            <?php
                                        if($meliuzPainel == 0){
                                        echo "<input type='radio' value='1' id='meliuzPainel' name='meliuzPainel'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='meliuzPainel' name='meliuzPainel' checked>LIBERADO";
                                        }
                                        if($meliuzPainel == 0){
                                        echo "&ensp;<input type='radio' value='0' id='meliuzPainel' name='meliuzPainel' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='meliuzPainel' name='meliuzPainel'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--FINAL BLOCO-->

                            <!--INICIO BLOCO-->
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>APP VALIDADE</label>
                                            <br>
                                            <?php
                                        if($appAuditoria == 0){
                                        echo "<input type='radio' value='1' id='appAuditoria' name='appAuditoria'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='appAuditoria' name='appAuditoria' checked>LIBERADO";
                                        }
                                        if($appAuditoria == 0){
                                        echo "&ensp;<input type='radio' value='0' id='appAuditoria' name='appAuditoria' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='appAuditoria' name='appAuditoria'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>PAINEL APP VALIDADE</label>
                                            <br>
                                            <?php
                                        if($appPainel == 0){
                                        echo "<input type='radio' value='1' id='appPainel' name='appPainel'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='appPainel' name='appPainel' checked>LIBERADO";
                                        }
                                        if($appPainel == 0){
                                        echo "&ensp;<input type='radio' value='0' id='appPainel' name='appPainel' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='appPainel' name='appPainel'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="height:100px;">
                                            <label>PROMOTOR</label>
                                            <br>
                                            <?php
                                        if($promotor == 0){
                                        echo "<input type='radio' value='1' id='promotor' name='promotor'>LIBERADO";
                                        }else{
                                        echo "<input type='radio' value='1' id='promotor' name='promotor' checked>LIBERADO";
                                        }
                                        if($promotor == 0){
                                        echo "&ensp;<input type='radio' value='0' id='promotor' name='promotor' checked>BLOQUEADO";
                                         }else{
                                        echo "&ensp;<input type='radio' value='0' id='promotor' name='promotor'>BLOQUEADO";
                                        }
                                        ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--FINAL BLOCO-->

                        </div>
                    </div>

            </div>
            </form>
    </div>
    </section>

    </div>
    <?php include 'custom/footer.php'; ?>
</body>

</html>