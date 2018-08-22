<?php
require_once("../../app/models/dashboard/usuarios/usuarios.class.php");
require_once("../../app/models/dashboard/login/login.class.php");

try{
    $object = new mtsUsuario;
    $loginobject = new login;
    if($loginobject->getUsuarios()){
		Page::showMessage(3, "Ya hay usuarios creados", "index.php");
    }
	else{
    require_once("../../app/views/dashboard/account/Primer_usu_view.php");
        if(isset($_POST['crearlibro'])){        
            if($object->setNombres($_POST['nombre'])){
                if($object->setApellidos_usuario($_POST['apellido'])){
                    if($object->setCorreo_usuario($_POST['email'])){
                        if($object->setNickname($_POST['nickname'])){  
                            if($_POST['contra1']==$_POST['contra2']){
                                if($_POST['nickname']!=$_POST['contra1']){
                                    if($object->setClave_usuario($_POST['contra1'])){                           
                                        if($object->setcodtipouso($_POST['tipo_usu'])){
                                            Page::showMessage(3, "aqui deberia de guardar", null);
                                            if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
                                                if($object->setImagen($_FILES['archivo'])){
                                                    $object->createAdministrador();
                                                    $object->createCliente();                                                
                                                    $insertadolibro= $object->createprimerUsu();
                                                    if($insertadolibro){
                                                        Page::showMessage(1, "El usuario se creo correctamente","index.php" );
                                                    }
                                                    else{
                                                        Page::showMessage(2, "No se inserto", null);
                                                    }
                                                }else{
                                                    throw new Exception($object->getImageError());
                                                }
                                            }else{
                                                $object->createAdministrador();
                                                $object->createCliente();     
                                                $insertadoUsuario= $object->createprimUsuSinImagen();
                                                    if($insertadoUsuario){
                                                        Page::showMessage(1, "El usuario se creo correctamente","index.php" );
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
                                        throw new Exception("La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.");         
                                    }
                                }
                                else{
                                    throw new Exception("Error el nickname tiene que ser diferente de la contraseña");  
                                }                            
                            }
                            else{
                                throw new Exception("Contraseñas son diferentes");         
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
    
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}

?>
