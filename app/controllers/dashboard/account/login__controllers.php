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
							date_default_timezone_set('America/El_Salvador');
							$diaOpcion = date("Y-m-d");
							#echo $diaOpcion."<br>";
							$date1 = new DateTime($diaOpcion);
							$date2 = new DateTime($object->getFechaContra());
							if($date1>=$date2){
								$diff = $date1->diff($date2);
								// will output 2 days
								$diferenciaDias= $diff->days;
								if($diferenciaDias>=90){
									# necesita cambiar la contraseña
									Page::showMessage(3, "Por razones de seguridad usted tiene que cambiar su contraseña (cada 90 dias)", "changuePass.php");
								}
								else{
									if($diferenciaDias>=85 && $diferenciaDias<90){
										$diasRestantes=90 - $diferenciaDias;        
									#	redireccionar al menu normalmente pero tiene que cambiar su contraseña en: ".$diasRestantes." dias
										Page::showMessage(1, "Inicio de sesion correcto (Por razones de seguridad usted tiene que cambiar su contraseña en ".$diasRestantes." dias)", "../menu/menu.php");
									}
									else{
										#redireccionar al menu normalmente
										Page::showMessage(1, "Inicio de sesion correcto", "../menu/menu.php");
									}
								}
							}else
							{
								throw new Exception("Cambio de contraseño forzada o erroneo (fecha de ultimo cambio de contraseña en futuro)");								
							}							
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