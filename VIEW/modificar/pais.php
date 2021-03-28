
<?php 

include_once("../../CONTROLLERS/administrar/pais.php");

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

      <form id="formulario" method="post" action="../../CONTROLLERS/administrar/pais.php" name="formulario">
       <table border="1">
        <tr>
          <td>País</td><td><input type="text" class="input val" name="despai" id="recuperados" value="<?php echo $data['despai'] ?>" placeholder="País"></td>
        </tr>
     
        <tr>
          <td>Población</td><td><input type="number" class="input val" name="poblacion" id="fallecidos" value="<?php echo $data['poblacion'] ?>" placeholder="Población"></td>
        </tr>
        <tr>
          <td>Continente</td><td><select name="continente" class="input val">
            <option value="<?php echo $data['continente'] ?>" ><?php echo $data['continente'] ?></option>
            <option value="ASIA">ASIA</option>
            <option value="EUROPA">EUROPA</option>
            <option value="ÁFRICA">ÁFRICA</option>
            <option value="AMÉRICA">AMÉRICA</option>
            <option value="SUR AMÉRICA">SUR AMÉRICA</option>
            <option value="OCEANÍA">OCEANÍA</option>
          </select></td>
        </tr><tr>
          <td>Bloqueado o Neoliberal</td><td><select name="cont" class="input val">
            <option value="<?php echo $data['cont'] ?>" disabled=""><?php echo $data['cont'] ?></option>
            <option value="bloqueado">Bloqueado</option>
            <option value="neoliberal">Neoliberal</option>
          </select></td>
        </tr>
        <tr>
          <td>¿Seleccionado?</td><td><select name="seleccionado" class="input val">
            <option value="<?php echo $No ?>" ><?php echo $no ?></option>
            <option value="1">Si</option>
            <option value="0">No</option>
          </select></td>
        </tr>

        <tr>
          <td>Status</td><td><select name="status" class="input val">
            <option value="<?php echo $Status ?>"   ><?php echo $status ?></option>
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
          </select></td>
        </tr>
      <tr>
   <input type="hidden" name="codpai" value="<?php echo $_GET['id']?>" placeholder="">
        <td colspan="2">  <input class=" btn btn-success btn-enviar" type="submit" id="btn-enviar" value="Enviar"></input></td>
      </tr>
      </table>

    </form>
  <!--------------FIN DEL CONTENIDO DE LA VISTA PRINCIPAL--------->
  <!-- /#page-content-wrapper -->

</div>

<!-- Bootstrap core JavaScript -->
<script src="../../JS/JQUERY/jquery.min.js"></script>
<script src="../../JS/JS-BOOTSTRAP/bootstrap.bundle.min.js"></script>
<script src="../../JS/jquery-3.2.1.min.js"></script>
<script src="../../JS/swal.js"></script>

<script src="../../JS/funciones.js"></script>
<script src="../../JS/menu.js"></script>

<script>menu();


BtnEnviar_Modificar()
/*enviar("../../CONTROLLERS/administrar/pais.php",'../administrar/paises.php')*/


</script>
<!--SCRIPTS PERSONALIZADOS-->

</body>

</html>
