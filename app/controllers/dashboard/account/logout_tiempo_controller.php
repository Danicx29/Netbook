<?php
require_once("../../app/models/dashboard/login/login.class.php");
$object = new login;
if(isset($_SESSION['id_usuario_dashboard'])){
    if($object->setId_usuario($_SESSION['id_usuario_dashboard'])){
            if($object->readEstadoSesion()){
            $Id_estado= $object->getestado_sesion();
            if($Id_estado==1){
                $offEstadoSesion=0;
                if($object->setestado_sesion($offEstadoSesion)){
                    $object->updateEstadoSesion();
                    //cierro sesion
                    if($object->logOut()){
                    Page::showMessage(3, "Timpo limite de inactivadad excedido (5 minutos)", "index.php");
                    }else{
                        Page::showMessage(2, "Ocurrió un problema", null);
                    }
                }
            }
            elseif($Id_estado!=1){
                //cierro sesion
                if($object->logOut()){
                    Page::showMessage(3, "Timpo limite de inactivadad excedido (5 minutos)", "index.php");
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
