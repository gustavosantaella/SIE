<?php require_once("../CONTROLLERS/funciones.php");sesion(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">

  <!-- VISTA DE MOVIL -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!----------------------------->

  <meta name="description" content="">
  <meta name="author" content="">

  <title>Observatorio Nacional de Ciencia y tecnología e innovación</title>

  <!-- Bootstrap core CSS -->
  <link href="../CSS/CSS-BOOTSTRAP/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../CSS/CSS-BOOTSTRAP/style.css" rel="stylesheet">

  <!-- ESTILOS PERSONALIZADOS POR MI --------->
  <link rel="stylesheet"  href="../CSS/style1.css">

  <link rel="shortcut icon" href="../IMG/icon.png" />

  <!------------------------------->



</head>

<body>
  <div class="loader"><h1 id="mensaje" style="display: none">Esta tardando mucho...</h1></div>
  <div class="images">

    <img class="cintillo" src="../IMG/Cintillo.png" alt="">
    
  </div>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" >
      <?php include_once("../menuindex.php"); ?>
          <!-- <div class="contenet">
            <h8 class="acordeon_titulo">Listar</h8>
          <p class="acordeon_contenido" style="display: none">Comportamiento del covid en</p>
          </div>

          <div class="contenet">
            <h8 class="acordeon_titulo">Administrar</h8>
          <p class="acordeon_contenido" style="display: none">Comportamiento del covid en</p>
        </div> -->





      </div>
      

    </div>


  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper">

    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
      <button class="btn btn-primary" id="menu-toggle">Menu</button>

     <?php if ($_SESSION['rol']!==null) {
      ?>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="#"><!--home--> <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><!--link--></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Opciones
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Usuario:<b> <?php echo $_SESSION['user'] ?></b></a>
              <a class="dropdown-item" id="cuenta" href="#">Rol:<b> <?php if ($_SESSION['rol']==='SU' ):
                 echo "Super usuario";

               else:

                echo $_SESSION['rol'];

              endif?></b></a> 
              <a class="dropdown-item" id="salir" href="../CONTROLLERS/usuario/logout.php">Salir</a>
              <div class="dropdown-divider"></div>
            </div>
          </li>
        </ul>
      </div>
      <?php 
     } ?>
    </nav>
    <!------------- COMIENZO DEL CONTENIDO DE LA VISTA PRINCIPAL DENTRO DE SECTION-------------->
    <div class="container-fluid" >


      <img class="imgLogo" src="../IMG/icon.png" alt="" id="imgOC" >
      
    </div>
    <!--------------FIN DEL CONTENIDO DE LA VISTA PRINCIPAL--------->
    <!-- /#page-content-wrapper -->

  </div>

  <!-- Bootstrap core JavaScript -->
  <script src="../JS/JQUERY/jquery.min.js"></script>
  <script src="../JS/JS-BOOTSTRAP/bootstrap.bundle.min.js"></script>
  <script src="../JS/jquery-3.2.1.min.js"></script>
  <script src="../JS/funciones.js"></script>
  <script src="../JS/menu.js"></script>
  <script>imgZoom();menu();</script>

  <!--SCRIPTS PERSONALIZADOS-->

</body>

</html>
