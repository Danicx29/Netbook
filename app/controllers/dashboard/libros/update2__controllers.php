<?php
require_once("../../app/models/dashboard/libros/libros.class.php");
try{
    if(isset($_GET['id'])){
        $object = new libros;
        if($object->setid_libro($_GET['id'])){
            if($object->readLibro()){
                
            }else{
                Page::showMessage(2, "Libro incorrecto", "index.php");
            }
        }else{
            Page::showMessage(2, "Libro incorrecto", "index.php");
        }        
    }else{
        Page::showMessage(3, "Seleccione un libro", "index.php");
    }
}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../app/views/dashboard/templates/autoryeditorial_view.php");

?>