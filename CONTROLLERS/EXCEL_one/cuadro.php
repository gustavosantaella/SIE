<?php 

/*include_once("../../CONTROLLERS/modificar/covidPar.php");*/

$id = $_GET['id'];
$despai = $_GET['despai'];
$cont = $_GET['cont'];
$poblacion = $_GET['poblacion'];
$contagiados = $_GET['contagiados'];
$fallecidos = $_GET['fallecidos'];
$fecha = $_GET['fecha'];
$codpai = $_GET['codpai'];
$total_poblacion= 0;
$total_contagiados= 0;
$total_porcentaje_contagiados= 0;
$total_fallecidos= 0;
$total_porcentaje_fallecidos= 0;



header("Pragma: ");
 header('Cache-control: ');
 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 header("Cache-Control: no-store, no-cache, must-revalidate");
 header("Cache-Control: post-check=0, pre-check=0", FALSE);
 header("Content-type: application/vnd.ms-excel");
 header("Content-disposition: attachment; filename=cuadro-$fecha.xls");


INCLUDE_ONCE("../../VIEW/EXCEL_one/cuadro.php");
 ?>