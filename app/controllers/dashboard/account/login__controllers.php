<?php
require_once("../../app/models/dashboard/login/login.class.php");
try{
	$object = new login;
	if($object->getUsuarios()){
        if(isset($_POST['iniciar'])){
			$_POST = $object->validateForm($_POST);
			if($object->setNickname($_POST['nickname'])){
				if($object->checkNickname()){
                    if($object->setClave_usuario($_POST['password'])){
						if($object->checkClave_usuario()){
							$_SESSION['id_usuario_dashboard'] = $object->getId_usuario();
							$_SESSION['nickname_dashboard'] = $object->getNickname();
							$_SESSION['correo_usuario_dashboard'] = $object->getCorreo_usuario();
							$_SESSION['foto_dashboard'] = $object->getImagen();
							$_SESSION['nombre_usuario_dashboard'] = $object->getNombres();
							$_SESSION['apellidos_usuario_dashboard'] = $object->getApellidos_usuario();
							$_SESSION['tipo_usuario_dashboard'] = $object->getTIPOusuario();
							Page::showMessage(1, "Inicio de sesion correcto", "../menu/menu.php");
						}else{
							throw new Exception("Clave inexistente");
						}
						}else{
						throw new Exception("Clave erronea");
					}
				}else{
					throw new Exception("Este Alias no perneten a ninguna cuenta");
				}
			}else{
				throw new Exception("Alias es invalido");
			}
		}
    }
	else{
		Page::showMessage(3, "No hay usuarios disponibles", "Primer_usu_view.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/account/login_view.php")
?>