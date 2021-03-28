<?php 

require_once("../../CONTROLLERS/administrar/centros.php");
error_reporting(1);
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
       <form  id="form-agg" action="../../CONTROLLERS/administrar/pais.php" method="post" accept-charset="utf-8">

         <input type="text" required="" name="pais" value=""  class="agregar_data val" placeholder="País">

         <input type="number" required="" name="poblacion" value="" class="agregar_data val"  placeholder="Población">

         <input type="text" required="" name="continente" value=""  class="agregar_data val" placeholder="Continente">
         <span>¿Bloqueado o Neoliberal?</span>
         <select name="cont" required="" class="agregar_data val" >
          <option value="bloqueado">Bloqueado</option>
          <option value="neoliberal">Neoliberal</option>
          
        </select>
        <span>¿Seleccionado?</span>
        <select name="seleccionado" required="" class="agregar_data val" >
          <option value="1">Si</option>
          <option value="0">No</option>
          
        </select>
        <span>¿Activo?</span>
        <select name="status" required="" class="agregar_data val" >
          <option value="1">Activo</option>
          <option value="0">Inactivo</option>
          
        </select>
        <input type="submit" name="agregar" id="btn-enviar" value="Agregar" class="btn-success btn_agregar_data ">

      </form>
    </div>

  </div>
  <form id="formulario" method="post" action=""> 
    <table border="1" style="width: 0%!important;position: relative;top: 20px;" align="center">
     <thead>
      <tr>
       <td>Código</td>
       <td>Descripción</td>
       <td>Status</td>
       
       
       <TD colspan='3'>OPCIONES</TD>
     </tr>
   </thead>
   <tbody>
     <?php while ($cen = $c->fetch()): 

      if ($cen['status']===TRUE) {
        $status = 'Activo';
      }else{

        $status = 'Inactivo';
      }

      ?>
      <tr>

        <th><?php echo $cen['codcentro']?></th>
        <td><?php echo $cen['descentro']?></td>
        <td><?php echo $status ?></td>



        <td>

<!--           <input style="width: 100%;" name="eliminar" type="button" class="btn btn-danger btns eliminar" onclick="Eliminar('../../CONTROLLERS/administrar/centros.php','<?php echo $cen['codcentro'] ?>','paises.php')" id="eliminar" value="Eliminar"> -->


          <a href="../../VIEW/modificar/centros.php?codcentro=<?php echo $cen['codcentro'] ?>&&descentro=<?php echo $cen['descentro'] ?>&&status=<?php echo $cen['status']?>" title="MODIFICAR">  <input style="width: 100%"  class="btn btn-warning   btns modificar"  id="modificar" type="button" name="modificar" value="Modificar">   </a>

        </td>


      </tr>
    <?php endwhile?>
  </tbody>
  
</table>
</form>
</div>



<!-- </form> -->



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
EnviarAdmin('../../CONTROLLERS/administrar/pais.php')
</script>
<!--SCRIPTS PERSONALIZADOS-->


</body>

</html>
