<meta charset="utf-8">

<table border="1">
	<th colspan="2">Encuesta patria el <?= $fecha?> </th>
	<?php for($i=0;$i<count($encuesta) && $i<count($contagiados);$i++):
	$total +=$contagiados[$i]; 
		?>

		<tr>
			<th contenteditable="">
				<?php echo $encuesta[$i] ?>
			</th>
			
			<td contenteditable="">
				<?php echo $contagiados[$i] ?>
			</td>
			
		</tr>


		<?php 
	endfor; 
	?>
	<tr>
		<th bgcolor="green"><font face="bold" color="white">Total</font></th>
		<td bgcolor="green"><font face="bold" color="white"><?php echo $total ?></font></td>
	</tr>
</table>