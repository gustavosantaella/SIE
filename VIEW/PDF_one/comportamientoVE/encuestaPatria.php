<!-- <?php 


?> -->
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
	<h1>Encuesta patria <?php echo date('d/m/Y',strtotime($fecha)) ?></h1>

	<table border="1" align="center">
		<thead>
			<tr>
				<td colspan="2">Encuesta patria</td>

			</tr>
		</thead>
		<tbody>


			<?php while ($col = $data->fetch()) {
				?>
				<tr>
					<td><?php echo $col['desencuesta'] ?></td>
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