<?php
 if (!empty($_POST)){
include 'conexao.php';

$nome = $_POST['nome'];
$loja = $_POST['loja'];
$setor = $_POST['setor'];
$ramal = $_POST['ramal'];
$login = $_POST['login'];
$senha = MD5($_POST['senha']);
$status = '1';
$intra = '1';


$cadastraUsuario = "INSERT INTO usuarios 
                                (usu_nome,
                                 usu_loja_id,
                                 usu_setor,
                                 usu_ramal,
                                 usu_login,
                                 usu_senha,
                                 usu_status,
                                 usu_nivel_intra)
                            VALUES (
                                '$nome',
                                '$loja',
                                '$setor',
                                '$ramal',
                                '$login',
                                '$senha',
                                '$status',
                                '$intra'
                                     )";
                            

                            var_dump($cadastraUsuario);

                            if (mysqli_query($conn, $cadastraUsuario)) {
                                echo "Cadastrado com sucesso !";
                            } else {
                                echo "Erro: " . $cadastraUsuario . "<br>" . mysqli_error($conn);
                            }

mysqli_close($conn);

 header("Location: ../cadastro.php");

}
?>