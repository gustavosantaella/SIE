<?php 
namespace MODELS\regiones;
use MODELS\regiones as est;

class municipios extends est\estados{

	PUBLIC FUNCTION __construct($conex){

		$this->conex = $conex;
		$this->eneable =TRUE;
		$this->disabled = 0;
	}

	PUBLIC FUNCTION listar(){
		try {
			$string = "SELECT mun.codmun, mun.desmun, mun.status,est.desest,pai.despai FROM municipios mun
			INNER JOIN estados est ON est.codest = mun.codest
			INNER JOIN paises pai on est.codpai = pai.codpai ORDER BY mun.codmun DESC";
			$prepare = $this->conex->conectar()->prepare($string);
			$execute = $prepare->execute();
			return $prepare;
		} catch (Exception $e) {
			echo "ERROR". $e->getMenssage();
		}
	}

	PUBLIC FUNCTION agregar($est,$mun,$status){

		try {

			$string = 'INSERT INTO municipios (codest,desmun,status) VALUES(:est, :mun, :status)';
			$prepare = $this->conex->conectar()->prepare($string);
			$array=[':est'=>$est,':mun'=>$mun,':status'=>$status];
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

	PUBLIC FUNCTION eliminar($codmun){
		$string = "DELETE FROM municipios WHERE codmun = :codmun";
		$prepare= $this->conex->conectar()->prepare($string);
		$execute= $prepare->execute([':codmun'=>$codmun]);

		return $execute; 
	}

	PUBLIC FUNCTION selectData($codmun){


		try{
			$string = 'SELECT * FROM municipios WHERE codmun=:codmun';
			$prepare = $this->conex->conectar()->prepare($string);
			$execute = $prepare->execute([':codmun'=>$codmun]);
			return $prepare;

		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
		}
		
	}


	PUBLIC FUNCTION modificar($id,$desmun,$status){


		try{
			$string = 'UPDATE municipios SET desmun=:desmun, status=:status WHERE codmun=:codmun';
			$prepare = $this->conex->conectar()->prepare($string);
			$execute = $prepare->execute([':desmun'=>$desmun,':status'=>$status,':codmun'=>$id]);
			return $execute;

		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
		}


	}

	

}


?>