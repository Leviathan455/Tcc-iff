<!doctype html>

<?php
require_once "php/Funções.php";
verificaologin();

$Dados = informaperfil($conecta);

$quadros = getquadros($conecta, $Dados['idUSUARIO']);
echo($Dados['idUSUARIO']);

?>

<html>
  <head>
    <meta charset="utf-8">

    <title>Hello, world!</title>
    <link rel="stylesheet" href="css/Home.css">

    <!-- Icones CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

  </head>


  <body>
    <div class="sidebar">
        <div class="logobordas">
            <div class="logo">
              <i class='bx bxl-visual-studio'></i>
              <div class="nomelogo">Titulodasidebar</div>
            </div>
            <i class='bx bx-menu-alt-left' id="listrinha"></i>
        </div>
        <ul class="nav_side">
            <li>
                <i class='bx bx-search-alt' ></i>
                <input type="text" placeholder="Pesquisar">
                <!-- <span class="dica">Pesquisar</span> -->
            </li>

            <li>
              <a href="perfil.php">
                <i class='bx bx-user-circle' ></i>
                <span class="link_nome">User</span>
                <!-- <span class="dica">Usuário</span> -->
              </a>
            </li>

            <li>
              <a href="#">
                <i class='bx bx-bell'></i>
                <span class="link_nome">Notificação</span>
                <!-- <span class="dica">Notificações</span> -->
              </a>
            </li>

            <li>
              <a href="#">
                <i class='bx bx-cog'></i>
                <span class="link_nome">Configs</span>
                <!-- <span class="dica">Configurações</span> -->
              </a>
            </li>

        </ul>
      <div class="perfil_conteiner">
        <div class="perfil">

          <div class="detalhesdeperfil">
          <img src="imgs/User_icon_BLACK-01.png">
            <div class="infosnomes">
                  <?php 
                    echo "<h3>".$Dados['Nome Completo']."</h3>";
                  ?>
            </div>
          </div>
          <div class="sair">
              <a onclick="window.location.href='Sair.php'">
                <i class='bx bx-log-out' id="sair"></i>
              </a>
            </div>
        </div>
      </div>
    </div>

    <div class="home_conteiner">
    
      <div class="mininav">
        <i id="img_add" class='bx bxs-user-plus'></i>
        <span>Seus Quadros da Área de Trabalho</span>
      </div>
      <div class="quadros">
        <?php 
        
        foreach ($quadros as  $value) {
            //modal para colocar o titulo
            echo '<a href="indeex.php?id='.$value['idQUADRO'].'">';
            echo '<button type="submit" class="novo_quadro">'.$value['Titulo'].'</button>';
            echo '</a>';
        
        
        }
        
              //botão para ir para o modal
              echo '<button type="button" class="btn-nq" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Crie um Novo Quadro
            </button>';
              
          
        ?>
      </div>
      
     <!-- Button trigger modal -->


<!-- Modal Bootstrap -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        <form action="php/novoquadro.php" method="POST">

          <input type="text" name="Titulo" placeholder="Titulo" id="" required>
          <button type="submit" class="btn btn-secondary">Criar quadro</button>

        </form>
      </div>
      
    </div>
  </div>
</div>


    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>