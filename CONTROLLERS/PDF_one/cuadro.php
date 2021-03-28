<?php 
require ("../../vendor/autoload.php");

use Spipu\Html2Pdf\Html2Pdf;
ob_start();


$id = $_GET['id'];
$despai = $_GET['despai'];
$cont = $_GET['cont'];
$poblacion = $_GET['poblacion'];
$contagiados = $_GET['contagiados'];
$fallecidos = $_GET['fallecidos'];
$codpai = $_GET['codpai'];
$total_poblacion= 0;
$total_contagiados= 0;
$total_porcentaje_contagiados= 0;
$total_fallecidos= 0;
$total_porcentaje_fallecidos= 0;


require_once("../../VIEW/PDF_one/cuadroComparativo.php");
$html=ob_get_clean();
$html2pdf = new Html2Pdf('P','A2','es','true','UTF-8');
$html2pdf->writeHTML($html);
$html2pdf->output('cuadro.pdf');



?>