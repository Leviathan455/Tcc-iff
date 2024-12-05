<?php

require_once 'Conexão.php';
require_once 'Funções.php';

verificaologin();
header('Content-type:application/json');

$insert = $conecta->prepare('INSERT INTO CARD(Titulo, Descricao, idLISTA, ordem) VALUES ("Titulo", "descrição", :idLISTA, (SELECT * FROM (SELECT COUNT(CARD.idCARD)+1 FROM CARD WHERE CARD.idLISTA LIKE :idLISTA) subquery)); ');
$insert->bindParam(':idLISTA', $_POST['idLista']);
$insert->execute();

$id = $conecta->lastInsertId(); 


$puxainfos = $conecta->prepare("SELECT Titulo, idCARD from CARD where idCARD like :id");
$puxainfos->bindparam(":id", $id);
$puxainfos->execute();

$data = $puxainfos->fetch(PDO::FETCH_ASSOC);


echo(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));