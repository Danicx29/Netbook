<?php
require_once("../../app/models/database.class.php");
require_once("../../app/helpers/validator.class.php");
require_once("../../app/helpers/component.class.php");
require_once("../../app/helpers/fpdf.php"); 

class Page extends Component{
	public static function templateHeader($title){
		session_start();
		print("
		<!DOCTYPE html>
		<html lang='es'>		
		<head>
			<meta charset='UTF-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<meta http-equiv='X-UA-Compatible' content='ie=edge'>
			<title>$title</title>
			<link href='../../web/img/logo_prototipo.ico' rel='shortcut icon' type='image/x-icon'>
            <!--Import Google Icon Font-->
            <link href='../../web/fonts/icon.css' rel='stylesheet'>
			<!--Import materialize.css-->
			<!---->
			<link type='text/css' rel='stylesheet' href='../../web/css/materialize.min.css' media='screen,projection' />
			<link type='text/css' rel='stylesheet' href='../../web/css/estilo.css' media='screen,projection' />
			<script type='text/javascript' src='../../web/js/sweetalert.min.js'></script>
			<link type='text/css' rel='stylesheet' href='../../web/css/fpdf.css'>
			<!--Let browser know website is optimized for mobile-->
			<meta name='viewport' content='width=device-width, initial-scale=1.0' />
		</head>	
		<body class='grey darken-4' >
			<!--Menu principal de inico de usuarios ingresados-->
			<header>
				<ul id='dropdown2' class='dropdown-content'>
					<li><a href='../sesion/logout.php'>Cerrar sesion</a></li>
				</ul>
				<nav>
				<div class='grey darken-4 nav-wrapper'>
					<a href='../inicio/inicio.php' class='brand-logo'>
						<img class='center' height='30px' src='../../web/img/logo1.png' alt='NB'> Netbook</a>
					<a href='' data-activates='mobile-demo' class='button-collapse'>
						<i class='material-icons'>menu</i>
					</a>
					<ul class='right hide-on-med-and-down'>
						<li>
							<a href='../inicio/generos_lbrs.php'>
								<i class='material-icons left'>book</i>Generos</a>
						</li>
						<li class=''>
							<a href='../inicio/autores_lbrs.php'>
								<i class='material-icons left'>people</i>Autores</a>
						</li>
						<li>
						<a href='../perfil/perfil.php'>
							<i class='material-icons left'>account_circle</i>$_SESSION[nickname_public]</a>
					</li>
						<li><a class='dropdown-button' href='#!' data-activates='dropdown2'><i class='material-icons right'>settings</i></a></li>
					</ul>
					<ul class='side-nav' id='mobile-demo'>
						<li>
							<form  autocomplete= 'off'>
								<div class=' input-field inline'>
									<i class='material-icons prefix'>search</i>
									<input id='icon_prefix' type='text' class='validate black-text '>
									<label for='text-white icon_prefix'>Buscar libro</label>
								</div>
							</form>
						</li>
						<li>
							<a href='collapsible.html'>Precios</a>
						</li>
						<li>
							<a href='registrarse.html'>Registrarse</a>
						</li>
						<li>
							<a href='login.html'>Iniciar Sesion</a>
						</li>
					</ul>
				</div>
			</nav>
		</header>	
		");
	}
	public static function templateHeader2($title){
		session_start();
		print("
		<!DOCTYPE html>
		<html lang='es'>	
		<head>
			<meta charset='UTF-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<meta http-equiv='X-UA-Compatible' content='ie=edge'>
			<title>$title</title>
			<link href='../../web/img/Logo_prototipo.ico' rel='shortcut icon' type='image/x-icon'>
            <!--Import Google Icon Font-->
            <link href='../../web/fonts/icon.css' rel='stylesheet'>
			<!--Import materialize.css-->
			<link type='text/css' rel='stylesheet' href='../../web/css/materialize.min.css' media='screen,projection' />
			<link type='text/css' rel='stylesheet' href='../../web/css/estilo.css' media='screen,projection' />
			<link type='text/css' rel='stylesheet' href='../../web/css/fpdf.css'>
			<script type='text/javascript' src='../../web/js/sweetalert.min.js'></script>
			<!--Let browser know website is optimized for mobile-->
			<meta name='viewport' content='width=device-width, initial-scale=1.0' />
		</head>	
		<body>
			<!--Header de la paguina principar para los usuarios-->
			<header>
				<nav>
					<!--Barra de navegacion principal-->
					<div class='grey darken-4 nav-wrapper'>
						<a href='' class='brand-logo'>
							<img class='center' height='30px' src='../../web/img/logo1.png' alt='NB'> Netbook</a>
						<a href='index.html' data-activates='mobile-demo' class='button-collapse'>
							<i class='material-icons'>menu</i>
						</a>
						<ul class='right hide-on-med-and-down'>
							<li>
								<a href='../sesion/registrarse.php'>
									<i class='material-icons left'>person_add</i>Registrarse</a>
							</li>
							<li>
								<a href='../sesion/login.php'>
									<i class='material-icons left'>person</i>Iniciar Sesion</a>
							</li>
						</ul>
						<ul class='side-nav' id='mobile-demo'>
							<li>
								<a href='registrarse.html'>
									<i class='material-icons left'>person_add</i>Registrarse</a>
							</li>
							<li>
								<a href='login.html'>
									<i class='material-icons left'>person</i>Iniciar Sesion</a>
							</li>
						</ul>
					</div>
				</nav>
			</header>
		");
	}
	public static function templateHeader3($title){
		session_start();
		print("
			<!DOCTYPE html>
			<html lang='es'>
			
			<head>
				<meta charset='UTF-8'>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'>
				<meta http-equiv='X-UA-Compatible' content='ie=edge'>
				<title>Login</title>
				<link href='../../web/img/Logo_prototipo.ico' rel='shortcut icon' type='image/x-icon'>
				<!--Import Google Icon Font-->
				<link href='../../web/fonts/icon.css' rel='stylesheet'>
				<!--Import materialize.css-->
				<link type='text/css' rel='stylesheet' href='../../web/css/materialize.min.css' media='screen,projection' />
				<link type='text/css' rel='stylesheet' href='../../web/css/estilo.css' media='screen,projection' />
				<link type='text/css' rel='stylesheet' href='../../web/css/fpdf.css'>
				<script type='text/javascript' src='../../web/js/sweetalert.min.js'></script>
				<!--Let browser know website is optimized for mobile-->
				<meta name='viewport' content='width=device-width, initial-scale=1.0' />
			</head>
			
			<body>
				<header>
					<nav>
						<div class='grey darken-4 nav-wrapper'>
							<a href='../inicio/index.php' class='brand-logo center '>
								<img class='center' height='30px' src='../../web/img/logo1.png' alt='NB'> Netbook</a>
						</div>
					</nav>
				</header>
		");
	}
	public static function templateHeader4($title){
		session_start();
		print("
			<!DOCTYPE html>
			<html lang='es'>
			
			<head>
				<meta charset='UTF-8'>
				<meta name='viewport' content='width=device-width, initial-scale=1.0'>
				<meta http-equiv='X-UA-Compatible' content='ie=edge'>
				<title>Login</title>
				<link href='../../web/img/Logo_prototipo.ico' rel='shortcut icon' type='image/x-icon'>
				<!--Import Google Icon Font-->
				<link href='../../web/fonts/icon.css' rel='stylesheet'>
				<!--Import materialize.css-->
				<link type='text/css' rel='stylesheet' href='../../web/css/materialize.min.css' media='screen,projection' />
				<link type='text/css' rel='stylesheet' href='../../web/css/estilo.css' media='screen,projection' />
				<link type='text/css' rel='stylesheet' href='../../web/css/fpdf.css'>
				<script type='text/javascript' src='../../web/js/sweetalert.min.js'></script>
				<!--Let browser know website is optimized for mobile-->
				<meta name='viewport' content='width=device-width, initial-scale=1.0' />
			</head>
			
			<body>
				<header>
					<nav>
						<div class='grey darken-4 nav-wrapper'>
							<a href='../inicio/inicio.php' class='brand-logo center '>
								<img class='center' height='30px' src='../../web/img/logo1.png' alt='NB'> Netbook</a>
						</div>
					</nav>
				</header>
		");
	}
	public static function ObtenerSesion(){
		session_start();
	}
	public static function templateFooter(){
		print("
			<!-- Modal Structure -->
			<div id='modal_objetivos' class='modal'>
				<div class='modal-content'>
					<h4>Obejtivos</h4>
					<p>Ser una plataforma que fomente un habito de lectura con accesibilidad a la información de manera fácil, cómoda,
						rápida para el uso de los clientes por una precio justo.
						<br> Expandir los servicios a nivel mundial sin importar el idioma, grupo social, sexo, religión o ideología
						con acceso a la libertad de expresión sin censura para de los autores.
						<br> Ser una comunidad que ayude el crecimiento con nuevos escritores y pequeños editoriales para expandir y
						fomentar la lectura
					</p>
				</div>
				<div class='modal-footer'>
					<a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Aceptar</a>
				</div>
			</div>
			<!-- Modal Structure -->
			<div id='modal_mision' class='modal'>
				<div class='modal-content'>
					<h4>Mision</h4>
					<p>Innovar en el sector editorial implementando un sistema de negocios streaming online de pago por mensualidades
						ofreciendo libros de calidad para leer o escuchar, de la manera mas fácil y eficiente.
					</p>
				</div>
				<div class='modal-footer'>
					<a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Aceptar</a>
				</div>
			</div>
			<!-- Modal Structure -->
			<div id='modal_vision' class='modal'>
				<div class='modal-content'>
					<h4>Vision</h4>
					<p>Ser la empresa líder de contenido editorial contando con un amplio numero de títulos, creando a su misma vez
						contenido propio, de esta forma ser la preferencia por excelencia de muchas personas </p>
				</div>
				<div class='modal-footer'>
					<a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Aceptar</a>
				</div>
			</div>
			<footer class='grey darken-4 page-footer'>
				<div class='row center-align'>
		
					<h4>
						<img class='center' height='30px' src='../../web/img/logo1.png' alt='NB'> Netbook</h4>
					<div class='container'>
						<div class='col s6 m l4'>
							<div class='row'>
								<h5 class='white-text'> Redes sociales</h5>
								<!--Redes sociales-->
								<a href=''>
									<img src='../../web/img/facebook.png' alt='' class='responsive-img'>
								</a>
								<a href=''>
									<img src='../../web/img/youtube.png' alt='' class='responsive-img'>
								</a>
								<a href=''>
									<img src='../../web/img/twitter.png' alt='' class='responsive-img'>
								</a>
								<a href=''>
									<img src='../../web/img/google.png' alt='' class='responsive-img'>
								</a>
								<a href=''>
									<img src='../../web/img/whatsapp.png' alt='' class='responsive-img'>
								</a>
								<a href=''>
									<img src='../../web/img/skype.png' alt='' class='responsive-img'>
								</a>
							</div>
						</div>
						<div class='col s6 m4 l4'>
							<div class='row'>
								<h5 class='white-text'>Empresa</h5>
								<!--Imformacion objetivos ,mision ,vision-->
								<div class='row'>
									<a class='waves-effect waves-light  modal-trigger' href='#modal_objetivos'>
										<h6 class='grey-text'>Objetivos</h6>
									</a>
								</div>
								<div class='row'>
									<a class='waves-effect waves-light  modal-trigger' href='#modal_mision'>
										<h6 class='grey-text'>Mision</h6>
									</a>
								</div>
								<div class='row'>
									<a class='waves-effect waves-light  modal-trigger' href='#modal_vision'>
										<h6 class='grey-text'>Vision</h6>
									</a>
								</div>
							</div>
						</div>
						<div class='col s6 m4 l4'>
							<div class='row'>
								<h5 class='white-text'>Informacion</h5>
								<a href=''>
									<h6 class='grey-text'>Desarolladores</h6>
								</a>
								<a href=''>
									<h6 class='grey-text'>Artistas</h6>
								</a>
								<a href=''>
									<h6 class='grey-text'>Editoriales</h6>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class='footer-copyright'>
					<div class='container'>
						© 2018 Copyright Netbook All rights reserved.
					</div>
				</div>
			</footer>
			<!--Import jQuery before materialize.js-->

			<script type='text/javascript' src='../../web/js/jquery.min.js'></script>
			<script type='text/javascript' src='../../web/js/main.js'></script>
			<script type='text/javascript' src='../../web/js/materialize.min.js'></script>
			<script type='text/javascript' src='../../web/js/sweetalert.min.js'></script>
			<script type='text/javascript'>  

		</script>
		</body>
		</html>	
		");
	}
	public static function templateFooter2(){
		print("
			<!-- Modal Structure -->
			<div id='modal_objetivos' class='modal'>
				<div class='modal-content'>
					<h4>Obejtivos</h4>
					<p>Ser una plataforma que fomente un habito de lectura con accesibilidad a la información de manera fácil, cómoda,
						rápida para el uso de los clientes por una precio justo.
						<br> Expandir los servicios a nivel mundial sin importar el idioma, grupo social, sexo, religión o ideología
						con acceso a la libertad de expresión sin censura para de los autores.
						<br> Ser una comunidad que ayude el crecimiento con nuevos escritores y pequeños editoriales para expandir y
						fomentar la lectura
					</p>
				</div>
				<div class='modal-footer'>
					<a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Aceptar</a>
				</div>
			</div>
			<!-- Modal Structure -->
			<div id='modal_mision' class='modal'>
				<div class='modal-content'>
					<h4>Mision</h4>
					<p>Innovar en el sector editorial implementando un sistema de negocios streaming online de pago por mensualidades
						ofreciendo libros de calidad para leer o escuchar, de la manera mas fácil y eficiente.
					</p>
				</div>
				<div class='modal-footer'>
					<a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Aceptar</a>
				</div>
			</div>
			<!-- Modal Structure -->
			<div id='modal_vision' class='modal'>
				<div class='modal-content'>
					<h4>Vision</h4>
					<p>Ser la empresa líder de contenido editorial contando con un amplio numero de títulos, creando a su misma vez
						contenido propio, de esta forma ser la preferencia por excelencia de muchas personas </p>
				</div>
				<div class='modal-footer'>
					<a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Aceptar</a>
				</div>
			</div>
			<footer class='grey darken-4 page-footer'>
				<div class='row center-align'>
		
					<h4>
						<img class='center' height='30px' src='../../web/img/logo1.png' alt='NB'> Netbook</h4>
					<div class='container'>
						<div class='col s6 m l4'>
							<div class='row'>
								<h5 class='white-text'> Redes sociales</h5>
								<!--Redes sociales-->
								<a href=''>
									<img src='../../web/img/facebook.png' alt='' class='responsive-img'>
								</a>
								<a href=''>
									<img src='../../web/img/youtube.png' alt='' class='responsive-img'>
								</a>
								<a href=''>
									<img src='../../web/img/twitter.png' alt='' class='responsive-img'>
								</a>
								<a href=''>
									<img src='../../web/img/google.png' alt='' class='responsive-img'>
								</a>
								<a href=''>
									<img src='../../web/img/whatsapp.png' alt='' class='responsive-img'>
								</a>
								<a href=''>
									<img src='../../web/img/skype.png' alt='' class='responsive-img'>
								</a>
							</div>
						</div>
						<div class='col s6 m4 l4'>
							<div class='row'>
								<h5 class='white-text'>Empresa</h5>
								<!--Imformacion objetivos ,mision ,vision-->
								<div class='row'>
									<a class='waves-effect waves-light  modal-trigger' href='#modal_objetivos'>
										<h6 class='grey-text'>Objetivos</h6>
									</a>
								</div>
								<div class='row'>
									<a class='waves-effect waves-light  modal-trigger' href='#modal_mision'>
										<h6 class='grey-text'>Mision</h6>
									</a>
								</div>
								<div class='row'>
									<a class='waves-effect waves-light  modal-trigger' href='#modal_vision'>
										<h6 class='grey-text'>Vision</h6>
									</a>
								</div>
							</div>
						</div>
						<div class='col s6 m4 l4'>
							<div class='row'>
								<h5 class='white-text'>Informacion</h5>
								<a href=''>
									<h6 class='grey-text'>Desarolladores</h6>
								</a>
								<a href=''>
									<h6 class='grey-text'>Artistas</h6>
								</a>
								<a href=''>
									<h6 class='grey-text'>Editoriales</h6>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class='footer-copyright'>
					<div class='container'>
						© 2018 Copyright Netbook All rights reserved.
					</div>
				</div>
			</footer>
			<!--Import jQuery before materialize.js-->
			<script type='text/javascript' src='../../web/js/jquery.min.js'></script>
			<script type='text/javascript' src='../../web/js/main.js'></script>
			<script type='text/javascript' src='../../web/js/materialize.min.js'></script>
		</body>
		</html>
		");
	}
}
?>