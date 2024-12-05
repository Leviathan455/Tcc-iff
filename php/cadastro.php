<?php
require "Conexão.php";
session_start();
header('Content-type: text/plain');
$nomejacadastrado = $conecta->prepare("SELECT * FROM USUARIO WHERE `Nome Completo` LIKE :NomeCompleto");
$nomejacadastrado->bindParam(":NomeCompleto", $_POST["Nome"]);
$nomejacadastrado->execute();
$var = true;
if ($nomejacadastrado->rowCount()) {
    //aqui se o nome já existir no banco de dados 
    header("HTTP/1.1 406 Nome em utilização");
    echo ("Nome em utilização");
    $var = false;
    exit();
}

$emailjacadastrado = $conecta->prepare("SELECT * FROM USUARIO WHERE Email LIKE :Email");
$emailjacadastrado->bindParam(":Email", $_POST["email"]);
$emailjacadastrado->execute();

if ($emailjacadastrado->rowCount()) {
    //aqui se o email já existir no banco de dados 
    header("HTTP/1.1 406 Email em utilização");
    echo ('Email em utilização');
    $var = false;
    exit();
}

if ($var) {
    $verificas = $conecta->prepare("INSERT INTO `USUARIO` (`idUSUARIO`, `Nome Completo`, `Email`, `Senha`)  VALUES (NULL, :n, :e, :s)");
    $verificas->bindParam(":n", $_POST['Nome']);
    $verificas->bindParam(":e", $_POST['email']);
    $verificas->bindParam(":s", $_POST['senha']);
    $verificas->execute();
    header("HTTP/1.1 200 ok");
    echo("sdffdsfsdfdsfdsf");
    login($_POST['email'], $_POST['senha'], $conecta);
    exit();
}
