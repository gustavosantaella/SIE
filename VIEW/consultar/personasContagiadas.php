
<?php 



include_once("../../CONTROLLERS/agregar/personas-contagiadas.php");

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
		<form id="formulario" method="post" action="../../CONTROLLERS/modificar/personasContagiadasModificado.php" name="formulario">
			<table border="1">

				<?php 
				$fecha=[];


				while ( $data = $listar->fetch()) {$fecha= $data['fecha'];?>
				<tr>
					<td><input type="text" style="font-weight: bold;border:0px;outline: none" readonly=""name="centros[]" value="<?php echo $data['descentro'] ?>" placeholder=""></td>

					<td><input type="number" readonly="" class="input val" name="personas[]" id="recuperados" value="<?php echo $data["contagiados"] ?>" placeholder="Intruduzca un valor numérico"></td>

					<td><input type="hidden" readonly="" name="id[]" value="<?php echo $data['id'] ?>" placeholder=""></td>



					<?php 

				}

				?>
			</tr> 
			<td colspan="5" rowspan="" headers="" ><input type="text" id="fecha" required="" readonly="" name="fecha" value="<?php echo $fecha ?>" readonly="" placeholder="dd/mm/yyy" style="width: 100%"></td>
		</tr>


		<tr>
			<td colspan="2"><input class=" btn btn-success btn-op" readonly="" accept="../../CONTROLLERS/EXCEL_one/personasContagiadas.php?" type="button" id="btn-enviar" value="EXCEL"></input>

				<input class=" btn btn-danger btn-op" readonly="" type="button" accept="../../CONTROLLERS/PDF_one/comportamientoVE/personasContagiadas.php?" id="btn-enviar" value="PDF"></input>

				<input class=" btn btn-primary btn-op" readonly="" accept="../../VIEW/graficas/personasContagiadas.php?" type="button" id="btn-enviar" value="GRÁFICA"></input></td>
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
<script src="../../JS/funciones.js"></script>
<script src="../../JS/datepicker.js"></script>
<script src="../../JS/menu.js"></script>

<script>

	menu();
	rutas();



</script>
<!--SCRIPTS PERSONALIZADOS-->


</body>

</html>
