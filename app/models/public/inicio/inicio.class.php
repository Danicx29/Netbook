<?php
class inicio extends Validator{
	//Declaración de propiedades
	private $id_libro = null;
	private $id_Usuario = null;
	private $nombre_libro = null;
	private $imagen_libro = null;
	private $comentario = null;
	private $id_cuenta = null;
	private $codigo_venta = null;
	private $codigo_Nventa = null;
	private $valoracion = null;
	private $precio = null;


	public function getComentario(){
		return $this->comentario;
	}
	public function setComentario($value){
		if($this->validateAlphabetic($value, 1, 100)){
			$this->comentario = $value;
			return true;
		}else{
			return false;
		}
	}
		public function setPrecio($value){
			$this->precio = $value;
			return true;
	}
	public function setId_libro($value){
		if($this->validateId($value)){
			$this->id_libro = $value;
			return true;
		}else{
			return false;
		}
	}
		public function setCuenta($value){
		if($this->validateId($value)){
			$this->id_cuenta = $value;
			return true;
		}else{
			return false;
		}
	}
	public function setId_Usuario($value){
		if($this->validateId($value)){
			$this->id_Usuario = $value;
			return true;
		}else{
			return false;
		}
	}
	//Metodos para el manejo del CRUD
	public function getLibros(){
		$sql = "SELECT l.id_libro, l.nombre_libro,l.descripcion_libro,a.nombre_autor,e.nombre_editorial,g.nombre_genero,l.numeroPag_libro,l.Valoracion,l.precio_libro,l.foto 
		FROM libros l , autores a , editorial e , generos g 
		WHERE l.codigoAtr_litro =a.id_autor AND l.codigoEdt_libro = e.id_editorial AND l.codigoGnr_libro = g.id_genero ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getPagos($value){
		$sql = "SELECT `id_cuenta`, `codigoUsa_cuenta`, `numeroTarj_cuenta`, `fechaVen_cuenta`, `cvc_cuenta` FROM `cuentas` WHERE `codigoUsa_cuenta` =? ";
		$params = array($value);
		$data = Database::getRow($sql, $params);
		if($data){
			$this->id_cuenta= $data['id_cuenta'];
			return true;
		}else{
			return false;
		}

	}
	public function getLastVenta(){
		$sql = "SELECT  MAX(`codigoNum_venta`)nVenta  FROM `ventas`";
		$params = array(null); 
		$data = Database::getRow($sql, $params);
		if($data){
			$this->codigo_Nventa = $data['nVenta'] +1;
			return true;
		}else{
			return false;
		}

	}
	public function InsertarComentario(){
		$sql = "INSERT INTO `resenas`(`id_resena`, `codigoUsa_resena`, `codigoLbr_resena`, `comentario_resena`,cod_estado) VALUES (NULL,?,?,?,2)";
		$params = array($this->id_Usuario, $this->id_libro, $this->comentario);
		return Database::executeRow($sql, $params);
	}
	public function ActualizarValoracion($valu,$value){
		$sql = "INSERT INTO `valoracion`(`id_valoracion`, `id_Usuariov`, `id_Librov`, `valoraciones`) VALUES (null,?,?,?)";
		$params = array($valu, $this->id_libro,$value);
		return Database::executeRow($sql, $params);
	}
		public function InsertarVenta($value){
		$sql = "INSERT INTO `ventas`(`id_venta`, `codigoLib_venta`, `codigoCun_venta`, `codigoNum_venta`, `precio`, `cod_usu`) VALUES (null,?,?,?,?,?)";
		$params = array($this->id_libro,$this->id_cuenta,$this->codigo_Nventa,$this->precio,$value);
		return Database::executeRow($sql, $params);
	}

	public function getLista($value){
		$sql = "SELECT l.id_libro, l.nombre_libro,l.descripcion_libro,a.nombre_autor,e.nombre_editorial,g.nombre_genero,l.numeroPag_libro,l.Valoracion,l.precio_libro,l.foto,link 
		FROM libros l , autores a , editorial e , generos g , listas t , usuarios u 
		WHERE l.codigoAtr_litro =a.id_autor AND l.codigoEdt_libro = e.id_editorial AND l.codigoGnr_libro = g.id_genero
		 AND t.codigoLbr_lista = l.id_libro AND t.codigo_Usu_lista = u.id_usuario AND U.id_usuario =?";
		$params = array($value);
		return Database::getRows($sql, $params);
	}
	public function getGenero(){
		$sql = "SELECT DISTINCT id_genero, nombre_genero, descripcion_genero FROM generos g ,libros l WHERE g.id_genero =  l.codigoGnr_libro   ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getLibrosporGenero($value){
		$sql = "SELECT l.id_libro, l.nombre_libro,l.descripcion_libro,a.nombre_autor,e.nombre_editorial,g.nombre_genero,l.numeroPag_libro,l.Valoracion,l.precio_libro,l.foto 
		FROM libros l , autores a , editorial e , generos g 
		WHERE l.codigoAtr_litro =a.id_autor AND l.codigoEdt_libro = e.id_editorial AND l.codigoGnr_libro = g.id_genero  AND id_genero = ? ";
		$params = array($value);
		return Database::getRows($sql, $params);
	}
	public function getAutores(){
		$sql = "SELECT `id_autor`, `nombre_autor`, `foto_autor`, `sexautor` FROM `autores`";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function getAutoresporGenero($value){
		$sql = "SELECT l.id_libro, l.nombre_libro,l.descripcion_libro,a.nombre_autor,e.nombre_editorial,g.nombre_genero,l.numeroPag_libro,l.Valoracion,l.precio_libro,l.foto 
		FROM libros l , autores a , editorial e , generos g 
		WHERE l.codigoAtr_litro =a.id_autor AND l.codigoEdt_libro = e.id_editorial AND l.codigoGnr_libro = g.id_genero  AND id_autor = ? ";
		$params = array($value);
		return Database::getRows($sql, $params);
	}
	public function getComentarios(){
		$sql = "SELECT libros.id_libro, usuarios.foto_usuario, usuarios.nickname , r.comentario_resena  FROM usuarios, resenas r ,libros WHERE r.codigoUsa_resena = usuarios.id_usuario  AND r.codigoLbr_resena = libros.id_libro AND r.cod_estado=3 ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
}
?>