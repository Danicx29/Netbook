<?php
require_once("../../app/models/dashboard/usuarios/usuarios.class.php");
try{
    if(isset($_SESSION['id_usuario'])){
    $object = new mtsUsuario;    
    if($object->setId_usuario($_SESSION['id_usuario'])){        
        if($object->readUsuario()){
            if(isset($_POST['modifusu'])){       
                if($object->setNombres($_POST['nombre'])){
                    if($object->setApellidos_usuario($_POST['apellido'])){
                        if($object->setCorreo_usuario($_POST['email'])){
                            if($object->setNickname($_POST['nickname'])){                       
                                    if($object->setcodtipouso($_POST['tipo_usu'])){
                                        if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
                                            if($object->setImagen($_FILES['archivo'])){
                                                $modificarusu= $object->updateusu2();
                                                if($modificarusu){
                                                    Page::showMessage(1, "El registro se modifico correctamente","../menu/menu.php" );
                                                }
                                                else{
                                                    Page::showMessage(2, "No se inserto", null);
                                                }
                                            }else{
                                                throw new Exception($object->getImageError());
                                            }
                                        }else{
                                            $modificarusu2= $object->updateusu2sinfoto();
                                            if($modificarusu2){
                                                Page::showMessage(1, "El registro se modifico correctamente","../menu/menu.php" );
                                            }
                                            else{
                                                Page::showMessage(2, "No se inserto", null);
                                            }
                                        }
                                    }
                                    else{
                                            throw new Exception("Error al ingresar el tipo usuario");  
                                    }              
                            }
                           else{
                                throw new Exception("Error al ingresar el nickname de usuario");      
                               }
                        }
                       else{
                            throw new Exception("Error al ingresar el email de usuario");      
                           }
                     }
                    else{
                        throw new Exception("Error al ingresar el apellido de usuario");      
                        }
                    }           
                else{
                    throw new Exception("Error al ingresar el nombre de usuario");      
                }
            }    
            else{
                
            }
        }
        else{
            throw new Exception("No se cargaron los datos");      
            
        }   
}
else{
    Page::showMessage(2, "Seleccione un usuario", "usuarios.php");

}
}
else{
    Page::showMessage(2, "Error al cargar id", "../menu/menu.php");
}
}
catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/account/update_usuview.php");
?>
