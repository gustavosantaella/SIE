<?php 



require_once("../../CONTROLLERS/modificar/modificarTasa.php");

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

  <link rel="shortcut icon" href="../../IMG/icon.png" />

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
      <?php include_once("../../menu.php") ?>
    </div>


  </div>


</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

   <?php include_once("../../menux2.php"); ?>
  <!------------- COMIENZO DEL CONTENIDO DE LA VISTA PRINCIPAL DENTRO DE SECTION-------------->
  <div class="container-fluid" >

    <form id="formulario" method="post" action="../../CONTROLLERS/agregar/relaciones.php" name="formulario">
     <table border="1">
      
      <tr>
        <th colspan="5" align="center">RELACIONES ENTRÉ PAÍSES SELECCIONADOS</th>
      </tr>
    
    <tr>
      <th>Países</th>
      <th>Afectados</th>
      <th>Fallecidos</th>
    </tr>
    
    <?php 
$fecha =[];
while($d = $data->fetch()): $fecha = $d['fecha'];?>

 <tr>
   <th><?php echo $d['despai'] ?><input type="hidden" name="codpai[]" value="<?php echo $d['codpai'] ?>" placeholder=""></th>
   <th hidden=""><input type="hidden" name="id[]" value="<?php echo $d['id'] ?>" placeholder=""></th>
   <td><input  class="input val" type="number" name="afec[]" value="<?php echo $d['afectados'] ?>" placeholder="Valor numérico"></td>
   <td><input  class="input val" type="number" name="falle[]" value="<?php echo $d['fallecidos'] ?>" placeholder="Valor numérico"></td>

 </tr>
  <?php 

endwhile

     ?>

<tr>
 <td colspan="5" rowspan="" class="borderTable" headers="" ><input type="text" id="fecha" required="" name="fecha" value="<?php echo $fecha?>" placeholder="dd/mm/yyy" style="width: 100%"></td>
</tr>


<tr class="borderTable">
  <td class="borderTable" colspan="5"> <input type="submit" id="btn-enviar" class="btn btn-success btn-enviar" name="" value="ENVIAR"></td>
</tr>
    </table>
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
<script>
  menu();

BtnEnviar_Modificar();
enviar('../../CONTROLLERS/agregar/relaciones.php','../../VIEW/listar/tasas.php')
</script>

<!--SCRIPTS PERSONALIZADOS-->
<script>

 $(function(){
  $("#fecha").datepicker({
    dateFormat: "dd-mm-yy",
    minDate:0,
    monthNames:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Nomviembre','Diciembre',],
    dayNamesMin:['Do','Lu','Ma','Mie','Jue','Vie','Sab'],

  });
});
</script>
</body>

</html>
