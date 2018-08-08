<?php
require_once("../../app/models/dashboard/login/login.class.php");
$object = new login;
if($object->logOut()){
    Page::showMessage(1, "Autenticación eliminada", "index.php");
}else{
    Page::showMessage(2, "Ocurrió un problema", null);
}
?>