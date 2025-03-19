<?php
 if (!empty($_GET)){

include 'conexao.php';

 $id = $_GET['usuario'];

 $excluiUsuario = "UPDATE usuarios SET usu_status = '0', usu_nivel_intra = '0' WHERE usu_id = '$id '";

 if (mysqli_query($conn, $excluiUsuario)) {
     echo "Alterado com sucesso !";
 } else {
     echo "Erro ao alterar o usuário: " . mysqli_error($conn);
 }
 
 mysqli_close($conn);

 header("Location: ../permissoes.php");
 }
?>