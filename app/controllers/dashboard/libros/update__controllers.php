<?php
require_once("../../app/models/dashboard/libros/libros.class.php");
try{
    if(isset($_GET['id'])){
         $object = new libros;
        if($object->setid_libro($_GET['id'])){
            if($object->readLibro()){
                if(isset($_POST['actualizar_libro'])){       
                    if($object->setnombre_libro($_POST['nomlib'])){
                        if($object->setdescrip_libro($_POST['descriplibro'])){                
                            if($object->setnumero_pag($_POST['numpag'])){
                                if($object->setcod_Atr($_POST['select_eutores'])){
                                    if($object->setcod_edt($_POST['select_editoriales'])){
                                        if($object->setcod_gnr($_POST['select_genero'])){
                                            if($object->setvaloracion($_POST['valoracion'])){
                                                if($object->setprecio_libro($_POST['preciolib'])){
                                                    if($object->setlink($_POST['link'])){
                                                    if(is_uploaded_file($_FILES['archivo']['tmp_name'])){
                                                        if($object->setImagen($_FILES['archivo'])){
                                                            $updateLibrosV= $object->updateLibros();
                                                            echo $object->getid_libro();
                                                            if($updateLibrosV){
                                                                Page::showMessage(1, "El registro se actualizado correctamente","libros.php?pagina=1" );
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
                                                    throw new Exception("Error al ingresar el link");
                                                }
                                                }                                                
                                                else{
                                                    Page::showMessage(2, "Error al ingresar precio", null);
                                                }
                                            }
                                            else{
                                                Page::showMessage(2, "Error al ingresar valoracion", null);
                                            }
                                        }
                                        else{
                                            Page::showMessage(2, "Error al ingresar genero", null);
                                        }
                                    }
                                    else{
                                        Page::showMessage(2, "Error al ingresar editoriales", null);
                                    }
                                }
                                else{
                                    Page::showMessage(2, "Error al ingresar autores", null);
                                }
                            }
                            else{
                                Page::showMessage(2, "Error al ingresar numero de pagina", null);
                            }          
                        }
                        else{
                            Page::showMessage(2, "Error al ingresar descripcion", null);
                        }
                    }
                    else{
                        Page::showMessage(2, "Error al ingresar nombre", null);
                    }
                }
            }else{
                Page::showMessage(2, "Libro incorrecto", "index.php");
            }
        }else{
            Page::showMessage(2, "Libro incorrecto", "index.php");
        }        
    }else{
        Page::showMessage(3, "Seleccione un libro", "index.php");
    }

}catch(Exception $error){
    Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/libros/update_view.php");
?>