<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Relación de recuperados, contagiados y fallecidos</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<page_header><img src="../../IMG/Cintillo.png" class="cintillo" alt=""></page_header><br><br><br><br><br><br><br><br><br>
	<h1 align="center">Relación de recuperados, contagiados y fallecidos</h1>
	<table border="1">	
		<thead>
			<tr>
				<th>País</th>
				<th>Recuperados</th>
				<th>Contagiados</th>
				<th>Fallecidos</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			for ($i=0; $i <count($paises) && $i<count($contagiados) && $i<count($recuperados) &&$i<count($fallecidos); $i++): ?>


				<tr>
					<th><?php echo $paises[$i] ?></th>
					<td><?php echo $recuperados[$i] ?></td>
					<td><?php echo $contagiados[$i] ?></td>
					<td><?php echo $fallecidos[$i] ?></td>
				</tr>



				<?php 
			endfor;
			?>
		</tbody>

	</table>



	<page_footer><div class="footer">
		<b><?php echo "Fecha: ".date("d/m/Y")."<br>";
		echo date('h:i:s A');?></b>
	</div></page_footer>
	<style>
		.cintillo{
			position: absolute;
			top: -20px;
			height: 100px;
			left: -3%;
			width: 110%;
		}

		td{
			padding: 10px;
		}
		th{
			padding: 10px
		}

		table{
		position: relative;
		left: 15%;
		top: 50px;
		text-align: center;
		}

		.footer{
			position: relative;
			left: 80%;
		}
	</style>
</body>
</html>