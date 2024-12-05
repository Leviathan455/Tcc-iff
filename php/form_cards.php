<?php 
require "Conexão.php";

    $ver = $conecta->prepare("INSERT INTO `card` (`idLISTA`, `Titulo`, `Descricao`, ordem)  VALUES (:lista, :t, :d, :ordem)");
    $ver->bindParam(":t", $_POST['tituloCard']);
    $ver->bindParam(":d", $_POST['DescricaoCard']);
    $ver->bindParam(":lista", $_POST['id']);
    $ver->bindParam(":ordem", $_POST['ordem']);
    $ver->execute(); 


header('Content-type: application/json');
echo(json_encode($_POST, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));