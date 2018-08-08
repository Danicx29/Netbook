<?php
class autoyedit extends Validator{
	//Declaración de propiedades
	private $id_editorial = null;
	private $nombre_editorial = null;
  private $descrip_editorial = null;
  private $id_autor = null;
  private $nombre_autor = null;
	private $sexo_autor = null;
	private $foto_autor = null;
  //metodos de sobrecarga de propiedades
  //gets y sets de editorial
  public function setid_editorial($value){
		if($this->validateId($value)){
			$this->id_editorial= $value;
			return true;
		}else{
			return false;
		}
  }

  public function getid_editorial(){
		return $this->id_editorial;
  }

	public function setImagen($file){
		if($this->validateImage($file, $this->foto_autor, "../../web/img/autores/", 500, 500)){
			$this->foto_autor = $this->getImageName();
			return true;
		}else{
			return false;
		}
	}
	public function getImagen(){
		return $this->foto_autor;
	}
	public function unsetImagen(){
		if(unlink("../../web/img/usuarios/".$this->foto_autor)){
			$this->foto_autor = null;
			return true;
		}else{
			return false;
		}			
	}

  public function setnombre_editorial($value){
		if($this->validateAlphanumeric($value, 1, 100)){
			$this->nombre_editorial = $value;
			return true;
		}else{
			return false;
		}
  }

  public function getnombre_editorial(){
		return $this->nombre_editorial;
  }

  public function setdescrip_editorial($value){
		if($value){
			if($this->validateAlphanumeric($value, 1, 500)){
				$this->descrip_editorial = $value;
				return true;
			}else{
				return false;
			}
		}else{
			$this->descrip_editorial = null;
			return true;
		}		
  }

  public function getdescrip_editorial(){
		return $this->descrip_editorial;
	}

  //gets y sets de autores
  public function setid_autor($value){
		if($this->validateId($value)){
			$this->id_autor= $value;
			return true;
		}else{
			return false;
		}
  }

  public function getid_autor(){
		return $this->id_autor;
  }
  
  
  public function setnombre_autor($value){
		if($this->validateAlphanumeric($value, 1, 100)){
			$this->nombre_autor = $value;
			return true;
		}else{
			return false;
		}
  }

  public function getnombre_autor(){
		return $this->nombre_autor;
  }

  public function setsexo_autor($value){
		if($this->validateId($value)){
			$this->sexo_autor = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getsexo_autor(){
		return $this->sexo_autor;
	}


  
  

  //Metodos para el manejo del CRUD
  //select de editoriales
	public function getEditoriales(){
		$sql = "SELECT id_editorial, nombre_editorial, informacion_editorial FROM editorial";
		$params = array(null);
		return Database::getRows($sql, $params);
  }
  
	public function createEditorial(){
		$sql = "INSERT INTO editorial (nombre_editorial, informacion_editorial) VALUES(?,?)";
		$params = array($this->nombre_editorial, $this->descrip_editorial);
		return Database::executeRow($sql, $params);
	}
	public function readEditorial(){
		$sql = "SELECT nombre_editorial, informacion_editorial FROM editorial WHERE id_editorial=?";
		$params = array($this->id_editorial);
		$autoyedit = Database::getRow($sql, $params);
		if($autoyedit){
      $this->nombre_editorial = $autoyedit['nombre_editorial'];
			$this->descrip_editorial = $autoyedit['informacion_editorial'];
			return true;
		}else{
			return null;
		}
	}
	public function updateEditorial(){
		$sql = "UPDATE editorial SET nombre_editorial = ?, informacion_editorial = ? WHERE id_editorial = ?";
		$params = array($this->nombre_editorial, $this->descrip_editorial, $this->id_editorial);
		return Database::executeRow($sql, $params);
	}
	public function deleteEditorial(){
		$sql = "DELETE FROM `editorial` WHERE `editorial`.`id_editorial` = ?";
		$params = array($this->id_editorial);
		return Database::executeRow($sql, $params);
  }
  
  /*
	public function searchCategoria($value){
		$sql = "SELECT * FROM categorias WHERE nombre_categoria LIKE ? OR descripcion_categoria LIKE ? ORDER BY nombre_categoria";
		$params = array("%$value%", "%$value%");
		return Database::getRows($sql, $params);
	}*/
//Autores
public function getAutoress(){
  $sql = "SELECT id_autor, nombre_autor, nom_sex, foto_autor FROM autores , sexo_autor  WHERE sexautor=id_sexautor";
  $params = array(null);
  return Database::getRows($sql, $params);
}
public function getAutoressearch(){
  $sql = "SELECT id_autor, nombre_autor, FROM autores ";
  $params = array(null);
  return Database::getRows($sql, $params);
}
public function createAutores(){
  $sql = "CALL PD_insertAuto(?,?,?)";
  $params = array($this->nombre_autor, $this->sexo_autor, $this->foto_autor);
  return Database::executeRow($sql, $params);
}
public function readAutores(){
  $sql = "SELECT nombre_autor, nom_sex FROM autores WHERE id_autor=?";
  $params = array($this->id_autor);
  $autoyedit = Database::getRow($sql, $params);
  if($autoyedit){
    $this->nombre_autor = $autoyedit['nombre_autor'];
    $this->sexo_autor = $autoyedit['nom_sex'];
    return true;
  }else{
    return null;
  }
}
public function updateAutores(){
  $sql = "UPDATE autores SET nombre_autor = ?, sexautor = ?,foto_autor=? WHERE id_autor = ?";
  $params = array($this->nombre_autor, $this->sexo_autor,$this->foto_autor, $this->id_autor);
  return Database::executeRow($sql, $params);
}
public function deleteAutores(){
  $sql = "DELETE FROM `autores` WHERE `autores`.`id_autor` = ?";
  $params = array($this->id_autor);
  return Database::executeRow($sql, $params);
}

public function getSexoautores(){
	$sql = "SELECT id_sexautor, nom_sex FROM sexo_autor";
	$params = array(null);
	return Database::getRows($sql, $params);
}
public function searcheditorial($value){
	$sql = "SELECT id_editorial, nombre_editorial, informacion_editorial FROM editorial WHERE nombre_editorial LIKE ?";
	$params = array("%$value%");
	return Database::getRows($sql, $params);
}
public function searchautores($value){
	$sql = "SELECT id_autor, nombre_autor, nom_sex,foto_autor FROM autores , sexo_autor  WHERE sexautor=id_sexautor AND nombre_autor LIKE ?";
	$params = array("%$value%");
	return Database::getRows($sql, $params);
}
public function getpie(){
	$sql = "SELECT a.nombre_autor , Sum(l.`NumVent_libro`) AS Expr1
FROM libros l INNER JOIN autores a ON l.codigoAtr_litro = a.id_autor
GROUP BY l.`codigoAtr_litro`
ORDER BY Expr1 DESC ";
	$params = array(null);
	return Database::getRows($sql, $params);
}
public function getestedito(){
	$sql = "SELECT e.nombre_editorial , Sum(l.`NumVent_libro`) AS Expr2
FROM libros l INNER JOIN editorial e ON l.codigoEdt_libro = e.id_editorial
GROUP BY l.codigoEdt_libro
ORDER BY Expr2 DESC";
	$params = array(null);
	return Database::getRows($sql, $params);
}
public function GetReportelibros($value){
	$sql = "SELECT `NumVent_libro`, `nombre_libro`, editorial.nombre_editorial,generos.nombre_genero, `Valoracion`
FROM `libros` 
INNER JOIN editorial ON libros.codigoEdt_libro =editorial.id_editorial 
INNER JOIN generos ON libros.codigoGnr_libro= generos.id_genero
WHERE codigoAtr_litro = ?";
	$params = array($value);
	return Database::getRows($sql, $params);
}
public function GetdatosAutor($value){
	$sql = "SELECT  `nombre_autor` FROM `autores` WHERE `id_autor`=?";
	$params = array($value);
	return Database::getRow($sql, $params);
}
public function GetReporteEditorial($value){
	$sql = "SELECT `NumVent_libro`, `nombre_libro`, autores.nombre_autor,generos.nombre_genero, `Valoracion`
FROM `libros` 
INNER JOIN autores ON libros.codigoAtr_litro =autores.id_autor 
INNER JOIN generos ON libros.codigoGnr_libro= generos.id_genero
WHERE libros.codigoEdt_libro =?";
	$params = array($value);
	return Database::getRows($sql, $params);
}
public function GetdatosEditorial($value){
	$sql = "SELECT  `nombre_editorial` FROM `editorial` WHERE `id_editorial`=?";
	$params = array($value);
	return Database::getRow($sql, $params);
}
}
?>