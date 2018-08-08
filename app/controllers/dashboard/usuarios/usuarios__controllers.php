<?php
require_once("../../app/models/dashboard/usuarios/usuarios.class.php");
try{
    $object = new mtsUsuario;
    $id_usuario = $_SESSION['id_usuario'];
    $Listas = $object->getUsuarios3($id_usuario);
    if($Listas){        
        if(isset($_POST['btn_eliminar'])){
            if($object->setId_usuario($_POST['idusudel'])){
                $eliminado=$object->deleteusu();
                if($eliminado){
                    Page::showMessage(1, "El registro se elimino correctamente", "usuarios.php");
                }
                else{
                    Page::showMessage(3, "No se puede eliminar, posiblemente este usuario se esta utilizando en otro registro", null);
                }
            }
            else{
                Page::showMessage(2, "no se carga el id", null);
            }
        }
    if(isset($_POST['buscar'])){     
        $_POST = $object->validateForm($_POST);       
        $Listas = $object->searchusuario($_POST['busqueda']);
        if($Listas){
            $rows = count($Listas);
            Page::showMessage(4, "Se encontraron $rows resuldatos", null);
        }else{
            Page::showMessage(4, "No se encontraron resultados", null);
            $Listas = $object->getUsuarios2();
        }
    }
     if($Listas){
        require_once("../../app/views/dashboard/usuarios/usuarios_view.php");
     }  
}else{
    Page::showMessage(3, "No lista de compras disponibles", null);
   
}

}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}

?>
