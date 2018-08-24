<?php
require_once("../../app/models/public/sesion/sesion.class.php");
require_once("../../app/helpers/correos/envioCorreo.php");

try{
	$object = new loginp;
	if($object->getUsuarios()){
        if(isset($_POST['iniciar'])){
			$_POST = $object->validateForm($_POST);
			if($object->setCorreo_usuario($_POST['email'])){
				if($object->checkCorreo_usuario()){
                                        $mensaje="";
                                        $email = new email("Netbook","netbook.enterprise@gmail.com","29175229");
                                        //$email->agregar($_POST["danicxjk@gmail.com"],$_POST["Daniel"]);
                                        $email->agregar($_POST['email'],"Usuario Netbook");
                                        $contenido_html =  "<div>
                                        <p style='color:#FFFF'>
                                        Para recuperar su contraseña en ingrese a la sigiente direccion
                                        </p>
                                        <p> http://localhost/Netbook/public/sesion/cambio_clave.php?id="$_POST['email']"</p>
                                         </div>";
                                        if ($email->enviar('Recuperacion de contraseña',$contenido_html)){
                                                Page::showMessage(1, "Se envio un correo para restaurar su contraseña", "");
                                                                        
                                        }else{
                                                Page::showMessage(3, "Ocurrio un error al enviar el correo de restauracion de contraseña", "");
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
require_once("../../app/views/public/sesion/recuperar_view.php");
?>