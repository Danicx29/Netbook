<main class=''>
<div class='row'>

<h4 class='light-blue-text text-accent-1 center-align'>Autores disponibles </h4>
    <?php
        foreach($Autores as $Autor){
                print("
                    <div class='col s12 m4 l4'>
                        <div class='card horizontal blue-grey darken-4'>
                            <div class='card-image'>
                                <img src='../../web/img/autores/$Autor[foto_autor]'>
                            </div>
                            <div class='card-stacked'>
                                <div class='card-content'>
                                <p class='white-text'>$Autor[nombre_autor]</p>
                                </div>
                                <div class='card-action  blue-grey darken-3'>
                                <a  class=' light-blue-text text-accent-1' href='libros_autores.php?id=$Autor[id_autor]'>Ver libros</a>
                                </div>
                            </div>
                        </div>
                     </div>
                ");
        }
    ?>
</div>
</main>

<!-- Modal Structure -->
<div id='modal_objetivos' class='modal'>
    <div class='modal-content'>
        <h4>Obejtivos</h4>
        <p>Ser una plataforma que fomente un habito de lectura con accesibilidad a la información de manera fácil, cómoda, rápida
            para el uso de los clientes por una precio justo.
            <br> Expandir los servicios a nivel mundial sin importar el idioma, grupo social, sexo, religión o ideología con
            acceso a la libertad de expresión sin censura para de los autores.
            <br> Ser una comunidad que ayude el crecimiento con nuevos escritores y pequeños editoriales para expandir y fomentar
            la lectura
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
        <p>Innovar en el sector editorial implementando un sistema de negocios streaming online de pago por mensualidades ofreciendo
            libros de calidad para leer o escuchar, de la manera mas fácil y eficiente.
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
        <p>Ser la empresa líder de contenido editorial contando con un amplio numero de títulos, creando a su misma vez contenido
            propio, de esta forma ser la preferencia por excelencia de muchas personas </p>
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
<script type='text/javascript' src='../../web/js/jquery-3.2.1.min.js'></script>
<script type='text/javascript' src='../../web/js/main.js'></script>
<script type='text/javascript' src='../../web/js/materialize.min.js'></script>
<script type='text/javascript'>  
<?php
foreach($Generos as $Genero){
        print("
        $('.carousel').carousel({ fullWidth: true, padding: 50, noWrap: true });
        $('#next_$Genero[id_genero]').click(function () {
            $('#carousel_$Genero[id_genero]').carousel('next');
        });
        $('#previous_$Genero[id_genero]').click(function () {
            $('#carousel_$Genero[id_genero]').carousel('prev');
        });

        ");
    }                            
?>
</script>

</body>

</html>