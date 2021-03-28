<?php 
INCLUDE_ONCE("../../CONFIG/datosBD.php");
INCLUDE_ONCE("../../autocarga.php");
REQUIRE_ONCE("../../CONTROLLERS/funciones.php");
sesion();
errores();


USE MODELS\indicadores\comportamientoVnzl AS RCFve;

$obj   = NEW conexion;
$conex = $obj->conectar(); 
$obj= NEW RCFve\indicadorRegion;


if (isset($_POST['recuperados'])&&isset($_POST['fallecidos'])&&isset($_POST['masculino'])&&isset($_POST['femeninno'])&&isset($_POST['fecha'])) {
	
	$recuperados = $_POST['recuperados'];
	$fallecidos  = $_POST['fallecidos'];
	$masculino   = $_POST['masculino'];
	$femenino    = $_POST['femeninno'];
	$fecha       = $_POST['fecha'];



	$verif = $obj->verificar($conex,$fecha);
	if ($verif->fetchColumn()>0) {
		echo 400;
	}else{
		$obj->agregar($recuperados,$fallecidos,$masculino,$femenino,$fecha,$conex);
	}

}else if(!$_POST  && !$_GET){

	$listar = $obj->listar($conex);

}else if(isset($_GET['recuperados'])&&isset($_GET['fallecidos'])&&isset($_GET['masculino'])&&isset($_GET['femenino'])&&isset($_GET['fecha'])&&isset($_GET['id'])){


	$recuperados= $_GET['recuperados'];

	$fallecidos = $_GET['fallecidos'];
	$masculino  = $_GET['masculino'];
	$femenino   = $_GET['femenino'];
	$fecha      = $_GET['fecha'];
	$id         = $_GET['id'];
	$contagiados= $_GET['masculino']+$_GET['femenino'];


}else if(isset($_GET['id'])&&isset($_GET['eliminar'])){

	$obj->eliminar($_GET['id'],$conex);
	header("location:../../VIEW/listar/RCFve.php");

}else if (isset($_POST['recuperados'])&&isset($_POST['fallecidos'])&&isset($_POST['masculino'])&&isset($_POST['femenino'])&&isset($_POST['fecha'])&&isset($_POST['modificar'])&&isset($_POST['id'])) {
	
	$recuperados = $_POST['recuperados'];
	$fallecidos  = $_POST['fallecidos'];
	$masculino   = $_POST['masculino'];
	$femenino    = $_POST['femenino'];
	$fecha       = $_POST['fecha'];
	$id          = $_POST['id'];

	$obj->update($id,$recuperados,$fallecidos,$masculino,$femenino,$fecha,$conex);
	

}else if (isset($_POST['desde'])&&isset($_POST['hasta'])){

	$conex = NEW conexion;
	
	$desde = $_POST['desde'];
	$hasta = $_POST['hasta'];

	
	$data  = $obj->rango($desde,$hasta,$conex);
	
	
	$recuperados =[];
	$contagiados =[];
	$fallecidos =[];
	$masculino =[];
	$femenino =[];
	$fecha =[];
	$totalF =0;
	$totalM =0;
	


	while ($d =$data->fetch()) {
		
		$recuperados []=$d['recuperados'];
		$fallecidos []=$d['fallecidos'];
		$contagiados_f []=$d['contagiados_f'];
		$contagiados_m []=$d['contagiados_m'];
		$contagiados += $contagiados_f+$contagiados_m;
		$totalF += $d['contagiados_f'];
		$totalM += $d['contagiados_m'];
		$fecha []= $d['fecha'];
	}
}
?>

