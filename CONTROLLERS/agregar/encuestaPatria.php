<?php 
INCLUDE_ONCE("../../CONFIG/datosBD.php");
INCLUDE_ONCE("../../autocarga.php");
REQUIRE_ONCE("../../CONTROLLERS/funciones.php");
sesion();
errores();

USE MODELS\indicadores\comportamientoVnzl AS patria;

$obj   = NEW conexion;
$conex = $obj->conectar(); 
$patria= NEW patria\encuestaPatria($conex);
if ( isset($_POST['personas'])&&isset($_POST['id'])&&isset($_POST['fecha'])) {
	
	$personas        = $_POST['personas'];
	$id           = $_POST['id'];
	$fecha             = $_POST['fecha'];

	$verif=$patria->verificar($conex,$fecha);

	if ($verif->fetchColumn()>0) {
		
		echo 400;
	}else{
		
			$patria->agregar($id,$personas,$fecha,$conex);
 }
 
 

}else if(!$_GET && !$_POST){

      $listar = $patria->listar($conex);
      $patria = $patria->encuestaPatria($conex);

}else if(isset($_GET['fecha'])&&isset($_GET['eliminar'])){

header("location:../../VIEW/listar/encuesta-patria.php");
	$patria->eliminar($_GET['fecha'],$conex);

}else if(isset($_GET['fecha'])){

	$listar = $patria->obtenerData_modif($conex,$_GET['fecha']);
}else if( isset($_POST['encuesta'])&&isset($_POST['id'])&&isset($_POST['fecha'])){

	$encuesta  = $_POST['encuesta'];
	
	$fecha     = $_POST['fecha'];

	$id       =$_POST['id'];

		$patria->update($conex,$id,$encuesta,$fecha);


}else{

	?>

	<script>history.go(-1)</script>
	<?php 
	
}

?>

