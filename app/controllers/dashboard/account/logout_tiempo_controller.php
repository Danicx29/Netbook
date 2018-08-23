<?php
require_once("../../app/models/dashboard/login/login.class.php");
$object = new login;
if($object->logOut()){
    Page::showMessage(3, "Timpo limite de inactivadad excedido (5 minutos)", "index.php");
}else{
    Page::showMessage(2, "Ocurrió un problema", null);
}
?>