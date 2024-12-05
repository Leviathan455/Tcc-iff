<!doctype html>
<?php 
require_once "php/Funções.php";
verificaologin();


$Dados = informaperfil($conecta);
?>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- Icones CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

      <!-- CSS -->
      <link rel="stylesheet" href="css\perfil.css">

    <title>Perfil</title>

  </head>


  <body>

   <!-- Nav bar -->
    <nav class="navbar navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="HomePag.php">Home</a>
    <ul class="d-flex">
            <a href="#" onclick="window.location.href='Sair.php'"><i class='bx bx-log-out' id="sair"></i></a>
    </ul>
  </div>
</nav>




    <!-- PARFIL -->
    <div class="perfil_conteiner">

        <div class="imagem-pessoa">
          <img src="imgs/user.png" alt="Selecione uma imagem" id="fotoperfil">
        </div>
        
      <form id="formimg" method="POST" enctype="multipart/form-data">
        <input type="file" id="procuraimg" name="procuraimg" accept="image/*">
      </form>


      <div class="mostrainfo">
      <?php 
        echo "<h3>".$Dados['Nome Completo']."</h3>";
        echo "<h3>".$Dados['Email']."</h3>"
      ?>
          <form action="perfilalterando.php" method="POST">
            <button> Alterar</button>
          </form>
  </div>
    </div>




    <script src="javas/perfil.js"></script>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>