<?php 
namespace MODELS\indicadores\comportamientoVnzl;
use MODELS\regiones as paises;

define('contaEst',4);
define('contaMun',5);
define('contaPar',6);
define('codpai',58);

class estados extends paises\paises{
  public $eneable;
  public $disabled;

	public function __construct(){

		$this->eneable=true;
		$this->disabled=0;
	}

	public function agregar($conex/*,$recuperados*/,$contagiados/*,$fallecidos*/,$codest,$fecha){

		$string='INSERT INTO indicadores_region(codpai,codest,codtipo,/*recuperados,*/contagiados/*,fallecidos*/,fecha)VALUES(:codpai,:codest,:codtipo,/*:recuperados,*/:contagiados/*,:fallecidos*/,:fecha)';

		$prepare = $conex->prepare($string);
			for ($i=0; $i<sizeof($codest); $i++) { 
		$execute = $prepare->execute(array(':codpai'=>codpai,':codest'=>$codest[$i],':codtipo'=>contaEst,/*':recuperados'=>$recuperados,*/':contagiados'=>$contagiados[$i],/*':fallecidos'=>$fallecidos,*/':fecha'=>$fecha));
	}

		echo $execute;

	}

	public function pdf($conex,$hasta){

		$string= 'SELECT * FROM indicadores_region ir INNER JOIN estados est ON ir.codest = est.codest WHERE codtipo=:contaEst and fecha=:hasta ORDER BY fecha asc';
		$prepare =$conex->prepare($string);
		$execute = $prepare->execute(array(':contaEst'=>contaEst,':hasta'=>$hasta));

		return $prepare;
	}

	
	public function verificar($conex,$fecha){

		try{

			$string  = 'SELECT count(*) FROM indicadores_region where fecha=:fecha and codtipo=:codtipo';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':fecha'=>$fecha,':codtipo'=>4));
			

			return $prepare;
			exit();
			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}


	public function listar($conex){

		try{



			$string  = 'SELECT MAX(fecha)AS fecha, MAX(id)AS id  FROM indicadores_region ir  WHERE codtipo=:contaEst  group by fecha order by fecha desc ';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':contaEst'=>contaEst));

			return $prepare;
			$conex= null;
			exit();
			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}

	public function buscar($fecha,$conex){

		try{

			$string  = 'SELECT MAX(fecha)AS fecha, MAX(id)AS id  FROM indicadores_region ic WHERE fecha=:fecha and codtipo=:codtipo group by fecha';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':fecha'=>$fecha,':codtipo'=>contaEst));

			return $prepare;
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

			$string = 'SELECT * FROM indicadores_region ir INNER JOIN estados est  ON ir.codest = est.codest WHERE fecha=:fecha ';
			$prepare= $conex->prepare($string);
			$execute= $prepare->execute(array(':fecha'=>$fecha));

			return $prepare;
			exit();
			$conex= null;



		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}


	}

	public function update($id,$contaEst,$conex,$fecha){

		try{
			$string = "UPDATE indicadores_region SET contagiados=:contagiados,fecha=:fecha WHERE codtipo=:codtipo and id=:id";
			$prepare=$conex->prepare($string);
			for($i=0;$i<count($id);$i++){
				$execute=$prepare->execute(array(':contagiados'=>$contaEst[$i],':fecha'=>$fecha,':codtipo'=>contaEst,':id'=>$id[$i]));
			}

			echo $execute;
		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}
	}

	public function eliminar($fecha,$conex){

		try
		{
			$string="DELETE FROM indicadores_region WHERE fecha=:fecha and codtipo=:codtipo";
			$prepare=$conex->prepare($string);
			$execute=$prepare->execute(array(':fecha'=>$fecha,':codtipo'=>contaEst));
			exit();
			$conex= null;
		}
		catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}
	}

	public function pdf_one($conex,$fecha){


		try{
			$string= 'SELECT * from indicadores_region ir 
			inner join estados est on ir.codest = est.codest WHERE codtipo=:codtipo and fecha=:fecha';
			$prepare =$conex->prepare($string);
			$execute = $prepare->execute(array(':codtipo'=>contaEst,':fecha'=>$fecha));
			return $prepare;
			exit();
			$conex= null;
		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
			exit();
			$conex= null;

		}
	}

		public function selectEst($conex){

		try{

			$string='SELECT * FROM estados WHERE codest!=0 and status=:status';
			$prepare = $conex->prepare($string);
			$execute=$prepare->execute([':status'=>$this->eneable]);

			return $prepare;

		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
		}
	}
}

?>