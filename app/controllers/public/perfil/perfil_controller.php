<?php
require_once("../../app/models/public/perfil/perfil.class.php");
try{
    $object = new mi_perfil;
    if($object->setId_usuario($_SESSION['id_usuario_public'])){
        $obtener_info = $object->getUsuario();
        if($obtener_info){
            $Pago = $object->getPagos();
            if($Pago){             
            }   
        }

    }else{
        throw new Exception("Error al iniciar");
    }
    if(isset($_POST['update'])){
        $_POST = $object->validateForm($_POST);
        if($object->setNombres($_POST['nombre'])){
            if($object->setApellidos_usuario($_POST['apellido'])){
                if($object->setCorreo_usuario($_POST['email'])){
                    if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
                        if($object->setImagen($_FILES['archivo'])){
                            $modificarusu= $object->updateUsuario();
                            if($modificarusu){
                                Page::showMessage(1, "El registro se modifico correctamente","" );
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
                }else{
                        Page::showMessage(3, "Su correo es invalido", null);
                }
            }else{
                    Page::showMessage(3, "Su apellido es invalido", null);
            }
        }else{
                Page::showMessage(3, "Su nombre es invalido", null);
        }
    }
    if(isset($_POST['delete_pago'])){
        if($object->borrarPago($_POST['id_pago'])){
                Page::showMessage(1, "Su tarjeta fue eliminada corectamente", null);
        }else{
                Page::showMessage(3, "Error al eliminar su tarjeta", null);
        }
    }
    if(isset($_POST['actualizar_usuario'])){ 
        if($object->setId_usuario($_SESSION['id_usuario_public'])){            
            if($object->setNombres($_POST['nombre'])){
                if($object->setApellidos_usuario($_POST['apellido'])){
                    if($object->setCorreo_usuario($_POST['email'])){         
                            if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
                                if($object->setImagen($_FILES['archivo'])){
                                    $updateUsuario= $object->updateUsuario();
                                    if($updateUsuario){
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
            Page::showMessage(2, "Seleccione un usuario", "usuarios.php");
        }
    }
    if(isset($_POST['actualizar_clave'])){ 
        if($_POST['contra'] == $_SESSION['nickname_public'] ){  
            if($object->setId_usuario($_SESSION['id_usuario_public'])){ 
                if($_POST['clave1'] == $_POST['clave2']){            
                    if($object->setClave_usuario($_POST['clave1'])){
                        $clave= $object->updateClave();
                        if($clave){
                            Page::showMessage(1, "El registro se modifico correctamente","" );
                        }
                        else{
                            Page::showMessage(2, "No se inserto", null);
                        }
                    }	
                }
                else{
                    Page::showMessage(2, "La claves no coinciden", null);
                }
            }
        }
        else{
            Page::showMessage(2, "Error la clave no puede ser nombre de usuario", null);
        }
    }
    if(isset($_POST['insertar_pago'])){ 
        if($object->setId_usuario($_SESSION['id_usuario_public'])){      
            if($object->setNtarjeta($_POST['Ncard'])){
                if($object->setFecha($_POST['fecha'])){    
                 if($object->setCvc($_POST['cvc'])){
                        $pago= $object->InsertPago();
                        if($pago){
                            Page::showMessage(1, "El registro se modifico correctamente","" );
                        }
                        else{
                            Page::showMessage(2, "No se inserto", null);
                        }
                    }	
                }else{
                    Page::showMessage(2, "No se inserto", null);
                }
            }
        }
    }
    
    require_once("../../app/views/public/perfil/perfil_view.php");
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
?>