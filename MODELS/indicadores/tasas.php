<?php 
namespace MODELS\indicadores;
use MODELS\regiones as paises;

class tasas extends paises\paises{

	private $codTasas;

	public function __construct(){
#Relaciones entre paises seleccionados
		$this->codTasas=9;
		$this->eneable=true;
		$this->disabled=0;
		$this->continente='AMÉRICA';
	}


	public function obtenerPaises($conex){

		try{
			$string = 'SELECT * FROM paises WHERE continente=:continente and status=:status';

			$prepare = $conex->conectar()->prepare($string);

			$execute = $prepare->execute([':continente'=>$this->continente,':status'=>$this->eneable]);

			return $prepare;

		}catch(PDOException $e){

			echo "Error".$e->getMenssage();
		}

	}

	public function agregar($conex,$afectados,$fallecidos,$fecha,$codpai){

		// EL CODGIO DEL PAIS NO ESTA LLEGANDO
		// REVISAR EL CONTROLADOR DE RELACIONES EN AFECTADOS
		

		for($i=0;$i<count($afectados)&& $i<count($fallecidos);$i++): 

			$string='INSERT INTO indicadores_region(afectados,fallecidos,fecha,codtipo,codpai)
		VALUES(:afectados,:fallecidos,:fecha,:tipo,:codpai)';

		$prepare= $conex->conectar()->prepare($string);

		$execute = $prepare->execute([':afectados'=>$afectados[$i],':fallecidos'=>$fallecidos[$i],':fecha'=>$fecha,':tipo'=>$this->codTasas,':codpai'=>$codpai[$i]]);

	endfor;

	echo $execute;

}

public function verificar($conex,$fecha){

	$string='SELECT COUNT(*) FROM indicadores_region WHERE fecha=:fecha and codtipo=:tipo';

	$prepare = $conex->conectar()->prepare($string);

	$execute = $prepare->execute([':fecha'=>$fecha,':tipo'=>$this->codTasas]);

	return $prepare;
}



public function listar($conex){

	try{

		$string  = 'SELECT MAX(fecha)AS fecha, MAX(id)AS id  FROM indicadores_region ir WHERE codtipo=:tipo  group by fecha order by fecha desc ';
		$prepare = $conex->conectar()->prepare($string);
		$execute = $prepare->execute([':tipo'=>$this->codTasas]);

		return $prepare;
		exit();
		

	}catch(PDOException $e){

		echo "ERROR ".$e->getMenssage();
		exit();
		$conex= null;

	}

}

public function data($conex,$fecha){
 

	try{
         

		$string="SELECT * FROM indicadores_region  ir INNER JOIN paises p ON ir.codpai=p.codpai WHERE codtipo=:tipo and fecha=:fecha";

		$prepare= $conex->conectar()->prepare($string);

		$execute = $prepare->execute([':tipo'=>$this->codTasas,':fecha'=>$fecha]);

		return $prepare;
	}catch(PDOException $e){

		echo "ERROR".$e->getMenssage();
	}
}

public function modificar($conex,$fecha,$afectados,$fallecidos,$id,$codpai){

	try{

		for($i=0;$i<count($afectados)&& $i<count($fallecidos) && $i<count($codpai)&& $i<count($id);$i++):
			$string='UPDATE indicadores_region SET afectados=:afectados, fallecidos=:fallecidos, fecha=:fecha WHERE id=:id and codtipo=:tipo and codpai=:codpai';

		$prepare = $conex->conectar()->prepare($string);

		$execute = $prepare->execute([':afectados'=>$afectados[$i],':fallecidos'=>$fallecidos[$i],':codpai'=>$codpai[$i],':tipo'=>$this->codTasas,':fecha'=>$fecha,':id'=>$id[$i]]);

	endfor;

	echo $execute;

}catch(PDOException $e){

	echo "ERROR".$e->getMenssage();

} 
}

public function eliminar($conex,$fecha){

	try {
		$string= "DELETE FROM indicadores_region WHERE codtipo=:tipo and fecha=:fecha";

		$prepare = $conex->conectar()->prepare($string);
		$execute = $prepare->execute([':tipo'=>$this->codTasas,':fecha'=>$fecha]);

		echo $execute;
	} catch (Exception $e) {

		echo "Error".$e->getMenssage();

		return false;
		
	}
}


}

