    <!-- comienza las tablas -->
    <h1 class="center TypeFontss white-text">Autores y Editoriales</h1>
    <div>
      <!-- contenedor -->
      <div class="container">
        <!-- Page Content goes here -->
        <div class="row">
          <!-- agregando card de pestañas -->
          <ul id="tabs-swipe-demo" class="tabs black ">            
            <li class="tab col s6">
              <a class="active white-text" href="#test-swipe-1">Autores</a>
            </li>
            <li class="tab col s6">
              <a class="white-text" href="#test-swipe-2">Editoriales</a>
            </li>            
          </ul>
          <div id="test-swipe-1" class="col s12 backgroundTabss">
            <div class="col s12 m12 l12">
              <div class="row">
                <div class="col s12 m12 l12">
                  <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                      <!-- agregando tablas -->
                      <span class="card-title center">Tabla de autores
                      <a href="#ModalAgregarautor" class="modal-trigger btn-floating btn-small waves-effect waves-light black">
                      <i class="material-icons">add</i>
                    </a>
                      </span>
                      <form method='post' enctype='multipart/form-data'>
                        <div class='input-field col s12 m8 l8 center'>
                            <i class='material-icons prefix'>search</i>
                            <input id='buscar' type='text' name='busqueda'/>
                            <label for='buscar'>Buscador autores</label>
                        </div>
                        <div class='input-field col s6 m4'>
                            <button type='submit' name='buscar' class='btn waves-effect black tooltipped' data-tooltip='Buscar por nombre o apellido'><i class='material-icons'>check_circle</i></button>
                            <a class='btn waves-effect black tooltipped modal-trigger' href='#grafico' data-tooltip='Ventas de los autores'><i class='material-icons'>assessment</i></a>
                        </div>
                    </form>

                      <table class="bordered highlight centered responsive-table">
                        <thead>
                          <tr>
                            <th>Foto</th>
                            <th>Nombre de autor</th>
                            <th>Sexo</th>
                            <th>Operaciones</th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php
                        foreach($data as $row){
                          print("
                          <tr>
                          <td><img src='../../web/img/autores/$row[foto_autor]' class='responsive-img circle' width='100' height='100'></td>
                            <td>$row[nombre_autor]</td>
                            <td>$row[nom_sex]</td>
                            <td> 
                              <a href='#autoredit$row[id_autor]' class='btn-floating btn-large modal-trigger waves-effect waves-light black'>
                                <i class='material-icons'>mode_edit</i>
                              </a>
                            
                              <a href='#Eliminaraut$row[id_autor]' class='btn-floating btn-large modal-trigger waves-effect waves-light black'>
                                <i class='material-icons'>delete</i>
                              </a>
                              <a href='reporte_autores.php?autor=$row[id_autor]' class='btn-floating btn-large modal-trigger waves-effect waves-light black'>
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
          <?php
  foreach($data as $row){
    print("
    <!--modal de editar -->
    <div id='autoredit$row[id_autor]' class='modal'>
          <div class='modal-content blue-grey lighten-4'>
            <h4>Modificar la editorial '$row[nombre_autor]' </h4>
            <form  method='post'enctype='multipart/form-data' >
                        
            <div class='row'>

            <div class='input-field col s12 m12'>
            <input id='modifauto' name='modifauto' type='text' class='validate center' value='$row[nombre_autor]'>
            <label for='last_name'>Nombre de Autor</label>
          </div>              
           
          <div class='input-field col s1 m1 hide'>
          <input id='ideditaut' type='text' name='ideditaut' value='$row[id_autor]' />
          </div>
          <div class='col s12 m12'> 
          ");
          Page::showSelect("Sexo", "sexo_update", $object->getsexo_autor(), $object->getSexoautores());
      
          print("
          </div>
          <div class='file-field input-field col s12 m12'>
            <div class='btn waves-effect'>
                <span><i class='material-icons'>image</i></span>
                <input type='file' name='archivo' required/>
            </div>
            <div class='file-path-wrapper'>
                <input type='text' class='file-path validate' placeholder='Seleccione una imagen'/>
            </div>
        </div>
          </div>   
                    
                      
          </div>
          <div class='blue-grey lighten-2 modal-footer'>
            <button type='submit' id='btn_updataut' name='btn_updataut' href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</button>
            <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Cancelar</a>
          </div>
          </form>
    </div>
    
    <div id='Eliminaraut$row[id_autor]' class='modal'>
          <div class='modal-content blue-grey lighten-4'>
            <h4>¿Desea eliminar este registro? </h4> 
            <form  method='post'enctype='multipart/form-data' >          
                  <div class='input-field col s1 m1 hide'>
                    <input id='ideautodel' type='text' name='ideautodel' value='$row[id_autor]' />
                    </div>
          </div>                           
          <div class='blue-grey lighten-2 modal-footer'>
            <button type='submit' id='btn_eliminaraut' name='btn_eliminaraut' href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</button>
            <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Cancelar</a>
          </div>
          </form>  
    </div>
    ");
  }
?>
          <!-- creando la otra pestaña de las tabs -->
          <div id="test-swipe-2" class="col s12 backgroundTabss">
            <div class="col s12 m12 l12">
              <div class="row">
                <div class="col s12 m12 l12">
                  <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                      <!-- creando tabla de editoriales -->
                      <span class="card-title center">Tabla de editoriales
                      <a href="#ModalAgregar" class="modal-trigger btn-floating btn-small waves-effect waves-light black">
                      <i class="material-icons">add</i>
                    </a>
                      </span>
                       <form method='post' enctype='multipart/form-data'>
                        <div class='input-field col s12 m8 l8 center'>
                            <i class='material-icons prefix'>search</i>
                            <input id='buscaredit' type='text' name='busquedas'/>
                            <label for='buscaredit'>Buscador autores</label>
                        </div>
                        <div class='input-field col s6 m4'>
                            <button type='submit' name='buscaredit' class='btn waves-effect black tooltipped' data-tooltip='Buscar por nombre o apellido'><i class='material-icons'>check_circle</i></button>
                            <a class='btn waves-effect black tooltipped modal-trigger' href='#grafico2' data-tooltip='Ventas de los autores'><i class='material-icons'>assessment</i></a>
                        </div>
                    </form>
                      <table class="bordered highlight centered responsive-table">
                        <thead>
                          <tr>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Operaciones</th>
                          </tr>
                        </thead>

                        <tbody>
                        <?php
                        foreach($edits as $edit1){
                          print("
                          <tr>
                            <td>$edit1[nombre_editorial]</td>
                            <td>$edit1[informacion_editorial]</td>
                            <td> 
                              <a href='#Edit$edit1[id_editorial]' class='btn-floating btn-large modal-trigger waves-effect waves-light black'>
                                <i class='material-icons'>mode_edit</i>
                              </a>
                            </td>
                            <td> 
                              <a href='#Eliminar$edit1[id_editorial]' class='btn-floating btn-large modal-trigger waves-effect waves-light black'>
                                <i class='material-icons'>delete</i>
                              </a>
                            </td>
                            <td>
                            <a href='reporte_editorial.php?editorial=$edit1[id_editorial]' class='btn-floating btn-large modal-trigger waves-effect waves-light black'>
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
 
            <?php
  foreach($edits as $edit1){
    print("
    <!--modal de editar -->
    <div id='Edit$edit1[id_editorial]' class='modal'>
          <div class='modal-content blue-grey lighten-4'>
            <h4>Modificar la editorial '$edit1[nombre_editorial]' </h4>
            <form  method='post'enctype='multipart/form-data' >
                        
              <div class='row'>
              <div class='input-field col s12 m12'>
            <input id='nom_editmod' name='nom_editmod' type='text' class='validate center' value='$edit1[nombre_editorial]'>
            <label for='last_name'>Nombre de Editorial</label>
          </div>      

                <div class='input-field col s12 m12'>
                  <textarea id='des_editmod' name='des_editmod' class='materialize-textarea center'>$edit1[informacion_editorial]</textarea>
                  <label for='textarea1'>Descripcion de Editorial</label>
                </div>
                <div class='input-field col s1 m1 hide'>
                    <input id='idedit' type='text' name='idedit' value='$edit1[id_editorial]' />
                    </div>
                </div> 
                    
                    
          </div>
          <div class='blue-grey lighten-2 modal-footer'>
            <button type='submit' id='btn_updatedit' name='btn_updatedit' href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</button>
            <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Cancelar</a>
          </div>
          </form>
    </div>
    
    <div id='Eliminar$edit1[id_editorial]' class='modal'>
          <div class='modal-content blue-grey lighten-4'>
            <h4>¿Desea eliminar este registro? </h4> 
            <form  method='post'enctype='multipart/form-data' >          
                  <div class='input-field col s1 m1 hide'>
                    <input id='ideditdel' type='text' name='ideditdel' value='$edit1[id_editorial]' />
                    </div>
          </div>                           
          <div class='blue-grey lighten-2 modal-footer'>
            <button type='submit' id='btn_eliminaredit' name='btn_eliminaredit' href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</button>
            <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Cancelar</a>
          </div>
          </form>  
    </div>
    ");
  }
?>
      </div>
      </div>
    </div>
        </div>
      </div>
    </div>
    
    <div id='ModalAgregarautor' class='modal'>
          <div class='modal-content blue-grey lighten-4'>
            <h4>Agregar autor</h4>          
                    
              <!-- agregando los campos -->                   
              <form  method='post'enctype='multipart/form-data' >      
              <div class="input-field col s12 m12">
            <input id="insert_nomau" name="insert_nomau" type="text" class="validate center">
            <label for="last_name">Nombre de autor</label>
          </div>   
              <div class='input-field col s12 m12'>
              <?php
            Page::showSelect("Sexo", "sexo_insert", $object->getsexo_autor(), $object->getSexoautores());
            ?>                      
           </div>
           <div class='file-field input-field col s12 m12'>
            <div class='btn waves-effect'>
                <span><i class='material-icons'>image</i></span>
                <input type='file' name='archivo' required/>
            </div>
            <div class='file-path-wrapper'>
                <input type='text' class='file-path validate' placeholder='Seleccione una imagen'/>
            </div>
        </div>

          </div> 
          <div class='blue-grey lighten-2 modal-footer'>          
            <button type='submit' id="btn_insertaut" name="btn_insertaut" href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</button>
            </form>  
            <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Cancelar</a>
          </div>           
    </div>
    
 
<div id='ModalAgregar' class='modal'>
          <div class='modal-content blue-grey lighten-4'>
            <h4>Agregar editorial </h4>            
            <form  method='post'enctype='multipart/form-data' >
            <div class="input-field col s12 m12">
            <input id="nom_edit" name="nom_edit" type="text" class="validate center">
            <label for="last_name">Nombre de Editorial</label>
          </div>      
            
              <div class="row">
                <div class="input-field col s12 m12">
                  <textarea id="des_edit" name="des_edit" class="materialize-textarea center"></textarea>
                  <label for="textarea1">Descripcion de Editorial</label>
                </div>
                </div>
                    </div>                           
          <div class='blue-grey lighten-2 modal-footer'>
            <button type='submit' id="btn_insertedit" name="btn_insertedit" href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</button>
            <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Cancelar</a>
            </form>
          </div>
            
    </div>
<!-- ______________________________________GRAFICOS_________________________________________-->
<!--grafico 1-->
    <div id='grafico' class='modal modal-fixed-footer'>
      <div class='modal-content blue-grey lighten-4'>
        <div class='row'>
        <!--<canvas id="myChart" width="400" height="400"></canvas>  -->
        <canvas id="myChart" width="100" height="100"></canvas>
        </div>
      </div>
      <div class='blue-grey lighten-2 modal-footer'>
        <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</a>
      </div>
    </div>
 <!--grafico 2-->
 <div id='grafico2' class='modal modal-fixed-footer'>
      <div class='modal-content blue-grey lighten-4'>
        <div class='row'>
        <!--<canvas id="myChart" width="400" height="400"></canvas>  -->
        <canvas id="myChart2" width="100" height="100"></canvas>
        </div>
      </div>
      <div class='blue-grey lighten-2 modal-footer'>
        <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</a>
      </div>
    </div>
    
<!--estructura de el grafico-->
<script>
    //cuando el documento este listo entonces se ejecutara lo demas
    $(document).ready(function(){
    //creo una variable tipo objeto para organizar y poder manejar mejor los datos del grafico  
    var datos = {
          //estos son los nombres de los campos que los llamo desde la base de datos por codigo php
          labels: [ <?php
                        foreach($grafico as $row){
                          print("
                          '$row[nombre_autor]',
                          ");
                        }
                      ?>
                    ],
            //datasets viene siendo los atributos de los labels        
            datasets: [{
                label: 'Ocultar',
                //aqui mando a llamar los valores desde la base de datos
                data: [
                  <?php
                    foreach($grafico as $row){
                      print("
                      $row[Expr1],
                      ");
                    }
                  ?>
                ],
                //aqui le pongo los colores a las barras uno para cada barra
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                //aqui le pongo los colores al borde de las barras uno para cada barra
                borderColor: [
                  <?php
                  foreach($grafico as $row){
                    print("
                    'rgba(0, 0, 0, 0.2)',
                    ");
                  }
                ?>
                ],
                borderWidth: 1
            }]
    };
    //aqui creo una variable que es la encargada de resivir el id del canvas donde mandas a llamar el grafico
    var ctx = document.getElementById("myChart").getContext('2d');
    /*aqui creas una variable puede ser normal o una publica como esta ahi pues si esta asi puedes usarla para modificar los
    graficos al instante*/
    window.bar = new Chart(ctx, {
      //el tipo de grafico
        type: 'polarArea',
        // aqui mando a llamar el el objeto que cree anteriormente 'datos'
        data: datos ,
        //estas son las opciones que tiene el grafico, es decir los atributos que puedes ponerle
        options: {
          responsive: true,
          title:{
              display: true,
              text: 'Ventas de los autores'
            },                
                  }   
      });
    });
</script>

<!-- estructura de grafico 2-->
  <script>
    //cuando el documento este listo entonces se ejecutara lo demas
    $(document).ready(function(){
    //creo una variable tipo objeto para organizar y poder manejar mejor los datos del grafico  
    var datos = {
          //estos son los nombres de los campos que los llamo desde la base de datos por codigo php
          labels: [ <?php
                        foreach($grafico2 as $row){
                          print("
                          '$row[nombre_editorial]',
                          ");
                        }
                      ?>
                    ],
            //datasets viene siendo los atributos de los labels        
            datasets: [{
                label: 'Ocultar',
                //aqui mando a llamar los valores desde la base de datos
                data: [
                  <?php
                    foreach($grafico2 as $row){
                      print("
                      $row[Expr2],
                      ");
                    }
                  ?>
                ],
                //aqui le pongo los colores a las barras uno para cada barra
                backgroundColor: [
                  <?php
                  foreach($grafico as $row){
                    print("
                    random_rgba(),                    
                    ");
                  }
                ?>
                ],
                //aqui le pongo los colores al borde de las barras uno para cada barra
                borderColor: [
                  <?php
                  foreach($grafico as $row){
                    print("
                    'rgba(0, 0, 0, 0.2)',
                    ");
                  }
                ?>
                ],
                borderWidth: 1
            }]
    };
    //aqui creo una variable que es la encargada de resivir el id del canvas donde mandas a llamar el grafico
    var ctx = document.getElementById("myChart2").getContext('2d');
    /*aqui creas una variable puede ser normal o una publica como esta ahi pues si esta asi puedes usarla para modificar los
    graficos al instante*/
    window.bar = new Chart(ctx, {
      //el tipo de grafico
        type: 'polarArea',
        // aqui mando a llamar el el objeto que cree anteriormente 'datos'
        data: datos ,
        //estas son las opciones que tiene el grafico, es decir los atributos que puedes ponerle
        options: {
          responsive: true,
          title:{
              display: true,
              text: 'Ventas de las editoriales'
            },                
                  }   
      });
      function random_rgba() {
        var o = Math.round, r = Math.random, s = 255;
        return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + '0.5)';
    }
    });
</script>