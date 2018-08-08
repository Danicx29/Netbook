<?php
class mi_perfil extends Validator{
	//Declaración de propiedades
	private $id_usuario = null;
	private $correo_usuario = null;
	private $clave_usuario = null;
	private $nombre_usuario = null;
	private $apellidos_usuario = null;
	private $sexo_usuario = null;
	private $pais_usuario = null;
	private $foto_usuario = null;
	private $nickname = null;
	private $Ntarjeta = null;
	private $FechaT = null;
	private $Cvc = null;
	//Métodos para sobrecarga de propiedades
	public function setId_usuario($value){
		if($this->validateId($value)){
			$this->id_usuario = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getId_usuario(){
		return $this->id_usuario;
	}

	public function setCorreo_usuario($value){
		if($this->validateEmail($value)){
			$this->correo_usuario = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getCorreo_usuario(){
		return $this->correo_usuario;
	}
	public function setNombres($value){
		if($this->validateAlphabetic($value, 1, 50)){
			$this->nombre_usuario = $value;
			return true;
		}else{
			return false;
		}
	}
	public function setNtarjeta($value){
		if($this->validateAlphabetic($value, 1, 50)){
			return false;
		}else{
			$this->Ntarjeta = $value;
			return true;
		}
	}
	public function setFecha($value){
		if($value != null){
			$this->FechaT = $value;
			return true;
		}else{
			return false;
		}
	}
	public function setCvc($value){
		if($this->validateAlphabetic($value, 1, 50)){
			return false;
		}else{
			$this->Cvc = $value;
			return true;
		}
	}
	public function getNombres(){
		return $this->nombre_usuario;
	}
	public function setClave_usuario($value){
		if($this->validatePassword($value)){
			$this->clave_usuario = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getClave_usuario(){
		return $this->clave_usuario;
	}
	public function setNickname($value){
		if($this->validateAlphabetic($value, 1, 80)){
			$this->nickname = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getNickname(){
		return $this->nickname;
	}
	public function setApellidos_usuario($value){
		if($this->validateAlphabetic($value, 1, 50)){
			$this->apellidos_usuario = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getApellidos_usuario(){
		return $this->apellidos_usuario;
	}
	public function setImagen($file){		
		if($this->validateImage($file, $this->foto_usuario, "../../web/img/usuarios/", 500, 500)){
			$this->foto_usuario = $this->getImageName();
			
			return true;
		}else{
			echo 'no se verifico';
			return false;
		}
	}
	public function getImagen(){
		return $this->foto_usuario;
	}
	public function unsetImagen(){
		if(unlink("../../web/img/usuarios/".$this->foto_usuario)){
			$this->foto_usuario = null;
			return true;
		}else{
			return false;
		}			
	}

	//Métodos para manejar la sesión del usuario
	public function checkCorreo_usuario(){
		$sql = "SELECT id_usuario,correo_usuario FROM usuarios WHERE correo_usuario = ? ";
		$params = array($this->correo_usuario);
		$data = Database::getRow($sql, $params);
		if($data){
			$this->id_usuario = $data['id_usuario'];
			return true;
		}else{
			return false;
		}
	}
	public function borrarPago($valu){
		$sql = "DELETE FROM `cuentas` WHERE `id_cuenta` = ?";
		$params = array($valu);
		return Database::executeRow($sql, $params);
	}
	public function InsertPago(){
		$sql = "INSERT INTO `cuentas`(`id_cuenta`, `codigoUsa_cuenta`, `numeroTarj_cuenta`, `fechaVen_cuenta`, `cvc_cuenta`) VALUES (null,?,?,?,?)";
		$params = array( $this->id_usuario,$this->Ntarjeta,$this->FechaT,$this->Cvc );
		var_dump($params);
		return Database::executeRow($sql, $params);
	}
	public function updateUsuario(){
		$hash = password_hash($this->clave_usuario, PASSWORD_DEFAULT);
		$sql = "UPDATE `usuarios` SET  `nombre_usuario` = ?, `apellidos_usuario` = ?, `correo_usuario` = ?, `foto_usuario` = ? WHERE `usuarios`.`id_usuario` = ?";
		$params = array($this->nombre_usuario , $this->apellidos_usuario , $this->correo_usuario  , $this->foto_usuario , $this->id_usuario );
		return Database::executeRow($sql, $params);
	}
	public function updateClave(){
		$hash = password_hash($this->clave_usuario, PASSWORD_DEFAULT);
		$sql = "UPDATE `usuarios` SET `clave_usuario` = ? WHERE `usuarios`.`id_usuario` = ?";
		$params = array($hash, $this->id_usuario );
		return Database::executeRow($sql, $params);
	}
	public function getPagos(){
		$sql = "SELECT id_cuenta, codigoUsa_cuenta, numeroTarj_cuenta, fechaVen_cuenta, cvc_cuenta FROM cuentas WHERE codigoUsa_cuenta =?";
		$params = array($this->id_usuario);
		return Database::getRows($sql, $params);
	}
	public function getPAGO($value){
		$sql = "SELECT id_cuenta, codigoUsa_cuenta, numeroTarj_cuenta, fechaVen_cuenta, cvc_cuenta FROM cuentas WHERE codigoUsa_cuenta =?";
		$params = array($value);
		return Database::getRows($sql, $params);
	}
	public function getUsuario(){
		$sql = "SELECT nombre_usuario, apellidos_usuario, clave_usuario, correo_usuario, foto_usuario, nickname 
		FROM usuarios 
		WHERE id_usuario = ?";
		$params = array($this->id_usuario);
		$data = Database::getRow($sql, $params);
		if($data){
			$this->nombre_usuario = $data['nombre_usuario'];
			$this->apellidos_usuario = $data['apellidos_usuario'];
			$this->clave_usuario = $data['clave_usuario'];
			$this->correo_usuario = $data['correo_usuario'];
			$this->foto_usuario = $data['foto_usuario'];
			$this->nickname = $data['nickname'];
			return true;
		}else{
			return false;
		}
	}
	public function checkClave_usuario(){
		$sql = "SELECT clave_usuario, nickname  FROM usuarios WHERE id_usuario = ?";
		$params = array($this->id_usuario);
		$data = Database::getRow($sql, $params);
		if(password_verify($this->clave_usuario, $data['clave_usuario'])){
			$this->nombre_usuario = $data['nickname'];
			return true;
		}else{
			return false;
		}
	}
	public function getventas($value){
		$sql = "SELECT l.nombre_libro, l.precio_libro, c.codigoUsa_cuenta, v.codigoNum_venta, u.nickname from libros l, cuentas c, ventas v, usuarios u WHERE l.id_libro= v.codigoLib_venta AND c.id_cuenta= v.codigoCun_venta AND v.cod_usu=u.id_usuario AND u.id_usuario =?";
		$params = array($value);
		return Database::getRows($sql, $params);
  }
	public function GetRporteVenta($value){
		$sql = "SELECT  libros.foto,`codigoNum_venta`, libros.nombre_libro, cuentas.numeroTarj_cuenta , `precio`
				FROM `ventas`  
				INNER JOIN libros ON ventas.codigoLib_venta = libros.id_libro 
				INNER JOIN cuentas on cuentas.id_cuenta =   ventas.codigoCun_venta 
				WHERE codigoNum_venta = ?";
		$params = array($value);
		return Database::getRows($sql, $params);
	}
	public function Getdatoslibro($value){
		$sql = "SELECT `nombre_libro`
		FROM `libros`
		WHERE `codigoNum_venta`=?";
		$params = array($value);
		return Database::getRow($sql, $params);
	}
}
?>