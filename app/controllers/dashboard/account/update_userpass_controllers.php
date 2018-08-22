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
                                    echo($alias);
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
    Page::showMessage(2, "Seleccione un usuario", "usuarios.php");

}
}
else{
    Page::showMessage(2, "Error al cargar id", "../menu/menu.php");
}
date_default_timezone_set('America/El_Salvador');
$diaOpcion = date("Y-m-d");
echo $diaOpcion."<br>";
$date1 = new DateTime($diaOpcion);
$date2 = new DateTime("2018-11-17");
$diff = $date1->diff($date2);
// will output 2 days
echo $diff->days. ' days ';
$diferenciaDias= $diff->days;
if($diferenciaDias>=90){
    echo "<br> necesita cambiar la contraseña";
}
else{
    if($diferenciaDias>=85 && $diferenciaDias<90){
        $diasRestantes=90 - $diferenciaDias;        
        echo "<br> redireccionar al menu normalmente pero tiene que cambiar su contraseña en: ".$diasRestantes." dias";
    }
    else{
        echo "<br> redireccionar al menu normalmente";
    }
}  



}
catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/account/update_passusuview.php");
?>
