<?php
class categorias extends Validator{
	//Declaración de propiedades
	private $id_genero = null;
	private $nombre_gen = null;
	private $descrip_gen = null;

  //metodos de sobrecarga de propiedades
  public function setid_genero($value){
		if($this->validateId($value)){
			$this->id_genero= $value;
			return true;
		}else{
			return false;
		}
  }

  public function getid_genero(){
		return $this->id_genero;
	}
  public function setnombre_gen($value){
		if($this->validateAlphanumeric($value, 1, 100)){
			$this->nombre_gen = $value;
			return true;
		}else{
			return false;
		}
  }
  
  public function getnombre_gen(){
		return $this->nombre_gen;
  }
  
  public function setdescrip_gen($value){
		if($value){
			if($this->validateAlphanumeric($value, 1, 500)){
				$this->descrip_gen = $value;
				return true;
			}else{
				return false;
			}
		}else{
			$this->descrip_gen = null;
			return true;
		}		
	}
	public function getdescrip_gen(){
		return $this->descripcion;
	}
	//Metodos para el manejo del CRUD
	public function getCategorias(){
		$sql = "SELECT id_genero, nombre_genero, descripcion_genero FROM generos";
		$params = array(null);
		return Database::getRows($sql, $params);
  }
 
  public function searchcategoria($value){
	$sql = "SELECT id_genero, nombre_genero, descripcion_genero FROM generos WHERE nombre_genero LIKE ?";
	$params = array("%$value%");
	return Database::getRows($sql, $params);
}
	public function createCategoria(){
		$sql = "INSERT INTO generos(nombre_genero,descripcion_genero) VALUES(?,?)";
		$params = array($this->nombre_gen, $this->descrip_gen);
		return Database::executeRow($sql, $params);
	}
	public function readCategoria(){
		$sql = "SELECT nombre_genero, descripcion_genero FROM generos WHERE id_genero = ?";
		$params = array($this->id);
		$categorias = Database::getRow($sql, $params);
		if($categorias){
      $this->nombre_gen = $categorias['nombre_genero'];
			$this->descrip_gen = $categorias['descripcion_genero'];
			return true;
		}else{
			return null;
		}
	}
	public function updateCategorias(){
		$sql = "UPDATE generos SET nombre_genero = ?, descripcion_genero = ? WHERE id_genero = ?";
		$params = array($this->nombre_gen, $this->descrip_gen, $this->id_genero);
		return Database::executeRow($sql, $params);
	}
	public function deleteCategoria(){
		$sql = "DELETE FROM `generos` WHERE `generos`.`id_genero` = ?";
		$params = array($this->id_genero);
		return Database::executeRow($sql, $params);
	}
	public function getgraficocat(){
		$sql = "SELECT g.nombre_genero , Sum(l.`NumVent_libro`) AS Expr3
		FROM libros l INNER JOIN generos g ON l.codigoGnr_libro = g.id_genero
		GROUP BY l.codigoGnr_libro
		ORDER BY Expr3 DESC LIMIT 5";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function GetReporteCategoria($value){
		$sql = "SELECT `NumVent_libro`, `nombre_libro`, editorial.nombre_editorial,autores.nombre_autor, `Valoracion`
	FROM `libros`
    INNER JOIN editorial ON libros.codigoEdt_libro =editorial.id_editorial
    INNER JOIN autores ON libros.codigoAtr_litro= autores.id_autor
	WHERE libros.codigoGnr_libro =?";
		$params = array($value);
		return Database::getRows($sql, $params);
	}
	public function GetdatosCategoria($value){
		$sql = "SELECT `nombre_genero` FROM `generos` WHERE `id_genero`=?";
		$params = array($value);
		return Database::getRow($sql, $params);
	}
}
?>