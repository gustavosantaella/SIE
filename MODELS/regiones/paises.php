<?php 
NAMESPACE MODELS\regiones;

CLASS paises {

	PUBLIC $eneable;
	PUBLIC $disabled;
	PUBLIC $continente;
	PUBLIC $conex;
	PUBLIC $codpai;

	PUBLIC FUNCTION __construct($conex){

		$this->eneable=true;
		$this->disabled=0;
		$this->conex =$conex;
	}

	PUBLIC FUNCTION listarPais(){

		try {
			$string = "SELECT * FROM paises ORDER BY codpai DESC";
			$prepare = $this->conex->conectar()->prepare($string);
			$execute = $prepare->execute();
			return $prepare;
		} catch (Exception $e) {
			echo "ERROR". $e->getMenssage();
		}
	}

	PUBLIC FUNCTION verificarPais($pais){

		try {
			
			$string = "SELECT COUNT(*) FROM paises WHERE despai=:pais";
			$prepare = $this->conex->conectar()->prepare($string);
			$execute = $prepare->execute([':pais'=>$pais]);
			return  $prepare;

		} catch (Exception $e) {
			
			echo "ERROR". $e->getMenssage();

		}

	}

	PUBLIC FUNCTION modificarPais($paisM,$continenteM,$cont,$status,$seleccionado,$poblacion,$codpai){
		try {
			
			$string = "UPDATE paises SET despai=:paisM, continente=:continente, cont=:cont,status=:status,seleccionado=:seleccionado,poblacion=:poblacion WHERE codpai=:codpai ";
			$prepare = $this->conex->conectar()->prepare($string);
			$execute = $prepare->execute([':paisM'=>$paisM,':continente'=>$continenteM,':cont'=>$cont,':status'=>$status,':seleccionado'=>$seleccionado,':poblacion'=>$poblacion,':codpai'=>$codpai]);
			return  $execute;


		} catch (Exception $e) {
			echo "ERROR". $e->getMenssage();
		}
	}

	PUBLIC FUNCTION obetener_date($id){

		try {
			
			$string = "SELECT * FROM paises WHERE codpai=:id";
			$prepare = $this->conex->conectar()->prepare($string);
			$execute = $prepare->execute([':id'=>$id]);
			return  $prepare;

		} catch (Exception $e) {
			
			echo "ERROR". $e->getMenssage();

		}

	}

	PUBLIC FUNCTION verificarExistencia($codpai){

		try {

			$string= [

				'SELECT count(*) FROM indicadores_region WHERE codpai=:codpai',
				'SELECT count(*) FROM indicador_centros  WHERE codpai=:codpai',
				'SELECT count(*) FROM indicador_encuesta WHERE codpai=:codpai',
			];

			$prepare= [
				$this->conex->conectar()->prepare($string[0]),
				$this->conex->conectar()->prepare($string[1]),
				$this->conex->conectar()->prepare($string[2]),
			];
			$execute = [
				$prepare[0]->execute([':codpai'=>$codpai]),
				$prepare[1]->execute([':codpai'=>$codpai]),
				$prepare[2]->execute([':codpai'=>$codpai]),
			];
			return $prepare;


		} catch (Exception $e) {

			echo "ERROR". $e->getMenssage();

		}
	}

	PUBLIC FUNCTION eliminarPais($codpai){

		try {
			

			$string = 'DELETE FROM paises WHERE codpai=:codpai';
			$prepare = $this->conex->conectar()->prepare($string);
			$execute =  $prepare->execute([':codpai'=>$codpai]);
			return $execute;



		} catch (Exception $e) {

			echo "ERROR". $e->getMenssage();
			
		}
	}

	PUBLIC FUNCTION agregarPais($paisM,$continenteM,$cont,$status,$seleccionado,$poblacion){

		try {
			$string =  "INSERT INTO paises (despai,continente,cont,status,seleccionado,poblacion) VALUES (:despai,:continente,:cont,:status,:seleccionado,:poblacion)"OR DIE("ERROR");
			$prepare = $this->conex->conectar()->prepare($string);
			$execute  = $prepare->execute([':despai'=>$paisM,':continente'=>$continenteM,':cont'=>$cont,':status'=>$status,':seleccionado'=>$seleccionado,':poblacion'=>$poblacion]);
			return $execute;


			
		} catch (Exception $e) {
			
			echo "ERROR". $e->getMenssage();
		}
	}

}

?>