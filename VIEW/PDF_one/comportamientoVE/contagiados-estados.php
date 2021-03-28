<?php 
include_once("../../../autocarga.php");
include_once("../../../CONFIG/datosBD.php");

$conexion = new conexion;
$conex = $conexion->conectar();

use MODELS\indicadores\comportamientoVnzl as estados;

$obj = new estados\estados;


$fecha      = $_GET['fecha'];

$data = $obj->pdf_one($conex,$fecha);



?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="shortcut icon" href="../../../IMG/icon.png">

</head>
<body>
	<img src="../../../IMG/Cintillo.png" class="cintillo" alt="">
	<img src="../../../IMG/logo.png" class="logo" alt="">
	<h1>Contagiados por COVID-19 por estados - Venezuela el <?php echo date('d/m/Y',strtotime($fecha)) ?></h1>

	<table border="1" align="center">
		<thead>
			<tr>
				<th colspan="">Estados </th>
				<th>Contagiados</th>

			</tr>
		</thead>
		<tbody>


			<?php while ($col = $data->fetch()) {
				?>
				<tr>
					<td><?php echo $col['desest'] ?></td>
					<td style="width: 200px;"><?php echo $col['contagiados'] ?></td>
		
				</tr>
				<?php 
			} ?>

		</tbody>
	</table>




	<style>
		.cintillo{
			position: absolute;
			top: -20px;
			height: 100px;
			left: -3%;
			width: 110%;
		}

		.logo{
			position: absolute;
			top: 160px;
			left: 80%;
		}
		h1{
			text-align: center;
		}

		table{
			text-align: center;
			position: relative;
			top: 50px;

		}

		thead{
			font-weight: bold;
		}
		td{
			font-size: 17px;
			padding-bottom: 20px;
		}
	</style>
</body>
</html>