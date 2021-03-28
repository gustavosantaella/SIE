<?php 
namespace MODELS\indicadores\comportamientoVnzl;


/*CODIGO DEL PAISE VENEZUELA*/define('codpai',58);
/*CODIGO TIPO 1->RECUPERADOS,COPNTAGIADOS Y FALLECIDOS*//*define('rcfve',1);*/
/*CODIGO TIPO 2->PERSONAS CONTAGIADAS*/define('codContaMun',5);

class municipios {

	private $eneable;
	private $disabled;

	public function __construct(){

		$this->eneable=true;
		$this->disabled=0;
	}


	public function verificar($conex,$fecha,$codest,$codmun){

		try{

			$string  = 'SELECT count(*) FROM indicadores_region where fecha=:fecha and codest=:codest and codmun=:codmun  and codtipo=:codtipo'; 
			$prepare = $conex->prepare($string);
			for ($i=0; $i <count($codmun) ; $i++) { 
				$execute = $prepare->execute(array(':fecha'=>$fecha,':codest'=>$codest,':codmun'=>$codmun[$i],':codtipo'=>codContaMun));
			}
			

			return $prepare;

			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}


	public function agregar($conex,$fecha,$codest,$codmun,$valorR,$valorC,$valorF){

		try{


			
			for ($i=0; $i <count($codmun) ; $i++) { 
				$string="INSERT INTO indicadores_region (codtipo,codpai,codest,codmun,contagiados,recuperados,fallecidos,fecha) VALUES (:codContaMun, :codpai, :codest, :codmun,:contagiados,:recuperados,:fallecidos, :fecha)";

				$prepare = $conex->prepare($string);
				$execute = $prepare->execute(array(':codContaMun'=>codContaMun,':codpai'=>codpai,':codest'=>$codest,':codmun'=>$codmun[$i],':fecha'=>$fecha,':contagiados'=>$valorC[$i],':recuperados'=>$valorR[$i],':fallecidos'=>$valorF[$i]));
				
			}
			

			echo $execute;

		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
			exit();
		}

	}


	public function listar($conex){

		try{



			$string  = 'SELECT MAX(id)as id,est.codest,fecha,desest from indicadores_region ir 
			inner join municipios mun on ir.codmun = mun.codmun 
			inner join estados est on ir.codest = est.codest
			WHERE codtipo=:codContaMun
			group by fecha, desest,est.codest';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':codContaMun'=>codContaMun));

			return $prepare;
			$conex= null;
			exit();
			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}

	public function eliminar($fecha,$estado,$conex){

		try
		{
			$string="DELETE FROM indicadores_region WHERE fecha=:fecha and codest=:estado and codtipo=:codContaMun";
			$prepare=$conex->prepare($string);
			$execute=$prepare->execute(array(':fecha'=>$fecha,':codContaMun'=>codContaMun,':estado'=>$estado));
			exit();
			$conex= null;
		}
		catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}
	}


	public function obtenerData_modif($conex,$codest,$fecha){

		try{

			$string = 'SELECT * FROM indicadores_region ir INNER JOIN estados est  ON ir.codest = est.codest 
			INNER JOIN municipios mun ON ir.codmun = mun.codmun WHERE fecha=:fecha and codtipo=:codContaMun and est.codest=:codest ';
			$prepare= $conex->prepare($string);
			$execute= $prepare->execute(array(':fecha'=>$fecha,':codContaMun'=>codContaMun,':codest'=>$codest));

			return $prepare;
			$conex= null;



		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}


	}


	public function update($conex,$id,$codest,$codmun,$fecha,$recuperados,$contagiados,$fallecidos){

		try{
			$string = "UPDATE indicadores_region SET contagiados=:contagiados,fecha=:fecha,recuperados=:recuperados,fallecidos=:fallecidos WHERE codtipo=:codtipo and id=:id  and codest=:codest and codmun=:codmun";
			$prepare=$conex->prepare($string);
			for($i=0;$i<count($id);$i++){
				$execute=$prepare->execute(array(':contagiados'=>$contagiados[$i],':fallecidos'=>$fallecidos[$i],':recuperados'=>$recuperados[$i],':fecha'=>$fecha,':codtipo'=>codContaMun,':codest'=>$codest,':codmun'=>$codmun[$i],':id'=>$id[$i]));
			}

			echo $execute;
		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}
	}

	public function casosComunitarios($conex,$codest,$fecha){

		try{
			$string = "SELECT sum(contagiados)as casos from indicadores_region 
			where codtipo=:codContaMun and fecha<=:fecha and codest=:codest ";
			$prepare=$conex->prepare($string);
			$execute=$prepare->execute([':codContaMun'=>codContaMun,':fecha'=>$fecha,':codest'=>$codest]);
			

			return $prepare;
		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}

	public function buscar($fecha,$conex){

		try{

			$string  = 'SELECT desest,est.codest,MAX(fecha)AS fecha, MAX(id)AS id  FROM indicadores_region ic INNER JOIN estados est ON ic.codest=est.codest WHERE fecha=:fecha and codtipo=:codtipo group by fecha,desest,est.codest';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':fecha'=>$fecha,':codtipo'=>codContaMun));

			return $prepare;
			exit();
			$conex= null;

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}
	}

	public function selectMun($conex,$codest){

		try{

			$string='SELECT * FROM municipios WHERE codest=:codest and status=:status';
			$prepare = $conex->prepare($string);
			$execute=$prepare->execute(array(':codest'=>$codest,':status'=>$this->eneable));
			/*while ($m = $prepare->fetch()) {

				$data['data'][]=$m;
				$data['status']=1;

			}
*/

			if ($execute) {
				/*echo $json= json_encode($data);*/
				return $prepare;
			}else{
				?>
				<script>alert("error")</script>
				<?php 
			}


		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
		}
	}

	public function selectMunPar($conex,$codest){

		try{

			$string='SELECT * FROM municipios WHERE codest=:codest and status=:status';
			$prepare = $conex->prepare($string);
			$execute=$prepare->execute(array(':codest'=>$codest,':status'=>$this->eneable));
			/*while ($m = $prepare->fetch()) {

				$data['data'][]=$m;
				$data['status']=1;

			}
*/

			if ($execute) {
				/*echo $json= json_encode($data);*/
				return $prepare;
			}else{
				?>
				<script>alert("error")</script>
				<?php 
			}


		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
		}
	}


	public function verifMun($conex,$codest){

		try{

			$string  = 'SELECT count(*) FROM municipios where codest=:codest'; 
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':codest'=>$codest));

			

			return $prepare;

			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}

	
}

?>
