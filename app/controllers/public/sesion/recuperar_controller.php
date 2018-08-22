<?php
require_once("../../app/models/public/sesion/sesion.class.php");
require_once("../../app/helpers/phpmailer/src/PHPMailer.php");
require_once("../../app/helpers/phpmailer/src/SMTP.php");

try{
	$object = new login;
	if($object->getUsuarios()){
        if(isset($_POST['iniciar'])){
			$_POST = $object->validateForm($_POST);
			if($object->setCorreo_usuario($_POST['email'])){
				if($object->checkCorreo_usuario()){
                                        $email_user = "";
                                        $email_password = "";
                                        $the_subject = "";
                                        $address_to = $_POST['email'];
                                        $from_name = "Netbook inc";
                                        $phpmailer = new PHPMailer();
                                        // ---------- datos de la cuenta de Gmail -------------------------------
                                        $phpmailer->Username = $email_user;
                                        $phpmailer->Password = $email_password; 
                                        //-----------------------------------------------------------------------
                                        // $phpmailer->SMTPDebug = 1;
                                        $phpmailer->SMTPSecure = 'ssl';
                                        $phpmailer->Host = "smtp.gmail.com"; // GMail
                                        $phpmailer->Port = 465;
                                        $phpmailer->IsSMTP(); // use SMTP
                                        $phpmailer->SMTPAuth = true;
                                        $phpmailer->setFrom($phpmailer->Username,$from_name);
                                        $phpmailer->AddAddress($address_to); // recipients email
                                        $phpmailer->Subject = $the_subject;	
                                        $phpmailer->Body .="<h1 style='color:#3498db;'>Recuperacion de contraseña!</h1>";
<<<<<<< HEAD
                                        $phpmailer->Body .= "<p>Su codigo para </p>";
                                        $phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
                                        $phpmailer->IsHTML(true);
                                        $phpmailer->Send();


							Page::showMessage(1, "Inicio de sesion corecto", "../inicio/inicio.php");

=======
                                        $phpmailer->Body .= "<p>Para restablecer su clave usuario ingrese al siguiente enlace: http://localhost/NetBook_Finally/public/sesion/cambio_clave.php?id='' </p>";
                                        $phpmailer->Body .= "<p>Fecha y Hora: ".date("d-m-Y h:i:s")."</p>";
                                        $phpmailer->IsHTML(true);
                                        $phpmailer->Send();
>>>>>>> fb3f905c771f6d0717f7272ce247fbcf7e9b30de
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
require_once("../../app/views/public/sesion/recuperar_view.php");
?>