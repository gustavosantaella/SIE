<?php require_once("../../CONTROLLERS/agregar/RCFve.php"); ?>
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
  <!--   <div class="buscar">
      <form style="float: right;" id="formulario" method="post" action="../../VIEW/buscar/RCFvebuscar.php">
        <input type="date" required="" id="fechabuscar" name="fecha" value="" placeholder="">
        <input type="submit" id="filtroBusqueda" name="" id="btnbuscar" value="Buscar">
      </div> -->
      </form>

      <!-- <form action="../../CONTROLLERS/rangos/rcfve.php" method="post" > -->
      <form action="../../VIEW/graficas/rcfveRango.php" method="post" >
      
        <strong>Desde:</strong><input type="date" name="desde" id="date"   required="" value="" placeholder=""><strong>-Hasta:</strong>
        <input type="date" name="hasta" id="dates"  value=""  required="" placeholder="">
        <input type="submit" name="" value="GRÁFICA">
      </form>
    </div>
    <table border="1" >
     <thead>
      <tr>
       <td>ID</td>
       <TD>RECUPERADOS</TD>
       <TD>CONTAGIADOS</TD>
       <TD>FALLECIDOS</TD>
       <TD>CONTAGIADOS MASCULINOS</TD>
       <TD>CONTAGIADOS FEMENINOS</TD>
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
        <td id="hola"><?php echo $datos['id'] ?></td>
        <td><?php echo number_format($datos['recuperados'],0,",",'.') ?></td>
        <td><?php echo number_format($datos['contagiados_m']+$datos['contagiados_f'],0,",",'.') ?></td>
        <td><?php echo number_format($datos['fallecidos'],0,",",'.')?></td>
        <td><?php echo number_format($datos['contagiados_m'],0,",",'.') ?></td>
        <td><?php echo number_format($datos['contagiados_f'],0,",",'.')?></td>
        <td><input type="text" name="" style="border:0px;outline:none;text-align: center;background: transparent;" id="fecha-input" readonly="" value="<?php echo $datos['fecha'] ?>" placeholder="">
        </td>


        <a href="#contenidosas" title="">
          <td><a href="../../CONTROLLERS/agregar/RCFve.php?eliminar=eliminar&&id=<?php echo $datos['id']?>" title=""><input type="button" class="btn btn-danger btns eliminar" name="eliminar" id="eliminar" value="Eliminar"></a>



            <a href="../../VIEW/consultar/rcfve.php?id=<?php echo $datos['id']?>&&recuperados=<?php echo $datos['recuperados'] ?>&&fallecidos=<?php echo $datos['fallecidos'] ?>&&masculino=<?php echo $datos['contagiados_m'] ?>&&femenino=<?php echo $datos['contagiados_f'] ?>&&fecha=<?php echo $datos['fecha'] ?>" title=""><input class="btn btn-primary btns consultar" id="consultar" type="button" name="" value="Consultar"></a> 

            <a href="../modificar/RCFve.php?id=<?php echo $datos['id']?>&&recuperados=<?php echo $datos['recuperados'] ?>&&contagiados=<?php echo $datos['contagiados'] ?>&&fallecidos=<?php echo $datos['fallecidos'] ?>&&masculino=<?php echo $datos['contagiados_m'] ?>&&femenino=<?php echo $datos['contagiados_f'] ?>&&fecha=<?php echo $datos['fecha'] ?>" title=""><input class="btn btn-warning  btns modificar" id="modificar" type="button" name="" value="Modificar"></a> 
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

//buscar();</script>
<!--SCRIPTS PERSONALIZADOS-->

</body>

</html>
