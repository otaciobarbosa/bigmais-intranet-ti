<?php
include 'data/conexao.php';
$usuario = $_GET['usuario'];
$senha = $_GET['senha'];

$alterarSenha = "UPDATE ge_usuario a set senha = ( SELECT PKG_C5SEGURANCA.Codificar('$senha') 
                  FROM ge_usuario a where a.codusuario='$usuario') 
                    WHERE a.codusuario='$usuario'";

                    var_dump($alterarSenha );


try{
$oraServername   = "192.168.0.245/bigmais";
$oraUsername     = "consinco";
$oraPassword     = "consinco";
$oraPorta        = "1521";

  if(!$oraConn = oci_connect($oraUsername,$oraPassword,"$oraServername:$oraPorta")){
   $e = oci_error();
   throw new Exception("Erro ao conectar ao servidor usando a extensão OCI - " . $e['message']);
    oci_close($oraConn);
  }

  if(!$stmt = oci_parse($oraConn,$alterarSenha)){
    $e = oci_error($stmt);
    throw new Exception("Erro ao preparar consulta - " . $e['message']);
    oci_close($oraConn);
   }

  if(!oci_execute($stmt)){
    $e = oci_error($con);
    throw new Exception("Erro ao executar consulta - " . $e['message']);
    oci_close($con);

 }

}catch(Exception $e){
  die("ERRO! Detalhes => " . $e->getMessage());
  oci_close($oraConn);
}

header("Location: consinco-senhas.php");
 exit;
?>