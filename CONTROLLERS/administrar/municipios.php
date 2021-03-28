<?php 

REQUIRE_ONCE("../../CONFIG/datosBD.php");
REQUIRE_ONCE("../../autocarga.php");
REQUIRE_ONCE("../../CONTROLLERS/funciones.php");
sesion();
sesionAdmin();
USE MODELS\regiones AS mun;
USE MODELS\regiones AS est;

$conex   = NEW conexion;
$municipios = NEW mun\municipios($conex);
$estados = NEW est\estados($conex);


if (!$_POST && !$_GET) {

	$mun = $municipios->listar();
	$est = $estados->selectEst();


}else if(isset($_POST['estados'])&&isset($_POST['municipio'])&&isset($_POST['status'])){

	$estados    = $_POST['estados'];
	$municipio  = $_POST['municipio'];
	$status     = $_POST['status'];
	$municipio  = strtoupper($municipio);

	$verif = $municipios->verificar($municipio);
	if ($verif->fetchColumn()>0) {
		echo "ya existe";
		header("location:../../VIEW/administrar/municipios.php");

	}else{

		if ($municipios->agregar($estados,$municipio,$status)) {

			echo "agregado";
			header("location:../../VIEW/administrar/municipios.php");

		}else{

			echo "error al agregar";
			header("location:../../VIEW/administrar/municipios.php");

		}

	}

}else if(isset($_GET['cod'])){

	$codmun = $_GET['cod'];
	$verif = $municipios->verificarExistencia($codmun);
	if ($verif->fetchColumn()>0) {
		echo FALSE;
		
	}else{
		if ($municipios->eliminar($codmun)) {
			echo TRUE;	
		}else{
			echo FALSE;
		}

	}


}else if(isset($_GET['id'])&&isset($_GET['modificar'])){

	$id = $_GET['id'];
	if(!$municipios->selectData($id)){

		echo "error";
		return FALSE;
	}else{
		$mun =$municipios->selectData($id)->fetch();
		if ($mun['status']==TRUE) {
			$status= 'Activo';
			$statuss= 1;
		}else{
			$status= 'Inactivo';
			$statuss= 0;
		}
	}

}else if(isset($_POST['status'])&&isset($_POST['id'])&&isset($_POST['municipio'])){

	$status=$_POST['status'];
	$id=$_POST['id'];
	$desmun=$_POST['municipio'];

	if ($municipios->modificar($id,$desmun,$status)) {
		echo TRUE;
	}else{
		echo FALSE;
	}

}