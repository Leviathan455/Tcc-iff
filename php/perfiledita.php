<?php 
require_once "Funções.php";
verificaologin();
$Dados = informaperfil($conecta);

header('Content-Type: image/png');
print_r($_POST);



