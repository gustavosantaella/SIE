<?php 
namespace MODELS\indicadores;
use MODELS\regiones as paises;

class relaciones extends paises\paises{

	private $codRelacion;

	public function __construct(){
#Relaciones entre paises seleccionados
		$this->codRelacion=8;
		$this->eneable=true;
		$this->disabled=0;


	}


	public function obtenerPaises($conex){

		try{
			$string = 'SELECT * FROM paises WHERE seleccionado=:seleccionado and status=:status';

			$prepare = $conex->conectar()->prepare($string);

			$execute = $prepare->execute([':seleccionado'=>$this->eneable,':status'=>$this->eneable]);

			return $prepare;

		}catch(PDOException $e){

			echo "Error".$e->getMenssage();
		}

	}

	public function agregar($conex,$recuperados, $contagiados, $fallecidos,$fecha,$codpai){

		for($i=0;$i<count($recuperados) && $i<count($contagiados)&& $i<count($fallecidos);$i++): 

			$string='INSERT INTO indicadores_region(recuperados,contagiados,fallecidos,fecha,codtipo,codpai)
		VALUES(:recuperados,:contagiados,:fallecidos,:fecha,:tipo,:codpai)';

		$prepare= $conex->conectar()->prepare($string);

		$execute = $prepare->execute([':recuperados'=>$recuperados[$i],':contagiados'=>$contagiados[$i],':fallecidos'=>$fallecidos[$i],':fecha'=>$fecha,':tipo'=>$this->codRelacion,':codpai'=>$codpai[$i]]);

	endfor;

	echo $execute;

}

public function verificar($conex,$fecha){

	$string='SELECT COUNT(*) FROM indicadores_region WHERE fecha=:fecha and codtipo=:tipo';

	$prepare = $conex->conectar()->prepare($string);

	$execute = $prepare->execute([':fecha'=>$fecha,':tipo'=>$this->codRelacion]);

	return $prepare;
}


public function listar($conex){

	try{

		$string  = 'SELECT MAX(fecha)AS fecha, MAX(id)AS id  FROM indicadores_region ir WHERE codtipo=:tipo  group by fecha order by fecha desc ';

		$prepare = $conex->conectar()->prepare($string);
		$execute = $prepare->execute([':tipo'=>$this->codRelacion]);

		return $prepare;
		exit();


	}catch(PDOException $e){

		echo "ERROR ".$e->getMenssage();
		exit();
		$conex= null;

	}

}


public function data_modif($conex,$fecha){


	try{

		$string='SELECT * FROM indicadores_region ir INNER JOIN paises p ON ir.codpai= p.codpai WHERE fecha=:fecha and codtipo=:tipo';

		$prepare= $conex->conectar()->prepare($string);
		$execute =$prepare->execute([':fecha'=>$fecha,':tipo'=>$this->codRelacion]);

		return $prepare;

	}catch(PDOException $e){

		echo "ERROR".$e->getMenssage();
	}
}



public function modificar($conex,$recuperados,$contagiados,$fallecidos,$fecha,$codpai,$id){

	try{

		for($i=0;$i<count($recuperados) && $i<count($contagiados)&& $i<count($fallecidos) && $i<count($codpai)&& $i<count($id);$i++):
			$string='UPDATE indicadores_region SET recuperados=:recuperados, contagiados=:contagiados, fallecidos=:fallecidos, fecha=:fecha WHERE id=:id and codtipo=:tipo and codpai=:codpai';

		$prepare = $conex->conectar()->prepare($string);

		$execute = $prepare->execute([':recuperados'=>$recuperados[$i],':contagiados'=>$contagiados[$i],':fallecidos'=>$fallecidos[$i],':codpai'=>$codpai[$i],':tipo'=>$this->codRelacion,':fecha'=>$fecha,':id'=>$id[$i]]);

	endfor;

	echo $execute;

}catch(PDOException $e){

	echo "ERROR".$e->getMenssage();

} 
}

public function consultar($conex,$fecha){

	$string=[
		"SELECT * FROM indicadores_region ir INNER JOIN paises pai ON ir.codpai=pai.codpai WHERE fecha=:fecha and codtipo=:tipo ",
		
	];

	$prepare= [

		/*actual*/$conex->conectar()->prepare($string[0]),
	
	];
	$execute = [

		$prepare[0]->execute([':fecha'=>$fecha,':tipo'=>$this->codRelacion]),
	

	];

	return $prepare;
}

public function eliminar($conex,$fecha){

	try {
		$string= "DELETE FROM indicadores_region WHERE codtipo=:tipo and fecha=:fecha";

		$prepare = $conex->conectar()->prepare($string);
		$execute = $prepare->execute([':tipo'=>$this->codRelacion,':fecha'=>$fecha]);

		echo $execute;
	} catch (Exception $e) {

		echo "Error".$e->getMenssage();

		return false;
		
	}
}
}

