<?php 
INCLUDE_ONCE("../../CONFIG/datosBD.php");
INCLUDE_ONCE("../../autocarga.php");
REQUIRE_ONCE("../../CONTROLLERS/funciones.php");
sesion();
errores();

USE MODELS\indicadores\comportamientoVnzl AS mun;

$conexion = NEW conexion;
$conex = $conexion->conectar();

$codest =$_POST['estados'];

$obj = NEW mun\municipios;

$verif=$obj->verifMun($conex,$codest);
if ($verif->fetchColumn()>0) {
	$estados = $obj->selectMun($conex,$codest);

	while($m = $estados->fetch()){

		$data['data'][]=$m;
		$data['status']=1;
	}
	echo json_encode($data);
}else{
	$data['status']=0;

	echo json_encode($data);
}

/*while ($m = $estados->fetch()) {
	?>

<input type="text" name="" required=""  readonly="" style="border:1px solid rgba(100,100,100,.3)"class="input val mun"value="<?php echo $m['desmun'] ?>" placeholder="">

<input type="number" id="s" name="" value="" placeholder="">


	<?php  
}*/
?>




