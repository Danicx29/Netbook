<?php
require_once("../../app/models/dashboard/usuarios/usuarios.class.php");
try{
    $object = new mtsUsuario;
    require_once("../../app/views/public/sesion/registrarse_view.php");
    if(isset($_POST['btncrearusu'])){        
    if($object->setNombres($_POST['regnom'])){
        if($object->setApellidos_usuario($_POST['regapell'])){
            if($object->setCorreo_usuario($_POST['email'])){
                if($object->setNickname($_POST['nickname'])){  
                        if($object->setClave_usuario($_POST['contra'])){                              
                            $inserusu= $object->createUsuPublic();
                                    if($inserusu){
                                        if($object->setnumeroTarj_cuenta($_POST['credicard'])){
                                            if($object->setfechaVen_cuenta($_POST['celular'])){
                                                if($object->setcvc_cuenta($_POST['cvc'])){
                                                    $insertall= $object->createformapago();
                                                    if($insertall){
                                                        Page::showMessage(1, "El registro se ingreso correctamente","login.php" );
                                                    }
                                                    else{
                                                        Page::showMessage(2, "No se inserto esto xdxdxd", null);
                                                    }
                                                }
                                                else{
                                                    Page::showMessage(2, "Error al ingresar cvc cuenta", null);
                                                }
                                            }
                                            else{
                                                Page::showMessage(2, "Error al ingresar fecha vencimiento", null);
                                            }
                                        }
                                        else{
                                            Page::showMessage(2, "Error al ingresar numero de tarjeta", null);
                                        }
                                    }
                                    else{
                                        Page::showMessage(2, "Error al registrar datos de usuario", null);
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