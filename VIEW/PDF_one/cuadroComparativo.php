<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>

</head>
<body>
	<page_header> <img src="../../IMG/Cintillo.png" class="cintillo" alt="">
	<img src="../../IMG/logo.png" class="logo" alt="">
	<h1 align="center">Cuadro comparativo entre países neoliberales y países bloqueados</h1></page_header>

	<div class="content">
	<table border="1" class="table1">
			<thead>
				<tr>
					<th>País</th>
					<th>Población</th>
					<th>Contagiados</th>
					<th>%</th>
					<th>Fallecidos</th>
					<th>%</th>
				</tr>
			</thead>

			<tbody>
				<?php 

				for ($i=0; $i <count($id) ; $i++) { 
					if ($cont[$i]=='neoliberal') {
						$total_poblacion+=$poblacion[$i];
						$total_contagiados+=$contagiados[$i];
						$total_porcentaje_contagiados+=($contagiados[$i]*100)/$poblacion[$i];
						$total_porcentaje_fallecidos+=($fallecidos[$i]*100)/$poblacion[$i];
						$total_fallecidos+=$fallecidos[$i];
						?>

						<tr>
							<td><?= $despai[$i] ?></td>
							<td><?= $poblacion[$i] ?></td>
							<td><?= $contagiados[$i] ?></td>
							<td><?= round(($contagiados[$i]*100)/$poblacion[$i],3) ?></td>
							<td><?= $fallecidos[$i] ?></td>
							<td><?= round(($fallecidos[$i]*100)/$poblacion[$i],3) ?></td>




						</tr>
						<?php 
					}

					?>


					
					<?php 
				}

				?>
				<tr>
					<td>TOTAL</td>
					<td><?php echo $total_poblacion; ?></td>
					<td><?php echo $total_contagiados; ?></td>
					<td><?php echo round(($total_contagiados*100)/$total_poblacion,3) ?></td>
					<td><?php echo $total_fallecidos; ?></td>
					<td><?php echo round(($total_fallecidos*100)/$total_poblacion,3) ?></td>

				</tr>

			</tbody>



		</table>

		<table border="1" class="table2">
			<thead>
				<tr>
					<th>País</th>
					<th>Población</th>
					<th>Contagiados</th>
					<th>%</th>
					<th>Fallecidos</th>
					<th>%</th>
				</tr>
			</thead>

			<tbody>
				<?php 

				for ($i=0; $i <count($id) ; $i++) { 
					if ($cont[$i]=='bloqueado') {
						$total_poblacion+=$poblacion[$i];
						$total_contagiados+=$contagiados[$i];
						$total_porcentaje_contagiados+=($contagiados[$i]*100)/$poblacion[$i];
						$total_porcentaje_fallecidos+=($fallecidos[$i]*100)/$poblacion[$i];
						$total_fallecidos+=$fallecidos[$i];
						?>

						<tr>
							<td><?= $despai[$i] ?></td>
							<td><?= $poblacion[$i] ?></td>
							<td><?= $contagiados[$i] ?></td>
							<td><?= round(($contagiados[$i]*100)/$poblacion[$i],3) ?></td>
							<td><?= $fallecidos[$i] ?></td>
							<td><?= round(($fallecidos[$i]*100)/$poblacion[$i],3) ?></td>




						</tr>
						<?php 
					}

					?>


					
					<?php 
				}

				?>
				<tr>
					<td>TOTAL</td>
					<td><?php echo $total_poblacion; ?></td>
					<td><?php echo $total_contagiados; ?></td>
					<td><?php echo round(($total_contagiados*100)/$total_poblacion,3) ?></td>
					<td><?php echo $total_fallecidos; ?></td>
					<td><?php echo round(($total_fallecidos*100)/$total_poblacion,3) ?></td>

				</tr>

			</tbody>



		</table>
	</div>

	<page_footer ><div class="footer"><?php 

	echo date('d/m/Y').'<br>';
	echo date('h:i:s A');

	?></div></page_footer>


	<style type="text/css">

		.content{

			position: absolute;
			top: 400px;
			width: 100%;
			text-align: center;


		}

		td{
			padding: 25px;
		}


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

		.footer{
			position: relative;
			left: 90%;
			font-weight: bold;
		}


		.table2{

			position: relative;
			left:50%;
			top: -780px;
		}

		

	</style>

</body>
</html>


