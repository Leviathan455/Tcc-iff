<?php

require_once 'Conexão.php';
require_once 'Funções.php';

verificaologin();
header('Content-type:application/json');

$insert = $conecta->prepare('DELETE FROM LISTA WHERE idLista LIKE :idLista;');
$insert->bindParam(':idLista', $_POST['idLista']);
$insert->execute();
