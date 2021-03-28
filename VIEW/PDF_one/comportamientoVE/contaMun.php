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
  <h1 align="center">Contagiados por COVID-19 en <?php echo $estado ?> - Venezuela el <?php echo date('d/m/Y',strtotime($fecha)) ?></h1>



<table border="1" align="center">
    <thead align="center" >
      <tr>
        <th>Municipio</th>
        <th>Recuperados</th>
        <th>Contagiados</th>
        <th>Fallecidos</th>
      </tr>
    </thead>


    <tbody>
      <?php 
      for ($i=0; $i <count($codmun) ; $i++) { 
        ?>

        <tr align="center">

          <th style="padding:20px">
<?php echo $mun[$i] ?>
          </th>
          <td><?php echo $recuperados[$i] ?></td>
          <td><?php echo $contagiados[$i] ?></td>
          <td><?php echo $fallecidos[$i] ?></td>

        </tr>

        <?php 
      }
      ?>
      <tr>
        <th colspan="3">Total general de casos comunitarios</th>
        <td align="center"><?php echo $cc ?></td>
      </tr>
      <tr>
        <th colspan="3">Total de casos comunitarios</th>
        <td align="center"><?php echo $total ?></td>
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
      top:auto;

    }
  </style>
</body>
</html>