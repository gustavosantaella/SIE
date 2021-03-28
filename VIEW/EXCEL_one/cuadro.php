<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>

</head>
<body>




	<table border="1" class="table1">
			<thead>
				<tr>
					<th colspan="6">PRINCIPALES PAÍSES DEL NEOLIBERALISMO</th>
				</tr>
				<tr>
					<th bgcolor="#A9A9A9">País</th>
					<th bgcolor='purple'>Población</th>
					<th bgcolor='#008000'>Contagiados</th>
					<th bgcolor='#008000'>%</th>
					<th bgcolor='#FFD700'>Fallecidos</th>
					<th bgcolor='#FFD700'>%</th>
				</tr>
			</thead>

			<tbody>
				<?php 

				for ($i=0; $i <count($id) ; $i++) { 
					if ($cont[$i]=='neoliberal') {
						$total_poblacion+=$poblacion[$i];
						$total_contagiados+=$contagiados[$i];
						
						$total_fallecidos+=$fallecidos[$i];
						?>

						<tr>
							<td><?= $despai[$i] ?></td>
							<td ><?= $poblacion[$i] ?></td>
							<td><?= $contagiados[$i] ?></td>
							<td align="center"><?= round(($contagiados[$i]*100)/$poblacion[$i],2) ?></td>
							<td><?= $fallecidos[$i] ?></td>
							<td align="center"><?= round(($fallecidos[$i]*100)/$poblacion[$i],2) ?></td>




						</tr>
						<?php 
					}

					?>


					
					<?php 
				}

				?>
				<tr>
					<td  bgcolor="#A9A9A9">TOTAL</td>
					<td  bgcolor='purple'><?php echo $total_poblacion; ?></td>
					<td bgcolor='#008000'><?php echo $total_contagiados; ?></td>
					<td bgcolor='#008000' align="center"><?php echo round(($total_contagiados*100)/$total_poblacion,3) ?></td>
					<td bgcolor='#FFD700'><?php echo $total_fallecidos; ?></td>
					<td bgcolor='#FFD700' align="center"><?php echo round(($total_fallecidos*100)/$total_poblacion,3) ?></td>
				</tr>

			</tbody>



		</table>

		<br><br><br>

		<table border="1" class="table3">
			<thead>
				<tr>
					<th colspan="6">PRINCIPALES PAÍSES BLOQUEADOS POR EL NEOLIBERALISMO</th>
				</tr>
				<tr>
						<th bgcolor="#A9A9A9">País</th>
					<th bgcolor='purple'>Población</th>
					<th bgcolor='#008000'>Contagiados</th>
					<th bgcolor='#008000'>%</th>
					<th bgcolor='#FFD700'>Fallecidos</th>
					<th bgcolor='#FFD700'>%</th>
				</tr>
			</thead>

			<tbody>
				<?php 

				for ($i=0; $i <count($id) ; $i++) { 
					if ($cont[$i]=='bloqueado') {
						$total_poblacion+=$poblacion[$i];
						$total_contagiados+=$contagiados[$i];
						
						$total_fallecidos+=$fallecidos[$i];
						?>

						<tr>
							<td><?= $despai[$i] ?></td>
							<td><?= $poblacion[$i] ?></td>
							<td><?= $contagiados[$i] ?></td>
							<td align="center"><?= round(($contagiados[$i]*100)/$poblacion[$i],3) ?></td>
							<td><?= $fallecidos[$i] ?></td>
							<td align="center"><?= round(($fallecidos[$i]*100)/$poblacion[$i],3) ?></td>




						</tr>
						<?php 
					}

					?>


					
					<?php 
				}

				?>
				<tr>
					<td  bgcolor="#A9A9A9">TOTAL</td>
					<td  bgcolor='purple'><?php echo $total_poblacion; ?></td>
					<td bgcolor='#008000'><?php echo $total_contagiados; ?></td>
					<td bgcolor='#008000' align="center"><?php echo round(($total_contagiados*100)/$total_poblacion,3) ?></td>
					<td bgcolor='#FFD700'><?php echo $total_fallecidos; ?></td>
					<td bgcolor='#FFD700' align="center"><?php echo round(($total_fallecidos*100)/$total_poblacion,3) ?></td>

				</tr>

			</tbody>



		</table>
	
</body>
</html>


