    <!--agregando tabla y modelo de las cards  -->
    <h1 class="center TypeFontss white-text">Categorias</h1>
    <div>
      <div class="container">
        <!-- Page Content goes here -->
        <div class="row">
          <div class="col s12 m12 l12">
            <div class="row">
              <div class="col s12 m12 l12">
                <div class="card blue-grey darken-1">
                  <div class="card-content white-text">
                    <span class="card-title center">Tabla de categorias <a href="#ModalAgregar" class="modal-trigger btn-floating btn-small waves-effect waves-light black">
                      <i class="material-icons">add</i>
                    </a></span>
                    <form method='post' enctype='multipart/form-data' autocomplete= 'off'>
                        <div class='input-field col s12 m8 l8 center'>
                            <i class='material-icons prefix'>search</i>
                            <input id='buscar' type='text' name='busqueda'/>
                            <label for='buscar'>Buscador libros</label>
                        </div>
                        <div class='input-field col s6 m4'>
                            <button type='submit' name='buscar' class='btn waves-effect black tooltipped' data-tooltip='Buscar por nombre o apellido'><i class='material-icons'>check_circle</i></button>
                            <a class='btn waves-effect black tooltipped modal-trigger' href='#grafico' data-tooltip='Ventas de los autores'><i class='material-icons'>assessment</i></a>
                        </div>
                    </form>
                    <table class="bordered highlight centered responsive-table">
                      <thead>
                        <tr>
                        <th>Genero</th>
                        <th>Descripción</th>
                        <th>Operaciones</th>   
                        </tr>
                      </thead>

                      <tbody>
                      <?php                      
                        foreach($categoriass as $row){
                          print("
                          <tr>
                            <td>$row[nombre_genero]</td>
                            <td>$row[descripcion_genero]</td>
                            <td> 
                              <a href='#Edit$row[id_genero]' class='btn-floating btn-large modal-trigger waves-effect waves-light black'>
                                <i class='material-icons'>mode_edit</i>
                              </a>
                            </td>
                            <td> 
                              <a href='#Eliminar$row[id_genero]' class='btn-floating btn-large modal-trigger waves-effect waves-light black'>
                                <i class='material-icons'>delete</i>
                              </a>
                            </td>
                            <td> 
                              <a href='reporte_categorias.php?editorial=$row[id_genero]' class='btn-floating btn-large modal-trigger waves-effect waves-light black'>
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
          <!-- dandole formato a los campos de rescepcion de datos -->
          <div class="col s12 m6 l6">
          
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
  foreach($categoriass as $row){
    print("
    <!--modal de editar -->
    <div id='Edit$row[id_genero]' class='modal'>
          <div class='modal-content blue-grey lighten-4'>
            <h4>Editar la categoria '>$row[nombre_genero]' </h4>
            <form  method='post'enctype='multipart/form-data'  autocomplete= 'off'>
              <div class='input-field col s12 m12'>
                <input id='nom_categup' name='nom_categup'  type='text' class='validate center' value='$row[nombre_genero]'>
                <label for='last_name'>Nombre de Categoria</label>
              </div>
                    <div class='input-field col s12 m12'>
                      <textarea id='descrip_categup' name='descrip_categup' class='materialize-textarea center' >$row[descripcion_genero]</textarea>
                      <label for='textarea1'>Descripcion de categorias</label>
                    </div>  
                    <div class='input-field col s1 m1 hide'>
                    <input id='idcat' type='text' name='idcat' value='$row[id_genero]' />
                    </div>
          </div>
          <div class='blue-grey lighten-2 modal-footer'>
            <button type='submit' id='btn_update' name='btn_update' href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</button>
            <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Cancelar</a>
          </div>
          </form>
    </div>
    
    <div id='Eliminar$row[id_genero]' class='modal'>
          <div class='modal-content blue-grey lighten-4'>
            <h4>¿Desea eliminar la categoria '$row[nombre_genero]'? </h4> 
            <form  method='post'enctype='multipart/form-data'  autocomplete= 'off'>          
                  <div class='input-field col s1 m1 hide'>
                    <input id='idcatdel' type='text' name='idcatdel' value='$row[id_genero]' />
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

<div id='ModalAgregar' class='modal'>
          <div class='modal-content blue-grey lighten-4'>
            <h4>Agregar categoria </h4>            
            <form  method='post'enctype='multipart/form-data'  autocomplete= 'off'>
              <div class="input-field col s12 m12">
                <input id="nom_categ" name="nom_categ"  type="text" class="validate center" >
                <label for="last_name">Nombre de Categoria</label>
              </div>
                    <div class="input-field col s12 m12">
                      <textarea id="descrip_categ" name="descrip_categ" class="materialize-textarea center" ></textarea>
                      <label for="textarea1">Descripcion de categorias</label>
                    </div>
                    </div>                           
          <div class='blue-grey lighten-2 modal-footer'>
            <button type='submit' id="btn_insert" name="btn_insert" href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</button>
            <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Cancelar</a>
          </div>
          </form>  
    </div>
    <!-- ______________________________________GRAFICO_________________________________________-->
<div id='grafico' class='modal modal-fixed-footer'>
      <div class='modal-content blue-grey lighten-4'>
        <div class='row'>
        <canvas id="myChart" width="100" height="100"></canvas>
        </div>
      </div>
      <div class='blue-grey lighten-2 modal-footer'>
        <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</a>
      </div>
    </div>

    <!-- estructura de grafico -->
  <script>
    //cuando el documento este listo entonces se ejecutara lo demas
    $(document).ready(function(){
    //creo una variable tipo objeto para organizar y poder manejar mejor los datos del grafico  
    var datos = {
          //estos son los nombres de los campos que los llamo desde la base de datos por codigo php
          labels: [ <?php
                        foreach($grafico as $row){
                          print("
                          '$row[nombre_genero]',
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
                      $row[Expr3],
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
    var ctx = document.getElementById("myChart").getContext('2d');
    /*aqui creas una variable puede ser normal o una publica como esta ahi pues si esta asi puedes usarla para modificar los
    graficos al instante*/
    window.bar = new Chart(ctx, {
      //el tipo de grafico
        type: 'pie',
        // aqui mando a llamar el el objeto que cree anteriormente 'datos'
        data: datos,
        //estas son las opciones que tiene el grafico, es decir los atributos que puedes ponerle
        options: {
          responsive: true,
          title:{
              display: true,
              text: 'Top 5 generos mas populares'
            },                
                  }   
      });
      //genera colores rgba aletorios
      function random_rgba() {
        var o = Math.round, r = Math.random, s = 255;
        return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + '0.5)';
    }
    });
</script>

