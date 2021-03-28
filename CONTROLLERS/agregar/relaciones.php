<?php 

INCLUDE_ONCE("../../CONFIG/datosBD.php");
INCLUDE_ONCE("../../autocarga.php");
REQUIRE_ONCE("../../CONTROLLERS/funciones.php");
errores();
sesion();



USE MODELS\indicadores AS  relaciones;
USE MODELS\indicadores AS  tasas;

$conex =NEW conexion;
$tasas = NEW tasas\tasas;
$rel = NEW relaciones\relaciones();
$data = $rel->obtenerPaises($conex);
$tasa= $tasas->obtenerPaises($conex);


if (isset($_POST['recuperados']) && isset($_POST['contagiados']) && isset($_POST['fallecidos']) && isset($_POST['codpai']) && isset($_POST['fecha']) ) {

	$fecha = $_POST['fecha'];
	$recuperados = $_POST['recuperados'];
	$contagiados = $_POST['contagiados'];
	$fallecidos = $_POST['fallecidos'];
	$codpai = $_POST['codpai'];


	$verif = $rel->verificar($conex,$fecha);

	if ($verif->fetchColumn()>0) {

		echo 400;
	}else{
		$rel->agregar($conex,$recuperados,$contagiados,$fallecidos,$fecha,$codpai);
	}

}else if(!$_GET && !$_POST){

	$listar = $rel->listar($conex);
	$listarT = $tasas->listar($conex);

}else if(isset($_GET['fecha'])){

	$fecha =$_GET['fecha'];


$data= $rel->data_modif($conex,$_GET['fecha']);
$date=$tasas->data($conex,$_GET['fecha']);

if (isset($_GET['eliminar'])&&isset($_GET['fecha'])) {

	header("location:../../VIEW/listar/relaciones.php");
	$rel->eliminar($conex,$_GET['fecha']);

}else if(isset($_GET['tasa'])&&isset($_GET['fecha'])){

	header("location:../../VIEW/listar/tasas.php");
	$tasas->eliminar($conex,$_GET['fecha']);
}

}else if (isset($_POST['recu'])&&isset($_POST['conta']) && isset($_POST['falle'])&& isset($_POST['fecha'])&&isset($_POST['codpai'])&&isset($_POST['id'])) {


	$recuperados=$_POST['recu'];
	$contagiados=$_POST['conta'];
	$fallecidos=$_POST['falle'];
	$fecha=$_POST['fecha'];
	$codpai=$_POST['codpai'];
	$id=$_POST['id'];

	$rel->modificar($conex,$recuperados,$contagiados,$fallecidos,$fecha,$codpai,$id);


}


/*-------------------------------------------------------------------------------------------------------------------------------*/

if (isset($_POST['afectados']) && isset($_POST['fallecidos']) && isset($_POST['codpai']) && isset($_POST['fecha'])) {

	$fecha = $_POST['fecha'];
	$afectados = $_POST['afectados'];
	$fallecidos = $_POST['fallecidos'];
	$codpai = $_POST['codpai'];


	$verif = $tasas->verificar($conex,$fecha);

	if ($verif->fetchColumn()>0) {

		echo 400;
	}else{
		$tasas->agregar($conex,$afectados,$fallecidos,$fecha,$codpai);
	}

}else if (isset($_POST['fecha'])&&isset($_POST['falle'])&&isset($_POST['afec'])&&isset($_POST['id'])&&isset($_POST['codpai'])) {

		$fecha =$_POST['fecha'];
		$afectados =$_POST['afec'];
		$fallecidos =$_POST['falle'];
		$id =$_POST['id'];
		$codpai =$_POST['codpai'];

		$tasas->modificar($conex,$fecha,$afectados,$fallecidos,$id,$codpai);

	}

