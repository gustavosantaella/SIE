<?php 

REQUIRE_ONCE("../../CONFIG/datosBD.php");
REQUIRE_ONCE("../../autocarga.php");
REQUIRE_ONCE("../../CONTROLLERS/funciones.php");
errores();
sesion();
sesionAdmin();
USE MODELS\regiones AS estados;
USE MODELS\regiones AS paises;
$conex = NEW conexion;
$estados = NEW estados\estados($conex);
$pais = NEW paises\paises($conex);

if (!$_POST && !$_GET) {
	
	$estado = $estados->listar($conex);
	$paises = $pais->listarPais($conex);

}else if(isset($_POST['pais'])&&isset($_POST['status'])&&isset($_POST['estado'])){

	$estado = $_POST['estado'];
	$pais   = $_POST['pais'][1];
	$status = $_POST['status'];

	$estado = strtoupper($estado);
	$estadoM= $estados->verificar($estado);

	if ($estadoM->fetchColumn()>0) {
		echo "existe";
		header("location:../../VIEW/administrar/estados.php");

	}else if($estadoM->fetchColumn()==0){

		echo "No existe";
		
		if ($estados->agregar($estado,$pais,$status)) {
			echo "agregado";			echo $status;

			header("location:../../VIEW/administrar/estados.php");
		}else{
			echo "fallo al agregar el estado";
			echo $status;
			header("location:../../VIEW/administrar/estados.php");
		}

	}else{
		echo "error";
		header("location:../../VIEW/");
	}
}else if(isset($_GET['cod'])){

	$codest = $_GET['cod'];
	$verif = $estados->verificarExistencia($codest);
	if ($verif->fetchColumn()>0) {
		echo FALSE;
		
	}else{
		if ($estados->eliminar($codest)) {
			echo TRUE;	
		}else{
			echo FALSE;
		}

	}

}else if(isset($_GET['id'])&&isset($_GET['modificar'])){

	$id = $_GET['id'];
	if(!$estados->selectData($id)){

		echo "error";
		return FALSE;
	}else{
		$est =$estados->selectData($id)->fetch();
		if ($est['status']==TRUE) {
			$status= 'Activo';
			$statuss= 1;
		}else{
			$status= 'Inactivo';
			$statuss= 0;
		}
	}

}else if(isset($_POST['id'])&&isset($_POST['desest'])&&isset($_POST['status'])){

	$id = $_POST['id'];
	$desest = $_POST['desest'];
	$status = $_POST['status'];

	if ($estados->modificar($id,$desest,$status)==TRUE) {
		echo TRUE;
	}else{
		echo FALSE;
	}

}
