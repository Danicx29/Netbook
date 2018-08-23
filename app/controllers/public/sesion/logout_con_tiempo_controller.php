<?php
require_once("../../app/models/public/sesion/sesion.class.php");
$object = new login;
if($object->logOut()){
    Page::showMessage(5, "Timpo limite de inactivadad excedido (5 minutos)", "../sesion/login.php");
}else{
    Page::showMessage(2, "Ocurrió un problema", "../inicio/index.php");
}
?>