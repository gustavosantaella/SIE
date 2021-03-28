<?php 
namespace MODELS\usuario;

class usuarioModel{

	private $nombre;
	private $apellido;
	public  $user;
	private $pass;
	private $correo;
	public  $rol;
	public  $id;
	private $conex;

	public function __construct(){

		$this->nombre;  
		$this->apellido;
		$this->user;   
		$this->pass;   
		$this->correo; 
		$this->rol; 
		$this->conex;  
	}


	public function validar($conex,$user){

		try{

			$string    = "SELECT * FROM login WHERE usuario=:user";
			$prepare   = $conex->conectar()->prepare($string);
			$execute   = $prepare->execute(array(":user"=>$user));
			$resultado = $prepare->fetch(); 
			return $resultado;
		}catch(PDOException $e){

			echo "Errro ". $e->getMessage();
		}

	}
	
	public function sendMail($conex,$mail){

		try{

			$string    = "SELECT * FROM login WHERE correo=:mail";
			$prepare   = $conex->conectar()->prepare($string);
			$execute   = $prepare->execute(array(":mail"=>$mail));
			$resultado = $prepare->fetch(); 
			return $resultado;
		}catch(PDOException $e){

			echo "Errro ". $e->getMessage();
		}

	}
	
	public function listar($conex){

		try{

			$string    = "SELECT * FROM login ORDER BY id DESC";
			$prepare   = $conex->conectar()->prepare($string);
			$execute   = $prepare->execute();

			return $prepare;

		}catch(PDOException $e){

			echo "Errro ". $e->getMessage();
		}

	}



	public function eliminar($conex,$id){

		try{


			$string    = "DELETE FROM login WHERE id=:id";
			$prepare   = $conex->conectar()->prepare($string);
			$execute   = $prepare->execute([':id'=>$id]);

			return $prepare;

		}catch(PDOException $e){

			echo "Errro ". $e->getMessage();
		}

	}

	public function agregar($conex,$nombre,$apellido,$user,$pass,$rol){

		try{

			$string    = "INSERT INTO login (nombre,apellido,usuario,pass,rol) VALUES(:nombre,:apellido,:usuario,:pass,:rol)";
			$prepare   = $conex->conectar()->prepare($string);
			$execute   = $prepare->execute([':nombre'=>$nombre,':apellido'=>$apellido,':usuario'=>$user,':pass'=>$pass,':rol'=>$rol]);

			//echo $execute;
			return $execute;

		}catch(PDOException $e){

			echo "Errro ". $e->getMessage();
		}

	}


	public function crypt($password){

		try {

			$pass = password_hash($password, PASSWORD_DEFAULT);
			return $pass;

		} catch (Exception $e) {
			echo "Errro ". $e->getMessage();
			return false;
		}
	}

	

	public function verificar($conex,$usuario){

		try {

			$string='SELECT count(*) FROM login WHERE usuario=:user';
			$prepare = $conex->conectar()->prepare($string);
			$execute =$prepare->execute(array(':user'=>$usuario));
			return $prepare;
			
		} catch(PDOException $e){

			echo "Errro ". $e->getMessage();
		}

	}

	public function updatePass($conex,$id,$pass){

		try {
			$string="UPDATE login SET pass=:clave WHERE id=:id";
			$prepare =$conex->conectar()->prepare($string);
			$execute =$prepare->execute([':clave'=>$pass,':id'=>$id,]);

			return $execute;
		}  catch(PDOException $e){

			echo "Errro ". $e->getMessage();
		}

	}

	public function update($conex,$nombre,$apellido,$usuario,$rol,$id){

		try {
			$string="UPDATE login SET nombre=:nombre,apellido=:apellido,usuario=:usuario,rol=:rol WHERE id=:id";
			$prepare =$conex->conectar()->prepare($string);
			$execute =$prepare->execute([':nombre'=>$nombre,':apellido'=>$apellido,':usuario'=>$usuario,':rol'=>$rol,':id'=>$id,]);

			return $execute;
		}  catch(PDOException $e){

			echo "Errro ". $e->getMessage();
		}

	}

	public function selectPass($conex,$user){

		try{
			$string    = "SELECT pass FROM login WHERE usuario=:user";
			$prepare   = $conex->conectar()->prepare($string);
			$execute   = $prepare->execute([':user'=>$user]);

			return $prepare;

		}catch(PDOException $e){

			echo "Errro ". $e->getMessage();
		}

	}
	
}




?>