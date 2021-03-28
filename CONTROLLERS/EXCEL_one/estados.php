<?php 

/*include_once("../../CONTROLLERS/modificar/covidPar.php");*/

$estados= $_GET['estados'];
$contagiados= $_GET['contagiados'];
$fecha      = $_GET['fecha'];
$t =0;



INCLUDE_ONCE("../../VIEW/EXCEL_one/estados.php");



header("Pragma: ");
 header('Cache-control: ');
 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 header("Cache-Control: no-store, no-cache, must-revalidate");
 header("Cache-Control: post-check=0, pre-check=0", FALSE);
 header("Content-type: application/vnd.ms-excel");
 header("Content-disposition: attachment; filename=contagiados por estados-$fecha.xls");


 ?>