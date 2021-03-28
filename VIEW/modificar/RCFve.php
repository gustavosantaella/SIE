
<?php 

include_once("../../CONTROLLERS/agregar/RCFve.php");

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

      <form id="formulario" method="post" action="../../CONTROLLERS/agregar/RCFve.php" name="formulario">
       <table border="1">
        <tr>
          <td>Recuperados</td><td><input type="number" class="input val" name="recuperados" id="recuperados" value="<?php echo $recuperados ?>" placeholder="Intruduzca un valor numérico"></td>
        </tr>
      <!--   <tr>
          <td>Contagiados</td><td><input type="number" class="input val" name="contagiados" id="contagiados" value="<?php echo $contagiados ?>" placeholder="Intruduzca un valor numérico"></td>
        </tr> -->
        <tr>
          <td>Fallecidos</td><td><input type="number" class="input val" name="fallecidos" id="fallecidos" value="<?php echo $fallecidos ?>" placeholder="Intruduzca un valor numérico"></td>
        </tr>
        <tr>
          <td>Contagiados masculinos</td><td><input type="number" class="input val" name="masculino" id="masculinos" value="<?php echo $masculino ?>" placeholder="Intruduzca un valor numérico"></td>
        </tr><tr>
          <td>Contagiados femeninnos</td><td><input type="number" class="input val" name="femenino" id="femeninnos" value="<?php echo $femenino ?>" placeholder="Intruduzca un valor numérico"></td>
          <input type="hidden" name="modificar" value="modificar" placeholder="">
        </tr>
        <tr>
          <td colspan="5" rowspan="" headers="" ><input type="text" id="fecha" required="" name="fecha" value="<?php echo $fecha ?>" placeholder="dd/mm/yyy" style="width: 100%"></td>
        </tr>

      <tr>
        <td colspan="2">  <input class=" btn btn-success btn-enviar" type="button"  id="btn-enviar" value="Enviar"></input></td>
      </tr>
      </table>
      <input type="text" style="display:none" name="id" value="<?php echo $id ?>" placeholder="">
    </form>

    <div class="success" id="success">
      <div class="mensaje" style="position:relative;top: 20px;font-weight: bold"></div>
    </div>
  </div>
  <!--------------FIN DEL CONTENIDO DE LA VISTA PRINCIPAL--------->
  <!-- /#page-content-wrapper -->

</div>

<!-- Bootstrap core JavaScript -->
<script src="../../JS/JQUERY/jquery.min.js"></script>
<script src="../../JS/JS-BOOTSTRAP/bootstrap.bundle.min.js"></script>
<script src="../../JS/jquery-3.2.1.min.js"></script>
<script src="../../JS/swal.js"></script>

<script src="../../JS/funciones.js"></script>
<script src="../../JS/datepicker.js"></script>
<script src="../../JS/menu.js"></script>

<script>menu();


BtnEnviar_Modificar()
enviar("../../CONTROLLERS/agregar/RCFve.php",'../../VIEW/listar/RCFve.php')


</script>
<!--SCRIPTS PERSONALIZADOS-->
<script>
  
 $(function(){
    $("#fecha").datepicker({
        dateFormat: "dd-mm-yy"
    });
});
</script>
</body>

</html>
