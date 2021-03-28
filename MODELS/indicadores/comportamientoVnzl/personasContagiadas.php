<?php 
namespace MODELS\indicadores\comportamientoVnzl;
use MODELS\regiones as paises;

/*CODIGO DEL PAISE VENEZUELA*/define('codpai',58);
/*CODIGO TIPO 1->RECUPERADOS,COPNTAGIADOS Y FALLECIDOS*//*define('rcfve',1);*/
/*CODIGO TIPO 2->PERSONAS CONTAGIADAS*/define('codpersonas',2);


const codhospitales    =1;
const codcentros       =2;
const codclinicas      =3;
const codaislamiento   =4;
const codhoteles       =5;


class personasContagiadas {

private $eneable;
private $disabled;

public function __construct(){

	$this->eneable= 1;
	$this->disabeld= 0;
}


	public function centros($conex){

		try{

			$string  = 'SELECT * FROM centros c WHERE status=:status order by codcentro asc ';
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

			$string  = 'SELECT count(*) FROM indicador_centros where fecha=:fecha and codtipo=:codtipo';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':fecha'=>$fecha,':codtipo'=>codpersonas));
			

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


			$string="INSERT INTO indicador_centros (codtipo,codpai,codcentro,contagiados,fecha) VALUES (:personas_contagiadas, :codpai, :codcentro, :contagiados, :fecha)";

			$prepare = $conex->prepare($string);
			for ($i=0; $i <count($id) ; $i++) { 
				# code...
				
				$execute = $prepare->execute(array(':personas_contagiadas'=>codpersonas,':codpai'=>codpai,':codcentro'=>$id[$i],':contagiados'=>$personas[$i],':fecha'=>$fecha));
				
			}
			echo $execute;
		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
			exit();
		}

	}


	public function listar($conex){

		try{

			$string  = 'SELECT MAX(fecha)AS fecha, MAX(id)AS id  FROM indicador_centros ic   group by fecha order by fecha desc ';
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

			$string  = 'SELECT MAX(fecha)AS fecha, MAX(id)AS id  FROM indicador_centros ic WHERE fecha=:fecha  group by fecha';
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
			$string  = "DELETE FROM indicador_centros WHERE fecha=:id";
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

			$string = 'SELECT * FROM indicador_centros ic INNER JOIN centros c on ic.codcentro = c.codcentro WHERE fecha=:fecha ORDER BY id DESC';
			$prepare= $conex->prepare($string);
			$execute= $prepare->execute(array(':fecha'=>$fecha));

			return $prepare;



		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}


	}


	public function update($id,$personas,$conex,$fecha){

		try{

			for ($i=0 ; $i<count($id); $i++){ 
				$string='UPDATE indicador_centros SET contagiados=:contagiados, fecha=:fecha WHERE id=:id';
				$prepare = $conex->prepare($string);
				$execute = $prepare->execute(array(':contagiados'=>$personas[$i],':id'=>$id[$i],':fecha'=>$fecha));
			}

			echo $execute;
			$conex= null;

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;
		}
	}


	public function pdf($conex,$fecha){


		try{
			$string= 'SELECT c.descentro, ic.contagiados, ic.fecha from indicador_centros ic 
			inner join centros c on ic.codcentro = c.codcentro WHERE codtipo=:codpersonas and fecha=:fecha order by fecha desc limit 5';
			$prepare =$conex->prepare($string);
			$execute = $prepare->execute(array(':codpersonas'=>codpersonas,':fecha'=>$fecha));
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
			$string= 'SELECT c.descentro, ic.contagiados, ic.fecha from indicador_centros ic 
			inner join centros c on ic.codcentro = c.codcentro WHERE codtipo=:codpersonas and fecha=:fecha order by fecha desc limit 5';
			$prepare =$conex->prepare($string);
			$execute = $prepare->execute(array(':codpersonas'=>codpersonas,':fecha'=>$fecha));
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
