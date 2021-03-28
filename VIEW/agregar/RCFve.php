<?php require_once("../../CONTROLLERS/agregar/RCFve.php") ?>
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

    <form id="formulario" method="post" action="../../CONTROLLERS/agregar/RCFve.php" name="formulario">
     <table border="0">
      <tr class="borderTable">
        <td class="borderTable">Recuperados</td><td class="borderTable"><input type="number" min="1" pattern="^[0-9]+" class="input val" name="recuperados" id="recuperados" value="" placeholder="Intruduzca un valor numérico"></td>
      </tr>
     <!--  <tr>
        <td>Contagiados</td><td><input type="number" class="input val" name="contagiados" id="contagiados" value="" placeholder="Intruduzca un valor numérico"></td>
      </tr> -->
      <tr class="borderTable">
        <td class="borderTable">Fallecidos</td><td class="borderTable"><input type="number" class="input val" name="fallecidos" id="fallecidos" value="" placeholder="Intruduzca un valor numérico"></td>
      </tr>
      <tr class="borderTable">
        <td class="borderTable">Contagiados masculinos</td><td class="borderTable"><input type="number" class="input val" name="masculino" id="masculinos" value="" placeholder="Intruduzca un valor numérico"></td>
      </tr><tr class="borderTable">
        <td class="borderTable">Contagiados femeninos</td><td class="borderTable"><input type="number" class="input val" name="femeninno" id="femeninnos" value="" placeholder="Intruduzca un valor numérico"></td>
      </tr>
      <tr class="borderTable">
        <td colspan="5" rowspan="" class="borderTable" headers="" ><input type="text" id="fecha" required="" name="fecha" value="" placeholder="dd/mm/yyy" style="width: 100%"></td>
      </tr>

      <tr>
        <td colspan="2"><input class=" btn btn-success btn-enviar btn-sm" type="button" id="btn-enviar" value="Enviar"></input></td>
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
var url='../../CONTROLLERS/agregar/RCFve.php';

BtnAgregar()
enviar(url,'RCFve.php')


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
