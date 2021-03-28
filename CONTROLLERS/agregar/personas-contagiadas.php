<?php 
INCLUDE_ONCE("../../CONFIG/datosBD.php");
INCLUDE_ONCE("../../autocarga.php");
REQUIRE_ONCE("../../CONTROLLERS/funciones.php");
sesion();
errores();

USE MODELS\indicadores\comportamientoVnzl AS personas_contagiadas;
$obj   = NEW conexion;
$conex = $obj->conectar(); 
$obj   = NEW personas_contagiadas\personasContagiadas;
if ( isset($_POST['personas'])&&isset($_POST['id'])&&isset($_POST['fecha'])) {

	$personas        = $_POST['personas'];
	$id              = $_POST['id'];
	$fecha           = $_POST['fecha'];


	$verif=$obj->verificar($conex,$fecha);

	if ($verif->fetchColumn()>0) {

		echo 400;

	}else{

		$obj->agregar($id,$personas,$fecha,$conex);
	}
}else if(!$_GET && !$_POST){

	$listar =$obj->listar($conex);
	$centros = $obj->centros($conex);

}else if(isset($_GET['fecha'])&&isset($_GET['eliminar'])){

	header('location:../../VIEW/listar/personas-contagiadas.php');
	$obj->eliminar($_GET['fecha'],$conex);

}else if(isset($_GET['fecha'])){

	$listar = $obj->obtenerData_modif($conex,$_GET['fecha']);

}else if ( isset($_POST['personasC'])&&isset($_POST['id'])&&isset($_POST['fecha'])) {

	$personas        = $_POST['personasC'];
	$id              = $_POST['id'];
	$fecha           = $_POST['fecha'];


		$obj->update($id,$personas,$conex,$fecha);
	
}

?>

