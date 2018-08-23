<?php
class libros extends Validator{
	//Declaración de propiedades
	private $id_libro = null;
	private $nombre_libro = null;
  private $descrip_libro = null;
  private $num_Ventas = null;
  private $numero_pag = null;
  private $cod_Atr = null;
  private $cod_edt = null;
  private $cod_gnr = null;
  private $valoracion = null;
  private $precio_libro = null;
  private $imagen = null;
  private $link = null;

  //metodos de sobrecarga de propiedades
  public function setid_libro($value){
		if($this->validateId($value)){
			$this->id_libro= $value;
			return true;
		}else{
			return false;
		}
  }

  public function getid_libro(){
		return $this->id_libro;
	}
  public function setnombre_libro($value){
		if($this->validateAlphanumeric($value, 1, 100)){
			$this->nombre_libro = $value;
			return true;
		}else{
			return false;
		}
  }
  public function getnombre_libro(){
		return $this->nombre_libro;
  }
  
  public function setlink($value){	
		if($this->validateLink($value)){
			$this->link = $value;
			return true;
		}else{
			return false;
		}
}
public function getlink(){
	return $this->link;
}
  public function setdescrip_libro($value){
		if($this->validateAlphabetic($value,1,500)){
				$this->descrip_libro = $value;
				return true;
			
		}else{
			$this->descrip_libro = null;
			return true;
		}		
	}
	public function getdescrip_libro(){
		return $this->descrip_libro;
   }
 

  public function setnum_Ventas($value){
		if($value){
			if($this->validateAlphanumeric($value, 0, 999)){
				$this->num_Ventas = $value;
				return true;
			}else{
				return false;
			}
		}else{
			$this->num_Ventas = null;
			return true;
		}		
	}
	public function getnum_Ventas(){
		return $this->num_Ventas;
  }

  public function setnumero_pag($value){
		if($value){
			if($this->validateAlphanumeric($value, 0, 999)){
				$this->numero_pag = $value;
				return true;
			}else{
				return false;
			}
		}else{
			$this->numero_pag = null;
			return true;
		}		
	}
	public function getnumero_pag(){
		return $this->numero_pag;
  }

  public function setcod_Atr($value){
		if($this->validateId($value)){
			$this->cod_Atr= $value;
			return true;
		}else{
			return false;
		}
  }

  public function getcod_Atr(){
		return $this->cod_Atr;
  }
  public function setcod_edt($value){
		if($this->validateId($value)){
			$this->cod_edt= $value;
			return true;
		}else{
			return false;
		}
  }

  public function getcod_edt(){
		return $this->cod_edt;
  }

  public function setcod_gnr($value){
		if($this->validateId($value)){
			$this->cod_gnr= $value;
			return true;
		}else{
			return false;
		}
  }

  public function getcod_gnr(){
		return $this->cod_gnr;
  }

  public function setvaloracion($value){
		if($value){
			if($this->validateAlphanumeric($value, 0, 5)){
				$this->valoracion = $value;
				return true;
			}else{
				return false;
			}
		}else{
			$this->valoracion = null;
			return true;
		}		
	}
	public function getvaloracion(){
		return $this->valoracion;
  }
  public function setprecio_libro($value){
		if($this->validateMoney($value)){
			$this->precio_libro = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getprecio_libro(){
		return $this->precio_libro;
	}
	public function setImagen($file){
		if($this->validateImage($file, $this->imagen, "../../web/img/libros/", 500, 500)){
			$this->imagen = $this->getImageName();
			return true;
		}else{
			return false;
		}
	}
	public function getImagen(){
		return $this->imagen;
	}
	public function unsetImagen(){
		if(unlink("../../web/img/libros/".$this->imagen)){
			$this->imagen = null;
			return true;
		}else{
			return false;
		}
	}	
	//Metodos para el manejo del CRUD
	public function getestadisticas(){
		$sql = "
		SELECT `nombre_libro`,`NumVent_libro` FROM libros ORDER BY `NumVent_libro` desc  LIMIT 5 ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getganancias(){
		$sql = "SELECT l.nombre_libro , (l.precio_libro * l.NumVent_libro) AS Ganancias_neta, Sum(l.NumVent_libro)  AS num_ventas
		FROM libros l
		GROUP BY l.`id_libro`
		ORDER BY Ganancias_neta DESC 
		LIMIT 6
		";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getLibross(){
		$sql = "SELECT id_libro,nombre_libro, descripcion_libro, NumVent_libro, numeroPag_libro, a.nombre_autor,e.nombre_editorial,g.nombre_genero,valoracion,precio_libro, foto FROM libros l, autores a, editorial e, generos g WHERE l.codigoAtr_litro=a.id_autor and l.codigoEdt_libro=e.id_editorial AND l.codigoGnr_libro=g.id_genero order by nombre_libro";
		$params = array(null);
		return Database::getRows($sql, $params);
	}

	public function searchLibro($value){
		$sql = "SELECT id_libro,nombre_libro, descripcion_libro, NumVent_libro, numeroPag_libro, a.nombre_autor,e.nombre_editorial,g.nombre_genero,valoracion,precio_libro, foto FROM libros l, autores a, editorial e, generos g WHERE l.codigoAtr_litro=a.id_autor and l.codigoEdt_libro=e.id_editorial AND l.codigoGnr_libro=g.id_genero AND  nombre_libro LIKE ? order by nombre_libro";
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}

	public function createLibros(){
		$sql = "INSERT INTO `libros` (`id_libro`, `nombre_libro`, `descripcion_libro`, `NumVent_libro`, `numeroPag_libro`, `codigoAtr_litro`, `codigoEdt_libro`, `codigoGnr_libro`, `Valoracion`, `precio_libro`,foto, `link`) VALUES (NULL, ?, ?,?, ?, ?, ?, ?, ?, ? ,?,?)";
		$codigo = '0';
		$params = array($this->nombre_libro, $this->descrip_libro ,  $codigo, $this->numero_pag, $this->cod_Atr, $this->cod_edt, $this->cod_gnr, $this->valoracion,$this->precio_libro,$this->imagen,$this->link);
		$libros= Database::executeRow($sql, $params);
		if($libros){
			return true;
		}else{
			return false;
		}
	}
	
	public function readLibro(){
		$sql = "SELECT id_libro,nombre_libro, descripcion_libro,  NumVent_libro, numeroPag_libro,  l.codigoAtr_litro,l.codigoEdt_libro,l.codigoGnr_libro,valoracion,precio_libro, foto,link FROM libros l WHERE  id_libro=?";
		$params = array($this->id_libro);
		$libros = Database::getRow($sql, $params);
		if($libros){
			$this->id_libro = $libros['id_libro'];
		$this->nombre_libro = $libros['nombre_libro'];
		$this->descrip_libro = $libros['descripcion_libro'];
		$this->num_Ventas = $libros['NumVent_libro'];
		$this->numero_pag = $libros['numeroPag_libro'];
		$this->cod_Atr = $libros['codigoAtr_litro'];
		$this->cod_edt = $libros['codigoEdt_libro'];
		$this->cod_gnr = $libros['codigoGnr_libro'];
		$this->precio_libro = $libros['precio_libro'];
		$this->imagen = $libros['foto'];
		$this->link = $libros['link'];
			return true;
		}else{
			return false;
		}
	}
	public function updateLibros(){
		$sql = "UPDATE `libros` SET `nombre_libro`=?,`descripcion_libro`=?,`NumVent_libro`=?,`numeroPag_libro`=?,`codigoAtr_litro`=?,`codigoEdt_libro`=?,`codigoGnr_libro`=?,`Valoracion`=?,`precio_libro`=?,`foto`=?, `link` =? WHERE libros.id_libro = ?";
		$params = array($this->nombre_libro, $this->descrip_libro ,$this->num_Ventas, $this->numero_pag, $this->cod_Atr, $this->cod_edt, $this->cod_gnr, $this->valoracion,$this->precio_libro,$this->imagen,$this->link, $this->id_libro);
		return Database::executeRow($sql, $params);
	}
	public function deleteLibros(){
		$sql = "DELETE FROM `libros` WHERE `libros`.`id_libro` = ?";
		$params = array($this->id_libro);
		return Database::executeRow($sql, $params);
		}
		public function getautoress(){
			$sql = "SELECT id_autor, nombre_autor FROM autores";
			$params = array(null);
			return Database::getRows($sql, $params);
		}
		public function geteditorialess(){
			$sql = "SELECT id_editorial, nombre_editorial FROM editorial";
			$params = array(null);
			return Database::getRows($sql, $params);
		}
		public function getgeneross(){
			$sql = "SELECT id_genero, nombre_genero FROM generos";
			$params = array(null);
			return Database::getRows($sql, $params);
		}
		//metodo paginacion
        public function registros_table($empieza, $por_pagina)
        {
            $query = "SELECT id_libro,nombre_libro, descripcion_libro, NumVent_libro, numeroPag_libro, a.nombre_autor,e.nombre_editorial,g.nombre_genero,valoracion,precio_libro, foto FROM libros l, autores a, editorial e, generos g WHERE l.codigoAtr_litro=a.id_autor and l.codigoEdt_libro=e.id_editorial AND l.codigoGnr_libro=g.id_genero order by nombre_libro LIMIT $empieza, $por_pagina";
            $parametros=array($empieza,$por_pagina);
            return Database::getRows($query, $parametros);

		}
		public function GetReporteValoraciones($value){
			$sql = "SELECT usuarios.nickname,usuarios.nombre_usuario,usuarios.apellidos_usuario ,resenas.comentario_resena ,estado_comentario.nom_estado FROM libros 
INNER JOIN resenas ON resenas.codigoLbr_resena = libros.id_libro 
INNER JOIN estado_comentario ON estado_comentario.id_estado=resenas.cod_estado 
INNER JOIN usuarios ON resenas.codigoUsa_resena= usuarios.id_usuario
WHERE   libros.id_libro=?";
			$params = array($value);
			return Database::getRows($sql, $params);
		}
		public function GetReporteLibros($value){
			$sql = "SELECT  `nombre_libro`  FROM `libros` WHERE `id_libro`=?";
			$params = array($value);
			return Database::getRow($sql, $params);
		}
}
?>