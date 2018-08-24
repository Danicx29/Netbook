<?php
require_once("../../app/models/dashboard/login/login.class.php");
$object = new login;
require_once("../../app/models/public/sesion/sesion.class.php");
$object2 = new loginp;
if(isset($_SESSION['id_usuario_public'])){
    if($object->setId_usuario($_SESSION['id_usuario_public'])){
            if($object->readEstadoSesion()){
            $Id_estado= $object->getestado_sesion();
            if($Id_estado==1){
                $offEstadoSesion=0;
                if($object->setestado_sesion($offEstadoSesion)){
                    $object->updateEstadoSesion();
                    //cierro sesion
                    if($object2->logOut()){
                        Page::showMessage(1, "Autenticación eliminada", "login.php");
                    }else{
                        Page::showMessage(2, "Ocurrió un problema", null);
                    }
                }
            }
            elseif($Id_estado!=1){
                //cierro sesion
                if($object2->logOut()){
                    Page::showMessage(3, "Alguien mas intento iniciar sesion con este mismo usuario, por razones de seguridad se suspendera este usuario", "index.php");
                }else{
                    Page::showMessage(2, "Ocurrió un problema", null);
                }
            }
        }
        else{
            throw new Exception("No se cargaron los datos");    
        } 
    }
    else{
        Page::showMessage(2, "Error al cargar del usuario", "index.php");

    }
}
else{
    Page::showMessage(2, "Error al cargar del usuario", "index.php");
}
?>