
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Comportamiento del covid en venezuela</title>
	  <link rel="shortcut icon" href="../../../IMG/icon.png">

</head>
<body>
	<img src="../../../IMG/Cintillo.png" class="cintillo" alt="">
	<img src="../../../IMG/logo.png" class="logo" alt="">
	<h1>Comportamiento del COVID-19 en Venezuela el <?php echo $fecha ?></h1>

<table border="1" align="center">
	<thead>
		<tr>
			<td>Recuperados</td>
			<td>Contagiados</td>
			<td>Fallecidos</td>
			<td>Contagiados Masculinos</td>
			<td>Contagiados Femeninos</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo number_format($recuperados,0,',','.') ?></td>
			<td><?php echo number_format($masculino+$femenino,0,',','.') ?></td>
			<td><?php echo number_format($fallecidos,0,',','.') ?></td>
			<td><?php echo number_format($masculino,0,',','.') ?></td>
			<td><?php echo number_format($femenino,0,',','.') ?></td>
		</tr>
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