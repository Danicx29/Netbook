<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Bienvenido");
require_once("../../app/controllers/dashboard/inicio/master__controllers.php");
Page::templateFooter();
?>