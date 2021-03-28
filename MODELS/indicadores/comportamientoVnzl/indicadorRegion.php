<?php 
namespace MODELS\indicadores\comportamientoVnzl;
/*include_once (__DIR__."../../../../MODELS/regiones/paises.php");*/
use MODELS\regiones as paises;

/*CODIGO DEL PAISE VENEZUELA*/define('codpai',58);
/*CODIGO TIPO 1->RECUPERADOS,COPNTAGIADOS Y FALLECIDOS*/define('rcfve',1);


class indicadorRegion extends paises\paises{


	private  $codtipo;
	public  $contagiados;
	public  $recuperados;
	public  $fallecidos;
	public  $contMasculino;
	public  $contFemenino;
	public  $id;


public function __construct(){

  $this->codtipo = 1;

}

public function rango($desde,$hasta,$conex){

      $string = 'SELECT * FROM indicadores_region WHERE codtipo=:tipo and fecha BETWEEN :desde and :hasta';

      $prepare = $conex->conectar()->prepare($string);
      $prepare->execute([':tipo'=>$this->codtipo,':desde'=>$desde,':hasta'=>$hasta]);

      return $prepare;

}

public function verificar($conex,$fecha){

		try{

			$string  = 'SELECT count(*) FROM indicadores_region where fecha=:fecha and codtipo=:codtipo';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':fecha'=>$fecha,':codtipo'=>rcfve));
			

			return $prepare;
            $conex=null;
			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}


	
	public function agregar($recuperados,$fallecidos,$masculino,$femeninno,$fecha,$conex){
		
		$this->recuperados =$recuperados;
		//$this->contagiados =$contagiados;
		$this->fallecidos  =$fallecidos;
		$this->masculino   =$masculino;
		$this->femeninno   =$femeninno;
		$this->fecha       =$fecha;
		$this->codpai      = codpai;
		$this->conex       =$conex;

		try{

			$string='INSERT INTO indicadores_region (codtipo,codpai,recuperados,fallecidos,contagiados_m,contagiados_f,fecha) VALUES (:codtipo, :codpai, :recuperados, :fallecidos, :masculino, :femeninno, :fecha)';

			$prepare = $conex->prepare($string);
			echo $execute = $prepare->execute(array(':codtipo'=>rcfve,'codpai'=>codpai,':recuperados'=>$recuperados,'fallecidos'=>$fallecidos,':masculino'=>$masculino,':femeninno'=>$femeninno,':fecha'=>$fecha));

			exit();
			$conex= null;

		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
			exit();
			$conex= null;
		}



	}

	public function listar($conex){

		try{

			$string  = 'SELECT * FROM indicadores_region WHERE codtipo=:codtipo ORDER BY id DESC ';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':codtipo'=>rcfve));

			return $prepare;
			exit();
			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}

	public function eliminar($id,$conex){

		try{
			$string  = "DELETE FROM indicadores_region WHERE id=:id and codtipo=:codtipo";
			$prepare = $conex->prepare($string);
			echo $execute = $prepare->execute(array(':id'=>$id,':codtipo'=>rcfve));

			return $execute;
			exit();
			$conex= null;
			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;
		}

	}

	public function update($id,$recuperados,$fallecidos,$masculino,$femeninno,$fecha,$conex){

		try{

			$string = "UPDATE indicadores_region SET recuperados=:recuperados, fallecidos=:fallecidos, contagiados_m=:masculino,contagiados_f=:femeninno, fecha=:fecha WHERE id=:id";

			$prepare = $conex->prepare($string);
			echo $execute = $prepare->execute(array(':recuperados'=>$recuperados,':fallecidos'=>$fallecidos,':masculino'=>$masculino,':femeninno'=>$femeninno,':fecha'=>$fecha,':id'=>$id));
			exit();
			$conex= null;

		}catch(PDOException $e){


			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;
		}
	}

	public function buscar($fecha,$conex){

		try{

			$string  = 'SELECT * FROM indicadores_region WHERE fecha=:fecha ORDER BY id DESC';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':fecha'=>$fecha));

			return $prepare;
			exit();
			$conex= null;

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}

     public function pdf($conex,$desde,$hasta){

     		try{

			$string  = 'SELECT * FROM indicadores_region  WHERE codtipo=:rcfve and fecha BETWEEN :desde and :hasta order by fecha asc';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':rcfve'=>rcfve,':desde'=>$desde,':hasta'=>$hasta));
      
			return $prepare;
			exit();
			$conex= null;

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}

	

     
}






?>

