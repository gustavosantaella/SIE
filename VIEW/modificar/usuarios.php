
<?php 

include_once("../../CONTROLLERS/usuario/validarUser.php");

?>

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
  <link href="../../CSS/CSS-BOOTSTRAP/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../../CSS/CSS-BOOTSTRAP/style.css" rel="stylesheet">

  <!-- ESTILOS PERSONALIZADOS POR MI --------->
  <link rel="stylesheet"  href="../../CSS/style1.css">

  <link rel="stylesheet"  href="../../CSS/style2.css">

  <link rel="shortcut icon" href="../../IMG/icon.png" />

  <link rel="stylesheet"  href="../../CSS/datepicker.css">

  <!------------------------------->



</head>

<body>
  <div class="loader"><h1 id="mensaje" style="display: none">Esta tardando mucho...</h1></div>
  <div class="images">

    <img class="cintillo" src="../../IMG/Cintillo.png" alt="">

  </div>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper" >
      <?php include_once("../../menu.php"); ?>
      

      </div>
      

    </div>


  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper">

     <?php include_once("../../menux2.php"); ?>
    <!------------- COMIENZO DEL CONTENIDO DE LA VISTA PRINCIPAL DENTRO DE SECTION-------------->
    <div class="container-fluid" >

      <form id="formulario" method="post" action="../../CONTROLLERS/usuario/validarUser.php" name="formulario">
       <table border="1">
        <tr>
          <td>Nombre</td><td><input type="text" class="input val" name="name" id="recuperados" value="<?php echo $nombre ?>" placeholder="Nombre"></td>
        </tr>
      <!--   <tr>
          <td>Contagiados</td><td><input type="text" class="input val" name="contagiados" id="contagiados" value="<?php echo $contagiados ?>" placeholder="Intruduzca un valor numérico"></td>
        </tr> -->
        <tr>
          <td>Apellido</td><td><input type="text" class="input val" name="lastName" id="fallecidos" value="<?php echo $apellido ?>" placeholder="Apellido"></td>
        </tr>
        <tr>
          <td>Usuario</td><td><input type="text" class="input val" name="user" id="masculinos" value="<?php echo $usuario ?>" placeholder="Usuario"></td>
        </tr>
        <tr>
          <td>Rol</td><td><select name="rol" class="input val">
            <option value="administrador" selected="" ><?php echo $rol ?></option>
            <option value="administrador">Administrador</option>
            <option value="invitado">Invitado</option>
          </select></td>
        </tr>

       <!--  <tr>
          <td>Clave</td><td><input type="password" class="input val" name="password" id="femeninnos" value="<?php echo $clave ?>" placeholder="Clave"></td>
        </tr> -->
    
      <tr>
        <td colspan="2">  <input class=" btn btn-success btn-enviar" type="submit" id="btn-enviar" value="Enviar"></input></td>
      </tr>
      </table>
      <input type="hidden" name="id" value="<?php echo $id ?>" placeholder="">
    </form>
  <!--------------FIN DEL CONTENIDO DE LA VISTA PRINCIPAL--------->
  <!-- /#page-content-wrapper -->

</div>

<!-- Bootstrap core JavaScript -->
<script src="../../JS/JQUERY/jquery.min.js"></script>
<script src="../../JS/JS-BOOTSTRAP/bootstrap.bundle.min.js"></script>
<script src="../../JS/jquery-3.2.1.min.js"></script>
<script src="../../JS/swal.js"></script>

<script src="../../JS/funciones.js"></script>
<script src="../../JS/menu.js"></script>

<script>menu();


BtnEnviar_Modificar()



enviar("../../CONTROLLERS/usuario/validarUser.php",'../administrar/usuarios.php?usuarios=usuarios')


</script>
<!--SCRIPTS PERSONALIZADOS-->

</body>

</html>
