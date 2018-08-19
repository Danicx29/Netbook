
<main class="black">
    <div class=" contenedor1 " >
        <div class="row ">
            <div class="grey darken-4 col s3 m3 l3 usar-todo ">
                <ul class=" grey darken-4   ">
                    <li>
                        <div class="usar-foto ">
                            <div class="row center-align">
                            <?php
                            $rutaxs=null;                          
                            if($_SESSION['foto_usuario_public']==null){
                              $rutaxs="<img class='circle foto-circular' src='../../web/img/usuarios/user-profile.png'>";
                            }
                            else{
                              $rutaxs="<img class='circle foto-circular' src='../../web/img/usuarios/$_SESSION[foto_usuario_public]'>";                            
                            }
                            print("
                            $rutaxs
                            <h5 class='white-text flow-text'>Mi perfil $_SESSION[nickname_public]</h5>
                            ");
                            ?>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a  id="perfil_inicio">
                            <div class=" grey-text grey darken-4 collapsible-header waves-effect waves-light ">
                                <i class="white-text material-icons">home</i>
                                <h6 class="hide-on-small-only">Panel principal</h6>
                            </div>
                        </a>

                    </li>
                    <li>
                        <a id="perfil_editar">
                            <div class=" grey-text grey darken-4 collapsible-header waves-effect waves-light ">
                                <i class="white-text  material-icons">create</i>
                                <h6 class="hide-on-small-only">Editar perfil</h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a id="perfil_clave">
                            <div class=" grey-text grey darken-4 collapsible-header waves-effect waves-light ">
                                <i class="white-text  material-icons">https</i>
                                <h6 class="hide-on-small-only">Cambiar contraseña</h6>
                            </div>
                        </a>

                    </li>
                    <li>
                        <a  id="perfil_pago">
                            <div class=" grey-text grey darken-4 collapsible-header waves-effect waves-light ">
                                <i class="white-text  material-icons">credit_card</i>
                                <h6 class="hide-on-small-only">Metodo de pago</h6>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a id="perfil_historial">
                            <div class=" grey-text grey darken-4 collapsible-header waves-effect waves-light ">
                                <i class="white-text  material-icons">history</i>
                                <h6 class="hide-on-small-only">Historial de compras</h6>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="grey lighten-3 col s9 m9 l9 usar-todo">
                <div class="row">
                    <div class="col s12 ">
                        <ul class="tabs hide">
                            <li class="tab col "><a href="#panel1">perfil_inicio</a></li>
                            <li class="tab col "><a href="#panel2">perfil_editar</a></li>
                            <li class="tab col "><a href="#panel3">perfil_clave</a></li>
                            <li class="tab col "><a href="#panel4">perfil_pago</a></li>
                            <li class="tab col "><a href="#panel5">perfil_historial</a></li>
                        </ul>
                    </div>
                    <div id="panel1" class="col s12">
                        <div class="row" >
                            <h4 class="flow-text black-text center-align">
                                <b>Vista general de la cuenta </b>
                            </h4>
                            <div class="col s12 m6 l6 ">
                                <div class="card-panel hoverable">
                                    <h5 class=" blue-text center-align">Informacion de perfil</h5>
                                    <br>
                                    <h6 >
                                        <b>Nombre de usuario:</b>
                                    </h6>
                                    <h6 id="nombre_usuario" name="nombre_usuario" > <?php print($object->getNombres())?> </h6>
                                    <h6 class="">
                                        <b>Email:</b>
                                    </h6>
                                    <h6 id="correo_usuario" name="correo_usuario"> <?php print($object->getCorreo_usuario()) ?> </h6>
                                    <div class="center-align  ">
                                        <a  class=" black waves-effect waves-light btn">Editar informacion</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l6 ">
                                <div class="card-panel hoverable">
                                    <h5 class=" blue-text center-align">Formas de pago</h5>
                                    <?php
                                        if (empty($obtener_pagos['id_cuenta'])) {
                                            foreach($Pago as $obtener_pagos){
                                                print("
                                                <h6 >
                                                    <b>Pago:</b>
                                                </h6>
                                                <h6 class='grey-text'>Visa ****$obtener_pagos[numeroTarj_cuenta]
                                                    <br> Vencimiento: $obtener_pagos[fechaVen_cuenta]</h6>
                                                <br>
                                            "); 
                                            }  
                                        }
                                        else {
                                            print("
                                            <h6 >
                                                <b>Pagos:</b>
                                            </h6>
                                            <h6 class='grey-text'>Para obtener comprar se necesita agregar una tarjeta
                                                <br> para los pagos en linea</h6>
                                            <br>
                                        ");  
                                        }                       
                                    ?>
                                    
                                    <div class="center-align ">
                                        <a  id="perfil_pago_2" class=" black waves-effect waves-light btn">Agregar o eliminar</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m12 l12 ">
                                <div class="card-panel hoverable">
                                    <h5 class=" blue-text center-align">Historiar de compras</h5>
                                    <h6 class="flow-text">Registros de libros comprado y su fecha </h6>
                                    <div class="center-align ">
                                        <a class=" black waves-effect waves-light btn">Ver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="panel2" class="col s12">
                        <div class="row">
                            <h4 class="flow-text black-text center-align">
                                <b>Edicion de perfil </b>
                            </h4>
                            <div class="col s12 m12 l12 ">
                                <div class="card-panel hoverable">
                                    <h5 class=" blue-text center-align">Perfil</h5>
                                    <form enctype="multipart/form-data" autocomplete= 'off'> method='post'>
                                        <!-- Page Content goes here -->
                                        <div class="row">
                                            <!--agregando camposs -->
                                            <!--agregando camposs -->
                                            <div class="input-field col s12 m6 l6">
                                                <input id="nombre" name="nombre" type="text" class="validate black-text center" value='<?php print($object->getNombres()) ?>'>
                                                <label for="nombre">Nombre</label>
                                            </div>
                                            <div class="input-field col s12 m6 l6">
                                                <input id="apellido" name="apellido" type="text" class="validate black-text center" value='<?php print($object->getApellidos_usuario()) ?>'>
                                                <label for="apellido">Apellido</label>
                                            </div>
                                            <div class="input-field col s12 m6 l6">
                                                <input id="email" name="email" type="email" class="validate" value='<?php print($object->getCorreo_usuario()) ?>'>
                                                <label for="email">Email</label>
                                            </div>
                                            <div class='file-field input-field col s12 m6'>
                                            <div class='btn waves-effect'>
                                                <span><i class='material-icons'>image</i></span>
                                                <input type='file' name='archivo'/>
                                            </div>
                                            <div class='file-path-wrapper'>
                                                <input class='file-path validate' type='text' placeholder='Seleccione una imagen'/>
                                            </div>
                                        </div>                                       
                                        </div>
                                        <div class="center-align ">
                                            <button type='submit' name='update' class=" black waves-effect waves-light btn">Guardar informacion</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="panel3" class="col s12">
                        <div class="row">
                            <h4 class="flow-text black-text center-align">
                                <b>Cambio de contraseña </b>
                            </h4>
                            <div class="col s12 m12 l12 ">
                                <div class="card-panel hoverable">
                                    <h5 class=" blue-text center-align">Datos</h5>
                                    <form method='post' enctype="multipart/form-data " autocomplete= 'off'> >
                                        <div class="input-field ">
                                            <i class="material-icons prefix">https</i>
                                            <input name="clave1" id="icon_prefix" type="password" class="validate">
                                            <label for="icon_prefix">Nueva contraseña:</label>
                                        </div>
                                        <div class="input-field ">
                                            <i class="material-icons prefix">https</i>
                                            <input name="clave2" id="icon_prefix" type="password" class="validate">
                                            <label for="icon_prefix">Confirmar contraseña:</label>
                                        </div>
                                    
                                    <div class="center-align ">
                                        <button name='actualizar_clave' class=" black waves-effect waves-light btn">Guardar informacion</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="panel4" class="col s12">
                        <div class="row">
                            <!--Forma de pago-->
                            <h4 class="flow-text black-text center-align">
                                <b>Metodos de pago</b>
                            </h4>
                            <div class="col s12 m12 l12 ">
                                <div class="card-panel hoverable">
                                    <div class="row">
                                        <h5 class=" blue-text center-align">Agregar metodo de pago</h5>
                                        <form  method='post' autocomplete= 'off' enctype="multipart/form-data">
                                            <div class="input-field ">
                                                <i class="black-text material-icons prefix">credit_card</i>
                                                <input class="black-text" name='Ncard' id="icon_prefix" type="text" class="validate">
                                                <label class="gray-text" for="icon_prefix">Numero de tarjeta</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <i class="black-text material-icons prefix">date_range</i>
                                                <input class="black-text" name='fecha' id="icon_telephone" type="tel" class="validate">
                                                <label class="gray-text" for="icon_telephone">Fecha ven</label>
                                            </div>
                                            <div class="input-field col s6">
                                                <i class="black-text material-icons prefix">fiber_pin</i>
                                                <input class="black-text" name='cvc' id="icon_telephone" type="tel" class="validate">
                                                <label class="gray-text" for="icon_telephone">cvc</label>
                                            </div>
                                            <div class=" black-text  center-align">
                                                    <button   type="submit" name='insertar_pago' class="black btn waves-effect waves-light" >Agregar
                                                        <i class=" material-icons right"></i>
                                                    </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-panel hoverable">
                                    <div class="row">
                                        <h5 class=" blue-text center-align">Tarjetas agregada</h5>
                                        <label class="gray-text" >Al comprar se utilizara el primer metodo de pago</label>
                                        <?php
                                        $pago = $object->getPagos();
                                                foreach($pago as $row){
                                                print("
                                                <div class='grey lighten-3 card '>
                                                    <div class='row center-align'>
                                                        <div class='col s2 m2 l2 left-align'>
                                                            <i class='medium   material-icons'>credit_card</i>
                                                        </div>
                                                        <div class='col s8 m8 l8 '>
                                                            <h5 class='grey-text text-darken-3'>$row[numeroTarj_cuenta]</h5>
                                                            <h6 class='grey-text text-darken-4 '>Vencimiento: $row[fechaVen_cuenta]</h6>
                                                        </div>
                                                        <div class='col s1 m1 l1 center-align'>
                                                            <form method='post' autocomplete= 'off'>
                                                              <input class='black-text hide' value=' $row[id_cuenta]' name='id_pago' type='text' class='validate '>
                                                                <button name='delete_pago' >
                                                                    <i class='red-text material-icons'>delete</i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                ");
                                                }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="panel5" class="col s12">
                        <div class="row">
                            <h4 class="flow-text black-text center-align">
                                <b>Historial de pedidos</b>
                            </h4>
                            <!--Historial de ventas-->
                            <div class="col s12 m12 l12 ">
                                <div class="card-panel hoverable">
                                    <h5 class=" blue-text center-align">Pedidos</h5>
                                    <table class="responsive-table striped">
                                        <thead>
                                            <tr>
                                                <th>Usuario</th>
                                                <th>Libro</th>
                                                <th>Precio</th>
                                                <th>Pago</th>
                                                <th>Codigo venta</th>
                                                <th>Factura</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php
                                        $ventax = $object->getventas($_SESSION['id_usuario_public']);
                                                foreach($ventax as $row){
                                                print("
                                                <tr>
                                                <td>$row[nickname]</td>
                                                <td>$row[nombre_libro]</td>
                                                <td>$row[precio_libro]</td>
                                                <td>$row[codigoUsa_cuenta]</td>
                                                <td>$row[codigoNum_venta]</td>
                                                <td>
                                                    <a href='factura.php?venta=$row[codigoNum_venta]' class='btn-floating btn-large modal-trigger waves-effect waves-light black'>
                                                        <i class='material-icons'>camera_rear</i>
                                                    </a>
                                                </td>

                                                
                                                </tr>              
                                                ");
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>