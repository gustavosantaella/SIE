  <?php 
require_once("CONTROLLERS/funciones.php");
NoError();
sesionIndex();

   ?>
  <!DOCTYPE html>
  <html>

  <head>

    <meta name="viewport" content="width=device-width, initial-scale=.8">

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Observatorio Nacional de Ciencia y tecnología e innovación</title>

    <link rel="stylesheet" type="text/css" href="CSS/index.css">

    <link charset="UTF-8" rel="shortcut icon" href="IMG/icon.png" />
    

    



  </head>

  <body ><!-- oncopy="return false" onpaste="return false" -->
<div class="loader">
</div>
    <img src="IMG/Cintillo.png" class="cintillo" alt="IMG/Cintillo.png">
<!--action="CONTROLLERS/usuario/validarUser.php"-->
    <form  name="formulario" action="CONTROLLERS/usuario/validarUser.php" id="formulario" autocomplete="off" method="POST">

      <div class="cont">

        <div class="contenedor" id="cont">

          <img class="logo-img" src="IMG/logo.png" alt="logo oncti">

          <img class="user-img" src="IMG/user.png" alt="img user" align="center">
          <img class="pass-img" src="IMG/pass.png" alt="img user" align="center">

          <input type="text" name="user"  autofocus="" class="user val" id="user" placeholder="Usuario" value="">

          <input type="password" name="pass" class="pass val" id="pass" placeholder="Contraseña">

          <button type="submit" id="btn-enviar" class="send" name="aceptar" value="Aceptar" style="transform: scale(1.0);" >Aceptar</button>
        
        </div>
      </div>
      
    </form>

    <script src="JS/jquery-3.2.1.min.js"></script>
    <script src="JS/JQUERY/jquery.min.js"></script>
<script src="JS/funciones.js"></script>
<script> BtnAgregar();</script>

  </body>

  </html>