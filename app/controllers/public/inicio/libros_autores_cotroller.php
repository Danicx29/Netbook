<?php
require_once("../../app/models/public/inicio/inicio.class.php");
try{	
	if(isset($_GET['id'])){
		$object = new inicio;    
		$libros = $object->getAutoresporGenero($_GET['id']);
		if($libros){
			require_once("../../app/views/public/inicio/libros_autores_view.php");
		}else{
			Page::showMessage(3, "No hay libros de este genero disponibles disponibles", "");
		}
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}

?>