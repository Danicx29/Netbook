<?php
require_once("../../app/models/dashboard/usuarios/usuarios.class.php");
try{
      //cantidad de registros por pági7a
	$por_pagina=5;
	if (isset($_GET["pagina"])) {
	$pagina = $_GET["pagina"];
	}
	else {
	$pagina=1;
	}
	// la pagina inicia en 0 y se multiplica $por_pagina
    $empieza = ($pagina-1) * $por_pagina;

    $object = new mtsUsuario; 
    if(isset($_POST['buscar'])){
		$_POST = $object->validateForm($_POST);
		$data = $object->searchTipouarios($_POST['busqueda']);
		if($data){
			$rows = count($data);
			Page::showMessage(4, "Se encontraron $rows resuldatos", null);
		}else{
			Page::showMessage(4, "No se encontraron resultados", null);
			$data = $object->registros_table($empieza, $por_pagina);
		}
	}else{
		$data = $object->registros_table($empieza, $por_pagina);
	}
	if($data){
		require_once("../../app/views/dashboard/usuarios/Tipo_usuarios_view.php");
		if(isset($_POST['btn_eliminar'])){
            if($object->setid_tipousu($_POST['idusudel'])){
                $eliminado=$object->deleteTipoUsu();
                if($eliminado){
                    Page::showMessage(1, "El registro se elimino correctamente", "Tipo_usuarios.php?pagina=1");
                }
                else{
                    Page::showMessage(3, "No se puede eliminar, posiblemente este usuario se esta utilizando en otro registro", null);
                }
            }
            else{
                Page::showMessage(2, "no se carga el id", null);
            }
        }
	}else{
		Page::showMessage(3, "No hay categorías disponibles", "create_tipousu.php");
	}

}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}

?>
