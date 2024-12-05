<?php
require "Conexão.php";
session_start();
print_r($_SESSION);
$salvatitulo = $conecta->prepare("INSERT INTO `quadro` (Titulo, idUSUARIO)  VALUES ( :t, :id)");

    $salvatitulo->bindParam(":t", $_POST['Titulo']);
    $salvatitulo->bindParam(":id", $_SESSION['id']);
    $salvatitulo->execute();
    echo("testando");
    $id = $conecta->lastInsertId();
    header("location: ../indeex.php?id=".$id);
    exit();
?>