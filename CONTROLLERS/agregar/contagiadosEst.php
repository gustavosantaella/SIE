<?php 
INCLUDE_ONCE("../../CONFIG/datosBD.php");
INCLUDE_ONCE("../../autocarga.php");
REQUIRE_ONCE("../../CONTROLLERS/funciones.php");
sesion();
errores();

USE MODELS\indicadores\comportamientoVnzl AS contagiados;


$obj   = NEW conexion;
$conex = $obj->conectar(); 
$object  = NEW contagiados\estados;

if(isset($_POST['codest'])&&isset($_POST['contagiados'])){
	$fecha = $_POST['fecha'];
	$verificar = $object->verificar($conex,$fecha);
	$codest=$_POST['codest'];
	$contagiados=$_POST['contagiados'];


	if ($verificar->fetchColumn()>0) {
		return 400;
	}else{


		$object->agregar($conex,$contagiados,$codest,$fecha);

	}
}else if (!$_GET && !$_POST){

	$estados = $object->selectEst($conex);
	if ( $_SERVER['REQUEST_URI'] ){

		$listar = $object->listar($conex);
	}

}else if(isset($_GET['fecha'])&&isset($_GET['eliminar'])){

	header("location:../../VIEW/listar/contaEst.php");
	$object->eliminar($_GET['fecha'],$conex);

}else if(isset($_GET['fecha'])){

	$listar = $object->obtenerData_modif($conex, $_GET['fecha']);
	
}else if(isset($_POST['contaEst'])&&isset($_POST['codest'])&&isset($_POST['id'])){

	$contaEst=$_POST['contaEst'];
	$id=$_POST['id'];
	$codest=$_POST['codest'];
	$fecha=$_POST['fecha'];
	$object->update($id,$contaEst,$conex,$fecha);

}







?>