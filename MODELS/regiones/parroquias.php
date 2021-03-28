<?php 
namespace MODELS\regiones;
use MODELS\regiones as mun;

class parroquias extends mun\municipios{


	PUBLIC FUNCTION __construct($conex){

		$this->conex = $conex;
		$this->eneable =TRUE;
		$this->disabled = 0;
	}

	PUBLIC FUNCTION listar(){
		try {
			$string = "SELECT  par.codpar, par.status, par.despar, mun.desmun, est.desest, pai.despai FROM parroquias par
			INNER JOIN municipios mun ON par.codmun  = mun.codmun 
			INNER JOIN estados est ON est.codest = mun.codest
			INNER JOIN paises pai on est.codpai = pai.codpai ORDER BY par.codpar DESC";
			$prepare = $this->conex->conectar()->prepare($string);
			$execute = $prepare->execute();
			return $prepare;
		} catch (Exception $e) {
			echo "ERROR". $e->getMenssage();
		}
	}

	PUBLIC FUNCTION agregar($codmun,$despar,$status){

		try {

			$string = 'INSERT INTO parroquias (codmun,despar,status) VALUES(:codmun, :despar, :status)';
			$prepare = $this->conex->conectar()->prepare($string);
			$array=[':codmun'=>$codmun,':despar'=>$despar,':status'=>$status];
			$execute = $prepare->execute($array);

			return $execute;
			
		} catch (Exception $e) {

			echo "ERROR". $e->getMenssage();
			
		}

	}

	PUBLIC FUNCTION verificar($municipio){
		$string= "SELECT COUNT(*) FROM municipios WHERE desmun = :municipio";
		$prepare = $this->conex->conectar()->prepare($string);
		$execute = $prepare->execute([':municipio'=>$municipio]);
		return $prepare;
	}


	PUBLIC FUNCTION verificarExistencia($codmun){
		$string= "SELECT COUNT(*) FROM indicadores_region WHERE codmun = :mun";
		$prepare = $this->conex->conectar()->prepare($string);
		$execute = $prepare->execute([':mun'=>$codmun]);
		return $prepare;
	}

	PUBLIC FUNCTION eliminar($codpar){
		$string = "DELETE FROM parroquias WHERE codpar = :codpar";
		$prepare= $this->conex->conectar()->prepare($string);
		$execute= $prepare->execute([':codpar'=>$codpar]);

		return $execute; 
	}

	PUBLIC FUNCTION selectData($codpar){


		try{
			$string = 'SELECT * FROM parroquias WHERE codpar=:codpar';
			$prepare = $this->conex->conectar()->prepare($string);
			$execute = $prepare->execute([':codpar'=>$codpar]);
			return $prepare;

		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
		}
		
	}

	PUBLIC FUNCTION selectMun($codest){

		try{

			$string='SELECT * FROM municipios WHERE codest=:codest ';
			$prepare = $this->conex->conectar()->prepare($string);
			$execute=$prepare->execute(array(':codest'=>$codest));
		
			return $prepare;
			


		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
		}
	}

		PUBLIC FUNCTION verifMun($codest){

		try{

			$string  = 'SELECT count(*) FROM municipios where codest=:codest'; 
			$prepare = $this->conex->conectar()->prepare($string);
			$execute = $prepare->execute(array(':codest'=>$codest));

			

			return $prepare;

			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}



	PUBLIC FUNCTION modificar($id,$despar,$status){


		try{
			$string = 'UPDATE parroquias SET despar=:despar, status=:status WHERE codpar=:codpar';
			$prepare = $this->conex->conectar()->prepare($string);
			$execute = $prepare->execute([':despar'=>$despar,':status'=>$status,':codpar'=>$id]);
			return $execute;

		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
		}


	}

	

}


?>