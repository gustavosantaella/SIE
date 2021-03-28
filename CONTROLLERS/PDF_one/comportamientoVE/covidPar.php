<?php 

require ("../../../vendor/autoload.php");
/*include_once("../../../CONFIG/datosBD.php");
include_once("../../../autocarga.php");*/

use Spipu\Html2Pdf\Html2Pdf;
ob_start();


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

include_once("../../../VIEW/PDF_one/comportamientoVE/covidPar.php");

/*include_once("../../VIEW/EXCEL_one/contaMun.php");*/


$html=ob_get_clean();
$html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3);
$html2pdf->writeHTML($html);
$html2pdf->output($estado.'-'.$mun.''.'.pdf');







?>