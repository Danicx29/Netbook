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
	private $TIPOusuario = null;
	private $FechaContra = null;	
	//Métodos para sobrecarga de propiedades
	public function setFechaContra($value){
		if($this->validateFecha($value)){
			$this->FechaContra = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getFechaContra(){
		return $this->FechaContra;
	}
	public function setTIPOusuario($value){
		if($this->validateId($value)){
			$this->TIPOusuario = $value;
			return true;
		}else{
			return false;
		}
	}
	public function getTIPOusuario(){
		return $this->TIPOusuario;
	}
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
		if(unlink("../../web/img/usuarios/".$this->imagen)){
			$this->foto_usuario = null;
			return true;
		}else{
			return false;
		}
	}

	//Métodos para manejar la sesión del usuario
	public function checkNickname(){
		$sql = "SELECT id_usuario,correo_usuario,foto_usuario,tipo_usuario,tipo_usuario.nombre,`nombre_usuario`, `apellidos_usuario`,DATE(`tiempo_contraseña`)as FechaContra FROM usuarios ,tipo_usuario WHERE nickname = ?  AND usuarios.tipo_usuario =  tipo_usuario.id_tipousu AND tipo_usuario.id_tipousu !=?";
		$otro =2;
		$params = array($this->nickname,$otro);
		$data = Database::getRow($sql, $params);
		if($data){
			$this->id_usuario = $data['id_usuario'];
			$this->correo_usuario = $data['correo_usuario'];
			$this->foto_usuario =$data['foto_usuario'];
			$this->nombre_usuario=$data['nombre_usuario'] ;
			$this->apellidos_usuario=$data['apellidos_usuario'] ;
			$this->TIPOusuario=$data['tipo_usuario'] ;
			$this->FechaContra=$data['FechaContra'] ;			
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
		$sql = "SELECT nombre_usuario, apellidos_usuario, sexo_usuario, clave_usuario, correo_usuario, pais_usuario, foto_usuario, nickname 
		FROM usuarios 
		WHERE id_usuario = ?";
		$params = array($this->id_usuario);
		$data = Database::getRow($sql, $params);
		if($data){
			$this->nombre_usuario = $data['nombre_usuario'];
			$this->apellidos_usuario = $data['apellidos_usuario'];
			$this->sexo_usuario = $data['sexo_usuario'];
			$this->clave_usuario = $data['clave_usuario'];
			$this->correo_usuario = $data['correo_usuario'];
			$this->pais_usuario = $data['pais_usuario'];
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
			$this->nickname = $data['nickname'];
			return true;
		}else{
			return false;
		}
	}

	public function logOut(){
		unset($_SESSION['id_usuario_dashboard']);  
		unset($_SESSION['nickname_dashboard']);  
		unset($_SESSION['correo_usuario_dashboard']);  
		unset($_SESSION['foto_dashboard']);  
		unset($_SESSION['nombre_usuario_dashboard']);  
		unset($_SESSION['apellidos_usuario_dashboard']);  
		unset($_SESSION['tipo_usuario_dashboard']);  
		if( isset($_SESSION['id_usuario_dashboard']) ){
			return false;
		}else{
			return true;
		}
	}
}
?>