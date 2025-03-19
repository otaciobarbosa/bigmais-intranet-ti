<?php
 if (!empty($_GET)){

include 'conexao.php';

$id = $_GET['usuario'];
$promotor = $_GET['promotor'];
$appPainel = $_GET['appPainel'];
$appAuditoria = $_GET['appAuditoria'];
$meliuzPainel = $_GET['meliuzPainel'];
$tv = $_GET['tv'];
$expProdutor = $_GET['expProdutor'];
$trocapdv = $_GET['trocapdv'];
$trocapdvCons = $_GET['trocapdvCons'];
$folheto = $_GET['folheto'];
$telemark = $_GET['telemark'];
$cancelamentos = $_GET['cancelamentos'];
$telefonia = $_GET['telefonia'];
$advertencia = $_GET['advertencia'];
$rh = $_GET['rh'];
$dp = $_GET['dp'];
$checklistPainel = $_GET['checklistPainel'];
$checklistAdmin = $_GET['checklistAdmin'];
$checklist = $_GET['checklist'];
$rep = $_GET['rep'];
$vasilhames = $_GET['vasilhames'];
$ponto = $_GET['ponto'];
$cafe = $_GET['cafe'];
$ocomon = $_GET['ocomon'];
$chamados = $_GET['chamados'];
$eos = $_GET['eos'];
$convenio = $_GET['convenio'];
$intranet = $_GET['intranet'];
$admin = $_GET['admin'];
$secaoTotvs = $_GET['secaoTotvs'];
$ramal = $_GET['ramal'];
$setor = $_GET['setor'];
$loja = $_GET['loja'];
$status = $_GET['status'];

$senha = $_GET['senha'];
$xSenha = MD5($senha);

if($senha !=''){

    $alteraSenha = "UPDATE usuarios SET usu_senha = '$xSenha' WHERE usu_id = '$id'";

    if (mysqli_query($conn, $alteraSenha)) {
        echo "Senha alterada com sucesso !";
    } else {
        echo "Erro ao alterar o Senha: " . mysqli_error($conn);
    }
}
 $permissaoUsuario = "UPDATE usuarios 
    SET 
    usu_loja_id = '$loja' ,
    usu_ramal = '$ramal' ,
    usu_setor = '$setor' ,
    usu_secao_totvs = '$secaoTotvs' ,
    usu_status = '$status' ,
    usu_nivel_admin = '$admin' ,
    usu_nivel_intra = '$intranet' ,
    usu_nivel_conv = '$convenio' ,
    usu_nivel_eos = '$eos' ,
    usu_nivel_helpdesk = '$chamados' ,
    usu_setor_helpdesk = '$ocomon' ,
    usu_nivel_cafe = '$cafe' ,
    usu_nivel_ponto = '$ponto',
    usu_nivel_impvas = '$vasilhames' ,
    usu_nivel_rep = '$rep' ,
    usu_nivel_checklist = '$checklist' ,
    usu_area_admin_checklist = '$checklistAdmin' ,
    usu_nivel_pchecklist = '$checklistPainel' ,
    area_dp = '$dp' ,
    usu_nivel_rh = '$rh' ,
    usu_nivel_controladv = '$advertencia' ,
    usu_nivel_telefonia = '$telefonia' ,
    usu_nivel_cancelamento = '$cancelamentos' ,
    usu_nivel_telemark = '$telemark' ,
    usu_nivel_folheto = '$folheto' ,
    usu_nivel_trocapdv = '$trocapdv' ,
    usu_nivel_con_trocapdv = '$trocapdvCons' ,
    usu_nivel_produtor = '$expProdutor' ,
    painel_tv = '$tv' ,
    usu_painel_meliuz = '$meliuzPainel' ,
    usu_nivel_app = '$appAuditoria' ,
    usu_nivel_app_painel = '$appPainel' ,
    usu_nivel_promotor = '$promotor'
        WHERE usu_id = '$id'";

var_dump($permissaoUsuario);

 if (mysqli_query($conn, $permissaoUsuario)) {
     echo "Alterado com sucesso !";
 } else {
     echo "Erro ao alterar o usuário: " . mysqli_error($conn);
 }
 
 mysqli_close($conn);

  header("Location: ../permissoes.php");
 }
?>