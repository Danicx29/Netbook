<?php
require_once("../../app/views/dashboard/templates/page.class.php");
Page::login_header();
require_once("../../app/controllers/dashboard/account/login__controllers.php");
Page::login_footer();
?>