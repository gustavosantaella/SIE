<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>tasa de fallecidos y de afectados</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<table border="1">	
		<thead>
			<tr>
				<th>País</th>
				<th>Afectados</th>
				<th>Fallecidos</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			for ($i=0; $i <count($paises) && $i<count($afectados) &&$i<count($fallecidos); $i++): ?>


				<tr>
					<th><?php echo $paises[$i] ?></th>
					<td><?php echo $afectados[$i] ?></td>
					<td><?php echo $fallecidos[$i] ?></td>
				</tr>



				<?php 
			endfor;
			?>
		</tbody>

	</table>
</body>
</html>