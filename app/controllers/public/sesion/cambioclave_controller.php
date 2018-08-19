<?php
require_once("../../app/models/public/sesion/sesion.class.php");
try{
	$object = new login;
	if($object->getUsuarios()){
        if(isset($_POST['iniciar'])){
			$_POST = $object->validateForm($_POST);

		}
	}else{
		Page::showMessage(3, "No hay usuarios disponibles", "");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/public/sesion/cambioclave_view.php");
?>
