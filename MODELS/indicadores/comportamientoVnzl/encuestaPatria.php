<?php 
namespace MODELS\indicadores\comportamientoVnzl;
use MODELS\regiones as paises;

/*CODIGO DEL PAISE VENEZUELA*/define('codpai',58);
/*CODIGO TIPO 1->RECUPERADOS,COPNTAGIADOS Y FALLECIDOS*//*define('rcfve',1);*/
/*CODIGO TIPO 2->PERSONAS CONTAGIADAS*/define('codencuesta',3);


const codencuestaPatria    =1;
const codvisitar           =2;
const codvisitado          =3;
const codpcr               =4;
const codprh               =5;



class encuestaPatria extends paises\paises{ 

	private $codencuestaPatria;
	public $eneable;
	public $disabled;

	public function __consturct(){
		
		$this->codencuestaPatria=3;
		$this->eneable=true;
		$this->disabled=0;
		$this->conex;
	}




	public function encuestaPatria($conex){

		try{

			$string  = 'SELECT * FROM encuesta_patria ep where status=:status order by codencuesta asc ';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute([':status'=>$this->eneable]);

			return $prepare;
			exit();
			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}
	public function verificar($conex,$fecha){

		try{

			$string  = 'SELECT count(*) FROM indicador_encuesta where fecha=:fecha and codtipo=:codtipo';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':fecha'=>$fecha,':codtipo'=>codencuesta));
			

			return $prepare;
			exit();
			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}


	public function agregar($id,$personas,$fecha,$conex){

		try{

			for($i=0 ; $i <count($id) ; $i++){

				$string="INSERT INTO indicador_encuesta (codtipo,codpai,codencuesta,contagiados,fecha) VALUES (:personas_contagiadas, :codpai, :codencuesta, :contagiados, :fecha)";

				$prepare = $conex->prepare($string);
				$execute = $prepare->execute(array(':personas_contagiadas'=>codencuesta,':codpai'=>codpai,':codencuesta'=>$id[$i],':contagiados'=>$personas[$i],':fecha'=>$fecha));
			}

			echo $execute;
			/*exit();
			$conex= null;*/

		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
			exit();
			$conex= null;
		}



	}

	

	public function listar($conex){

		try{

			$string  = 'SELECT MAX(fecha)AS fecha, MAX(id)AS id  FROM indicador_encuesta ic   group by fecha order by fecha desc ';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute();

			return $prepare;
			exit();
			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}


	public function buscar($fecha,$conex){

		try{

			$string  = 'SELECT MAX(fecha)AS fecha, MAX(id)AS id  FROM indicador_encuesta ic WHERE fecha=:fecha  group by fecha';
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


	public function eliminar($id,$conex){

		try{
			$string  = "DELETE FROM indicador_encuesta WHERE fecha=:id";
			$prepare = $conex->prepare($string);
			echo $execute = $prepare->execute(array(':id'=>$id));

			return $execute;
			exit();
			$conex= null;
			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;
		}

	}


	public function obtenerData_modif($conex, $fecha){

		try{

			$string = 'SELECT * FROM indicador_encuesta ie INNER JOIN encuesta_patria ep  ON ie.codencuesta = ep.codencuesta WHERE fecha=:fecha ORDER BY id DESC';
			$prepare= $conex->prepare($string);
			$execute= $prepare->execute(array(':fecha'=>$fecha));

			return $prepare;



		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}


	}


	public function update($conex,$id,$encuesta,$fecha){

		try{

			for($i=0 ; $i < count($id); $i++){

				$string='UPDATE indicador_encuesta SET contagiados=:contagiados, fecha=:fecha WHERE id=:id';
				$prepare = $conex->prepare($string);
				$execute=$prepare->execute(array(':contagiados'=>$encuesta[$i],':fecha'=>$fecha,':id'=>$id[$i]));
			}

			echo $execute;
/*		exit()
*/		$conex= null;

}catch(PDOException $e){

	echo "ERROR ".$e->getMenssage();
	exit();
	$conex= null;
}
}


public function pdf($conex,$fecha){


	try{
		$string= 'SELECT ep.desencuesta, ie.contagiados, ie.fecha from indicador_encuesta ie 
		inner join encuesta_patria ep on ie.codencuesta = ep.codencuesta WHERE codtipo=:codencuesta and fecha=:fecha order by fecha desc limit 5';
		$prepare =$conex->prepare($string);
		$execute = $prepare->execute(array(':codencuesta'=>codencuesta,':fecha'=>$fecha));
		return $prepare;
		exit();
		$conex= null;
	}catch(PDOException $e){

		echo 'ERROR '.$e->getMenssage();
		exit();
		$conex= null;

	}

	
}

public function pdf_one($conex,$fecha){


	try{
		$string= 'SELECT ep.desencuesta, ie.contagiados, ie.fecha from indicador_encuesta ie 
		inner join encuesta_patria ep on ie.codencuesta = ep.codencuesta WHERE codtipo=:codencuesta and fecha=:fecha order by fecha desc limit 5';
		$prepare =$conex->prepare($string);
		$execute = $prepare->execute(array(':codencuesta'=>codencuesta,':fecha'=>$fecha));
		return $prepare;
		exit();
		$conex= null;
	}catch(PDOException $e){

		echo 'ERROR '.$e->getMenssage();
		exit();
		$conex= null;

	}

	
}
}

?>
