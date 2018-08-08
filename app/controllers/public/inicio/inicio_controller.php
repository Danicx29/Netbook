<?php
 $lista_tienda = False;
 $lista_pago = False;
require_once("../../app/models/public/inicio/inicio.class.php");
try{	
	$inicio = new inicio;
	$id_usuario = $_SESSION['id_usuario'];
	if(isset($_POST['comentar'])){
		$_POST = $inicio->validateForm($_POST);
		if($inicio->setId_libro($_POST['libro'])){
			if($inicio->setComentario($_POST['comentario'])){
				if($inicio->setId_Usuario($_POST['usuario'])){
					if($inicio->InsertarComentario()){
						Page::showMessage(1, "Comentario ingresado corectamente", "");
					}else{
						Page::showMessage(3, "Error al ingresar el mensaje", "");
					}
				}
			}else{
				Page::showMessage(3, "Su comentario es invalido ", null);
			}
		}
	}
	if(isset($_POST['pagar'])){
		$_POST = $inicio->validateForm($_POST);
		if($inicio->setId_libro($_POST['libro'])){
			if($inicio->setPrecio($_POST['precio'])){
				if($inicio->getPagos($id_usuario)){
					if($inicio->getLastVenta()){
						if($inicio->InsertarVenta($id_usuario )){
							Page::showMessage(1, "Compra realizada corectamente", "");
						}else{
							Page::showMessage(3, "Error al compra el libro", "");
						}
					}
				}
			}
		}
	}
	if(isset($_POST['valorar'])){
		$_POST = $inicio->validateForm($_POST);
		if($inicio->setId_libro($_POST['libro'])){
			if($inicio->ActualizarValoracion($id_usuario , $_POST['valor'] )){
				Page::showMessage(1, "Valoracion realizada corectamente", "");
			}else{
				Page::showMessage(3, "Error al valorar el libro", "");
			}
		}
	}
	$Generos = $inicio->getGenero();
		if($Generos){
			$Libros = $inicio->getLibros();
			if($Libros){
				$Listas = $inicio->getLista($id_usuario);
				if($Listas){
					 $lista_tienda = true;
				}
				$Pago = $inicio->getPagos($id_usuario);
				if($Pago){
					 $lista_pago = true;
				}
				$Comentarios = $inicio->getComentarios();
				require_once("../../app/views/public/inicio/inicio_view.php");
			}else{
				Page::showMessage(3, "No hay libros disponibles", null);
			}
		}else{
			Page::showMessage(3, "No hay Generos disponibles disponibles", null);
		}

	
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}

?>