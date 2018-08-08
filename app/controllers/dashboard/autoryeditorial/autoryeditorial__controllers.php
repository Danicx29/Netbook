<?php
require_once("../../app/models/dashboard/autoryeditorial/autoryeditorial.class.php");
try{
    #editoriales
    $object = new autoyedit;    
    $edits = $object->getEditoriales();
    $grafico = $object->getpie();
    $grafico2 = $object->getestedito();
    
    if($edits){
        if(isset($_POST['btn_insertedit'])){
            $_POST=$object->validateForm($_POST);
            if($object->setnombre_editorial($_POST['nom_edit'])){  
                if($object->setdescrip_editorial($_POST['des_edit'])){  
                    $insertado= $object->createEditorial();
                    if($insertado){
                        Page::showMessage(1, "El registro se ingreso correctamente", "autoryeditorial.php");
                    }
                    else{
                        Page::showMessage(2, "No se inserto", null);
                    }
                }
                else{
                    Page::showMessage(2, "Error al ingresar la descripción", null);
                } 
            }
            else{
                Page::showMessage(2, "Error al ingresar el nombre", null);
            } 

        }
        
        if(isset($_POST['btn_updatedit'])){
            $_POST=$object->validateForm($_POST);
            if($object->setnombre_editorial($_POST['nom_editmod'])){  
                if($object->setdescrip_editorial($_POST['des_editmod'])){
                    if($object->setid_editorial($_POST['idedit'])){
                        $modificado= $object->updateEditorial();
                        if($modificado){
                            Page::showMessage(1, "El registro se modifico correctamente", "autoryeditorial.php");
                        }
                        else{
                            Page::showMessage(2, "No se modifico", null);
                        }
                    }
                    else{
                        Page::showMessage(2, "No se cargo el id", null);
                    }
                }
                else{
                    Page::showMessage(2, "Error al modificar la descripción", null);
                }
            }
            else{
            Page::showMessage(2, "Error al modificar el nombre", null);
            }
        }
        
        if(isset($_POST['btn_eliminaredit'])){
            if($object->setid_editorial($_POST['ideditdel'])){
                $eliminado= $object->deleteEditorial();
                if($eliminado){
                    Page::showMessage(1, "El registro se elimino correctamente", "autoryeditorial.php");
                }
                else{
                    Page::showMessage(3, "No se elimino, este registro posiblemente se usa en libros", null);
                }
        }
        else{
            Page::showMessage(2, "No se encontro el id", null);
        }
    }
    if(isset($_POST['buscaredit'])){     
        $_POST = $object->validateForm($_POST);       
        $edits = $object->searcheditorial($_POST['busquedas']);
        if($edits){
            $rows = count($edits);
            Page::showMessage(4, "Se encontraron $rows resuldatos", null);
        }else{
            Page::showMessage(4, "No se encontraron resultados", null);
            $edits = $object->getEditoriales();
            $grafico = $object->getpie();
        }
    }else{
        $edits = $object->getEditoriales();
        $grafico = $object->getpie();
    }
   
}    
else{
    Page::showMessage(3, "No hay elementos", null);
}    
    
    #Libros
    $autores = $object->getAutoress();
    if($autores){
        if(isset($_POST['btn_insertaut'])){
            $_POST=$object->validateForm($_POST);
            if($object->setnombre_autor($_POST['insert_nomau'])){  
                if($object->setsexo_autor($_POST['sexo_insert'])){
                    if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
                        if($object->setImagen($_FILES['archivo'])){
                            $insertadoauto= $object->createAutores();
                            if($insertadoauto){
                                Page::showMessage(1, "El registro se ingreso correctamente","autoryeditorial.php" );
                            }
                            else{
                                Page::showMessage(2, "No se inserto", null);
                            }
                        }else{
                            throw new Exception($categoria->getImageError());
                        }
                    }else{
                        throw new Exception("Seleccione una imagen");
                    }
                }
                else{
                    Page::showMessage(2, "Error al ingresar el sexo", null);
                }
            }
            else{
                Page::showMessage(2, "Error al ingresar el nombre", null);
            } 

        }
    else{

    }

    if(isset($_POST['btn_eliminaraut'])){
        if($object->setid_autor($_POST['ideautodel'])){
            $eliminado= $object->deleteAutores();
            if($eliminado){
                Page::showMessage(1, "El registro se elimino correctamente", "autoryeditorial.php");
            }
            else{
                Page::showMessage(3, "No se elimino, este registro posiblemente se usa en libros", null);
            }
    }
    else{
        Page::showMessage(2, "No se encontro el id", null);
    }
}
if(isset($_POST['btn_updataut'])){
    $_POST=$object->validateForm($_POST);
    if($object->setnombre_autor($_POST['modifauto'])){  
        if($object->setsexo_autor($_POST['sexo_update'])){
            if($object->setid_autor($_POST['ideditaut'])){
                if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
                    if($object->setImagen($_FILES['archivo'])){
                        $modificadoedit= $object->updateAutores();
                        if($modificadoedit){
                            Page::showMessage(1, "El registro se modifico correctamente","autoryeditorial.php" );
                        }
                        else{
                            Page::showMessage(2, "No se inserto", null);
                        }
                    }else{
                        throw new Exception($categoria->getImageError());
                    }
                }else{
                    throw new Exception("Seleccione una imagen");
                }
            }
            else{
                Page::showMessage(2, "Error al ingresar el id", null);
            }
        }
        else{
            Page::showMessage(2, "Error al ingresar el sexo", null);
        }
    }
    else{
        Page::showMessage(2, "Error al ingresar el nombre", null);
    } 
}

    if(isset($_POST['buscar'])){     
        $_POST = $object->validateForm($_POST);       
        $data = $object->searchautores($_POST['busqueda']);
        if($data){
            $rows = count($data);
            Page::showMessage(4, "Se encontraron $rows resuldatos", null);
            $grafico = $object->getpie();
        }else{
            Page::showMessage(4, "No se encontraron resultados", null);
            $data = $object->getAutoress();
            $grafico = $object->getpie();
        }
    }else{
        $data = $object->getAutoress();
        $grafico = $object->getpie();
    }
    if($data){
        require_once("../../app/views/dashboard/autoryeditorial/autoryeditorial_view.php");
    }   
    }    
    else{
        Page::showMessage(3, "No hay elementos", null);
    }    
    

 
}
catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}

?>