<?php
session_start();
require "Conexão.php";
require "Funções.php";

if(login($_POST['email'], $_POST['senha'], $conecta)){
    header('Location: ../HomePag.php');
    die();
}else{
    header('Location: ../Login.php');
    $_SESSION['aviso'] = true;
    exit();
}

?>