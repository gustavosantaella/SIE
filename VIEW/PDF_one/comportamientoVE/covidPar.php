<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <link rel="shortcut icon" href="../../../IMG/icon.png">

</head>
<body>
  
  <page_header>
    <img src="../../../IMG/Cintillo.png" class="cintillo" alt="">
  <img src="../../../IMG/logo.png" class="logo" alt="">
  <h1 align="center">COVID-19 en <?= $estado ?> - <?= $mun ?> el <?= $fecha ?></h1>



<table border="1" align="center">
    <thead align="center" >
      <tr>
        <th>Parroquia</th>
        <th>Recuperados</th>
        <th>Contagiados</th>
        <th>Fallecidos</th>
      </tr>
    </thead>
    <tbody>
    
<?php 
for($i=0; $i<count($codpar);$i++){
  
?>

<tr  align="center">
  <th ><?php echo $par[$i] ?></th>
  <td><?php echo $recuperados[$i] ?></td>
  <td><?php echo $contagiados[$i] ?></td>
  <td><?php echo $fallecidos[$i] ?></td>
</tr>

<?php


}

?>

<tr align="center">
  <td colspan="">Total general de casos</td>
  <td colspan="3" rowspan="" headers=""><?php echo $cc ?></td>
</tr>


<tr align="center">
  <td colspan="">Total de casos comunitarios</td>
  <td colspan="3" rowspan="" headers=""><?php echo $total ?></td>
</tr>


    </tbody>
  </table>




  </page_header>
<page_footer style='text-align: right;font-weight: bold'>Fecha de consulta: <?php echo date("d/m/Y") ?></page_footer>

  


 
  


  





  <style type="text/css">
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

    table{
      width: auto;
      height: auto;
      font-size: 19px;
      position: relative;
      top:100px;


    }

    td{
      padding:20px;
    }

  
  </style>
</body>
</html> 