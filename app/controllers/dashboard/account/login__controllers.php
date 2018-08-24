<?php
require_once("../../app/models/dashboard/login/login.class.php");
try{
	$object = new login;
	date_default_timezone_set('America/El_Salvador');	
	if($object->getUsuarios()){
        if(isset($_POST['iniciar'])){
			$_POST = $object->validateForm($_POST);
			if(isset($_POST['g-recaptcha-response'])) {
				// RECAPTCHA SETTINGS
				$captcha = $_POST['g-recaptcha-response'];
				$ip = $_SERVER['REMOTE_ADDR'];
				$key = '6LdA7WsUAAAAAB_QTuA_iHwkf10n5lwz8Omgbp_r';
				$url = 'https://www.google.com/recaptcha/api/siteverify';
			  
				// RECAPTCH RESPONSE
				$recaptcha_response = file_get_contents($url.'?secret='.$key.'&response='.$captcha.'&remoteip='.$ip);
				$data = json_decode($recaptcha_response);
			  
				if(isset($data->success) &&  $data->success === true) {	
					if($object->setNickname($_POST['nickname'])){
						if($object->checkNickname()){
							$traerFecha= $object->gettiempo_intentos();
							$traerFechaAct = date("Y-m-d H:i:s");
							$d1 = new DateTime($traerFecha);
							$d2 = new DateTime($traerFechaAct);
							if($d1<=$d2){
								$numero_intentosnew=$object->getnumb_ingresos();
								if($numero_intentosnew==3){
									$numeroNewIntentos=0;
									if($object->setnumb_ingresos($numeroNewIntentos)){
										$object->updateNumeroIntentos();								
									}
								}
								if($object->setClave_usuario($_POST['password'])){
									if($object->checkClave_usuario()){
										$_SESSION['id_usuario_dashboard'] = $object->getId_usuario();
										$_SESSION['nickname_dashboard'] = $object->getNickname();
										$_SESSION['correo_usuario_dashboard'] = $object->getCorreo_usuario();
										$_SESSION['foto_dashboard'] = $object->getImagen();
										$_SESSION['nombre_usuario_dashboard'] = $object->getNombres();
										$_SESSION['apellidos_usuario_dashboard'] = $object->getApellidos_usuario();
										$_SESSION['tipo_usuario_dashboard'] = $object->getTIPOusuario();
										$diaOpcion = date("Y-m-d");
										#echo $diaOpcion."<br>";
										$date1 = new DateTime($diaOpcion);
										$date2 = new DateTime($object->getFechaContra());
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
													if($object->setnumb_ingresos($numeroSuccesIntentos)){
														$modificarNum= $object->updateNumeroIntentos();
														if($modificarNum){
															$Id_estado= $object->getestado_sesion();
															if($Id_estado==0){
																$sumaEstadoSesion=$Id_estado+1;
																if($object->setestado_sesion($sumaEstadoSesion)){
																	$object->updateEstadoSesion();
																	#	redireccionar al menu normalmente pero tiene que cambiar su contraseña en: ".$diasRestantes." dias
																	$diasRestantes=90 - $diferenciaDias;
																	Page::showMessage(1, "Inicio de sesion correcto (Por razones de seguridad usted tiene que cambiar su contraseña en ".$diasRestantes." dias)", "../menu/menu.php");						
																}
															}
															else if($Id_estado==1){
																$sumaEstadoSesion=$Id_estado+1;
																if($object->setestado_sesion($sumaEstadoSesion)){
																$object->updateEstadoSesion();
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
													if($object->setnumb_ingresos($numeroSuccesIntentos)){
														$modificarNum= $object->updateNumeroIntentos();
														if($modificarNum){
															$Id_estado= $object->getestado_sesion();
															if($Id_estado==0){
																$sumaEstadoSesion=$Id_estado+1;
																if($object->setestado_sesion($sumaEstadoSesion)){
																	$object->updateEstadoSesion();
																	#redireccionar al menu normalmente
																	Page::showMessage(1, "Inicio de sesion correcto", "../menu/menu.php");								
																}
															}
															else if($Id_estado==1){
																$sumaEstadoSesion=$Id_estado+1;
																if($object->setestado_sesion($sumaEstadoSesion)){
																$object->updateEstadoSesion();
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
										$numero_intentos=$object->getnumb_ingresos();
										#echo $numero_intentos;
										if($numero_intentos<3){
											$SumaNum=$numero_intentos+1;
											if($SumaNum<=2){
												if($object->setnumb_ingresos($SumaNum)){
													$modificarNum= $object->updateNumeroIntentos();
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
												if($object->setnumb_ingresos($SumaNum)){
													$fecha = date("Y-m-d");
													$hora = date("H:i:s");
													//Incrementando 1 dias
													$procesosuma = strtotime($fecha."+ 1 days");
													$sumaDia=date("Y-m-d",$procesosuma);
													$FechaNueva=$sumaDia." ".$hora;
													#echo $FechaNueva." Despues <br>";
													if($object->settiempo_intentos($FechaNueva)){
														$modificarNumlast= $object->updateLastNumeroIntentos();
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
										$numero_intentos=$object->getnumb_ingresos();
										#echo $numero_intentos;
										if($numero_intentos<3){
											$SumaNum=$numero_intentos+1;
											if($SumaNum<=2){
												if($object->setnumb_ingresos($SumaNum)){
													$modificarNum= $object->updateNumeroIntentos();
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
												if($object->setnumb_ingresos($SumaNum)){
													$fecha = date("Y-m-d");
													$hora = date("H:i:s");
													//Incrementando 1 dias
													$procesosuma = strtotime($fecha."+ 1 days");
													$sumaDia=date("Y-m-d",$procesosuma);
													$FechaNueva=$sumaDia." ".$hora;
													#echo $FechaNueva." Despues <br>";
													if($object->settiempo_intentos($FechaNueva)){
														$modificarNumlast= $object->updateLastNumeroIntentos();
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
							throw new Exception("Este Alias no perneten a ninguna cuenta");
						}
					}else{
						throw new Exception("Alias es invalido");
					}
				}
				else {
					Page::showMessage(3, "error al verificar", "#");		
				}
			 }
		}	
	
	}
	else{
		Page::showMessage(3, "No hay usuarios disponibles", "Primer_usu_view.php");
	}
}catch(Exception $error){
	Page::showMessage(2, $error->getMessage(), null);
}
require_once("../../app/views/dashboard/account/login_view.php")
?>