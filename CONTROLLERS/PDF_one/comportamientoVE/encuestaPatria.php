<?php 
require ("../../../vendor/autoload.php");

use Spipu\Html2Pdf\Html2Pdf;
ob_start();

use MODELS\indicadores\comportamientoVnzl as encuestaPatria;

try{
	include_once("../../../autocarga.php");
include_once("../../../CONFIG/datosBD.php");

$conexion = new conexion;
$conex = $conexion->conectar();



$obj = new encuestaPatria\encuestaPatria($conex);


$fecha      = $_GET['fecha'];

$data = $obj->pdf_one($conex,$fecha);



include_once("../../../VIEW/PDF_one/comportamientoVE/encuestaPatria.php");


$html=ob_get_clean();
$html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
$html2pdf->writeHTML($html);
$html2pdf->output('comportamientoVe.pdf');
}catch(PDOException $e){

	echo "error";
}
?>