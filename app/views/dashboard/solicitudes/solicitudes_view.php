
    <!-- comienza las tablas -->
    <h1 class="center TypeFontss white-text">Solicitudes</h1>
    <div>
      <!-- contenedor -->
      <div class="container">
        <!-- Page Content goes here -->
        <div class="row">
          <!-- agregando card de pestañas -->
          <ul id="tabs-swipe-demo" class="tabs black ">            
            <li class="tab col s6">
              <a class="active white-text" href="#test-swipe-1">Pendientes</a>
            </li>
            <li class="tab col s6">
              <a class="white-text" href="#test-swipe-2">Rechazados</a>
            </li>            
          </ul>
          <div id="test-swipe-1" class="col s12 backgroundTabss">
            <div class="col s12 m12 l12" >
              <div class="row">
                <div class="col s12 m12 l12">
                  <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                      <!-- agregando tablas -->
                      <span class="card-title center">Tabla de solicitudes pendientes</span>
                      <form method='post' enctype='multipart/form-data' autocomplete= 'off'>
                        <div class='input-field col s12 m8 l8 center'>
                            <i class='material-icons prefix'>search</i>
                            <input id='buscar' type='text' name='busqueda'/>
                            <label for='buscar'>Buscador de solicitudes pendientes</label>
                        </div>
                        <div class='input-field col s6 m4'>
                            <button type='submit' name='buscar' class='btn waves-effect green tooltipped' data-tooltip='Buscar por nombre de libro'><i class='material-icons'>check_circle</i></button>
                        </div>
                    </form>

                      <table class="bordered highlight centered responsive-table">
                        <thead>
                          <tr>
                            <th>Usuario</th>
                            <th>Libro</th>
                            <th>Comentario</th>
                            <th>Estado</th>
                            <th>Aprovado</th>
                            <th>Rechazado</th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php                      
                        foreach( $resenapen as $row){
                          print("
                          <tr>
                            <td>$row[nickname]</td>
                            <td>$row[nombre_libro]</td>
                            <td>$row[comentario_resena]</td>
                            <td>$row[nom_estado]</td>                            
                            <td>                            
                            <a href='#Aceptado$row[id_resena]' class='btn-floating btn-large modal-trigger waves-effect waves-light green'>
                                <i class='material-icons'>check</i>                          
                              </a>                            
                            </td>
                            <td> 
                            <a href='#rechaza$row[id_resena]' class='btn-floating btn-large modal-trigger waves-effect waves-light red'>
                            <i class='material-icons '>clear</i>
                          </a>
                            </td>
                           </tr> 
                          ");
                        }
                      ?>
                        </tbody>
                      </table>
                      
                    </div>
                    
                    <div class="col s12 m12 ">
<ul class="pagination">
<?php
    //seleccionar todo de la tabla usuarios
    $resultado=$object->getresenasPen();

    //Contar el total de registros
    $total_registros = count($resultado);

    //usando ceil para dividir el total de registros entre $por_pagina este ultimo es de 5
    $total_paginas = ceil($total_registros / $por_pagina);

    //link a primera pagina
    if($anterior = $_GET['pagina']){
      print("<center><li class='waves-effect waves-light'><a href='solicitudes.php?pagina=1'>".'Primera '."</a></li>");
      print("<center><li class='waves-effect waves-light'><a href='solicitudes.php?pagina=1'><i class='material-icons'>chevron_left</i></a></li>");   
    }else{
      print("<center><li class='waves-effect waves-light'><a href='solicitudes.php?pagina=1'>".'Primera '."</a></li>");
      print("<center><li class='waves-effect waves-light'><a href='solicitudes.php?pagina=".$anterior."'><i class='material-icons'>chevron_left</i></a></li>");
    }
   

    $anterior=($_GET['pagina']-1);
    $despues=($_GET['pagina']+1);
    for ($i=1; $i<=$total_paginas; $i++) {      
    print("<li class='waves-effect waves-light'><a href='solicitudes.php?pagina=".$i."'>".$i."</a></li>");
    };
    // link a la ultima pagina
    if($despues = $total_paginas){
      print("<li class='waves-effect waves-light'><a href='solicitudes.php?pagina=".$total_paginas."'><i class='material-icons'>chevron_right</i></a></li></center>");
      print("<li class='waves-effect waves-light'><a href='solicitudes.php?pagina=$total_paginas'>".' Última'."</a></li></center>");
    }else{
      print("<li class='waves-effect waves-light'><a href='solicitudes.php?pagina=".$despues."'><i class='material-icons'>chevron_right</i></a></li></center>");
      print("<li class='waves-effect waves-light'><a href='solicitudes.php?pagina=$total_paginas'>".' Última'."</a></li></center>");
    }

?>
</ul>
</div>
                  </div>
                </div>
              </div>

            </div>

          </div>
          
          <!-- creando la otra pestaña de las tabs -->
          <div id="test-swipe-2" class="col s12 backgroundTabss">
            <div class="col s12 m12 l12">
              <div class="row">
                <div class="col s12 m12 l12">
                  <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                      <!-- creando tabla de editoriales -->
                      <span class="card-title center">Tabla de solicitudes rechazadas</span>
                      <form method='post' enctype='multipart/form-data' autocomplete= 'off'>
                      <div class='input-field col s12 m8 l8 center'>
                          <i class='material-icons prefix'>search</i>
                          <input id='buscarrech' type='text' name='busquedarech'/>
                          <label for='buscarrech'>Buscador de solicitudes rechazadas</label>
                      </div>
                      <div class='input-field col s6 m4'>
                          <button type='submit' name='buscarrech' class='btn waves-effect green tooltipped' data-tooltip='Buscar por nombre de usuario'><i class='material-icons'>check_circle</i></button>
                      </div>
                  </form>
                      <table class="bordered highlight centered responsive-table">
                        <thead>
                          <tr>
                          <th>Usuario</th>
                          <th>Libro</th>
                          <th>Comentario</th>
                          <th>Estado</th>
                          <th>Aprovado</th>
                          <th>Rechazado</th>
                          </tr>
                        </thead>                        
                        <tbody>
                        <?php                      
                        foreach( $resenarech as $row){
                          print("
                          <tr>
                            <td>$row[nickname]</td>
                            <td>$row[nombre_libro]</td>
                            <td>$row[comentario_resena]</td>
                            <td>$row[nom_estado]</td>                            
                            <td>                            
                            <a href='#resta$row[id_resena]' class='btn-floating btn-large modal-trigger waves-effect waves-light green'>
                                <i class='material-icons'>check</i>                          
                              </a>                            
                            </td>
                            <td> 
                            <a href='#Eliminar$row[id_resena]' class='btn-floating btn-large modal-trigger waves-effect waves-light red'>
                            <i class='material-icons '>clear</i>
                          </a>
                            </td>
                           </tr> 
                          ");
                        }
                      ?>
                                               </tbody>
                      </table>
                    </div>
                    <div class="card-action">
                    </div>
                  </div>
                </div>
              </div>

            </div>
 
  
      </div>
      </div>
    </div>
        </div>
      </div>
    </div>
    <?php
  foreach($resenapen as $row){
    print("
    <div id='Aceptado$row[id_resena]' class='modal'>
          <div class='modal-content blue-grey lighten-4'>
            <h4>¿Desea aceptar el comentario de '$row[nickname]'? </h4> 
            <form  method='post'enctype='multipart/form-data'  autocomplete= 'off'>          
                  <div class='input-field col s1 m1 hide'>
                    <input id='idacep' type='text' name='idacep' value='$row[id_resena]' />
                    </div>
          </div>                           
          <div class='blue-grey lighten-2 modal-footer'>
            <button type='submit' id='btn_acepts' name='btn_acepts' href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</button>
            <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Cancelar</a>
          </div>
          </form>  
    </div>
    
    <div id='rechaza$row[id_resena]' class='modal'>
          <div class='modal-content blue-grey lighten-4'>
            <h4>¿Desea rechazar el comentario de '$row[nickname]'? </h4> 
            <form  method='post'enctype='multipart/form-data' autocomplete= 'off' >          
                  <div class='input-field col s1 m1 hide'>
                    <input id='idrecha' type='text' name='idrecha' value='$row[id_resena]' />
                    </div>
          </div>                           
          <div class='blue-grey lighten-2 modal-footer'>
            <button type='submit' id='btn_recha' name='btn_recha' href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</button>
            <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Cancelar</a>
          </div>
          </form>  
    </div>
    ");
  }
?>

<?php
  foreach($resenarech as $row){
    print("
    <div id='resta$row[id_resena]' class='modal'>
          <div class='modal-content blue-grey lighten-4'>
            <h4>¿Desea restaurar como pendiente el comentario de '$row[nickname]'? </h4> 
            <form  method='post'enctype='multipart/form-data'  autocomplete= 'off'>          
                  <div class='input-field col s1 m1 hide'>
                    <input id='idresta' type='text' name='idresta' value='$row[id_resena]' />
                    </div>
          </div>                           
          <div class='blue-grey lighten-2 modal-footer'>
            <button type='submit' id='btn_resta' name='btn_resta' href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</button>
            <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Cancelar</a>
          </div>
          </form>  
    </div>
    
    <div id='Eliminar$row[id_resena]' class='modal'>
          <div class='modal-content blue-grey lighten-4'>
            <h4>¿Desea eliminar permanentemente el comentario de '$row[nickname]'? </h4> 
            <form  method='post'enctype='multipart/form-data' autocomplete= 'off' >          
                  <div class='input-field col s1 m1 hide'>
                    <input id='idelim' type='text' name='idelim' value='$row[id_resena]' />
                    </div>
          </div>                           
          <div class='blue-grey lighten-2 modal-footer'>
            <button type='submit' id='btn_elim' name='btn_elim' href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</button>
            <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Cancelar</a>
          </div>
          </form>  
    </div>
    ");
  }
?>
