<?php
require_once("../../app/models/dashboard/usuarios/usuarios.class.php");
try{
    if(isset($_SESSION['id_usuario_dashboard'])){
    $object = new mtsUsuario;    
    if($object->setId_usuario($_SESSION['id_usuario_dashboard'])){        
        if($object->readUsuario()){
            if(isset($_POST['modifusupass'])){       
                if($_POST['contra1']==$_POST['contra2']){
                    if($object->setClave_usuario($_POST['contra1'])){
                        if($object->checkPassword()){
                            if($_POST['contra3']==$_POST['contra4']){
                                if($_POST['contra1']!=$_POST['contra3']){
                                    $alias=$object->getNickname();
                                    if($alias!=$_POST['contra3']){
                                        if($object->setClave_usuario($_POST['contra3'])){   
                                                        $modificarpassusu= $object->updatePassword();
                                                        if($modificarpassusu){
                                                            Page::showMessage(1, "El registro se modifico correctamente","../menu/menu.php" );
                                                        }
                                                        else{
                                                            Page::showMessage(2, "No se modifico", null);
                                                        }
                                        }
                                        else{
                                            throw new Exception("La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.");                                        
                                            }
                                    }
                                    else{
                                        throw new Exception("Error la contraseña tiene que ser diferente al nickname");  
                                    }   
                                }
                                else{
                                    throw new Exception("La nueva contraseña debe de ser diferente a la actual");
                                }                               
                            }
                            else{
                                throw new Exception("Las contraseñas nuevas son diferentes");         
                            }  

                        }else{
                            throw new Exception("Clave actual incorrecta");
                        } 
                    }else{
                        throw new Exception("La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula, al menos una mayúscula y al menos un caracter no alfanumérico.");
                    }                                                                      
                }
                else{
                    throw new Exception("Las contraseñas actuales son diferentes");         
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
    Page::showMessage(2, "Seleccione un usuario", "index.php");

}
}
else{
    Page::showMessage(2, "Error al cargar el usuario", "../menu/menu.php");
}
}
catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/account/update_passusuLoginview.php");
?>
