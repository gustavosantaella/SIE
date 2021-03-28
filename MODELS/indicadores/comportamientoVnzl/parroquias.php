<?php 
namespace MODELS\indicadores\comportamientoVnzl;


/*CODIGO DEL PAISE VENEZUELA*//*define('codpai',58);*/
/*CODIGO TIPO 1->RECUPERADOS,COPNTAGIADOS Y FALLECIDOS*//*define('rcfve',1);*/
/*CODIGO TIPO 2->PERSONAS CONTAGIADAS*/define('codContaPar',6);

class parroquias {

	public $eneable;
	public $disabled;
	public $codpai;
	public function __construct(){

		$this->eneable=true;
		$this->disabled=0;
		$this->codpai = 58;
	}


	public function verificar($conex,$fecha,$codest,$codmun,$codpar){

		try{

			$string  = 'SELECT count(*) FROM indicadores_region where fecha=:fecha and codest=:codest and codmun=:codmun  and codtipo=:codtipo and codpar=:codpar'; 
			$prepare = $conex->prepare($string);
			for ($i=0; $i <count($codpar) ; $i++) { 
				$execute = $prepare->execute(array(':fecha'=>$fecha,':codest'=>$codest,':codmun'=>$codmun,':codtipo'=>codContaPar,':codpar'=>$codpar[$i]));
			}
			

			return $prepare;

			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}


	public function agregar($conex,$fecha,$codest,$codmun,$valorR,$valorC,$valorF,$codpar){

		try{


			
			for ($i=0; $i <count($codpar) ; $i++) { 
				$string="INSERT INTO indicadores_region (codtipo,codpai,codest,codmun,contagiados,recuperados,fallecidos,fecha,codpar) VALUES (:codContaMun, :codpai, :codest, :codmun,:contagiados,:recuperados,:fallecidos, :fecha,:codpar)";

				$prepare = $conex->prepare($string);
				$execute = $prepare->execute(array(':codContaMun'=>codContaPar,':codpai'=>$this->codpai,':codest'=>$codest,':codmun'=>$codmun,':fecha'=>$fecha,':contagiados'=>$valorC[$i],':recuperados'=>$valorR[$i],':fallecidos'=>$valorF[$i],':codpar'=>$codpar[$i]));
				
			}
			

			echo $execute;

		}catch(PDOException $e){

			echo 'ERROR '.$e->getMenssage();
			exit();
		}

	}


	public function listar($conex){

		try{



			$string  = 'SELECT MAX(id)as id,est.codest,fecha,desest,desmun,mun.codmun from indicadores_region ir 
			inner join municipios mun on ir.codmun = mun.codmun 
			inner join estados est on ir.codest = est.codest
			inner join parroquias par on ir.codpar = par.codpar
			WHERE codtipo=:codContaMun
			group by fecha, desest,est.codest,mun.codmun';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':codContaMun'=>codContaPar));

			return $prepare;
			$conex= null;
			exit();
			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}

	public function eliminar($fecha,$estado,$codmun,$conex){

		try
		{
			$string="DELETE FROM indicadores_region WHERE fecha=:fecha and codest=:estado and codtipo=:codContaMun and codmun=:codmun";
			$prepare=$conex->prepare($string);
			$execute=$prepare->execute(array(':fecha'=>$fecha,':codContaMun'=>codContaPar,':estado'=>$estado,':codmun'=>$codmun));
			exit();
			$conex= null;
		}
		catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}
	}


	public function obtenerData_modif($conex,$codest,$fecha,$codmun){

		try{

			$string = 'SELECT * FROM indicadores_region ir
			INNER JOIN estados est 
			ON ir.codest = est.codest 
			INNER JOIN municipios mun 
			ON ir.codmun = mun.codmun 
			INNER JOIN parroquias par 
			ON ir.codpar = par.codpar
			WHERE fecha=:fecha 
			and codtipo=:codContaMun 
			and est.codest=:codest
			and mun.codmun=:codmun';
			$prepare= $conex->prepare($string);
			$execute= $prepare->execute(array(':fecha'=>$fecha,
				':codContaMun'=>codContaPar,':codest'=>$codest,':codmun'=>$codmun));

			return $prepare;
			$conex= null;



		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}


	}


	public function update($conex,$id,$codest,$codmun,$codpar,$fecha,$recuperados,$contagiados,$fallecidos){

		try{
			$string = "UPDATE indicadores_region SET contagiados=:contagiados,fecha=:fecha,recuperados=:recuperados,fallecidos=:fallecidos WHERE codtipo=:codtipo and id=:id  and codest=:codest and codmun=:codmun and codpar=:codpar";
			$prepare=$conex->prepare($string);
			for($i=0;$i<count($id);$i++){
				$execute=$prepare->execute(array(':contagiados'=>$contagiados[$i],':fallecidos'=>$fallecidos[$i],':recuperados'=>$recuperados[$i],':fecha'=>$fecha,':codtipo'=>codContaPar,':codest'=>$codest,':codmun'=>$codmun,':id'=>$id[$i],':codpar'=>$codpar[$i]));
			}

			echo $execute;
		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}
	}

	public function casosComunitarios($conex,$codest,$fecha,$codmun){

		try{
			$string = "SELECT sum(contagiados)as casos from indicadores_region 
			where codtipo=:codtipo and fecha<=:fecha and codest=:codest and codmun=:codmun";
			$prepare=$conex->prepare($string);
			$execute=$prepare->execute([':codtipo'=>codContaPar,':fecha'=>$fecha,':codest'=>$codest,':codmun'=>$codmun]);
			

			return $prepare;
		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}

	public function buscar($fecha,$conex){

		try{

			$string  = 'SELECT desest,est.codest,mun.desmun,MAX(fecha)AS fecha, MAX(id)AS id,mun.codmun  FROM indicadores_region ic INNER JOIN estados est ON ic.codest=est.codest INNER JOIN municipios mun on ic.codmun = mun.codmun WHERE fecha=:fecha and codtipo=:codtipo group by fecha,desest,est.codest,mun.codmun';
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':fecha'=>$fecha,':codtipo'=>codContaPar));

			return $prepare;

			$conex= null;

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}
	}

	public function selectPar($conex,$codmun){

		try{

			$string='SELECT * FROM parroquias WHERE codmun=:codmun and status=:status';
			$prepare = $conex->prepare($string);
			$execute=$prepare->execute(array(':codmun'=>$codmun,':status'=>$this->eneable));
			/*while ($p = $prepare->fetch()) {

				$data['data'][]=$p;
				$data['status']=1;



			}
			*/

			if ($execute) {
				/*echo json_encode($data);*/
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

	public function verifPar($conex,$codmun){

		try{

			$string  = 'SELECT count(*) FROM parroquias where codmun=:codmun'; 
			$prepare = $conex->prepare($string);
			$execute = $prepare->execute(array(':codmun'=>$codmun));

			

			return $prepare;

			

		}catch(PDOException $e){

			echo "ERROR ".$e->getMenssage();
			exit();
			$conex= null;

		}

	}

	
}

?>
