<?php 

include_once("../../CONTROLLERS/agregar/contagiadosEst.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">

  <!-- VISTA DE MOVIL -->
  <meta name="viewport" content="width=device-width, initial-scale=.7, shrink-to-fit=no">
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

  <form id="formulario" method="post"  action="../../CONTROLLERS/agregar/covidPar.php" name="formulario">
   <table border="0" style="top: 50px;width: 100%;left: 0;text-align: center;">
    <tr>
      <th style="width: 5%;border:1px solid rgba(100,100,100,.3)">Estado</th>
      <th style="width: 20%;border:1px solid rgba(100,100,100,.3)">Municipio</th>
      <th style="width: 20%;border:1px solid rgba(100,100,100,.3)">Parroquia</th>

      <th class="borderTable">Recuperados</th>
      <th class="borderTable">Contagiados</th>
      <th class="borderTable">Fallecidos</th>
    </tr>
    <tr class="borderTable">
     <td class="borderTable" style="width: 25%;text-align: center" ><select required="" name="estados" style="font-weight: bold;text-align: center" id="estados" class="input  ">
      <option disabled selected=""></option>
      <?php while ($e = $estados->fetch()) {
        ?>
        <option  style="text-align:center;"value="<?php echo $e['codest'] ?>"><?php echo $e['desest'] ?></option>
        <?php 
      } ?>
    </select></td>


    <td class="borderTable" style="width: 10%;text-align-last: center;font-weight: bold"  id="resultMun">
    </td>
    <td class="borderTable" id="resultPar"></td>
    <td class="borderTable"  id="inputR"style="width: 10%" ></td>
    <td class="borderTable" id="inputC"style="width: 10%" ></td>
    <td class="borderTable" id="inputF"style="width: 10%" ></td>

  </tr>
  <tr class="borderTable">
    <td colspan="6" rowspan="" class="borderTable" headers="" ><input type="text" id="fecha" required="" name="fecha" value="" placeholder="dd/mm/yyy" style="width: 100%;text-align: center;"></td>
  </tr>

  <tr>
   <td colspan="2"> <input class=" btn btn-success btn-enviar"  style="left:50%;transform: scale(0.0);" type="submit" id="btn-enviar" value="Enviar"></input></td>
 </tr>
</table>
</form>

<div class="success" id="success">
  <div class="mensaje"></div>
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
<script src="../../JS/estados.js"></script>

<script>
  menu();


  selectMunPar();
  selectPar();


  /*rcfMun("../../CONTROLLERS/agregar/contagiadosMun.php")*/

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
