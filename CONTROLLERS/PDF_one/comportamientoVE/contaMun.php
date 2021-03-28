<?php 
require ("../../../vendor/autoload.php");

use Spipu\Html2Pdf\Html2Pdf;
ob_start();
include_once("../../../CONFIG/datosBD.php");
include_once("../../../autocarga.php");

use MODELS\indicadores\comportamientoVnzl as municipios;
$obj = new conexion;
$conex = $obj->conectar();

$object = new municipios\municipios;

if(isset($_GET['fecha'])){


	
	$fecha      = $_GET['fecha'];
	$codest      = $_GET['codest'];


	$data  =$object->casosComunitarios($conex,$codest,$fecha);
	$listar = $object->obtenerData_modif($conex,$codest,$fecha);

	$estado= [];
	$codest= [];
	$mun =[];
	$codmun =[];
	$recuperados =[];
	$contagiados =[];
	$fallecidos =[];
	$fecha =[];
	$id =[];
	$cc=[];
	$total=0;
	while ($m = $listar->fetch()) {
		$estado = $m['desest'];
		$codest = $m['codest'];
		$mun []=$m['desmun'];
		$codmun []=$m['codmun'];
		$recuperados []=$m['recuperados'];
		$fallecidos []=$m['fallecidos'];
		$contagiados []=$m['contagiados'];
		$fecha =$m['fecha'];
		$id []=$m['id'];
		$total +=$m['contagiados'];

	}


	while ($sum =$data->fetch()) {
		$cc =$sum['casos'];
	}
	include_once("../../../VIEW/PDF_one/comportamientoVE/contaMun.php");

	/*include_once("../../VIEW/EXCEL_one/contaMun.php");*/


	$html=ob_get_clean();
	$html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3);
	$html2pdf->writeHTML($html);
	$html2pdf->output($estado.'.pdf');



}

?>