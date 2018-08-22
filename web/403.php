<?php
	print("
        <!DOCTYPE html>
        <html lang='es'>
        
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta http-equiv='X-UA-Compatible' content='ie=edge'>
            <title>¡Acceso prohibido!</title>
            <link href='/netbook/web/img/Logo_prototipo.ico' rel='shortcut icon' type='image/x-icon'>
            <!--Import Google Icon Font-->
            <link href='/netbook/web/fonts/icon.css' rel='stylesheet'>
            <!--Import materialize.css-->
            <link type='text/css' rel='stylesheet' href='/netbook/web/css/materialize.min.css' media='screen,projection' />
            <link type='text/css' rel='stylesheet' href='/netbook/web/css/estilo.css' media='screen,projection' />
            <link type='text/css' rel='stylesheet' href='/netbook/web/css/fpdf.css'>
            <script type='text/javascript' /netbook/web/js/sweetalert.min.js'></script>
            <!--Let browser know website is optimized for mobile-->
            <meta name='viewport' content='width=device-width, initial-scale=1.0' />
        </head>
        
        <body height='700px'>
            <header>
                <nav>
                    <div class='grey darken-4 nav-wrapper'>
                        <a href='../inicio/inicio.php' class='brand-logo center '>
                            <img class='center' height='30px' src='/netbook/web/img/logo1.png' alt='NB'> Netbook</a>
                    </div>
                </nav>
            </header>
            <div class='center-align' >
            <h3>Error 403: Acceso prohibido</h3>
            <a href='/netbook/public/inicio/'><i class='medium material-icons'>restore_page</i></a>
            </div>
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
                    <img class='center' height='30px' src='/netbook/web/img/logo1.png' alt='NB'> Netbook</h4>
                <div class='container'>
                    <div class='col s6 m l4'>
                        <div class='row'>
                            <h5 class='white-text'> Redes sociales</h5>
                            <!--Redes sociales-->
                            <a href=''>
                                <img /netbook/web/img/facebook.png' alt='' class='responsive-img'>
                            </a>
                            <a href=''>
                                <img /netbook/web/img/youtube.png' alt='' class='responsive-img'>
                            </a>
                            <a href=''>
                                <img /netbook/web/img/twitter.png' alt='' class='responsive-img'>
                            </a>
                            <a href=''>
                                <img /netbook/web/img/google.png' alt='' class='responsive-img'>
                            </a>
                            <a href=''>
                                <img /netbook/web/img/whatsapp.png' alt='' class='responsive-img'>
                            </a>
                            <a href=''>
                                <img /netbook/web/img/skype.png' alt='' class='responsive-img'>
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
        <script type='text/javascript' href='/netbook/web/js/jquery.min.js'></script>
        <script type='text/javascript' href='/netbook/web/js/main.js'></script>
        <script type='text/javascript' href='/netbook/web/js/materialize.min.js'></script>
    </body>
    </html>
    ");
?>