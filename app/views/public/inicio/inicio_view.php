<main class=''>
    <!--Slider promocinal-->
    <div class='slider black '>
        <ul class='slides '>
            <li>
                <img src='../../web/img/slider1.jpg'>
                <!-- random image -->
                <div class='caption center-align'>
                    <h3>This is our big Tagline!</h3>
                    <h5 class='light grey-text text-lighten-3'>Here's our small slogan.</h5>
                </div>
            </li>
            <li>
                <img src='../../web/img/slider2.jpg'>
                <!-- random image -->
                <div class='caption left-align'>
                    <h3>Left Aligned Caption</h3>
                    <h5 class='light grey-text text-lighten-3'>Here's our small slogan.</h5>
                </div>
            </li>
            <li>
                <img src='../../web/img/slider3.jpg'>
                <!-- random image -->
                <div class='caption right-align'>
                    <h3>Right Aligned Caption</h3>
                    <h5 class='light grey-text text-lighten-3'>Here's our small slogan.</h5>
                </div>
            </li>
            <li>
                <img src='../../web/img/slider4.jpg'>
                <!-- random image -->
                <div class='caption center-align'>
                    <h3>This is our big Tagline!</h3>
                    <h5 class='light grey-text text-lighten-3'>Here's our small slogan.</h5>
                </div>
            </li>
        </ul>
    </div>
     <?php
     if ($lista_tienda) {
         print("
            <div class='row grey darken-4'>
                <div class='row'>
                    <!--Lista -->
                    <div class='col s12 m12 l12'>
                        <div class=' reparador left-align '>
                            <h5 class='light grey-text text-lighten-3'>Mi libros.</h5>
                        </div>
                        <div class='row libros-margin'>
                            <div class='  col s1 m1 l1  '>
                                <div id='next_lista' class='  waves-effect hoverable flechas'>
                                    <img class=' flecha' src='../../web/img/arrow_left.png' alt=''>
                                </div>
                            </div>
                            <div class='col s10 m10 l10'>
                                <div class='carousel' id='carousel_lista'>
                                    
         ");
        foreach($Listas as $Lista){
            print("
                        <a class='carousel-item waves-effect waves-light modal-trigger' href='#modal$Lista[id_libro]'>
                            <img height='180px' src='../../web/img/libros/$Lista[foto]'>
                        </a>
            ");
            }        
         print("
                                </div>
                            </div>
                            <div class='col s1 m1 l1  '>
                                <div id='previous_lista' class='  waves-effect hoverable flechas'>
                                    <img class=' flecha' src='../../web/img/arrow_right.png' alt=''>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row grey darken-4 '>
                    <div class='col s12 m12 l12 center-align'>
                        <ul class='  collapsible popout' data-collapsible='accordion'>
                            <li class=''>
                                <div class=' grey darken-4 collapsible '>
                                    <div class='col s12 m12 l12 center-align'>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
         ");

     }
     else {
         # code...
     }                       
    ?>


    <?php
        foreach($Generos as $Genero){
                print("
    <div class='row grey darken-4'>
        <div class='row'>
            <!--Lista -->
            <div class='col s12 m12 l12'>
                <div class=' reparador left-align '>
                    <h5 class='light grey-text text-lighten-3'>$Genero[nombre_genero]</h5>
                </div>
                <div class='row libros-margin'>
                    <div class='  col s1 m1 l1  '>
                        <div id='next_$Genero[id_genero]' class='  waves-effect hoverable flechas'>
                            <img class=' flecha' src='../../web/img/arrow_left.png' alt=''>
                        </div>
                    </div>
                <div class='col s10 m10 l10'>
                        <div class='carousel' id='carousel_$Genero[id_genero]'>
                ");
                foreach($Libros as $book){
                    if("$Genero[nombre_genero]" == "$book[nombre_genero]" ){print("
                            <a class='carousel-item waves-effect waves-light modal-trigger' href='#modal$book[id_libro]'>
                                <img height='180px' src='../../web/img/libros/$book[foto]'>
                            </a>
                        ");
                    }
                }
                print("
                        </div>
                    </div>
                <div class='col s1 m1 l1  '>
                        <div id='previous_$Genero[id_genero]' class='  waves-effect hoverable flechas'>
                            <img class=' flecha' src='../../web/img/arrow_right.png' alt=''>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='row grey darken-4 '>
            <div class=' grey darken-4 collapsible-header '>      
            </div>
        </div>
    </div>                
                ");
        }
    ?>
        <?php
        foreach($Libros as $inicio){
            print("
            <!-- Modal Structure -->
            <div id='modal$inicio[id_libro]' class=' grey darken-4 modal bottom-sheet'>
                <div class='modal-content'>
                    <ul id='tabs-swipe-demo' class=' grey darken-4 tabs'>
                        <li class='tab col s3 '>
                            <a class='active white-text' href='#test-swipe-1_$inicio[id_libro]'>Informacion</a>
                        </li>
                        <li class='tab col s3 '>
                            <a class='white-text ' href='#test-swipe-3_$inicio[id_libro]'>Comentarios</a>
                        </li>
                    </ul>
                    <div id='test-swipe-1_$inicio[id_libro]' class=' col s12 '>
                        <div class='row'>
                            <div class='col s12 m3 l3'>
                                <h5 class=' cyan-text text-lighten-4'>
                                $inicio[nombre_libro]
                                </h5>
                                <img class='materialboxed responsive-img' width='160px' src='../../web/img/libros/$inicio[foto]'>
                            </div>
                            <div class='col s12 m3 l3'>
                                <h5 class='white-text'>Informacion:</h5>
                                <h6 class='grey-text'>
                                $inicio[descripcion_libro]
                                </h6>
                                <h5 class='white-text'>Valoracion media:</h5>
                                <h6 class='grey-text'>
                                $inicio[Valoracion]
                                </h6>
                                ");
                                    foreach($Listas as $Lista){
                                    if("$inicio[id_libro]" == "$Lista[id_libro]" ){
                                        print("
                                        <form method='post'  autocomplete= 'off' class='col s12'>
                                            <div class='row'>
        
                                                <div class='hide'>
                                                    <input id='libro' name='libro' value='$inicio[id_libro]' type='text' class='white-text validate '>
                                                </div>
                                                <div class='input-field'>
                                                    <i class='material-icons white-text prefix'>assistant</i>
                                                    <input  id='valor' type='number' name='valor' class='validate white-text' max='5' min='0.1' step='any'  required/>
                                                    <label for='valor'>Su Valoracion</label>
                                                </div>
                                                <button class=' blue btn waves-effect waves-light' id='valorar' type='submit' name='valorar'>
                                                     <i class='material-icons'>send</i>
                                                </button>
                                            </div>
                                         </form>
                                        ");
                                        }
                                    }

                                 print("
                            </div>
                            <div class='col s12 m3 l3'>
                                <h5 class='white-text'>Escrito:</h5>
                                <h6 class='grey-text'> $inicio[nombre_autor]</h6>
                                <h6 class='white-text'>Numero de paginas:</h6>
                                <h6 class='grey-text'>$inicio[numeroPag_libro]</h6>
                                <h6 class='white-text'>Precio Libro:</h6>
                                <h6 class='grey-text'>$inicio[precio_libro]</h6>
                            </div>
                            <div class='col s12 m3 l3'>  ");
                            if($lista_pago ){
                                $comprar = 0;
                                   foreach($Listas as $Lista){
                                    if("$inicio[id_libro]" == "$Lista[id_libro]" ){
                                        print("
                                          <a href='$Lista[link]' class='btn  btn-large pulse '>
                                                <i class='material-icons'>arrow_downward</i>
                                            </a>
                                             <h6 class='white-text'>Descargar</h6>
                                        ");
                                        $comprar = +1;
                                    }
                                }
                                if( $comprar == 0){
                                    print("
                                        <form method='post'  autocomplete= 'off' class='col s12'>
                                            <div class='row'>
                                                <div class='hide'>
                                                    <input id='libro' name='libro' value='$inicio[id_libro]' type='text' class='white-text validate '>
                                                    <input id='precio' name='precio' value='$inicio[precio_libro]' type='text' class='white-text validate '>
                                                </div>
                                                <button class='btn  btn-large pulse'  id='pagar' type='submit' name='pagar'>
                                                    <i class='material-icons'>add_shopping_cart</i>
                                                </button>
                                                <h6 class='white-text'>Comprar libro</h6>
                                            </div>
                                        </form>
                                    ");
                                }
                            }else{
                                print("
                                    <a class='btn disabled btn-large pulse '>
                                        <i class='material-icons'>add_shopping_cart</i>
                                    </a>
                                    <h6 class='white-text'>Comprar libro</h6>
                                ");
                            }  
                            

                            print("
                            </div>
                        </div>
                    </div>
                    <div id='test-swipe-3_$inicio[id_libro]' class='col s12'>
                        <div class='row'>
                            <div class='col s12'>
                                <ul class='collection'>
                                ");
                                $comentarios = 0;
                                foreach($Comentarios as $Comentario){
                                    if("$inicio[id_libro]" == "$Comentario[id_libro]" ){
                                        print("
                                        <li class=' grey darken-4 collection-item avatar'>
                                            <img src='../../web/img/Usuarios/$Comentario[foto_usuario]' alt='' class='circle'>
                                            <span class='white-text title'>$Comentario[nickname]</span>
                                            <p class='grey-text'>$Comentario[comentario_resena]</p>
                                        </li>
                                        ");
                                        $comentarios = +1;
                                    }
                                }
                                if( $comentarios == 0){
                                    print("
                                        <li class=' grey darken-4 collection-item avatar'>
                                            <span class='white-text title'>Sin Comentarios</span>
                                            <p class='grey-text'>Se el primero en comentar sobre este libro.</p>
                                        </li>
                                    ");
                                }
                                print("
                                </ul>
                            </div>
                            <form method='post'  autocomplete= 'off' class='col s12'>
                                <div class='row'>
                                    <div class=' white-text input-field col s10'>
                                        <i class='material-icons prefix white-text'>message </i>
                                        <input id='comentario' name='comentario' type='text' class='white-text validate'>
                                        <label class='white-text' for='Comentario'>Comentario</label>
                                        <input id='libro' name='libro' value='$inicio[id_libro]' type='text' class='white-text validate hide'>
                                        <input id='usuario' name='usuario' value='$id_usuario' type='text' class='white-text validate hide'>
                                    </div>
                                    <div class='col s2'>
                                        <button class=' blue btn waves-effect waves-light' id='comentar' type='submit' name='comentar'>
                                          <i class='material-icons'>send</i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            ");
     }
    ?>
</main>

<!-- Modal Structure -->
<div id='modal_objetivos' class='modal'>
    <div class='modal-content'>
        <h4>Obejtivos</h4>
        <p>Ser una plataforma que fomente un habito de lectura con accesibilidad a la información de manera fácil, cómoda, rápida
            para el uso de los clientes por una precio justo.
            <br> Expandir los servicios a nivel mundial sin importar el idioma, grupo social, sexo, religión o ideología con
            acceso a la libertad de expresión sin censura para de los autores.
            <br> Ser una comunidad que ayude el crecimiento con nuevos escritores y pequenos editoriales para expandir y fomentar
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
        instance.updateTabIndicator();

        ");
    }                            
?>
</script>

</body>

</html>