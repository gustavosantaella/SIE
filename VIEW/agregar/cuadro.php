
<?php 


include_once("../../CONTROLLERS/agregar/cuadro.php");

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

  <link rel="stylesheet"  href="../../CSS/style6.css">

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

  <form id="formulario" method="post" action="../../CONTROLLERS/agregar/cuadro.php" name="formulario">
    <div>
      
     
     <div >
       <div>
         <table border="0" class="tabla1" style="float: left;">
           <thead>
            <tr>
              <th colspan="3" class="borderTable" style='text-align:center;'>PRINCIPALES REPRESENTANTES DEL NEOLIBERALISMO</th>

            </tr>
            <tr>
             <th colspan="0" class="th borderTable" style='text-align: center;color:#ffff;' bgcolor="#A9A9A9"><span class="span">PAÍS</span></th>
             <!--    <th colspan="0" class="th"><span class="span">Recuperados</span></th> -->
             <th colspan="0" class="th borderTable" style='text-align: center;color:#ffff;' bgcolor='#008000'><span class="span" >CONTAGIADOS</span></th>
             <th colspan="0" class="th borderTable" style='text-align: center;color:#ffff;' bgcolor='#FFD700'><span class="span" >MUERTES</span></th>
             <!--         <th colspan="0" class="th"><span class="span">Fallecidos</span></th> -->

           </tr>
         </thead>
         <tr>
          <tbody>


            <?php while ($p = $pais[0]->fetch()) {
              ?>
              <tr class="borderTable">
               <th align="center" class="borderTable"> <?php echo $p['despai'] ?><input type="hidden" required=""name="codpai[]" value="<?php echo $p['codpai'] ?>" placeholder=""></th>
               <!--  <td><input type="number" class="val input"required="" name="recuperados[]" value="" placeholder="campo numérico"></td> -->
               <td class="borderTable"><input type="number" style="width: 100%;" class="val input"required="" pattern="[a-z]{1,15}" name="contagiados[]" value="" placeholder="campo numérico"></td>
               <td class="borderTable"><input type="number" style="width: 100%;" class="val input"required="" name="fallecidos[]" value="" placeholder="campo numérico"></td>
               <!-- <td><input type="number"class="val input" required="" name="fallecidos[]" value="" placeholder="campo numérico"></td> -->
             </tr>
             <?php 
           } ?>
           

           
         </tbody> 
       </table>
     </div>
   </div>






   <div >
    <div >
      <table border="0" class="table-blo" style="float: right;">
       <thead>
        <tr>
          <th colspan="3" class="borderTable"style='text-align:center;'>PAISES SANCIONADOS POR EL NEOLIBERALISMO</th>

        </tr>
        <tr>
         <th colspan="0" class="th borderTable" style='text-align: center;color:#ffff;'bgcolor="#A9A9A9"><span class="span">PAÍS</span></th>
         <!--    <th colspan="0" class="th"><span class="span">Recuperados</span></th> -->
         <th colspan="0" class="th borderTable" style='text-align: center;color:#ffff;' bgcolor='#008000'><span class="span" >CONTAGIADOS</span></th>
         <th colspan="0" class="th borderTable" style='text-align: center;color:#ffff;'bgcolor='#FFD700'><span class="span" >MUERTES</span></th>
         <!--         <th colspan="0" class="th"><span class="span">Fallecidos</span></th> -->

       </tr>
     </thead>
     <tr>
      <tbody>


        <?php while ($p = $pais[1]->fetch()) {
          ?>
          <tr class="borderTable">
           <th align="center" class="borderTable"> <?php echo $p['despai'] ?><input type="hidden" required=""name="codpai[]" value="<?php echo $p['codpai'] ?>" placeholder=""></th>
           <!--  <td><input type="number" class="val input"required="" name="recuperados[]" value="" placeholder="campo numérico"></td> -->
           <td class="borderTable"><input type="number" style="width: 100%;" class="val input"required="" name="contagiados[]" value="" placeholder="campo numérico"></td>
           <td class="borderTable"><input type="number" style="width: 100%;" class="val input"required="" name="fallecidos[]" value="" placeholder="campo numérico"></td>
           <!-- <td><input type="number"class="val input" required="" name="fallecidos[]" value="" placeholder="campo numérico"></td> -->
         </tr>
         <?php 
       } ?>

     </tbody> 
   </table>
 </div>
</div>

<table>
  <tr>
   <tr class="borderTable">
    <td colspan="4" class='move-fecha'><input class="fecha borderTable" style="width: 100%;" required="" name="fecha" type="text" id="fecha" placeholder="dd/mm/yyyy" value=""></input></td>
  </tr>
  <tr>
    <td colspan="4"><input class=" btn btn-success btn-enviar" type="submit" id="btn-enviar" value="Enviar"></input></td>
  </tr>
</tr>
</table>


<div class="success" id="success">
  <div class="mensaje" style="position:relative;top: 20px;font-weight: bold"></div>
</div>
</div>
</form>


</div>
<!--------------FIN DEL CONTENIDO DE LA VISTA PRINCIPAL--------->
<!-- /#page-content-wrapper -->

</div>

<style type="text/css">
  
  

</style>

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
  BtnAgregar()
  enviar('../../CONTROLLERS/agregar/cuadro.php','cuadro.php')
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
