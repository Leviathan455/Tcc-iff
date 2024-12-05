<?php

require_once 'Conexão.php';
require_once 'Funções.php';

verificaologin();
header('Content-type:application/json');

$insert = $conecta->prepare('UPDATE LISTA SET Titulo = :titulo WHERE idLista LIKE :idLista;');
$insert->bindParam(':idLista', $_POST['idLista']);
$insert->bindParam(':titulo', $_POST['titulo']);
$insert->execute();
