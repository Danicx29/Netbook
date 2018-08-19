<?php
require_once('../../app/models/database.class.php');
require_once('../../app/helpers/validator.class.php');
require_once('../../app/helpers/component.class.php');
class Page extends Component{

  public static function login_header(){
		session_start();
		ini_set('date.timezone','America/El_Salvador');
		print('
    <!DOCTYPE html>
    <html>
    <head lang="es">
            <meta charset="utf-8">
            <!--Import Google Icon Font-->
            <link href="../../web/fonts/icon.css" rel="stylesheet">
            <!--Import materialize.css-->
            <link type="text/css" rel="stylesheet" href="../../web/css/materialize.css" media="screen,projection" />
            <link type="text/css" rel="stylesheet" href="../../web/css/Style.css" media="screen,projection" />
            <script type="text/javascript" src="../../web/js/sweetalert.min.js"></script>
            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <!-- agregando titulo a la pagina -->
            <title>NetBook Login Administrador</title>
            <!-- agregando icono a la pagina -->
            <link href="../../web/img/Logo_prototipo.ico" rel="shortcut icon" type="image/x-icon">
            <!-- agregando imagen de fondo del login -->
            <img src="../../web/img/FondoLoginAdm.jpg" class="fondo">
    </head>
    <body>
    <!--contiene y ordena los elementos-->
<div class="container">
<!-- Page Content goes here -->
<!-- formatos de los campos y letras, (hay varios para que se ajuste a cada tipo de pantalla) -->
<div class="row ">
        <div class="hide-on-small-only hide-on-med-only center-align FontLoginAd TitleSizeLogin grey-text text-lighten-3 col s12 m12 l12 ">NetBook</div>
        <div class="hide-on-small-only hide-on-large-only center-align FontLoginAd TitleSizeLoginM grey-text text-lighten-3 col s12 m12 l12 ">NetBook</div>
        <div class="hide-on-med-only hide-on-large-only center-align LocationFontTitleSmall FontLoginAd TitleSizeLoginS grey-text text-lighten-3 col s12 m12 l12 ">NetBook</div>
        <div class="hide-on-small-only hide-on-med-only center-align LocationFontTitle FontLoginAd grey-text text-lighten-3 col s12 m12 l12 ">
                <h3>Administrador</h3>
        </div>
        <div class="hide-on-small-only hide-on-large-only center-align LocationFontTitle FontLoginAd grey-text text-lighten-3 col s12 m12 l12 ">
                <h4>Administrador</h4>
        </div>
        <div class="hide-on-med-only hide-on-large-only center-align LocationFontTitle  FontLoginAd grey-text text-lighten-3 col s12 m12 l12 ">
                <h5>Administrador</h5>
        </div>
    <main>        
    ');

	}

  public static function login_footer(){
		
		ini_set('date.timezone','America/El_Salvador');
		print('
    </main>         
    <!-- importando archivos javascript -->
    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="../../web/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../web/js/chart.js"></script>
    <script type="text/javascript" src="../../web/js/materialize.min.js"></script>
    
    
</body>
</html>         
		');
	}
	public static function templateHeader($title){
		session_start();
		ini_set('date.timezone','America/El_Salvador');
		print("
    <!DOCTYPE html>
    <html lang='es'>
    
    <head>
      <meta charset='utf-8'>
      <!--Import Google Icon Font-->
      <link href='../../web/fonts/icon.css' rel='stylesheet'>
      <!--Import materialize.css-->
      <link type='text/css' rel='stylesheet' href='../../web/css/materialize.css' media='screen,projection' />
      <link type='text/css' rel='stylesheet' href='../../web/css/Style.css' media='screen,projection' />
      <script type='text/javascript' src='../../web/js/sweetalert.min.js'></script>
      <!--Let browser know website is optimized for mobile-->
      <meta name='viewport' content='width=device-width, initial-scale=1.0' />
      <!-- agregando title -->
      <title>NetBook Administrador</title>
      <!-- agregar icono en pagina web -->
      <link href='../../web/img/Logo_prototipo.ico' rel='shortcut icon' type='image/x-icon'>
      <img src='../../web/img/Background_index.jpg' class='fondo'>
      <script type='text/javascript' src='../../web/js/jquery-3.2.1.min.js'></script>
          <script type='text/javascript' src='../../web/js/chart.js'></script>
    </head>
 ");
 if(isset($_SESSION['id_usuario'])){
  print("
  <body class='blue-grey darken-4'>
  <header>
  <!-- agregando de nav a la pagina -->
  <div class='navbar-fixed'>
    <nav>
      <div class='nav-wrapper'>
        <a href='../menu/menu.php'>
          <img src='../../web/img/Logo_prototipo.png' height='30px' class='Logosh'>
        </a>
        <a href='#' class='brand-logo'>NetBook</a>
        <ul id='nav-mobile' class='right hide-on-med-and-down'>
          <!-- <li><a href='sass.html '>Inicio</a></li>
                    <li><a href='badges.html'>Acerca</a></li>
                    <li><a href='collapsible.html'>Contacto</a></li> -->
          <li></li>
        </ul>
        <a href='#' data-activates='slide-out' class=' button-collapse show-on-large'>
          <i class=' material-icons' class=' responsive-img'>account_circle</i>
          </i>
        </a>
      </div>
    </nav>
  </div>


  </ul>
  <!-- agregando estructura del sidbar  -->
  <ul id='slide-out' class='ColorSidebar side-nav'>
    <li>
      <div class='user-view'>
        <div class='background'>
          <img src='../../web/img/Fondo_perfil.jpg' class='responsive-img'>
        </div>
        <a href='#!user'>
          <img class='circle z-depth-5 center-align' src='../../web/img/usuarios/$_SESSION[foto]'>
        </a>
        <a href='#!name'>
          <span class='white-text name'>$_SESSION[nickname]</span>
        </a>
        <a href='#!email'>
          <span class='white-text email'>$_SESSION[correo_usuario]</span>
        </a>
      </div>
    </li>
     
    
    <li>
      <a class='grey-text text-lighten-3'>
        <b>Tipo usuario:</b> Administrador
      </a>
    </li>
    
    <li>
      <div class='grey-text text-lighten-3 divider'></div>
    </li>
    <li>
      <a class='grey-text text-lighten-3'> <b>Nombre:</b> $_SESSION[nombre_usuario] </a>
    </li>
    <li>
      <div class='grey-text text-lighten-3 divider'></div>
    </li>
    <li>
      <a class='grey-text text-lighten-3'> <b>Apellido:</b> $_SESSION[apellidos_usuario] </a>
    </li>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <br></br>
    <div class='row'>
      <div class='col s6'>
        <a class='EditCenter1 green accent-3-text waves-effect waves-light btn-floating  modal-trigger' href='..\updateusu\update_user.php?id=$_SESSION[id_usuario]' title='Editar'>
          <i class='material-icons left'>mode_edit</i>
        </a>
      </div>
      <div class='col s6'>
        <a href='../account/logout.php' class='EditCenter1 waves-effect waves-light btn-floating red' title='Salir'>
          <i class='material-icons left'>exit_to_app</i>
        </a>
      </div>
    </div>


  </ul>
</header>
<main>
  ");
}else{
  Page::showMessage(3,"Debes iniciar sesión", "../account/index.php");
}
	}

	public static function templateFooter(){
        print('
        </main>
        <!--modal de agregar -->
        <div id="modalMiperfil" class="modal">
          <div class="modal-content blue-grey lighten-4">
            <h4>Editar tu perfil</h4>
            <div class="col s12 m12 l12">
              <div class="center">
                <img src="../../web/img/user-profile.png" alt="" class="center circle responsive-img imageSizess">
                <!-- notice the "circle" class -->
              </div>
    
              <form action="#"  autocomplete= 'off' >
                <div class="file-field input-field">
                  <div class="btn-floating btn-large waves-effect waves-light buttonsaddLocation">
                    <i class="material-icons">attach_file</i>
    
                    <input type="file">
                  </div>
                  <div class="file-path-wrapper">
                    <!--  <input class="file-path validate" type="text" placeholder="Upload one or more files"> -->
                  </div>
                </div>
              </form>
              <div class="input-field col s6 m6 l6">
                <input  class="validate black-text center">
                <label for="last_name" >Nombre</label>
              </div>
              <div class="input-field col s6 m6 l6">
                <input  class="black-text validate center">
                <label for="last_name">Apellido</label>
              </div>
              <div class="input-field col s6 m6 l6">
                <input id="email" type="email" class="black-text validate">
                <label for="email">Correo Electronico</label>
              </div>
              <div class="input-field col s6 m6 l6">
                <input  class="black-text validate center">
                <label for="last_name">Nombre de usuario</label>
              </div>
              <div class="input-field col s6 m6 l6">
                <input  class="black-text validate">
                <label for="password">Contraseña</label>
              </div>
              <div class="input-field col s6 m6 l6">
                <input  class="black-text validate">
                <label for="password">Repita la contraseña</label>
              </div>
              <div class="input-field col s6 m6 l6">
                <select class="black-text">
                  <option value="" disabled selected>Seleccione su pais</option>
                  <option value="1">El Salvador</option>
                  <option value="2">Estados Unidos</option>
                  <option value="3">Honduras</option>
                </select>
                <label>Pais</label>
              </div>
              <div class="input-field col s12 m6 l6">
                <select class="black-text">
                  <option value="" disabled selected>Seleccione el tipo de usuario</option>
                  <option value="1">Administrador</option>
                  <option value="2">Cliente</option>
                </select>
                <label>Tipo de usuario</label>
              </div>
              <h6 class="grey-text center">Sexo</h6>
              <form action="#"  autocomplete= 'off'>
                <p class="center">
                  <input name="group1" type="radio" id="test1" />
                  <label for="test1" class="black-text">Masculino</label>
                </p>
                <p class="center">
                  <input name="group1" type="radio" id="test2" />
                  <label for="test2" class="black-text">Femenino</label>
                </p>              
            </div>
          </div>
          <div class="blue-grey lighten-2 modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat black white-text">Aceptar</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat black white-text">Cancelar</a>
          </div>
        </div>
        <footer class="footersizess page-footer grey darken-1">
            <div class="container">
              <div class="row">
                <div class="col l6 s12">
                  <h5 class="white-text">NetBook Administrador</h 5>
                    <p class="grey-text text-lighten-4">Sistema web desarrollado por Amisoft</p>
                </div>
                <div class="col l4 offset-l2 s12">
                  <h4 class="white-text">Contactanos</h5>
          
                    <ul>
                      <h5 class="white-text">Correo electronicos</h5>
                      <li>
                        <a class="grey-text text-lighten-3"></a>Amijose22@hotmail.com</li>
                      <li>
                        <a class="grey-text text-lighten-3"></a>Kamehamexa@gmail.com</li>
                    </ul>
                    <ul>
                      <h5 class="white-text">Telefonos:</h5>
                      <li>
                        <a class="grey-text text-lighten-3"></a>2239-0419</li>
                      <li>
                        <a class="grey-text text-lighten-3"></a>7596-5964</li>
                    </ul>
                </div>
              </div>
            </div>
            <div class="footer-copyright">
              <div class="container">
                © 2018 Copyright Text
              </div>
            </div>
        </footer>
          
        <!-- importando los javascript -->
          <!--Import jQuery before materialize.js-->          
          <script type="text/javascript" src="../../web/js/mains.js"></script>
          <script type="text/javascript" src="../../web/js/materialize.min.js"></script>
        </body>
        <!-- dandole formato al footer  -->
        
        </html>
		');
	}
}
?>

