<?php 
namespace MODELS\usuario;

class centros{

	private $conex;

	public function __construct($conex){

		$this->conex = $conex;

	}

	public function listar(){

		$string  = 'SELECT * FROM centros ORDER BY codcentro ASC';
		$prepare = $this->conex->conectar()->prepare($string);
		$execute = $prepare->execute();

		return $prepare;

		try {

		} catch (Exception $e) {
			echo "error".$e->getMenssage();
		}

	}

		public function update($datos){

		$string  = 'UPDATE centros SET descentro=:centro, status=:status WHERE codcentro=:codcentro';
		$prepare = $this->conex->conectar()->prepare($string);
		$execute = $prepare->execute([':centro'=>$datos['descentro'],':status'=>$datos['status'],':codcentro'=>$datos['codcentro']]);

		return $execute;

		try {
			
		} catch (Exception $e) {
			echo "error".$e->getMenssage();
		}

	}


}