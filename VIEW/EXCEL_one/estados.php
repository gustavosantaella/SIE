<meta charset="utf-8">

<table border="1">
	<thead>
		<tr>
			<th colspan="2">Contagiados por estados el <?php echo $fecha ?></th>
		</tr>
		<tr>
			<th>Estado</th>
			<th>Contagiados</th>
		</tr>
	</thead>

	<tbody>
		<?php 
for($i=0;$i<count($contagiados) && $i<count($estados);$i++):$t+=$contagiados[$i]?>
               
<tr>
	<th><?php echo $estados[$i] ?></th>
	<td><?php echo $contagiados[$i] ?></td>
</tr>

<?php endfor;

		 ?>
		 	<th bgcolor="green"><font face="bold" color="white">Total</font></th>
		<td bgcolor="green"><font face="bold" color="white"><?php echo $t ?></font></td>
	</tbody>
</table>