<?php
require_once("../../app/models/dashboard/usuarios/usuarios.class.php");
try{
    $object = new mtsUsuario;    
    if(isset($_GET['id'])){
        if($object->setid_tipousu($_GET['id'])){
            if($object->CargarPermisos()){
                    //valido si se presiona el boton de crar
                if(isset($_POST['crearPermiso'])){        
                    //valido formulario
                    $_POST = $object->validateForm($_POST);
                    //compruebo si se ingreso nombre
                    if($object->setnombre_tipoUsu($_POST['nombre'])){
                        //le doy valor a checkbox libro
                        if(isset($_POST['permLibros'])){ 
                            $object->setpermiso_libros(2);
                        }else{
                            $object->setpermiso_libros(1);
                        }
                        //le doy valor a checkbox autor y editorial            
                        if(isset($_POST['permAutYEdit'])){ 
                            $object->setpermiso_autoyedit(2);
                        } else{
                            $object->setpermiso_autoyedit(1);
                        }
                        //le doy valor a checkbox categoria            
                        if(isset($_POST['permCategoria'])){ 
                            $object->setpermiso_categorias(2);
                        } else{
                            $object->setpermiso_categorias(1);
                        }
                        //le doy valor a checkbox usuarios            
                        if(isset($_POST['permUsuario'])){ 
                            $object->setpermiso_usuarios(2);
                        } else{
                            $object->setpermiso_usuarios(1);
                        }    
                        //le doy valor a checkbox solicitudes            
                        if(isset($_POST['permSolicitudes'])){ 
                            $object->setpermiso_solicitudes(2);
                        } else{
                            $object->setpermiso_solicitudes(1);
                        }
                        //le doy valor a checkbox ventas            
                        if(isset($_POST['permVentas'])){ 
                            $object->setpermiso_ventas(2);
                        } else{
                            $object->setpermiso_ventas(1);
                        }
                        //mando a llamar los metodos para guardar    
                        if($object->updateTipoUsurio()){
                            Page::showMessage(1, "Tipo de usuario modificado", "Tipo_usuarios.php?pagina=1");
                        }else{
                            throw new Exception("Error al modificado los permisos");                                            
                        }  
                    }   
                    else{
                        throw new Exception("Nombre incorrecto");
                    } 
                }
                else{

                }
            }
        }    
        else{
            throw new Exception("Error al cargar datos");
            
        }
    }
    else{
        Page::showMessage(2, "Error al cargar id", "usuarios.php");
    }
}
catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/usuarios/updateTipoUsu_view.php");
?>
