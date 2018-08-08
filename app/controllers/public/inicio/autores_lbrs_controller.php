<?php
/*
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
||                          controlador de autores para libros                   ||   
|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
*/
require_once("../../app/models/public/inicio/inicio.class.php");
try{	
	$inicio = new inicio;
	$id_usuario = $_SESSION['id_usuario'];
	$Autores = $inicio->getAutores();
		if($Autores){
			require_once("../../app/views/public/inicio/autores_lbrs_view.php");
		}else{
			Page::showMessage(3, "No hay Generos disponibles disponibles", null);
		}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}

?>