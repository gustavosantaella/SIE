<?php 

REQUIRE_ONCE("../../CONFIG/datosBD.php");
REQUIRE_ONCE("../../autocarga.php");
REQUIRE_ONCE("../../CONTROLLERS/funciones.php");
errores();
sesion();
sesionAdmin();
USE MODELS\regiones AS est;
USE MODELS\regiones AS mun;
USE MODELS\regiones AS par;


$conex   = NEW conexion;
$municipios = NEW mun\municipios($conex);
$estados = NEW est\estados($conex);
$parroquias = NEW par\parroquias($conex);


if (!$_POST && !$_GET) {

	$est = $estados->selectEst();
	$mun = $municipios->listar();
	$par = $parroquias->listar();
	


}else if(isset($_POST['estados'])){


	$codest = $_POST['estados'];
	$verif = $parroquias->verifMun($codest);

	if ($verif->fetchColumn()>0) {

		$selectMun  = $parroquias->selectMun($codest);

		while ($m = $selectMun->fetch()) {
			$data['status']=1;
			$data['data'][]=$m;


		}
		echo json_encode($data);
	}else{

		$data['status']=0;

		echo json_encode($data);
	}




}else if(isset($_GET['cod'])){

	$codpar = $_GET['cod'];
	$verif = $municipios->verificarExistencia($codpar);
	if ($verif->fetchColumn()>0) {
		echo FALSE;
		
	}else{
		if ($parroquias->eliminar($codpar)) {
			echo TRUE;	
		}else{
			echo FALSE;
		}

	}


}else if(isset($_GET['id'])&&isset($_GET['modificar'])){

	$id = $_GET['id'];
	if(!$parroquias->selectData($id)){

		echo "error";
		return FALSE;
	}else{
		$par =$parroquias->selectData($id)->fetch();
		if ($par['status']==TRUE) {
			$status= 'Activo';
			$statuss= 1;
		}else{
			$status= 'Inactivo';
			$statuss= 0;
		}
	}

}else if(isset($_POST['status'])&&isset($_POST['id'])&&isset($_POST['parroquia'])){

	$status=$_POST['status'];
	$id=$_POST['id'];
	$despar=$_POST['parroquia'];

	if ($parroquias->modificar($id,$despar,$status)) {
		echo TRUE;
	}else{
		echo FALSE;
	}

}

 if(isset($_POST['estados'])&&isset($_POST['municipio'])&&isset($_POST['status'])&&isset($_POST['parroquia'])){

	$estados    = $_POST['estados'];
	$municipio  = $_POST['municipio'];
	$status     = $_POST['status'];
	$parroquia     = $_POST['parroquia'];
	$parroquia  = strtoupper($parroquia);

	$verif = $parroquias->verificar($parroquia);
	if ($verif->fetchColumn()>0) {
		echo "ya existe";
		header("location:../../VIEW/administrar/parroquias.php");

	}else{

		if ($parroquias->agregar($municipio,$parroquia,$status)) {

			echo "agregado";
			header("location:../../VIEW/administrar/parroquias.php");

		}else{

			echo "error al agregar";
			/*header("location:../../VIEW/administrar/parroquias.php");*/

		}

	}

}