<?php 

INCLUDE_ONCE("../../CONFIG/datosBD.php");
INCLUDE_ONCE("../../autocarga.php");
REQUIRE_ONCE("../../CONTROLLERS/funciones.php");
sesion();
errores();

USE MODELS\indicadores\comportamientoVnzl AS parroquias;
USE MODELS\indicadores\comportamientoVnzl AS mun;


$obj   = NEW conexion;
$conex = $obj->conectar(); 
$object  = NEW parroquias\parroquias;
$mun = NEW mun\municipios;

if (isset($_POST['fecha'])&&isset($_POST['estados'])&&isset($_POST['valorR'])&&isset($_POST['valorC'])&&isset($_POST['valorF'])&&isset($_POST['mun'])&&isset($_POST['codpar'])) {


	$fecha = $_POST['fecha'];
	$codest=$_POST['estados'];
	$valorR=$_POST['valorR'];
	$valorC=$_POST['valorC'];
	$valorF=$_POST['valorF'];
	$codmun=$_POST['mun'];
	$codpar=$_POST['codpar'];
	$verificar = $object->verificar($conex,$fecha,$codest,$codmun,$codpar);



	if ($verificar->fetchColumn()>0) {

		echo 400;

	}else{

		$object->agregar($conex,$fecha,$codest,$codmun,$valorR,$valorC,$valorF,$codpar);




	}
}else if(!$_GET && !$_POST){

	$listar= $object->listar($conex);

}else if(isset($_GET['fecha'])&&isset($_GET['codest'])&&isset($_GET['codmun'])){

	$fecha      = $_GET['fecha'];
	$codest      = $_GET['codest'];
	$codmun      = $_GET['codmun'];


	$data  =$object->casosComunitarios($conex,$codest,$fecha,$codmun);
	$listar = $object->obtenerData_modif($conex,$codest,$fecha,$codmun);

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
	$par=[];
	$codpar=[];
	$total=0;
	while ($m = $listar->fetch()) {
		$estado = $m['desest'];
		$codest = $m['codest'];
		$mun =$m['desmun'];
		$codmun =$m['codmun'];
		$recuperados []=$m['recuperados'];
		$fallecidos []=$m['fallecidos'];
		$contagiados []=$m['contagiados'];
		$fecha =$m['fecha'];
		$id []=$m['id'];
		$total +=$m['contagiados'];
		$par []=$m['despar'];
		$codpar []=$m['codpar'];

	}


	while ($sum =$data->fetch()) {
		$cc =$sum['casos'];
	} 

	if($_SERVER['REQUEST_URI']&&isset($_GET['eliminar'])){

		header("location:../../VIEW/listar/covidPar.php");
		$object->eliminar($_GET['fecha'],$_GET['codest'],$_GET['codmun'],$conex);
		
	}

}else if(isset($_POST['estados'])){

	$codest =$_POST['estados'];
	$verif=$mun->verifMun($conex,$codest);
	if ($verif->fetchColumn()>0) {
		$estados = $mun->selectMunPar($conex,$codest);

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
}



?>