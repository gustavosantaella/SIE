<?php 


$encuesta= $_GET['encuesta'];
$contagiados= $_GET['contagiados'];
$fecha= $_GET['fecha'];
$total =0;

REQUIRE_ONCE("../../VIEW/EXCEL_one/encuesta.php");

header("Pragma: ");
 header('Cache-control: ');
 header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 header("Cache-Control: no-store, no-cache, must-revalidate");
 header("Cache-Control: post-check=0, pre-check=0", FALSE);
 header("Content-type: application/vnd.ms-excel");
 header("Content-disposition: attachment; filename=Encuesta patria-$fecha.xls");