<?php
require_once("../../app/models/dashboard/solicitudes/solicitudes.class.php");
try{
      //cantidad de registros por pági7a
	$por_pagina=3;
	if (isset($_GET["pagina"])) {
	$pagina = $_GET["pagina"];
	}
	else {
	$pagina=1;
	}
	// la pagina inicia en 0 y se multiplica $por_pagina
    $empieza = ($pagina-1) * $por_pagina;
    
    $object = new mtsSolicitudes;    
    $resenapen = $object->getresenasPen();
    if($resenapen){
        if(isset($_POST['btn_acepts'])){
            if($object->setid_resena($_POST['idacep'])){     
                $modificado= $object->updateresenasyes();
                if($modificado){
                    Page::showMessage(1, "El comentario fue publicado", "solicitudes.php?pagina=1");
                }
                else{
                    Page::showMessage(2, "No se modifico", null);
                }
            }
            else{
                Page::showMessage(3, "Error al cargar el id", null);
            }
        }
        if(isset($_POST['btn_recha'])){
            if($object->setid_resena($_POST['idrecha'])){     
                $modificado= $object->updateresenasno();
                if($modificado){
                    Page::showMessage(1, "El comentario fue rechazado", "solicitudes.php?pagina=1");
                }
                else{
                    Page::showMessage(2, "No se modifico", null);
                }
            }
            else{
                Page::showMessage(3, "Error al cargar el id", null);
            }
        }
    }
    else{
        Page::showMessage(3, "No hay elementos pendientes", null);
    }
    $resenarech = $object->getresenasrech();
    if($resenarech){
        if(isset($_POST['btn_resta'])){
            if($object->setid_resena($_POST['idresta'])){     
                $modificado= $object->updateresenasmaybe();
                if($modificado){
                    Page::showMessage(1, "El comentario fue restaurado", "solicitudes.php?pagina=1");
                }
                else{
                    Page::showMessage(2, "No se restauro", null);
                }
            }
            else{
                Page::showMessage(3, "Error al cargar el id", null);
            }
        }
        if(isset($_POST['btn_elim'])){
            if($object->setid_resena($_POST['idelim'])){     
                $eliminado= $object->deleteres();
                if($eliminado){
                    Page::showMessage(1, "El comentario fue eliminado", "solicitudes.php?pagina=1");
                }
                else{
                    Page::showMessage(2, "No se elimino", null);
                }
            }
            else{
                Page::showMessage(3, "Error al cargar el id", null);
            }
        }
    }
    else{
        Page::showMessage(3, "No hay elementos en rechazados", null);
        
    }
    if(isset($_POST['buscar'])){     
        $_POST = $object->validateForm($_POST);       
        $resenapen = $object->searchaupen($_POST['busqueda']);
        if($resenapen){
            $rows = count($resenapen);
            Page::showMessage(4, "Se encontraron $rows resuldatos", null);
        }else{
            Page::showMessage(4, "No se encontraron resultados", null);
            $resenapen = $object->registros_table($empieza, $por_pagina);
        }
    }else{
        $resenapen = $object->registros_table($empieza, $por_pagina);
    }
  
      
    if(isset($_POST['buscarrech'])){     
        $_POST = $object->validateForm($_POST);       
        $resenarech = $object->searchrecha($_POST['busquedarech']);
        if($resenarech){
            $rows = count($resenarech);
            Page::showMessage(4, "Se encontraron $rows resuldatos", null);
        }else{
            Page::showMessage(4, "No se encontraron resultados", null);
            $resenarech = $object->getresenasrech();
        }
    }else{
        $resenarech = $object->getresenasrech();
    }
    if($resenarech){
        require_once("../../app/views/dashboard/solicitudes/solicitudes_view.php");
    }   
        
    else{
        Page::showMessage(3, "No hay elementos", null);
       
    }
    
}
catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}

?>