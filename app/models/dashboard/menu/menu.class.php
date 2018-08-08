<?php
class menu extends Validator{
	//Declaración de propiedades
	
	//Metodos para el manejo del CRUD
	public function getventas(){
		$sql = "SELECT l.nombre_libro, l.precio_libro, c.codigoUsa_cuenta, v.codigoNum_venta, u.nickname from libros l, cuentas c, ventas v, usuarios u WHERE l.id_libro= v.codigoLib_venta AND c.id_cuenta= v.codigoCun_venta AND v.cod_usu=u.id_usuario";
		$params = array(null);
		return Database::getRows($sql, $params);
  }
 
  public function searchventas($value){
	$sql = "SELECT l.nombre_libro, l.precio_libro, c.codigoUsa_cuenta, v.codigoNum_venta, u.nickname from libros l, cuentas c, ventas v, usuarios u WHERE l.id_libro= v.codigoLib_venta AND c.id_cuenta= v.codigoCun_venta AND v.cod_usu=u.id_usuario AND nickname LIKE ?";
	$params = array("%$value%");
	return Database::getRows($sql, $params);
}
	
}
?>