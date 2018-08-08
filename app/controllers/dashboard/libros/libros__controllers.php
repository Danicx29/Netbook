
<?php
require_once("../../app/models/dashboard/libros/libros.class.php");

try{  
      //cantidad de registros por pági7a
	$por_pagina=7;
	if (isset($_GET["pagina"])) {
	$pagina = $_GET["pagina"];
	}
	else {
	$pagina=1;
	}
	// la pagina inicia en 0 y se multiplica $por_pagina
    $empieza = ($pagina-1) * $por_pagina;
    
    //se crea el modelo
    $object = new libros;    
    if($object){
        if(isset($_POST['btn_eliminarlib'])){
            if($object->setid_libro($_POST['idlibdel'])){
                $eliminadolib=$object->deleteLibros();
                if($eliminadolib){
                    Page::showMessage(1, "El registro se elimino correctamente", "libros.php?pagina=1");
                }
                else{
                    Page::showMessage(3, "No se puede eliminar seguramente este libro se usa en otra pagina", null);
                }
            }
            else{
                Page::showMessage(2, "no se carga el id", null);
            }
        }
        if(isset($_POST['buscar'])){     
            $_POST = $object->validateForm($_POST);       
            $libros = $object->searchLibro($_POST['busqueda']);
            if($libros){
                $rows = count($libros);
                Page::showMessage(4, "Se encontraron $rows resuldatos", null);
            $grafico = $object->getestadisticas();
            $ganancias = $object->getganancias();
                
            }else{
                Page::showMessage(4, "No se encontraron resultados", null);
                $libros = $object->registros_table($empieza, $por_pagina);
                $grafico = $object->getestadisticas(); 
                $ganancias = $object->getganancias();               
            }
        }else{
            $libros = $object->registros_table($empieza, $por_pagina);
            $grafico = $object->getestadisticas();
            $ganancias = $object->getganancias();
        }
        if($libros){
            require_once("../../app/views/dashboard/libros/libros_view.php");
        }
    }else{
        Page::showMessage(3, "No hay libros", null);
    }
    
}
catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
?>