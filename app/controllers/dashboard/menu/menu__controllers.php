<?php
require_once("../../app/models/dashboard/menu/menu.class.php");

try{
    $object = new menu;    
    $ventax = $object->getventas();
    
    if($ventax){
        if(isset($_POST['buscar'])){     
            $_POST = $object->validateForm($_POST);       
            $ventax = $object->searchventas($_POST['busqueda']);
            if($ventax){
                $rows = count($ventax);
                Page::showMessage(4, "Se encontraron $rows resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $ventax = $object->getventas();
            }
        }else{
            $ventax = $object->getventas();
        }
        if($ventax){
            require_once("../../app/views/dashboard/menu/menu_view.php");
        }
    }
    else{
        require_once("../../app/views/dashboard/menu/menu_view.php");
    }
    
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
?>