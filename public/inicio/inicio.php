<?php
/*
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
||                          Pagina de inicio contiene los libroa                 ||   
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
*/
require_once("../../app/views/public/page/panel.class.php");
Page::templateHeader("Inicio");
require_once("../../app/controllers/public/inicio/inicio_controller.php");
?>