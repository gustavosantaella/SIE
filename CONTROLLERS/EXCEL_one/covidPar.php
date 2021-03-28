<?php 

/*include_once("../../CONTROLLERS/modificar/covidPar.php");*/

$fecha = $_GET['fecha'];
$estado = $_GET['estado'];
$mun = $_GET['desmun'];
$cc = $_GET['cc'];
$par = $_GET['par'];
$codpar = $_GET['codpar'];
$codmun = $_GET['codmun'];
$recuperados = $_GET['recuperados'];
$contagiados = $_GET['contagiados'];
$fallecidos = $_GET['fallecidos'];
$total = $_GET['total'];


INCLUDE_ONCE("../../VIEW/EXCEL_one/covidPar.php");

header("Pragma: ");
 header('Cache-control: ');
 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 header("Cache-Control: no-store, no-cache, must-revalidate");
 header("Cache-Control: post-check=0, pre-check=0", FALSE);
 header("Content-type: application/vnd.ms-excel");
 header("Content-disposition: attachment; filename=$estado-$mun-$fecha.xls");


 ?>