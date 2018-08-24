<?php
require_once("../../app/models/public/sesion/sesion.class.php");
require_once("../../app/models/dashboard/login/login.class.php");
try{
	$object = new loginp;
	$clase2 = new login;
	if($object->getUsuarios()){
        if(isset($_POST['iniciar'])){
			$_POST = $clase2->validateForm($_POST);
			if($clase2->setCorreo_usuario($_POST['email'])){
					if($clase2->checkCorreo_usuario()){

						$traerFecha= $clase2->gettiempo_intentos();
						$traerFechaAct = date("Y-m-d H:i:s");
						$d1 = new DateTime($traerFecha);
						$d2 = new DateTime($traerFechaAct);
						if($d1<=$d2){
							$numero_intentosnew=$clase2->getnumb_ingresos();
							if($numero_intentosnew==3){
								$numeroNewIntentos=0;
								if($clase2->setnumb_ingresos($numeroNewIntentos)){
									$clase2->updateNumeroIntentos();								
								}
							}
							if($clase2->setClave_usuario($_POST['password'])){
								if($clase2->checkClave_usuario()){
									$_SESSION['id_usuario_public'] = $clase2->getId_usuario();
									$_SESSION['nickname_public'] = $clase2->getNombres();
									$_SESSION['foto_usuario_public'] = $clase2->getImagen();
								
									$diaOpcion = date("Y-m-d");
									#echo $diaOpcion."<br>";
									$date1 = new DateTime($diaOpcion);
									$date2 = new DateTime($clase2->getFechaContra());
									if($date1>=$date2){
										$diff = $date1->diff($date2);
										// will output 2 days
										$diferenciaDias= $diff->days;
										if($diferenciaDias>=90){
											# necesita cambiar la contraseña
											Page::showMessage(3, "Por razones de seguridad usted tiene que cambiar su contraseña (cada 90 dias)", "changuePass.php");
										}
										else{
											if($diferenciaDias>=85 && $diferenciaDias<90){
												$numeroSuccesIntentos=0;
												if($clase2->setnumb_ingresos($numeroSuccesIntentos)){
													$modificarNum= $clase2->updateNumeroIntentos();
													if($modificarNum){
														$Id_estado= $clase2->getestado_sesion();
														if($Id_estado==0){
															$sumaEstadoSesion=$Id_estado+1;
															if($clase2->setestado_sesion($sumaEstadoSesion)){
																$clase2->updateEstadoSesion();
																#	redireccionar al menu normalmente pero tiene que cambiar su contraseña en: ".$diasRestantes." dias
																$diasRestantes=90 - $diferenciaDias;
																Page::showMessage(1, "Inicio de sesion correcto (Por razones de seguridad usted tiene que cambiar su contraseña en ".$diasRestantes." dias)", "../inicio/inicio.php");						
															}
														}
														else if($Id_estado==1){
															$sumaEstadoSesion=$Id_estado+1;
															if($clase2->setestado_sesion($sumaEstadoSesion)){
															$clase2->updateEstadoSesion();
															#redireccionar al menu normalmente
															throw new Exception("Error la sesion de este usuario ya estaba activo, por razón de seguridad esta cuenta se suspendera");						
															}
														}
														else if($Id_estado==2){
															throw new Exception("Por motivos de seguridad este usuario a sido suspendido, revisar correo electronico con las instrucciones a seguir");
														}
													}
												}
												else{
													throw new Exception("Error al ingresar numero de intentos");
												}									
											}
											else{
												$numeroSuccesIntentos=0;
												if($clase2->setnumb_ingresos($numeroSuccesIntentos)){
													$modificarNum= $clase2->updateNumeroIntentos();
													if($modificarNum){
														$Id_estado= $clase2->getestado_sesion();
														if($Id_estado==0){
															$sumaEstadoSesion=$Id_estado+1;
															if($clase2->setestado_sesion($sumaEstadoSesion)){
																$clase2->updateEstadoSesion();
																#redireccionar al menu normalmente
																Page::showMessage(1, "Inicio de sesion correcto", "../inicio/inicio.php");								
															}
														}
														else if($Id_estado==1){
															$sumaEstadoSesion=$Id_estado+1;
															if($clase2->setestado_sesion($sumaEstadoSesion)){
															$clase2->updateEstadoSesion();
															#redireccionar al menu normalmente
															throw new Exception("Error la sesion de este usuario ya estaba activo, por razón de seguridad esta cuenta se suspendera");						
															}
														}
														else if($Id_estado==2){
															throw new Exception("Por motivos de seguridad este usuario a sido suspendido, revisar correo electronico con las instrucciones a seguir");
														}													
													}
												}
												else{
													throw new Exception("Error al ingresar numero de intentos");
												}
											}
										}
									}else
									{
										throw new Exception("Cambio de contraseño forzada o erroneo (fecha de ultimo cambio de contraseña en futuro)");								
									}							
								}else{
									#Inicio
									$numero_intentos=$clase2->getnumb_ingresos();
									#echo $numero_intentos;
									if($numero_intentos<3){
										$SumaNum=$numero_intentos+1;
										if($SumaNum<=2){
											if($clase2->setnumb_ingresos($SumaNum)){
												$modificarNum= $clase2->updateNumeroIntentos();
												if($modificarNum){
													$intentos= 3-$SumaNum;
													throw new Exception("Contraseña incorrecta, numero de intentos restantes: ".$intentos);
												}
											}
											else{
												throw new Exception("Error al ingresar numero de intentos");
											}
										}
										else{
											if($clase2->setnumb_ingresos($SumaNum)){
												$fecha = date("Y-m-d");
												$hora = date("H:i:s");
												//Incrementando 1 dias
												$procesosuma = strtotime($fecha."+ 1 days");
												$sumaDia=date("Y-m-d",$procesosuma);
												$FechaNueva=$sumaDia." ".$hora;
												#echo $FechaNueva." Despues <br>";
												if($clase2->settiempo_intentos($FechaNueva)){
													$modificarNumlast= $clase2->updateLastNumeroIntentos();
													if($modificarNumlast){
														$intentos= 3-$SumaNum;
														throw new Exception("Limite de intentos excedido porfavor, vuelve a intentarlo luego de 24 horas");
													}
												}
												else{
													throw new Exception("Error al ingresar Tiempo de intentos");
												}
											}
											else{
												throw new Exception("Error al ingresar numero de intentos");
											}
										}								
									}
									else{
										throw new Exception("Limite de intentos excedido, porfavor vuelve a intentarlo luego de 24 horas");
									}
								}
								}else{
									#Inicio
									$numero_intentos=$clase2->getnumb_ingresos();
									#echo $numero_intentos;
									if($numero_intentos<3){
										$SumaNum=$numero_intentos+1;
										if($SumaNum<=2){
											if($clase2->setnumb_ingresos($SumaNum)){
												$modificarNum= $clase2->updateNumeroIntentos();
												if($modificarNum){
													$intentos= 3-$SumaNum;
													throw new Exception("Contraseña incorrecta, numero de intentos restantes: ".$intentos);
												}
											}
											else{
												throw new Exception("Error al ingresar numero de intentos");
											}
										}
										else{
											if($clase2->setnumb_ingresos($SumaNum)){
												$fecha = date("Y-m-d");
												$hora = date("H:i:s");
												//Incrementando 1 dias
												$procesosuma = strtotime($fecha."+ 1 days");
												$sumaDia=date("Y-m-d",$procesosuma);
												$FechaNueva=$sumaDia." ".$hora;
												#echo $FechaNueva." Despues <br>";
												if($clase2->settiempo_intentos($FechaNueva)){
													$modificarNumlast= $clase2->updateLastNumeroIntentos();
													if($modificarNumlast){
														$intentos= 3-$SumaNum;
														throw new Exception("Limite de intentos excedido, porfavor vuelve a intentarlo luego de 24 horas");
													}
												}
												else{
													throw new Exception("Error al ingresar Tiempo de intentos");
												}
											}
											else{
												throw new Exception("Error al ingresar numero de intentos");
											}
										}								
									}
									else{
										throw new Exception("Limite de intentos excedido porfavor, vuelve a intentarlo luego de 24 horas");
									}
								}
							}
						else{
							throw new Exception("Su usuario fue bloqueado temporalmente, porfavor intentarlo luego de 24 horas de su ultimo intento");
						}
					
					}else{
						throw new Exception("Este correo no perneten a ninguna cuenta");
					}

			}else{
				throw new Exception("Correo es invalido");
			}
		}
	}else{
		Page::showMessage(3, "No hay usuarios disponibles", "");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/public/sesion/login_view.php");


?>
