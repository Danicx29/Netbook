<?php
class mtsUsuario extends Validator{
	//Declaración de propiedades
	private $id_usuario = null;
	private $correo_usuario = null;
	private $clave_usuario = null;
	private $nombre_usuario = null;
	private $apellidos_usuario = null;
	private $foto_usuario = null;
	private $nickname = null;
	private $codtipouso = null;
	private $codigoUsa_cuenta= null;
	private $numeroTarj_cuenta=null;
	private $fechaVen_cuenta=null;
	private $cvc_cuenta=null;
	//Métodos para sobrecarga de propiedades
	public function setcvc_cuenta($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->cvc_cuenta = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getcvc_cuenta(){
		return $this->cvc_cuenta;
	}
	public function setfechaVen_cuenta($value){
		if($this->validateAlphanumeric($value, 1, 50)){
			$this->fechaVen_cuenta = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getfechaVen_cuenta(){
		return $this->fechaVen_cuenta;
	}
	public function setnumeroTarj_cuenta($value){		
			if($this->validateAlphanumeric($value, 1, 50)){
				$this->numeroTarj_cuenta = $value;
				return true;
			}else{
				return false;
			}
	}
	public function getnumeroTarj_cuenta(){
		return $this->numeroTarj_cuenta;
	}
	public function setId_usuario($value){
		if($this->validateId($value)){
			$this->id_usuario = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getcodigoUsa_cuenta(){
		return $this->codigoUsa_cuenta;
	}
	public function setcodigoUsa_cuenta($value){
		if($this->validateId($value)){
			$this->codigoUsa_cuenta= $value;
			return true;
		}else{
			return false;
		}
  }
	public function getId_usuario(){
		return $this->id_usuario;
	}
	public function setcodtipouso($value){
		if($this->validateId($value)){
			$this->codtipouso= $value;
			return true;
		}else{
			return false;
		}
  }

  public function getcodtipouso(){
		return $this->codtipouso;
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
	
	public function createUsu(){
		$hash = password_hash($this->clave_usuario, PASSWORD_DEFAULT);
		$sql = "INSERT INTO `usuarios` (`id_usuario`, `tipo_usuario`, `nombre_usuario`, `apellidos_usuario`, `clave_usuario`, `correo_usuario`, `foto_usuario`, `nickname`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";
		$codigo = '0';
		$params = array($this->codtipouso, $this->nombre_usuario , $this->apellidos_usuario, $hash, $this->correo_usuario, $this->foto_usuario, $this->nickname);
		
		$libros= Database::executeRow($sql, $params);
		
		if($libros){
			return true;
		}else{
			return false;
		}
	}
	public function createUsuPublic(){
		$hash = password_hash($this->clave_usuario, PASSWORD_DEFAULT);
		$sql = "INSERT INTO `usuarios` (`id_usuario`, `tipo_usuario`, `nombre_usuario`, `apellidos_usuario`, `clave_usuario`, `correo_usuario`, `nickname`) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
		$tipousuriox = 2;
		$params = array($tipousuriox, $this->nombre_usuario , $this->apellidos_usuario, $hash, $this->correo_usuario,  $this->nickname);
		var_dump($params);
		$libros= Database::executeRow($sql, $params);
		if($libros){
			return true;
		}else{
			return false;
		}
	}

	public function createformapago(){
		$sql = "INSERT INTO `cuentas` (`id_cuenta`, `codigoUsa_cuenta`, `numeroTarj_cuenta`, `fechaVen_cuenta`, `cvc_cuenta`) VALUES (NULL, (SELECT MAX(id_usuario) from usuarios), ?, ?, ?)";		
		$params = array($this->numeroTarj_cuenta , $this->fechaVen_cuenta,$this->cvc_cuenta);
		var_dump($params);
		$libros= Database::executeRow($sql, $params);
		if($libros){
			return true;
		}else{
			return false;
		}
	}

	//Métodos para manejar la sesión del usuario
	public function checkNickname(){
		$sql = "SELECT id_usuario,correo_usuario FROM usuarios WHERE nickname = ? ";
		$params = array($this->nickname);
		$data = Database::getRow($sql, $params);
		if($data){
			$this->id_usuario = $data['id_usuario'];
			$this->correo_usuario = $data['correo_usuario'];
			return true;
		}else{
			return false;
		}
	}
	public function getUsuarios(){
		$sql = "SELECT id_usuario FROM usuarios ";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function searchusuario($value){
		$sql = "SELECT * FROM usuarios u , tipo_usuario t WHERE id_usuario NOT IN (2) And u.tipo_usuario = t.id_tipousu AND nombre_usuario LIKE ?";
		$params = array("%$value%");
		return Database::getRows($sql, $params);
	}
	public function getUsuarios2(){
		$sql = "SELECT foto_usuario, nickname, nombre_usuario, apellidos_usuario, correo_usuario, nombre, id_usuario FROM usuarios, tipo_usuario WHERE id_usuario NOT IN (?) AND tipo_usuario=id_tipousu";
		$params = array($this->id_usuario);
		$data = Database::getRow($sql, $params);
	}
    #public function getUsuarios2(){
	#	$sql = "SELECT * FROM usuarios u , tipo_usuario t WHERE id_usuario NOT IN (?) And u.tipo_usuario = t.id_tipousu";
	#	$params = array($this->id_usuario);
	#	$data = Database::getRow($sql, $params);
	#}
	public function readUsuario(){
		$sql = "SELECT foto_usuario, nickname, nombre_usuario, apellidos_usuario, correo_usuario,tipo_usuario, id_usuario FROM usuarios WHERE id_usuario =?";
		$params = array($this->id_usuario);
		$user = Database::getRow($sql, $params);
		if($user){
			$this->foto_usuario = $user['foto_usuario'];
			$this->nickname = $user['nickname'];
			$this->nombre_usuario = $user['nombre_usuario'];
			$this->apellidos_usuario = $user['apellidos_usuario'];
			$this->correo_usuario = $user['correo_usuario'];
			$this->codtipouso = $user['tipo_usuario'];
			$this->id_usuario = $user['id_usuario'];
			return true;
		}else{
			return null;
		}
	}	
	public function getUsuarios3($value){
		$sql = "SELECT * FROM usuarios u , tipo_usuario t WHERE  u.tipo_usuario = t.id_tipousu and id_usuario NOT IN (?)";
		$params = array($value);
		return Database::getRows($sql, $params);
	}
	public function checkClave_usuario(){
		$sql = "SELECT clave_usuario, nickname,foto_usuario  FROM usuarios WHERE id_usuario = ?";
		$params = array($this->id_usuario);
		$data = Database::getRow($sql, $params);
		if(password_verify($this->clave_usuario, $data['clave_usuario'])){
			$this->nombre_usuario = $data['nickname'];
			$this->foto_usuario = $data['foto_usuario'];
			return true;
		}else{
			return false;
		}
	}
	public function gettipousu(){
		$sql = "SELECT id_tipousu, nombre FROM tipo_usuario";
		$params = array(null);
		return Database::getRows($sql, $params);
	}
	public function logOut(){
		return session_destroy();
	}
	public function deleteusu(){
		$sql = "DELETE FROM `usuarios` WHERE `usuarios`.`id_usuario` = ?";
		$params = array($this->id_usuario);
		return Database::executeRow($sql, $params);
	}
	public function updateusu(){
		$sql = "UPDATE `usuarios` SET `tipo_usuario` = ?, `nombre_usuario` = ?, `apellidos_usuario` = ?, `correo_usuario` = ?, `foto_usuario` = ?, `nickname` = ? WHERE `usuarios`.`id_usuario` = ?";
		$params = array($this->codtipouso , $this->nombre_usuario , $this->apellidos_usuario , $this->correo_usuario  , $this->foto_usuario , $this->nickname , $this->id_usuario );
		return Database::executeRow($sql, $params);
	}
	public function updateusu2(){
		$hash = password_hash($this->clave_usuario, PASSWORD_DEFAULT);
		$sql = "UPDATE `usuarios` SET `tipo_usuario` = ?, `nombre_usuario` = ?, `apellidos_usuario` = ?, `correo_usuario` = ?, `foto_usuario` = ?, `nickname` = ?, `clave_usuario` = ? WHERE `usuarios`.`id_usuario` = ?";
		$params = array($this->codtipouso , $this->nombre_usuario , $this->apellidos_usuario , $this->correo_usuario  , $this->foto_usuario , $this->nickname ,$hash, $this->id_usuario );
		return Database::executeRow($sql, $params);
	}
	public function GetRporteVentas($value){
		$sql = "SELECT codigoNum_venta, libros.nombre_libro, autores.nombre_autor , cuentas.numeroTarj_cuenta, precio ,libros.foto 
		FROM ventas 
        INNER JOIN usuarios ON cod_usu = usuarios.id_usuario
        INNER JOIN libros ON codigoLib_venta =libros.id_libro 
        INNER JOIN cuentas ON codigoCun_venta = cuentas.id_cuenta 
        INNER JOIN autores ON libros.codigoAtr_litro = autores.id_autor
		WHERE  cod_usu = ?";
		$params = array($value);
		return Database::getRows($sql, $params);
	}
	public function GetdatosUsuario($value){
		$sql = "SELECT `nickname`
		 FROM `usuarios`
		 WHERE `id_usuario`=?";
		$params = array($value);
		return Database::getRow($sql, $params);
	}
	
}
?>