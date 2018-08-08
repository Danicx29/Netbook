<?php
require_once("../../app/models/dashboard/categorias/categorias.class.php");
try{
    $object = new categorias;    
    $categoriass = $object->getCategorias();
    $grafico = $object->getgraficocat();    
    if($categoriass){
        if(isset($_POST['btn_insert'])){
            $_POST=$object->validateForm($_POST);
            if($object->setnombre_gen($_POST['nom_categ'])){                
                if($object->setdescrip_gen($_POST['descrip_categ'])){
                    $insertado= $object->createCategoria();
                    if($insertado){
                        Page::showMessage(1, "El registro se ingreso correctamente", "categorias.php");
                    }
                    else{
                        Page::showMessage(2, "No se inserto", null);
                    }
                }
                else{
                    Page::showMessage(2, "Error al insertar descripcion", null);
                }              
            }
            else{
                Page::showMessage(2, "Error al insertar nombre de la categoria", null);
            }
        }
        if(isset($_POST['btn_update'])){
            $_POST=$object->validateForm($_POST);
            if($object->setnombre_gen($_POST['nom_categup'])){
                if($object->setdescrip_gen($_POST['descrip_categup'])){
                    if($object->setid_genero($_POST['idcat'])){
                        $modificado=$object->updateCategorias();
                        if($modificado){
                            Page::showMessage(1, "El registro se modifico correctamente", "categorias.php");
                        }
                        else{
                            Page::showMessage(2, "No se modifico", null);
                        }
                    }
                    else{
                        Page::showMessage(2, "no se carga el id", null);
                    }
                }
                else{
                    Page::showMessage(2, "Error al modificar descripcion", null);
                }      
        }
        else{
            Page::showMessage(2, "Error al modificar nombre de la categoria", null);
        }
        }
        if(isset($_POST['btn_eliminar'])){
            if($object->setid_genero($_POST['idcatdel'])){
                $eliminado=$object->deleteCategoria();
                if($eliminado){
                    Page::showMessage(1, "El registro se elimino correctamente", "categorias.php");
                }
                else{
                    Page::showMessage(2, "No se elimino", null);
                }
            }
            else{
                Page::showMessage(2, "no se carga el id", null);
            }
        }
        
        if(isset($_POST['buscar'])){     
            $_POST = $object->validateForm($_POST);       
            $categoriass = $object->searchcategoria($_POST['busqueda']);
            if($categoriass){
                $rows = count($categoriass);
                Page::showMessage(4, "Se encontraron $rows resuldatos", null);
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $categoriass = $object->getCategorias();
            }
        }else{
            $categoriass = $object->getCategorias();
        }
        if($categoriass ){
            require_once("../../app/views/dashboard/categorias/categorias_view.php");
        }
    }
    else{
        Page::showMessage(3, "No hay elementos", null);
    }
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}

?>