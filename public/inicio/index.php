<?php
/*
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
||                          Pagina de principal del sitio publico                ||   
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
*/
require_once("../../app/views/public/page/panel.class.php");
Page::templateHeader2("Inicio");
require_once("../../app/controllers/public/inicio/index_controller.php");
Page::templateFooter2();
?>