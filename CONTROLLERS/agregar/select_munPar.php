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
	$estados = $obj->selectMunPar($conex,$codest);

?>
<select name="mun" id="selectMun" class="input" style="font-weight: bold">
	<option disabled selected="" val=''></option>
<?php 
while ($m = $estados->fetch()) {
	?>

	<option  value="<?= $m['codmun']?>"><?php echo $m['desmun'] ?></option>



	<?php  
}
?>
</select>
<?php 
}
?>




