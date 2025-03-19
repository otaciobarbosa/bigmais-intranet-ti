<?php
 $ip = "192.168.0.203";
 $porta = "1433";
 $banco = "CORPORERM";
 $usuario = "sa";
 $senha = "bm0721rq@";
 $conexao = new PDO("odbc:Driver={FreeTDS}; Server=$ip; Port=$porta; Database=$banco; UID=$usuario; PWD=$senha;");
?>