<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::login_header();
require_once("../../app/controllers/dashboard/account/logout_controller.php");
Page::login_footer();
?>