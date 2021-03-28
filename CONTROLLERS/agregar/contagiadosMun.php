<?php 

INCLUDE_ONCE("../../CONFIG/datosBD.php");
INCLUDE_ONCE("../../autocarga.php");
REQUIRE_ONCE("../../CONTROLLERS/funciones.php");
sesion();
errores();

USE MODELS\indicadores\comportamientoVnzl AS municipios;

$obj   = NEW conexion;
$conex = $obj->conectar(); 
$object  = NEW municipios\municipios;
if (isset($_POST['fecha'])&&isset($_POST['estados'])&&isset($_POST['valorR'])&&isset($_POST['valorF'])&&isset($_POST['valorC'])) {


	$fecha = $_POST['fecha'];
	$codest=$_POST['estados'];
	$valorR=$_POST['valorR'];
	$valorC=$_POST['valorC'];
	$valorF=$_POST['valorF'];
	$codmun=$_POST['codmun'];
	$verificar = $object->verificar($conex,$fecha,$codest,$codmun);



	if ($verificar->fetchColumn()>0) {

		echo 400;

	}else{

		$object->agregar($conex,$fecha,$codest,$codmun,$valorR,$valorC,$valorF);




	}

}else if(!$_GET && !$_POST){

	$listar = $object->listar($conex);

}else if(isset($_GET['fecha'])&&isset($_GET['eliminar'])&&isset($_GET['codest'])){

	header("location:../../VIEW/listar/contaMun.php");
	$object->eliminar($_GET['fecha'],$_GET['codest'],$conex);

}else if(isset($_GET['fecha'])){

	
	$fecha      = $_GET['fecha'];
	$codest      = $_GET['codest'];


	$data  =$object->casosComunitarios($conex,$codest,$fecha);
	$listar = $object->obtenerData_modif($conex,$codest,$fecha);

	$estado= [];
	$codest= [];
	$mun =[];
	$codmun =[];
	$recuperados =[];
	$contagiados =[];
	$fallecidos =[];
	$fecha =[];
	$id =[];
	$cc=[];
	$total=0;
	while ($m = $listar->fetch()) {
		$estado = $m['desest'];
		$codest = $m['codest'];
		$mun []=$m['desmun'];
		$codmun []=$m['codmun'];
		$recuperados []=$m['recuperados'];
		$fallecidos []=$m['fallecidos'];
		$contagiados []=$m['contagiados'];
		$fecha =$m['fecha'];
		$id []=$m['id'];
		$total +=$m['contagiados'];

	}


	while ($sum =$data->fetch()) {
		$cc =$sum['casos'];
	}



}else if(isset($_POST['fecha'])&&isset($_POST['codest'])&&isset($_POST['recuperados'])&&isset($_POST['fallecidos'])&&isset($_POST['contagiados'])&&isset($_POST['id'])&&isset($_POST['codmun'])){

	$recuperados=$_POST['recuperados'];
$contagiados=$_POST['contagiados'];
$fallecidos=$_POST['fallecidos'];
$id=$_POST['id'];
$codest=$_POST['codest'];
$codmun=$_POST['codmun'];
$fecha=$_POST['fecha'];
 $object->update($conex,$id,$codest,$codmun,$fecha,$recuperados,$contagiados,$fallecidos);
}



?>