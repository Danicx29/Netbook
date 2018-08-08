<?php
require_once("../../app/views/public/page/panel.class.php");
Page::templateHeader3("Login");
require_once("../../app/controllers/public/sesion/login_controller.php");
Page::templateFooter();
?>