<?php
require_once("../../app/models/dashboard/usuarios/usuarios.class.php");
try{
    $object = new mtsUsuario;
    require_once("../../app/views/dashboard/usuarios/create_view.php");
    if(isset($_POST['crearlibro'])){        
        if($object->setNombres($_POST['nombre'])){
            if($object->setApellidos_usuario($_POST['apellido'])){
                if($object->setCorreo_usuario($_POST['email'])){
                    if($object->setNickname($_POST['nickname'])){  
                            if($object->setClave_usuario($_POST['contra1'])){                           
                                if($object->setcodtipouso($_POST['tipo_usu'])){
                                    Page::showMessage(3, "aqui deberia de guardar", null);
                                    if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
                                        if($object->setImagen($_FILES['archivo'])){
                                            $insertadolibro= $object->createUsu();
                                            if($insertadolibro){
                                                Page::showMessage(1, "El registro se ingreso correctamente","usuarios.php" );
                                            }
                                            else{
                                                Page::showMessage(2, "No se inserto", null);
                                            }
                                        }else{
                                            throw new Exception($object->getImageError());
                                        }
                                    }else{
                                        throw new Exception("Seleccione una imagen");
                                    }
                                }
                                else{
                                    Page::showMessage(2, "Error al ingresar el tipo usuario", null);
                                }
                            }
                            else{
                                Page::showMessage(2, "Error al ingresar clave", null);
                            }
                        
                    }
                   else{
                       Page::showMessage(2, "Error al ingresar el nickname de usuario", null);
                       }
                }
               else{
                   Page::showMessage(2, "Error al ingresar el email de usuario", null);
                   }
             }
            else{
                Page::showMessage(2, "Error al ingresar el apellido de usuario", null);
                }
            }           
        else{
            Page::showMessage(2, "Error al ingresar el nombre de usuario", null);
        }
        }    
    else{

    }
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}

?>
