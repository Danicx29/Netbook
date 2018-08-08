    <!-- agregando campos para recepcion de datos -->
    <h1 class="center TypeFontss white-text">Usuarios</h1>
    <div>
      <!-- Page Content goes here -->
      <div class="container">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="row">
              <div class="col s12 m12 l12">
                <div class="card blue-grey darken-1">
                  <div class="card-content white-text">
                    
                    <div class="center"><span class="card-title center">Tabla de usuarios
                    <a href="create.php" class="modal-trigger btn-floating btn-small waves-effect waves-light black">
                    <i class="material-icons">add</i>
                  </a>            
                    </span>
                    <form method='post' enctype='multipart/form-data'>
                        <div class='input-field col s12 m8 l8 center'>
                            <i class='material-icons prefix'>search</i>
                            <input id='buscar' type='text' name='busqueda'/>
                            <label for='buscar'>Buscador usuario</label>
                        </div>
                        <div class='input-field col s6 m4'>
                            <button type='submit' name='buscar' class='btn waves-effect green tooltipped' data-tooltip='Buscar por nombre'><i class='material-icons'>check_circle</i></button>
                        </div>
                    </form>       
                    </div>
                    <table class="bordered highlight centered responsive-table">
                      <thead>
                        <tr>
                          <th>Foto</th>
                          <th>Nombre Usuario</th>
                          <th>Nombre</th>
                          <th>Apellido</th>
                          <th>Correo Electronico</th>                          
                          <th>Tipo de usuario</th>                          
                          <th>Operaciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        foreach($Listas  as $lista_usuario){
                          $rutaxs=null;                          
                          if($lista_usuario['foto_usuario']==null){
                            $rutaxs="<td><img src='../../web/img/usuarios/user-profile.png' class='responsive-img circle' width='100' height='100'></td>";
                          }
                          else{
                            $rutaxs="<td><img src='../../web/img/usuarios/$lista_usuario[foto_usuario]' class='responsive-img circle' width='100' height='100'></td>";                            
                          }
                          print("
                            <tr>
                                $rutaxs
                                <td>$lista_usuario[nickname]</td>
                                <td>$lista_usuario[nombre_usuario]</td>
                                <td>$lista_usuario[apellidos_usuario]</td>
                                <td>$lista_usuario[correo_usuario]</td>
                                <td>$lista_usuario[nombre]</td>       
                                <td>
                                <a href='update.php?id=$lista_usuario[id_usuario]' class='btn-floating btn-large modal-trigger waves-effect waves-light black'>
                                <i class='material-icons'>mode_edit</i>
                              </a>
                              <a href='#Eliminar$lista_usuario[id_usuario]' class='btn-floating btn-large modal-trigger waves-effect waves-light black'>
                                <i class='material-icons'>delete</i>
                              </a>
                              <a href='ventas_usuario.php?codigo_U=$lista_usuario[id_usuario]' class='btn-floating btn-large modal-trigger waves-effect waves-light black'>
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
                  <div class="card-action">
                  </div>
                </div>
              </div>
            </div>

          </div>
          
        </div>
      </div>
    </div>
    <!--modal de agregar -->
    <div id="modal1" class="modal">
      <div class="modal-content blue-grey lighten-4">
        
      </div>
      <div class="blue-grey lighten-2 modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat black white-text">Aceptar</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat black white-text">Cancelar</a>
      </div>
    </div>
    
    <!--modal de eliminar -->
    <div id="Eliminar" class="modal">
      <div class="modal-content blue-grey lighten-4">
        <h4>¿Desea eliminar este libro?</h4>
        <p>¿Esta seguro que quiere eliminar este libro? si lo elimina se perdera toda la informacion de este.</p>
      </div>
      <div class="blue-grey lighten-2 modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat black white-text">Si</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat black white-text">No</a>
      </div>
    </div>
    <?php
    foreach($Listas  as $lista_usuario){
    print("
    <!--modal de editar -->
    
    
    <div id='Eliminar$lista_usuario[id_usuario]' class='modal'>
          <div class='modal-content blue-grey lighten-4'>
            <h4>¿Desea eliminar el usuario '$lista_usuario[nombre_usuario]'? </h4> 
            <form  method='post'enctype='multipart/form-data' >          
                  <div class='input-field col s1 m1 hide'>
                    <input id='idusudel' type='text' name='idusudel' value='$lista_usuario[id_usuario]' />
                    </div>
          </div>                           
          <div class='blue-grey lighten-2 modal-footer'>
            <button type='submit' id='btn_eliminar' name='btn_eliminar' href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</button>
            <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Cancelar</a>
          </div>
          </form>  
    </div>
    ");
  }
?>