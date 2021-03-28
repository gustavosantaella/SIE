<?php 
NAMESPACE MODELS\regiones;
USE MODELS\regiones as paises;

CLASS estados EXTENDS paises\paises{

	PUBLIC FUNCTION __construct($conex){

		$this->conex = $conex;
	}

	PUBLIC FUNCTION listar(){
		try {
			$string = "SELECT est.codest, est.desest, est.status,pai.despai FROM estados est INNER JOIN paises pai on est.codpai = pai.codpai ORDER BY codest DESC";
			$prepare = $this->conex->conectar()->prepare($string);
			$execute = $prepare->execute();
			return $prepare;
		} catch (Exception $e) {
			echo "ERROR". $e->getMenssage();
		}
	}

	PUBLIC FUNCTION verificar($estado){
		$string= "SELECT COUNT(*) FROM estados WHERE desest = :estado";
		$prepare = $this->conex->conectar()->prepare($string);
		$execute = $prepare->execute([':estado'=>$estado]);
		return $prepare;
	}

	PUBLIC FUNCTION verificarExistencia($codest){
		$string= "SELECT COUNT(*) FROM indicadores_region WHERE codest = :estado";
		$prepare = $this->conex->conectar()->prepare($string);
		$execute = $prepare->execute([':estado'=>$codest]);
		return $prepare;
	}

	PUBLIC FUNCTION agregar($estado,$pais,$status){

		$string  = "INSERT INTO estados (codpai,desest,status)VALUES(:codpai,:desest,:status)";
		$prepare = $this->conex->conectar()->prepare($string);
		$execute = $prepare->execute([':codpai'=>$pais,':desest'=>$estado,':status'=>$status]);
		return $execute;

	}

	PUBLIC FUNCTION eliminar($codest){
		$string = "DELETE FROM estados WHERE codest = :codest";
		$prepare= $this->conex->conectar()->prepare($string);
		$execute= $prepare->execute([':codest'=>$codest]);

		return $execute; 
	}

	PUBLIC FUNCTION selectEst(){

		try{

			$string='SELECT * FROM estados WHERE codest!=0';
			$prepare = $this->conex->conectar()->prepare($string);
			$execute=$prepare->execute();

			return $prepare;

		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
		}
	}

	PUBLIC FUNCTION selectData($codest){


		try{
			$string = 'SELECT * FROM estados WHERE codest=:codest';
			$prepare = $this->conex->conectar()->prepare($string);
			$execute = $prepare->execute([':codest'=>$codest]);
			return $prepare;

		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
		}
		
	}

	PUBLIC FUNCTION modificar($id,$desest,$status){


		try{
			$string = 'UPDATE estados SET desest=:desest, status=:status WHERE codest=:codest';
			$prepare = $this->conex->conectar()->prepare($string);
			$execute = $prepare->execute([':desest'=>$desest,':status'=>$status,':codest'=>$id]);
			return $execute;

		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
		}


	}


}


?>