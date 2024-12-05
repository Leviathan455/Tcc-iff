<?php

require_once 'Conexão.php';
require_once 'Funções.php';

verificaologin();
header('Content-type:application/json');

$insert = $conecta->prepare('INSERT INTO LISTA(Titulo, idQUADRO, ordem) VALUES ("Titulo", :idQuadro, (SELECT * FROM (SELECT COUNT(LISTA.idLISTA)+1 FROM LISTA WHERE LISTA.idQUADRO LIKE :idQuadro) subquery)); ');
$insert->bindParam(':idQuadro', $_POST['idQuadro']);
$insert->execute();

$id = $conecta->lastInsertId(); 

$getLista = $conecta->prepare("select idLISTA, Titulo from LISTA where idLISTA like :id ORDER BY ordem ASC");
$getLista->bindParam(':id', $id);
$getLista->execute();

$data = $getLista->fetch(PDO::FETCH_ASSOC);


echo(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));