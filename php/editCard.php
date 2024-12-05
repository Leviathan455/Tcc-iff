<?php

require_once 'Conexão.php';
require_once 'Funções.php';

verificaologin();
header('Content-type:application/json');


$Date = date("Y-m-d H:i:s", strtotime($_POST['Data']));

$insert = $conecta->prepare('UPDATE CARD SET Titulo = :titulo, Descricao = :descr, Data = :data WHERE idCARD LIKE :idCARD;');
$insert->bindParam(':idCARD', $_POST['idCard']);
$insert->bindParam(':descr', $_POST['Descricao']);
$insert->bindParam(':titulo', $_POST['Titulo']);
$insert->bindParam(':data', $Date);
$insert->execute();
