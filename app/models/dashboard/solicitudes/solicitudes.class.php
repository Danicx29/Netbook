<?php
class mtsSolicitudes extends Validator{
	//Declaración de propiedades
	private $id_resena = null;
	private $codigoUsa_resena = null;
	private $codigoLbr_resena = null;
	private $comentario_resena = null;
	private $cod_estado = null;
	//Métodos para sobrecarga de propiedades
	public function setid_resena($value){
		if($this->validateId($value)){
			$this->id_resena = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getid_resena(){
		return $this->id_resena;
	}
	public function setcod_estado($value){
		if($this->validateId($value)){
			$this->cod_estado = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getcod_estado(){
		return $this->cod_estado;
	}
	
	public function setcodigoUsa_resena($value){
		if($this->validateId($value)){
			$this->codigoUsa_resena = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getcodigoUsa_resena(){
		return $this->codigoUsa_resena;
	}

	public function setcodigoLbr_resena($value){
		if($this->validateId($value)){
			$this->codigoLbr_resena = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getcodigoLbr_resena(){
		return $this->codigoLbr_resena;
	}
	public function setcomentario_resena($value){
		if($value){
				$this->comentario_resena = $value;
				return true;
			
		}else{
			$this->comentario_resena = null;
			return true;
		}		
	}
	public function getcomentario_resena(){
		return $this->comentario_resena;
   }
	
// funciones
public function getresenasPen(){
	$sql = "SELECT id_resena,nickname ,nombre_libro,comentario_resena,nom_estado FROM resenas r,usuarios u, libros l, estado_comentario e WHERE codigoUsa_resena= u.id_usuario AND codigoLbr_resena= l.id_libro AND cod_estado= e.id_estado AND cod_estado=2";
	$params = array(null);
	return Database::getRows($sql, $params);
}
public function searchaupen($value){
	$sql = "SELECT id_resena,nickname ,nombre_libro,comentario_resena,nom_estado FROM resenas r,usuarios u, libros l, estado_comentario e WHERE codigoUsa_resena= u.id_usuario AND codigoLbr_resena= l.id_libro AND cod_estado= e.id_estado AND cod_estado=2 AND nickname LIKE ?";
	$params = array("%$value%");
	return Database::getRows($sql, $params);
}
public function searchrecha($value){
	$sql = "SELECT id_resena,nickname ,nombre_libro,comentario_resena,nom_estado FROM resenas r,usuarios u, libros l, estado_comentario e WHERE codigoUsa_resena= u.id_usuario AND codigoLbr_resena= l.id_libro AND cod_estado= e.id_estado AND cod_estado=1 AND nickname LIKE ?";
	$params = array("%$value%");
	return Database::getRows($sql, $params);
}
public function getresenasrech(){
	$sql = "SELECT id_resena,nickname ,nombre_libro,comentario_resena,nom_estado FROM resenas r,usuarios u, libros l, estado_comentario e WHERE codigoUsa_resena= u.id_usuario AND codigoLbr_resena= l.id_libro AND cod_estado= e.id_estado AND cod_estado=1";
	$params = array(null);
	return Database::getRows($sql, $params);
}
#aceptado
public function updateresenasyes(){
		$codigo_est = '3';
		$sql = "UPDATE `resenas` SET `cod_estado` = ? WHERE `resenas`.`id_resena` = ?";
		$params = array($codigo_est, $this->id_resena);
		return Database::executeRow($sql, $params);
	}
	#rechazado
	public function updateresenasno(){
		$codigo_est = '1';
		$sql = "UPDATE `resenas` SET `cod_estado` = ? WHERE `resenas`.`id_resena` = ?";
		$params = array($codigo_est, $this->id_resena);
		return Database::executeRow($sql, $params);
	}
	#restaurado
	public function updateresenasmaybe(){
		$codigo_est = '2';
		$sql = "UPDATE `resenas` SET `cod_estado` = ? WHERE `resenas`.`id_resena` = ?";
		$params = array($codigo_est, $this->id_resena);
		return Database::executeRow($sql, $params);
	}
	public function deleteres(){
		$sql = "DELETE FROM `resenas` WHERE `resenas`.`id_resena` = ?";
		$params = array($this->id_resena);
		return Database::executeRow($sql, $params);
	}
	public function registros_table($empieza, $por_pagina)
        {
            $query = "SELECT id_resena,nickname ,nombre_libro,comentario_resena,nom_estado FROM resenas r,usuarios u, libros l, estado_comentario e WHERE codigoUsa_resena= u.id_usuario AND codigoLbr_resena= l.id_libro AND cod_estado= e.id_estado AND cod_estado=2 LIMIT $empieza, $por_pagina";
            $parametros=array($empieza,$por_pagina);
            return Database::getRows($query, $parametros);

        }
}
?>