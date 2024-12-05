<?php

require_once 'Conexão.php';
require_once 'Funções.php';

verificaologin();
header('Content-type:application/json');
print_r($_POST);
$ordem = $conecta->prepare('UPDATE `CARD` SET ordem= ordem-1 WHERE CARD.idLISTA LIKE (SELECT CARD.idLISTA FROM CARD WHERE CARD.idCARD LIKE :idCard) AND CARD.idCARD != :idCard AND CARD.ordem > (SELECT ordem FROM CARD WHERE CARD.idCARD LIKE :idCard);');
$ordem->bindParam( ':idCard',$_POST['idCard']);
$ordem->execute();

$move = $conecta->prepare('UPDATE `CARD` SET idLISTA= :idLista, ordem = (SELECT COUNT(CARD.idCARD) as c FROM CARD WHERE CARD.idLISTA LIKE :idLista)+1 WHERE CARD.idCARD LIKE :idCard; ');
$move->bindParam( ':idCard',$_POST['idCard']);
$move->bindParam( ':idLista',$_POST['idLista']);

$move->execute();
echo 'AAAAAAA';


?>