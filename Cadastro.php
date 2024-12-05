
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viweport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="css/Cadastro2222.css">
        <title>Cadastro</title>
    </head>

    <script type="text/javascript">


        function verifi() {

            var senha = fundinho.senha.value;
            var rep_senha = fundinho.rep_senha.value;

            if (senha != rep_senha){
                alert('Senhas diferentes');
                fundinho.senha.focus();
                return false;
            }

            if(senha =="" ||  senha.length <= 5 ){
                alert('preencha a  o campo "senha" com mais de 6 caracteres');
                fundinho.senha.focus();
                return false;
            }
            
            if(rep_senha=="" ||  rep_senha.lemght <= 5 ){
                alert('preencha a  o campo "senha" com mais de 6 caracteres');
                fundinho.rep_senha.focus();
                return false;
                }
            }
    </script>

    <body class="conteiner">
        <!-- Bootstrap linha row/começo -->
        <div class="row">

        <!-- Imagem -->
            <div class="col-xl-5" id="cavalinho">
                <img class="img" src="https://source.unsplash.com/random/">
            </div>

        <!-- form  parte de cima-->
            <div class="col-xl-7" id="coid">
                <form id="form" class="Fundo" name="fundinho" action="php\cadastro.php" method="POST"> <!-- FORRRRRRMMMMMMMM-->
                    <div class="info">
                        <h1>Crie sua conta </h1>
                        <h2>Para prosseguir</h2> 
                    </div>
 
        <!-- form  parte de baixo-->
                    <div class="formulario">

                            <div class="row">
                                <div class="col">
                                    <label>Nome</label>
                                    <input required class="form-control" type="text" name="Nome" placeholder="Digite seu Nome">
                                </div>

                                <div class="col">
                                    <label>Email</label>
                                    <input required class="form-control" type="email" name="email" placeholder="Digite seu Email">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label>Senha</label>
                                    <input required id="senha" class="form-control" type="password" name="senha" placeholder="Digite sua senha">
                                </div>
                                <div class="col">
                                    <label>Repitir Senha</label>
                                    <input required id="rep_senha" class="form-control" type="password" name="rep_senha" placeholder="Digite sua senha novamente">
                                </div>
                            </div>

                            <div class="botao">
                                <button id='submitform' type="submit" class="btn btn-primary" onclick="return verifi()">Cadastrar-se</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bootstrap Java -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="javas/cadastro.js"> </script>

    </body>

</html>
