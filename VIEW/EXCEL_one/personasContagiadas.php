<meta charset="utf-8">
<table border="1">
	<caption>Personas contagidas el <?= $fecha ?></caption>
		
		 <?php $total=0; for($i=0;$i<count($centros)||$i<count($personas);$i++):
		 $total +=$personas[$i];
            ?>

            <tr>
<th><?php echo $centros[$i] ?></th>
<td><?php echo $personas[$i];?></td>

</tr>
            <?php 

		 endfor ?>
		 <tr>
		 	<th bgcolor="tan">Total</th>
		 	<td bgcolor="tan"><?php echo $total; ?></td>
		 </tr>
	


	

</table>