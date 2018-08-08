<?php
require_once("../../app/models/dashboard/categorias/categorias.class.php");
try{
	$categoria = new categorias;
    $categoriass = $categoria->getCategorias();
    if($categoriass){
        require_once("../../app/views/dashboard/categorias/categorias_view.php");
    }
    else{
        Page::showMessage(2,"No hay categorias ingresadas", null);
    }
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), "../account/");
}

?>