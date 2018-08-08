<?php
require_once("../../app/models/public/sesion/sesion.class.php");
try{
	$object = new login;
	if($object->getUsuarios()){
        if(isset($_POST['iniciar'])){
			$_POST = $object->validateForm($_POST);
			if($object->setCorreo_usuario($_POST['email'])){
				if($object->checkCorreo_usuario()){
                    if($object->setClave_usuario($_POST['password'])){
						if($object->checkClave_usuario()){
							$_SESSION['id_usuario'] = $object->getId_usuario();
							$_SESSION['nickname'] = $object->getNombres();
							$_SESSION['foto_usuario'] = $object->getFoto_usuario();
							Page::showMessage(1, "Inicio de sesion corecto", "../inicio/inicio.php");
						}else{
							throw new Exception("Clave inexistente");
						}
					}else{
						throw new Exception("Clave menor a 6 caracteres");
					}
				}else{
					throw new Exception("Este correo no perneten a ninguna cuenta");
				}
			}else{
				throw new Exception("Correo es invalido");
			}
		}
	}else{
		Page::showMessage(3, "No hay usuarios disponibles", "");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/public/sesion/login_view.php");
?>
