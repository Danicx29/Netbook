    <!-- agregando campos para recepcion de datos -->
    <h1 class="center TypeFontss white-text">Tipo usuarios</h1>
    <div>
      <!-- Page Content goes here -->
      <div class="container">
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="row">
              <div class="col s12 m12 l12">
                <div class="card blue-grey darken-1">
                  <div class="card-content white-text">
                    
                    <div class="center"><span class="card-title center">Tabla de tipo usuarios
                    <a href='usuarios.php' class='left  waves-effect black-text tooltipped ' data-tooltip='Atras'><i class='material-icons'>cancel</i></a>
                    <a href="create_tipousu.php" class="btn waves-effect black tooltipped modal-trigger btn-floating btn-small" data-tooltip='Agregar tipo de usuario'><i class="material-icons">add</i></a> 
                    </span>
                    <form method='post' enctype='multipart/form-data'>
                        <div class='input-field col s12 m8 l8 center'>
                            <i class='material-icons prefix'>search</i>
                            <input id='buscar' type='text' name='busqueda'/>
                            <label for='buscar'>Buscador usuario</label>
                        </div>
                        <div class='input-field col s6 m4'>
                            <button type='submit' name='buscar' class='btn waves-effect black tooltipped' data-tooltip='Buscar por nombre'><i class='material-icons'>check_circle</i></button>
                        </div>
                    </form>       
                    </div>
                    <table class="bordered highlight centered responsive-table">
                      <thead>
                        <tr>
                          <th>Permisos</th>                        
                          <th>Operaciones</th>
                        </tr>
                      </thead>

                      <tbody>
                        <?php
                        foreach($data  as $row){
                          print("
                            <tr>
                                <td>$row[nombre]</td>     
                                <td>
                                <a href='update_Tipousu.php?id=$row[id_tipousu]' class='btn-floating btn-large modal-trigger waves-effect waves-light black'>
                                <i class='material-icons'>mode_edit</i>
                              </a>
                              <a href='#Eliminar$row[id_tipousu]' class='btn-floating btn-large modal-trigger waves-effect waves-light black'>
                                <i class='material-icons'>delete</i>
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
    <div class="col s12 m12">
    <ul class="pagination">
    <?php
        //seleccionar todo de la tabla usuarios
        $resultado=$object->getUsTipouarios();

        //Contar el total de registros
        $total_registros = count($resultado);

        //usando ceil para dividir el total de registros entre $por_pagina este ultimo es de 5
        $total_paginas = ceil($total_registros / $por_pagina);

        //link a primera pagina
        if($anterior = $_GET['pagina']){
          print("<center><li class='waves-effect waves-light '><a href='Tipo_usuarios.php?pagina=1'>".'Primera '."</a></li>");
          print("<center><li class='waves-effect waves-light '><a href='Tipo_usuarios.php?pagina=1'><i class='material-icons'>chevron_left</i></a></li>");   
        }else{
          print("<center><li class='waves-effect waves-light '><a href='Tipo_usuarios.php?pagina=1'>".'Primera '."</a></li>");
          print("<center><li class='waves-effect waves-light '><a href='Tipo_usuarios.php?pagina=".$anterior."'><i class='material-icons'>chevron_left</i></a></li>");
        }
      

        $anterior=($_GET['pagina']-1);
        $despues=($_GET['pagina']+1);
        for ($i=1; $i<=$total_paginas; $i++) {      
        print("<li class='waves-effect waves-light '><a href='Tipo_usuarios.php?pagina=".$i."'>".$i."</a></li>");
        };
        // link a la ultima pagina
        if($despues = $total_paginas){
          print("<li class='waves-effect waves-light '><a href='Tipo_usuarios.php?pagina=".$total_paginas."'><i class='material-icons'>chevron_right</i></a></li></center>");
          print("<li class='waves-effect waves-light '><a href='Tipo_usuarios.php?pagina=$total_paginas'>".' Última'."</a></li></center>");
        }else{
          print("<li class='waves-effect waves-light '><a href='Tipo_usuarios.php?pagina=".$despues."'><i class='material-icons'>chevron_right</i></a></li></center>");
          print("<li class='waves-effect waves-light '><a href='Tipo_usuarios.php?pagina=$total_paginas'>".' Última'."</a></li></center>");
        }

    ?>
    </ul>
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
    foreach($data  as $row){
    print("
    <!--modal de eliminar -->  
    <div id='Eliminar$row[id_tipousu]' class='modal'>
          <div class='modal-content blue-grey lighten-4'>
            <h4>¿Desea eliminar el tipo usuario '$row[nombre]'? </h4> 
            <form  method='post'enctype='multipart/form-data' >          
                  <div class='input-field col s1 m1 hide'>
                    <input id='idusudel' type='text' name='idusudel' value='$row[id_tipousu]' />
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
    