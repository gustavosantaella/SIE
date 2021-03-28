<?php 

require_once("../../CONTROLLERS/usuario/validarUser.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">

  <!-- VISTA DE MOVIL -->
  <meta name="viewport" content="width=device-width, initial-scale=.3, shrink-to-fit=no">
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

  <link rel="stylesheet" type="text/css" href="../../CSS/style3.css">

  <link rel="shortcut icon" href="../../IMG/icon.png" />

  <link rel="stylesheet" href="../../CSS/datepicker.css">
  <link rel="stylesheet" href="../../CSS/style7.css">


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
  <div class="container-fluid" id="result">


    <input type="button" class="position-relative btn-primary"  style="border-radius: 5px; font-weight: bold;top:5px;outline: none" id="agregar_data" style="top:10px" name="" value="Agregar">
    <div class="modal-content position-absolute">
      <input type="button" name="" id="btn-cancelar" value="X" class="btn-danger ">
      <div class="modal-con">
       <form  id="form-agg" action="../../CONTROLLERS/usuario/validarUser.php" method="post" accept-charset="utf-8">
         <input type="text" required="" name="nombre" class="agregar_data val" value="" placeholder="Nombre">

         <input type="text" required="" name="apellido" value=""  class="agregar_data val" placeholder="Apellido">

         <input type="text" required="" name="usuario" value="" class="agregar_data val"  placeholder="Usuario">

         <input type="password" required="" name="clave" value=""  class="agregar_data val" placeholder="Clave">

       <!--   <input type="email" required="" name="correo" value=""  class="agregar_data  val position-relative" placeholder="Correo"> -->

         <select name="rol" required="" class="agregar_data val" >
          <option value="administrador">Administador</option>
          <option value="invitado">Invitado</option>
          
        </select>
        <input type="text"  hidden="" name="agregar" value="agregar" placeholder="">
        <input type="submit" name="agregar" id="btn-enviar" value="Agregar" class="btn-success btn_agregar_data ">

      </form>
    </div>


  </div>
  <form id="formulario" method="GET" action="../../CONTROLLERS/usuario/validarUser.php"> 
    <table border="1" style="position: relative;top: 20px;" align="center" class="">
     <thead>
      <tr>

       <td>Nombre</td>
       <td>Apellido</td>
       <td>Usuario</td>
       <td>Rol</td>
       <TD colspan='3'>OPCIONES</TD>
     </tr>
   </thead>
   <?php 

   while ($datos = $usuarios->fetch()) { 
     ;
     ?>
     <tbody>
       <tr>

        <th hidden=""><input type="text" name="id" readonly=""style="border:0px;outline:none;text-align: center;background: transparent;" id="fecha-input" value="<?php  echo $datos['id'] ?>" placeholder="">
        </th>

        <td><input type="text" name="nombre"  readonly="" class="nombre"style="border:0px;outline:none;text-align: center;background: transparent;" id="fecha-input" value="<?php  echo $datos['nombre'] ?>" class='disabled' placeholder=""></td>

        <td><input type="text" name="apellido"  readonly="" class="apellido"style="border:0px;outline:none;text-align: center;background: transparent;" id="fecha-input" value="<?php  echo $datos['apellido'] ?>" class='disabled' placeholder=""></td>

        <td><input type="text" name="usuario" readonly="" class="usuario"style="border:0px;outline:none;text-align: center;background: transparent;" id="fecha-input" value="<?php  echo $datos['usuario'] ?>" class='disabled' placeholder=""></td>




        <td><input type="text" name="rol"  readonly="" class="correo"style="border:0px;outline:none;text-align: center;background: transparent;" id="fecha-input" value="<?php  echo $datos['rol'] ?>"  class='disabled'placeholder=""></td>


        <?php if ($datos['rol']!='SU'):
          ?>
          <td><a href="../../CONTROLLERS/usuario/validarUser.php?id=<?= $datos['id']?>&&rol=<?= $datos['rol']?>&&eliminar=eliminar"><input style="width: 100%;" name="eliminar" type="button" class="btn btn-danger btns eliminar" id="eliminar" value="Eliminar"></a>


           <a href="../../VIEW/modificar/usuarios.php?nombre=<?php echo $datos['nombre'] ?>&&apellido=<?php echo $datos['apellido'] ?>&&id=<?php echo $datos['id'] ?>&&correo=<?php echo $datos['correo'] ?>&&rol=<?php echo $datos['rol'] ?>&&usuario=<?php echo $datos['usuario'] ?>" title=""><input style="width: 100%;"  class="btn btn-warning   btns modificar"  id="modificar" type="button" name="modificar" value="Modificar"></a> 
         </td>

         <?php 
          # code...
       endif ?>
     </tr>
   </tbody>
   <?php 
 }
 ?>

</table>
</form>
</div>

</div>

<!--------------FIN DEL CONTENIDO DE LA VISTA PRINCIPAL--------->
<!-- /#page-content-wrapper -->


<!-- Bootstrap core JavaScript -->
<script src="../../JS/JQUERY/jquery.min.js"></script>
<script src="../../JS/JS-BOOTSTRAP/bootstrap.bundle.min.js"></script>
<script src="../../JS/jquery-3.2.1.min.js"></script>
<script src="../../JS/swal.js"></script>

<script src="../../JS/funciones.js"></script>
<script src="../../JS/menu.js"></script>

<script>menu();

BtnAgregar();
agregar_data_admin();
rutas();

EnviarAdmin('../../CONTROLLERS/usuario/validarUser.php');
</script>
<!--SCRIPTS PERSONALIZADOS-->


</body>

</html>
