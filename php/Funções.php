<?php 
session_start();
require_once "Conexão.php";

function verificaologin(){
    if(!isset($_SESSION['id'])){ //verifica se tem algo no id
        header('Location: Login.php');
    }else{
        if(empty($_SESSION['id'])){
            header('Location: Login.php'); //verifica se o id n é igual a ""
        }
    }
}

function informaperfil($conecta){
    //print_r($_SESSION);

    $puxainfos = $conecta->prepare("select * from USUARIO where idUSUARIO like :id");
    $puxainfos->bindparam(":id",$_SESSION["id"]);
    $puxainfos->execute();

    $dadosUsuario = $puxainfos->fetch(PDO::FETCH_ASSOC); //Retorna os dados em um array
    $dadosUsuario['Nome Completo']; // Vai te retornar o nome
    $dadosUsuario['Email'];

    return $dadosUsuario;
}

function getquadros($conecta, $id){
    $puxainfos = $conecta->prepare("select * from QUADRO where idUSUARIO like :id");
    $puxainfos->bindparam(":id",$id);
    $puxainfos->execute();

    $dadosUsuario = $puxainfos->fetchAll(PDO::FETCH_ASSOC);

    return $dadosUsuario;
}

function getQuadro($conecta){
    $array = [];

    $puxainfos = $conecta->prepare("select * from QUADRO where idQUADRO like :id");
    $puxainfos->bindparam(":id",$_GET['id']);
    $puxainfos->execute();
    
    $array = $puxainfos->fetch(PDO::FETCH_ASSOC);

    $puxainfos = $conecta->prepare("select idLISTA, Titulo from LISTA where idQUADRO like :id ORDER BY ordem ASC");
    $puxainfos->bindparam(":id",$_GET['id']);
    $puxainfos->execute();
    

    $array['listas'] = $puxainfos->fetchAll(PDO::FETCH_ASSOC);

    foreach ($array['listas'] as $key => $value) {
        $puxainfos = $conecta->prepare("select Titulo, idCARD from CARD where idLISTA like :id ORDER BY ordem ASC");
        $puxainfos->bindparam(":id",$value['idLISTA']);
        $puxainfos->execute();
        $array['listas'][$key]['cards'] = $puxainfos->fetchAll(PDO::FETCH_ASSOC); 
    }

    return($array);
}

//public function atualizardados($nome,$email){}


?>