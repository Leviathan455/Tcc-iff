<!DOCTYPE html>

<html larg="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viweport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Login2.css">
    <title>Login</Title>

</head>


<body>
    <div class="row">
        <!-- formulário -->
        <form class="Login_1" action="php/Log.php" method="POST">
            <div class="painel1">
                <div class="titulos">
                    <img class="imagem" src="imgs/User_icon_BLACK-01.png" alt="some text" width="80px" height="80px">         <!--imagem -->
                    <h2>Login</h2>

                    <?php 
                        session_start();
                        if(isset($_SESSION['aviso'])):
                    ?>

                        <div class="aviso" method="POST">
                            <p>Email ou senha incorretos</p>
                        </div>

                    <?php 
                        endif;
                        unset($_SESSION['aviso'])
                    ?>  


                </div>

                <div class="pre">
                    <label>Email</label>
                        <input class="form-control" type="text" name="email" placeholder="Digite seu Email">
                </div>

                <div class="pre">
                    <label>Senha</label>
                        <input class="form-control" type="password" name="senha" placeholder="Digite sua Senha">
                </div>

                 <!-- <div class="pre">
                    <label><input type="checkbox">  Lembre-me</label>
                </div> -->
                <div class="pre">
                    <button type="submit" class="btn btn-dark">Entrar</button>
                </div>
                <div class="irparacadastro">
                    Ainda não tem Login ?<a href="Cadastro.php">Cadastre-se</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>