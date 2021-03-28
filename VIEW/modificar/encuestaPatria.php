<?php 

include_once("../../CONTROLLERS/agregar/encuestaPatria.php");


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
        <form id="formulario" method="post" action="../../CONTROLLERS/modificar/encuesta-patriaModificado.php" name="formulario">
       <table border="1">

<?php 
$fecha=[];


while ( $data = $listar->fetch()) {$fecha= $data['fecha'];?>
<tr>
          <td><?php echo $data['desencuesta'] ?></td>

          <td><input type="number" class="input val" name="encuesta[]" id="recuperados" value="<?php echo $data["contagiados"] ?>" placeholder="Intruduzca un valor numérico"></td>
          
          <td><input type="hidden" name="id[]" value="<?php echo $data['id'] ?>" placeholder=""></td>
    


  <?php 

}

 ?>
     </tr> 
          <td colspan="5" rowspan="" headers="" ><input type="text" id="fecha" required="" name="fecha" value="<?php echo $fecha ?>" placeholder="dd/mm/yyy" style="width: 100%"></td>

        </tr>
<tr>
  <td colspan="2" class="">   <input class=" btn btn-success btn-enviar" type="submit" id="btn-enviar" value="Enviar"></input></td>
</tr>
     
      </table>
 <!--  <select name="">
    <option value="x" disabled="" selected="" id="select">Escoja una fecha</option>
    <option value=""  selected="" id="select">2020-09-</option>
  </select> -->


    </form>
<!-- <input type="text" name="" value="" id="buscarfecha" placeholder=""> -->
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

enviar('../../CONTROLLERS/agregar/encuestaPatria.php','../../VIEW/listar/encuesta-patria.php')

</script>
<!--SCRIPTS PERSONALIZADOS-->


<script>
  
 $(function(){
    $("#fecha").datepicker({
        dateFormat: "dd-mm-yy"
    });
});


</script>
 <!--  <script>

    $(document).ready(()=>{

     x=   $("#buscarfecha").val();
       
       $("#buscarfecha").change(()=>{
        if (x!='' || x!=null) {
       s= $("#buscarfecha").val();
        $("#select").html(s);
       }
       })


    })



  </script> -->
</body>

</html>
