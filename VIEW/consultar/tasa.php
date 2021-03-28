<?php 

require_once("../../CONTROLLERS/agregar/relaciones.php")

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

		<form id="formulario"   name="formulario">

			<table border="1">
				<thead>
					<tr>
						<th>País</th>
						<th>Tasa de afectados</th>
		
						<th>Tasa de fallecidos</th>
					</tr>
				</thead>
				<tbody> <?php  while ($actual = $date->fetch()):?> 

				<tr>
					<td style="width: 100%">
						<input type="text" name="paises[]"  readonly="" style="width: 100%;color: black;outline: none;border: 0" class="" value="<?php echo $actual['despai'] ?>" placeholder="">
					</td>
					<td>
						<input type="number" name="afectados[]"  readonly=""class="input" value="<?php echo $actual['afectados'] ?>" placeholder="">
					</td>
					<td>
						<input type="number" name="fallecidos[]"  readonly=""class="input" value="<?php echo $actual['fallecidos'] ?>" placeholder="">
					</td>
				</tr>

			<?php endwhile; ?>
		</tbody>
		<tr>
			<td colspan="4"><input type="text" name="fecha"  readonly=""class="input "value="<?php echo $fecha ?>" placeholder=""></td>
		</tr>

		<tr>
			<td style="border: 1px solid white;border-top: 1px solid black" colspan="4"><input type="button" name="" accept="../../CONTROLLERS/EXCEL_one/tasa.php?" class="btn-op  btn btn-success" value="EXCEL">

				<input type="button" name="" accept="../../CONTROLLERS/PDF_one/tasa.php?" class="btn-op  btn btn-danger" value="PDF">

				<input type="button" name="" accept="../../VIEW/graficas/tasa.php?" class="btn-op  btn btn-primary" value="GRÁFICA"></td>
			</tr>
		</table>




	</form>


</div>
<!--------------FIN DEL CONTENIDO DE LA VISTA PRINCIPAL--------->
<!-- /#page-content-wrapper -->

</div>

<style type="text/css">

	.btn-op{

		position: relative;
		left: 20%;
		top: 20px;
	}


</style>

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

<style>
	
	table{
	top:0;
	}
</style>

<!--SCRIPTS PERSONALIZADOS-->

</body>

</html>
