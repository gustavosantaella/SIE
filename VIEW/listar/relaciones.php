<?php 

require_once("../../CONTROLLERS/agregar/relaciones.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">

  <!-- VISTA DE MOVIL -->
  <meta name="viewport" content="width=device-width, initial-scale=.1, shrink-to-fit=no">
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


 <a name="contenidosas" id="contenidosas" title=""><div class="confirm"></a>
    <div class="alerta"><span>Alerta!</span></div>
    <div class="mensaje"></div>

    <input  name="" type="button" class="btn btn-danger btns  confirm-btn eliminar-btn" value="Si"></input>

    <input name=""type="button" value="No" class="btn btn-primary btns confirm-btn cancelar-btn"></input>
  </div>
  <div class="container-fluid">
    <div class="buscar" style="position: relative;top: 10px;left: 65%">
     <!--  <form id="formulario" method="post" action="../../VIEW/buscar/encuestaPatria.php">
        <input type="date" required="" id="fechabuscar" name="fecha" value="" placeholder="">
        <input type="submit" id="filtroBusqueda" name="" id="btnbuscar" value="Buscar">
      </form> -->
    </div>
    <table border="1" style="width: 80%;position: relative;top: 20px;" align="center">
     <thead>
      <tr>
       <td>ID</td>

       <TD>FECHA</TD>
       <TD colspan='3'>OPCIONES</TD>
     </tr>
   </thead>

   <?php 

   while ($datos = $listar->fetch()) { 
     ;
     ?>
     <tbody>
       <tr>
      
       <td><?php echo $datos['id'] ?></td>
        <td><input type="text" name="" style="border:0px;outline:none;text-align: center;background: transparent;" id="fecha-input" readonly="" value="<?php  echo $datos['fecha'] ?>" placeholder="">
        </td>


        <a href="#contenidosas" title="">
          <td><a href="../../CONTROLLERS/agregar/relaciones.php?eliminar=elimianr&&fecha=<?= $datos['fecha']?>"><input style="width: 50%;" type="button" class="btn btn-danger btns eliminar" id="eliminar" value="Eliminar"></a>



            <a href="../../VIEW/consultar/relacion.php?fecha=<?php echo $datos['fecha'] ?>" title=""><input style="width: 50%;" class="btn btn-primary btns consultar" id="consultar" type="button" name="" value="Consultar"></a> 

            <a href="../modificar/relacion.php?fecha=<?php echo $datos['fecha'] ?>" title=""><input style="width: 50%;" class="btn btn-warning  btns modificar" id="modificar" type="button" name="" value="Modificar"></a> 
          </td>
        </tr>
      </tbody>





      <?php 
    }
    ?>

  </table>
</div>



<!-- </form> -->
<?php 
?>



    </div>

       <!--------------FIN DEL CONTENIDO DE LA VISTA PRINCIPAL--------->
  <!-- /#page-content-wrapper -->


<!-- Bootstrap core JavaScript -->
<script src="../../JS/JQUERY/jquery.min.js"></script>
<script src="../../JS/JS-BOOTSTRAP/bootstrap.bundle.min.js"></script>
<script src="../../JS/jquery-3.2.1.min.js"></script>
<script src="../../JS/funciones.js"></script>
<script src="../../JS/datepicker.js"></script>
<script src="../../JS/menu.js"></script>

<script>menu();

</script>
<!--SCRIPTS PERSONALIZADOS-->

</body>

</html>
