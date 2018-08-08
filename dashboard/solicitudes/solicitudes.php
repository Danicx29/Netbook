<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::templateHeader("Solicitudes");
require_once("../../app/controllers/dashboard/solicitudes/solicitudes__controllers.php");
Page::templateFooter();
?>