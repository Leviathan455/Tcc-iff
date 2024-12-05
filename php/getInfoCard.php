<?php

require_once 'Conexão.php';
require_once 'Funções.php';

verificaologin();
header('Content-type:application/json');

$insert = $conecta->prepare('SELECT * FROM CARD WHERE idCARD = :idCard');
$insert->bindParam(':idCard', $_POST['idCard']);
$insert->execute();


$data = $insert->fetch(PDO::FETCH_ASSOC);
echo(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));