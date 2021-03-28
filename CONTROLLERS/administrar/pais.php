<?php 

REQUIRE_ONCE("../../CONFIG/datosBD.php");
REQUIRE_ONCE("../../autocarga.php");
REQUIRE_ONCE("../../CONTROLLERS/funciones.php");
errores();
sesion();
sesionAdmin();
USE MODELS\regiones AS paises;
$conex = NEW conexion;
$pais = NEW paises\paises($conex);

if (!$_POST && !$_GET) {
	
	$paises = $pais->listarPais($conex);

}else if(isset($_GET['cod'])){

	$codpai = $_GET['cod'];
	$verificar = $pais->verificarExistencia($codpai);
	if ($verificar[0]->fetchColumn()>0 ||$verificar[1]->fetchColumn()>0 ||$verificar[2]->fetchColumn()>0 ) {
		echo 404;
	//	header("location:../../VIEW/administrar/paises.php");

	}else{
		/*header("location:../../VIEW/administrar/paises.php");*/
		if ($pais->eliminarPais($codpai)) {
		
			echo TRUE;
		
		}else{
			echo 404;
			//header("location:../../VIEW/administrar/paises.php");
		}


	}
}else if(isset($_POST['pais'])&&isset($_POST['continente'])&&isset($_POST['cont'])&&isset($_POST['status'])&&isset($_POST['seleccionado'])&&isset($_POST['poblacion'])){

	$pai = $_POST['pais'];
	$continente = $_POST['continente'];
	$cont = $_POST['cont'];
	$status = $_POST['status'];
	$seleccionado = $_POST['seleccionado'];
	$poblacion = $_POST['poblacion'];
	$paisM = strtoupper($pai);
	$continenteM = strtoupper($continente);

	$verificar = $pais->verificarPais($paisM);

	if ($verificar->fetchColumn()>0) {
		
		header("location:../../VIEW/administrar/paises.php");
	}else{
		if ($pais->agregarPais($paisM,$continenteM,$cont,$status,$seleccionado,$poblacion)) {
			echo TRUE;
			/*header("location:../../VIEW/administrar/paises.php");*/
		}else{
			echo 404;
/*			header("location:../../VIEW/administrar/paises.php");*/
		}
	}

}else if(isset($_GET['modificar'])&&isset($_GET['id'])){

	$id = $_GET['id'];    
	$data = $pais->obetener_date($id);
	$data =$data->fetch();
	if(!$data['seleccionado']){
		$no='No';
		$No= 0;
	}else{
		$no ='Si';
		$No= 1;
	}

	if (!$data['status']) {
		$status = 'Inactivo';
		$Status = 0;
	}else{
		$status = 'Activo';
		$Status = 1;
	}


}else if(isset($_POST['despai'])&&isset($_POST['poblacion'])&&isset($_POST['codpai'])&&isset($_POST['cont'])&&isset($_POST['seleccionado'])&&isset($_POST['status'])&&isset($_POST['continente'])){

	$pai = $_POST['despai'];
	$continente = $_POST['continente'];
	$cont = $_POST['cont'];
	$status = $_POST['status'];
	$seleccionado = $_POST['seleccionado'];
	$poblacion = $_POST['poblacion'];
	$codpai = $_POST['codpai'];
	$paisM = strtoupper($pai);
	$continenteM = strtoupper($continente);
	if ($pais->modificarPais($paisM,$continenteM,$cont,$status,$seleccionado,$poblacion,$codpai)) {
		header("location:../../VIEW/administrar/paises.php");
	}else{
		echo "error";
		header("location:../../VIEW/administrar/paises.php");
	}

}