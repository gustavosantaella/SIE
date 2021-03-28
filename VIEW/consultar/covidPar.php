
<?php 

/*include_once("../../CONTROLLERS/agregar/select_est.php");*/

include_once("../../CONTROLLERS/agregar/covidPar.php");


?>

<!DOCTYPE html>
<html lang="en" >

<head>

  <meta charset="utf-8">

  <!-- VISTA DE MOVIL -->
  <meta name="viewport" content="width=device-width, initial-scale=.5, shrink-to-fit=no">
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

  <form id="formulario" method="get" name="formulario" style="height: 200vh" >

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
     <td class="borderTable" style="width: 25%;text-align: center" ><input type="text" name="estado" readonly="" value="<?php echo $estado ?>" placeholder="" style='font-weight: bold;border:0;text-align: center;outline: none'><input type="hidden"readonly name="codest" value="<?php  ?>" placeholder=""></td>


     <td class="borderTable" id="resultMun" style="width: 10%;text-align-last: center;font-weight:bold" >


      <input type="text" name="desmun" readonly="false" class="input val" style="border:0;font-weight: bold;"value="<?php echo $mun ?>" placeholder="">
      <input type="hidden"readonly name="codmun" value="<?php echo $codmun ?>" placeholder="">

    </td>   
    <td>

      <?php for($i=0;$i<count($codpar);$i++){

        ?>

        <input type="text" name="par[]" readonly="false" class="input val" style="border:1px solid rgba(100,100,100,.3);font-weight: bold;"value="<?php echo $par[$i] ?>" placeholder="">
        <input type="hidden"readonly name="codpar[]" value="<?php echo $codpar[$i] ?>" placeholder="">
        <?php 
      } ?>

    </td>
    <td class="borderTable" id="inputR"style="width: 20%" >
     <?php

     foreach($recuperados as $recu){
       ?>
       <input type="text"readonly class="input val" style="border:1px solid rgba(100,100,100,.3)"name="recuperados[]" value="<?php echo $recu ?>" placeholder="Campo numérico">
       <?php 
     }

     ?>
   </td>
   <td class="borderTable" id="inputC"style="width: 20%" >
     <?php

     foreach($contagiados as $conta){
       ?>
       <input type="text"readonly class="input val" style="border:1px solid rgba(100,100,100,.3)"name="contagiados[]" value="<?php echo $conta ?>" placeholder="Campo numérico">
       <?php 
     }

     ?>
   </td>
   <td class="borderTable" id="inputF"style="width: 20%" >
     <?php

     for($i=0;$i<count($id);$i++){
       ?>
       <input type="text" readonly="" class="input val" style="border:1px solid rgba(100,100,100,.3)"name="fallecidos[]" value="<?php echo $fallecidos[$i] ?>" placeholder="Campo numérico">
       <input type="hidden" class="input val" style="border:1px solid rgba(100,100,100,.3)"name="id[]" value="<?php echo $id[$i] ?>" placeholder="Campo numérico">
       <?php 
     }

     ?>
   </td>
   <tr>
     <td class="borderTable">Total general de casos</td><td  colspan="5" class="borderTable"><input type="number" name="cc"  readonly="" style="border: 0;text-align:center;font-weight:bold;outline: none"value="<?php echo $cc; ?>" placeholder=""></td>

   </tr>
   <tr>
     <td class="borderTable">Total de casos comunitarios</td><td  colspan="5" class="borderTable"><input type="number" name="total"  readonly="" style="border: 0;text-align:center;font-weight:bold;outline: none"value="<?php echo $total; ?>" placeholder=""></td>
   </tr>

 </tr>
 <tr class="borderTable">
  <td colspan="6" rowspan=""  class="borderTable" headers="" align="left" ><input type="text" class="input " readonly="" style="border:1px solid rgba(100,100,100,.3);text-align:center!important;"id="fecha" required="" name="fecha" value="<?php echo $fecha ?>" placeholder="dd/mm/yyy" ></td>
</tr> 

<tr>
  <td colspan="2"> <input class=" btn btn-success btn-op excel"  style="left:50%;transform: scale(1.0);" type="button" id="btn-enviar" accept="../../CONTROLLERS/EXCEL_one/covidPar.php?" value="EXCEL"></input>

<!--     &nbsp;&nbsp;&nbsp;&nbsp;
 -->

    <input class=" btn btn-danger btn-op pdf" accept="../../CONTROLLERS/PDF_one/comportamientoVE/covidPar.php?" style="left:50%;transform: scale(1.0);" type="button" id="btn-enviar" value="PDF"></input>

    <input class=" btn btn-primary btn-op pdf" accept="../../VIEW/graficas/covidPar.php?" style="left:50%;transform: scale(1.0);" type="button" id="btn-enviar" value="GRÁFICA"></input>


  </td>
  </tr>

</table>
</form>

</div>
<!--------------FIN DEL CONTENIDO DE LA VISTA PRINCIPAL--------->
<!-- /#page-content-wrapper -->

</div>

<!-- Bootstrap core JavaScript -->
<script src="../../JS/JQUERY/jquery.min.js"></script>
<script src="../../JS/JS-BOOTSTRAP/bootstrap.bundle.min.js"></script>
<script src="../../JS/jquery-3.2.1.min.js"></script>
<script src="../../JS/funciones.js"></script>
<script src="../../JS/datepicker.js"></script>
<script src="../../JS/menu.js"></script>
<script>
  menu();
rutas()


</script>

<!--SCRIPTS PERSONALIZADOS-->


</body>

</html>
