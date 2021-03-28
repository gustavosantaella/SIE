<?php

require_once("../../autocarga.php");
require_once("../../CONFIG/datosBD.php");
require_once("../../CONTROLLERS/funciones.php");
errores();
sesion();
sesionAdmin();
sesionSu();

use  MODELS\usuario as usuarioModel;
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;

$obj=new conexion;
$usuarios = new usuarioModel\usuarioModel;

if (isset($_POST['user']) && isset($_POST['pass']) ) {

	$user = $_POST['user'];
	$pass = $_POST['pass'];
	
	$sesion = $usuarios->validar($obj,$user);
	

	if (isset($sesion['usuario'])) {
		$hash = $sesion['pass'];

		if (password_verify($pass, $hash)){

			session_start();

			$_SESSION['user'] = $sesion['usuario'];
			$_SESSION['rol'] = $sesion['rol'];

			echo $_SESSION['user'].' Y '. $_SESSION['rol'] ;
			header("location:../../VIEW/");

		}else{

			header("location:../../");
			return FALSE;
		}


	}else{
		echo "El usuario no existe";
		header("location:../../");

		return FALSE;
	}

	

}




if (isset($_GET['usuarios'])) {
	
	$usuarios=	$usuarios->listar($obj);
}

else if (isset($_GET['id'])&&isset($_GET['eliminar'])&&isset($_GET['rol'])) {

	$id = $_GET['id'];
	$rol = $_GET['rol'];

	if ($rol==='SU') {
		echo "no se puede eliminar";
		header("location:../../VIEW/administrar/usuarios.php?usuarios=usuarios");
	}else{
		if ($usuarios->eliminar($obj,$id)) {
			header("location:../../VIEW/administrar/usuarios.php?usuarios=usuarios");
		}else{
			?>

			<script>history.go(-1)</script>
			<?php 
		}
	}
	
}

else if(isset($_POST['usuario'])&&isset($_POST['apellido'])&&isset($_POST['nombre'])&&isset($_POST['rol'])&&isset($_POST['clave'])){

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];

	$clave = $_POST['clave'];
	$rol = $_POST['rol'];
	$usuario = $_POST['usuario'];

	$verif = $usuarios->verificar($obj,$usuario);
	if ($verif->fetchColumn()>0) {

		echo 404;
	}else{
		$pass =$usuarios->crypt($clave);
		$usuarios->agregar($obj,$nombre,$apellido,$usuario,$pass,$rol);
		echo TRUE;
		return TRUE;
	}
}

else if(isset($_GET['nombre'])&&isset($_GET['id'])&&isset($_GET['apellido'])&&isset($_GET['usuario'])&&isset($_GET['correo'])&&isset($_GET['rol'])){


	$nombre = $_GET['nombre'];
	$apellido = $_GET['apellido'];
	$correo = $_GET['correo'];
	$id = $_GET['id'];
	$rol = $_GET['rol'];
	$usuario = $_GET['usuario'];

	$clave = $usuarios->validar($obj,$usuario)['pass'];


}


/*HAY QUE ARREGLAR: 

1- AL MODIFICAR UN USUARIO SIN CAMBIAR LA CONTRASEÑA, SE DEBERIA DE GUARDAR LA MISMA CONTRASEÑA QUE YA SE TENIA ASIGNADA.

EN VEZ DE HACER ESO, SE CAMBIA LA CLAVE AUTOMATICAMENTE, DESCONOCIENDO LA CONTRASEÑA ENCRIPTADA.

*/
else if(isset($_POST['name'])&&isset($_POST['id'])&&isset($_POST['lastName'])&&isset($_POST['user'])&&isset($_POST['rol'])){

	$nombre = $_POST['name'];
	$apellido = $_POST['lastName'];
	$id = $_POST['id'];
	$rol = $_POST['rol'];
	$usuario = $_POST['user'];




	echo  $usuarios->update($obj,$nombre,$apellido,$usuario,$rol,$id);





}

?>