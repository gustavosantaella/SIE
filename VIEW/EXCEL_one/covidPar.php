<head>
  <meta charset="utf-8">
  <title><?php echo $estado ?></title>
</head>

<table width="1000%" border="1" cellspacing="20" cellpadding="20" >
  <tr>
      <th class="" colspan="4" align="center" rowspan="value"><?php echo $estado; ?> - <?php echo $mun ?> </th>
  </tr>
    <tr >
      <th>Parroquia</th>
      <th class="" width="200%">Recuperados</th>
      <th class="" width="200%">Contagiados</th>
      <th class="" width="200%">Fallecidos</th>
    </tr>
    <tr class="" >

   <td width="200" >


 <?php for($i=0;$i<count($codpar);$i++){

          ?>
          <font face="bold" ><?php echo $par[$i]; ?></font><br>

          <?php 
        } ?>
          
     

   </td>
   <td>
     <?php for($i=0;$i<count($codpar);$i++){

     ?>


  <?php echo $recuperados[$i].'<br>' ?>



     <?php 


     } ?>
   </td>
   <td>
     <?php for($i=0;$i<count($codpar);$i++){

     ?>


  <?php echo $contagiados[$i].'<br>' ?>



     <?php 


     } ?>
   </td>

   <td>
     <?php for($i=0;$i<count($codpar);$i++){

     ?>


  <?php echo $fallecidos[$i].'<br>' ?>



     <?php 


     } ?>
   </td>
 </tr>
   <tr>
       <th bgcolor="#339FFF" width="200">Total general de casos</th><td  bgcolor="#339FFF" color='white'colspan="3" class=""  align="center"><font color="white" face="bold"><?php echo $cc; ?></font></td>
       
     </tr>
     <tr>
       <th bgcolor="#339FFF"  width="200">Total de casos comunitarios</th><td  bgcolor="#339FFF" colspan="3" class="" align="center"><font color="white" face="bold"><?php echo $total; ?></font></td>
     </tr>

   <tr class="">
    <td colspan="4" rowspan=""  class="" headers="" align="center" ><font face="bold"><?php echo date("d/m/Y",strtotime($fecha)) ?></font></td>
  </tr> 

   
</table>



