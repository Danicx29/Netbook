<?php
require_once("../../app/views/public/page/panel.class.php");
Page::templateHeader("Cerrar sesión");
require_once("../../app/controllers/public/sesion/logout_con_tiempo_controller.php");
Page::templateFooter();
?>