<?php 

INCLUDE_ONCE("../../CONFIG/datosBD.php");
INCLUDE_ONCE("../../autocarga.php");
REQUIRE_ONCE("../../CONTROLLERS/funciones.php");
sesion();
errores();

USE MODELS\indicadores AS cuadro;


$conexion = NEW conexion;
$conex = $conexion->conectar();
$obj = NEW cuadro\cuadroComparativo;

if (isset($_POST['codpai'])&&isset($_POST['contagiados'])&&isset($_POST['fallecidos'])&&isset($_POST['fecha'])) {



	$codpai= $_POST['codpai'];
	$fallecidos= $_POST['fallecidos'];
	$fecha= $_POST['fecha'];
	$contagiados= $_POST['contagiados'];



	$verif = $obj->verificar($conex,$fecha);

	if ($verif->fetchColumn()>0) {
		echo 404;
	}else{
		$cuadro = $obj->agregar($conex,$codpai,$contagiados,$fallecidos,$fecha);
	}

}else if(!$_POST && !$_GET){

	$pais   = $obj->selectPai($conex);
	$listar = $obj->listar($conex);

}else if(isset($_GET['fecha'])){
	
	$pais= $obj->Select_Modif($conex,$_GET['fecha']);
	
	if (isset($_GET['eliminar'])) {

		header("location:../../VIEW/listar/cuadro.php");
		$obj->eliminar($_GET['fecha'],$conex);

	}

}else if(isset($_POST['contagiados'])&&isset($_POST['fallecidos'])&&isset($_POST['codpais'])&&isset($_POST['ids'])&&isset($_POST['fecha'])){

	$contagiados=$_POST['contagiados'];
	$fallecidos=$_POST['fallecidos'];
	$codpai=$_POST['codpais'];
	$id=$_POST['ids'];
	$fecha=$_POST['fecha'];

	$obj->modificar($conex,$contagiados,$fallecidos,$fecha,$codpai,$id);

}




?>