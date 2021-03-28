<?php 

namespace MODELS\indicadores;
use MODELS\regiones as paises;

class cuadroComparativo extends paises\paises{

	private $codCuadro;

	public function __construct(){

		$this->codCuadro=7;
		
	}

	public function selectPai($conex){

		try{

			$string=[

				'SELECT * FROM paises WHERE cont=:neoliberal',
				'SELECT * FROM paises WHERE cont=:bloqueado'
			];

			$prepare=[
				$conex->prepare($string[0]),
				$conex->prepare($string[1])
			];
			$execute =[
				$prepare[0]->execute([':neoliberal'=>'neoliberal']),
				$prepare[1]->execute([':bloqueado'=>'bloqueado'])
			];

			return $prepare;

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}


	public function verificar($conex,$fecha){

		try{

			$string  = 'SELECT count(*) FROM indicadores_region where fecha=:fecha and codtipo=:codtipo';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':fecha'=>$fecha,':codtipo'=>$this->codCuadro));
			

			return $prepare;
			exit();
			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}



	public function agregar($conex,$codpai,$contagiados,$fallecidos,$fecha){
		
		try{
			$string = 'INSERT INTO indicadores_region(codtipo,codpai,contagiados,fallecidos,fecha)VALUES(:codtipo,:codpai,:contagiados,:fallecidos,:fecha)';

			$prepare=$conex->prepare($string);

			for($i=0;$i<count($codpai);$i++){
				$execute=$prepare->execute([':codtipo'=>$this->codCuadro,':codpai'=>$codpai[$i],':contagiados'=>$contagiados[$i],':fallecidos'=>$fallecidos[$i],':fecha'=>$fecha]);
			}

			echo $execute;
			$conex=null;

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}
	}

	public function listar($conex){

		try{

			$string  = 'SELECT MAX(fecha)AS fecha, MAX(id)AS id  FROM indicadores_region ir WHERE codtipo=:tipo  group by fecha order by fecha desc ';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute([':tipo'=>$this->codCuadro]);

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
			$string  = "DELETE FROM indicadores_region WHERE fecha=:id";
			$prepare = $conex->prepare($string);
			echo $execute = $prepare->execute(array(':id'=>$id));

			return $execute;

			$conex= null;
			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;
		}

	}

	public function Select_Modif($conex,$fecha){

		$string = [

			"SELECT * FROM indicadores_region ir INNER JOIN paises pai ON ir.codpai=pai.codpai WHERE codtipo=:tipo and fecha=:fecha and cont=:cont",
			"SELECT * FROM indicadores_region ir INNER JOIN paises pai ON ir.codpai=pai.codpai WHERE codtipo=:tipo and fecha=:fecha and cont=:cont"
		];

		$prepare=[
			$conex->prepare($string[0]),
			$conex->prepare($string[1])
		];

		$execute =[
			$prepare[0]->execute(['tipo'=>$this->codCuadro,':cont'=>'neoliberal',':fecha'=>$fecha]),
			$prepare[1]->execute(['tipo'=>$this->codCuadro,':cont'=>'bloqueado',':fecha'=>$fecha])
		];

		return $prepare;


	}

	public function modificar($conex,$contagiados,$fallecidos,$fecha,$codpai,$id){ 

		try{


			$string = 'UPDATE  indicadores_region SET contagiados=:contagiados, fallecidos=:fallecidos, fecha=:fecha WHERE codpai=:codpai and id=:id and codtipo=:tipo';

			$prepare= $conex->prepare($string);
			for ($i=0; $i <count($codpai) ; $i++) { 


				$execute = $prepare->execute(['contagiados'=>$contagiados[$i],':fallecidos'=>$fallecidos[$i],':id'=>$id[$i],':fecha'=>$fecha,':codpai'=>$codpai[$i],':tipo'=>$this->codCuadro]);				

			}

			echo ($execute);
		
		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;
		}
	}
}

?>