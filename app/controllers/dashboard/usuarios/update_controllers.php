<?php
require_once("../../app/models/dashboard/usuarios/usuarios.class.php");
try{
    if(isset($_GET['id'])){
    $object = new mtsUsuario;    
    if($object->setId_usuario($_GET['id'])){        
        if($object->readUsuario()){
            if(isset($_POST['modifusu'])){       
                if($object->setNombres($_POST['nombre'])){
                    if($object->setApellidos_usuario($_POST['apellido'])){
                        if($object->setCorreo_usuario($_POST['email'])){
                            if($object->setNickname($_POST['nickname'])){                          
                                        if($object->setcodtipouso($_POST['tipo_usu'])){
                                            if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
                                                if($object->setImagen($_FILES['archivo'])){
                                                    $modificarusu= $object->updateusu();
                                                    if($modificarusu){
                                                        Page::showMessage(1, "El registro se modifico correctamente","usuarios.php" );
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
        }
        else{
            Page::showMessage(2, "no se cargaron los datos", null);
        }   
}
else{
    Page::showMessage(2, "Seleccione un usuario", "usuarios.php");

}
}
else{
    Page::showMessage(2, "Error al cargar id", "usuarios.php");
}
}
catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/usuarios/update_view.php");
?>
