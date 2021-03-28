<?php 
require ("../../../vendor/autoload.php");

use Spipu\Html2Pdf\Html2Pdf;
ob_start();


$recuperados= $_GET['recu'];
$contagiados= $_GET['contagiados'];
$fallecidos = $_GET['fallecidos'];
$masculino  = $_GET['masculino'];
$femenino   = $_GET['femenino'];
$fecha      = $_GET['fecha'];
$id         = $_GET['id'];

include_once("../../../VIEW/PDF_one/comportamientoVE/RCFvePDF.php");


$html=ob_get_clean();
$html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
$html2pdf->writeHTML($html);
$html2pdf->output('comportamientoVe.pdf');
?>