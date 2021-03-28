<?php 

REQUIRE_ONCE("../../CONFIG/datosBD.php");
REQUIRE_ONCE("../../autocarga.php");

USE MODELS\usuario AS centro;


$conex   = NEW conexion();

$centros = NEW centro\centros($conex);

if(!$_POST && !$_GET){

	$c = $centros->listar();

}else if(isset($_GET['codcentro'])&&isset($_GET['descentro'])&&isset($_GET['status'])){

	$datos = [

		'codcentro' => $_GET['codcentro'],
		'descentro'=>$_GET['descentro'],
		'status'=> $_GET['status']


	];

	if ($datos['status']==TRUE) {
		$status ='Activo';
		$statuss = 1;
	}else{
		$status ='Inactivo';
		$statuss = 0;
	}

}else if(isset($_POST['codcentro'])&&isset($_POST['descentro'])&&isset($_POST['status'])){


	$datos = [

		'codcentro' => $_POST['codcentro'],
		'descentro'=>$_POST['descentro'],
		'status'=>$_POST['status']

	];

	if ($centros->update($datos)) {
		echo TRUE;
	}else{
		echo FALSE;
	}
}