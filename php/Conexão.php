<?php 

$usuario = "root";
$nome = "DB-TCC";
$senha = "2318";
$host = "localhost";

//-- endereço  para encontrar o banco                 \ usuarrio e senha conectados
$conecta = new pdo("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);

function login($email, $senha,$conecta){
        $_SESSION['aviso'] = false;

        $verificas = $conecta->prepare("select idUSUARIO from USUARIO where Email like :Email and Senha like :Senha");
        $verificas->bindparam(":Email",$email);
        $verificas->bindparam(":Senha",$senha);
        $verificas->execute();

        $usuario = $verificas->fetch(PDO::FETCH_ASSOC);


        if($verificas->rowCount()==0){ // verifica se a informação está no banco ou não
            return false;
        }
        else{ //deu certo
            $_SESSION['id'] = $usuario['idUSUARIO'];
            return true;
        }

}



?>