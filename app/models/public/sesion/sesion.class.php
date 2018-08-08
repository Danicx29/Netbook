<?php
class login extends Validator{
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
		if($this->validateAlphabetic($value, 1, 50)){
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
	public function setSexo_usuario($value){
		if($this->validateAlphabetic($value, 1, 50)){
			$this->sexo_usuario = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getSexo_usuario(){
		return $this->sexo_usuario;
	}
	public function setPais_usuario($value){
		if($this->validateAlphabetic($value, 1, 50)){
			$this->pais_usuario = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getPais_usuario(){
		return $this->pais_usuario;
	}
	public function getFoto_usuario(){
		return $this->foto_usuario;
	}


	//Métodos para manejar la sesión del usuario
	public function checkCorreo_usuario(){
		$sql = "SELECT id_usuario,correo_usuario,foto_usuario FROM usuarios WHERE correo_usuario = ? ";
		$params = array($this->correo_usuario);
		$data = Database::getRow($sql, $params);
		if($data){
			$this->id_usuario = $data['id_usuario'];
			$this->foto_usuario = $data['foto_usuario'];
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
	public function logOut(){
		return session_destroy();
	}
}
?>