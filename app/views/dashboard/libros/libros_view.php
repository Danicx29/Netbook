
    <!-- creando las filas y columnas de separacion -->
    <div class="row">
        <form method='post'>
            <div class='input-field col s12 m6 l8 center'>
                <i class='material-icons prefix'>search</i>
                <input id='buscar' type='text' name='busqueda'/>
                <label for='buscar'>Buscador libros</label>
            </div>
            <div class='input-field col s6 m4'>
                <button type='submit' name='buscar' class='btn waves-effect black tooltipped' data-tooltip='Buscar por nombre del libro'><i class='material-icons'>check_circle</i></button>
                <a class='btn waves-effect black tooltipped modal-trigger' href='#grafico' data-tooltip='Libros mas vendidos'><i class='material-icons'>assessment</i></a>                
                <a class='btn waves-effect black tooltipped modal-trigger' href='#grafico2' data-tooltip='Ganancias totales por libro'><i class='material-icons'>assessment</i></a>                
            </div>
        </form>
    </div>
    <!-- agregando modelo de carta para agregar libros -->
    <div class="row">
      <div class="col s6 m3 l3">
        <div class="card large">
          <div class="card-image">
            <img src="../../web/img/Nuevo_Libro.png">
            <span class="card-title">Agregar libros</span>
          </div>
          <div class="card-content">
            <p>¡Agrega nuevos libros a tu catalogo!</p>
          </div>
          <div class="card-action">
            <a class="btn-floating red waves-effect modal-trigger" href='create.php'>
              <i class="material-icons">add</i>
            </a>

          </div>
        </div>
      </div>
      <!-- agregando  modelos de cartas para visualizar las valoraciones, editar y eliminar libros -->

      <?php
                        foreach($libros as $row){
                          print("
                          <div class='col s6 m3 l3'>
                          <div class='card large'>
                            <div class='card-image'>
                              <img src='../../web/img/libros/$row[foto]'>
                              <span style=' text-shadow: 0 0 3px #000000, 0 0 5px #000000' class='card-title white-text'>$row[nombre_libro]</span>
                            </div>
                            <div class='card-content'>
                              <p>$row[descripcion_libro]</p>
                            </div>
                            <div class='card-action'>
                              <a class='btn-floating red waves-effect modal-trigger' href='update.php?id=$row[id_libro]' >
                                <i class='material-icons'>mode_edit</i>
                              </a>
                              <a class='btn-floating red waves-effect modal-trigger' href='#estadist$row[id_libro]'>
                                <i class='material-icons'>stars</i>
                              </a>
                              <a class='btn-floating red waves-effect modal-trigger' href='#eliminar$row[id_libro]'>
                                <i class='material-icons'>delete</i>
                              </a>
                              <a class='btn-floating red waves-effect modal-trigger' href='comentarios_libros.php?libro=$row[id_libro]'>
                                 <i class='material-icons'>camera_rear</i>
                              </a>
                  
                            </div>
                          </div>
                        </div> 
                          ");
                        }
                      ?>

      
     
<div class="col s12 m12 ">
<ul class="pagination">
<?php
    //seleccionar todo de la tabla usuarios
    $resultado=$object->getLibross();

    //Contar el total de registros
    $total_registros = count($resultado);

    //usando ceil para dividir el total de registros entre $por_pagina este ultimo es de 5
    $total_paginas = ceil($total_registros / $por_pagina);

    //link a primera pagina
    if($anterior = $_GET['pagina']){
      print("<center><li class='waves-effect waves-light'><a href='libros.php?pagina=1'>".'Primera '."</a></li>");
      print("<center><li class='waves-effect waves-light'><a href='libros.php?pagina=1'><i class='material-icons'>chevron_left</i></a></li>");   
    }else{
      print("<center><li class='waves-effect waves-light'><a href='libros.php?pagina=1'>".'Primera '."</a></li>");
      print("<center><li class='waves-effect waves-light'><a href='libros.php?pagina=".$anterior."'><i class='material-icons'>chevron_left</i></a></li>");
    }
   

    $anterior=($_GET['pagina']-1);
    $despues=($_GET['pagina']+1);
    for ($i=1; $i<=$total_paginas; $i++) {      
    print("<li class='waves-effect waves-light'><a href='libros.php?pagina=".$i."'>".$i."</a></li>");
    };
    // link a la ultima pagina
    if($despues = $total_paginas){
      print("<li class='waves-effect waves-light'><a href='libros.php?pagina=".$total_paginas."'><i class='material-icons'>chevron_right</i></a></li></center>");
      print("<li class='waves-effect waves-light'><a href='libros.php?pagina=$total_paginas'>".' Última'."</a></li></center>");
    }else{
      print("<li class='waves-effect waves-light'><a href='libros.php?pagina=".$despues."'><i class='material-icons'>chevron_right</i></a></li></center>");
      print("<li class='waves-effect waves-light'><a href='libros.php?pagina=$total_paginas'>".' Última'."</a></li></center>");
    }

?>
</ul>
</div>

    <!-- Modal Structure -->
    <?php
  foreach($libros as $row){
    print("
    <div id='estadist$row[id_libro]' class='modal modal-fixed-footer'>
      <div class='modal-content blue-grey lighten-4'>
        <h4 class='center'>Información</h4>
        <div class='row'>
          <div class='center'>
            <img src='../../web/img/libros/$row[foto]' alt='' class='center responsive-img imageSizess'>
            <!-- notice the 'circle' class -->
          </div>
          <div class='col s12 m12 l12'><b>Nombre:</b> $row[nombre_libro]</div>
          <div class='col s12 m12 l12'><b>Descripción:</b> $row[descripcion_libro]</div>
          <div class='col s12 m12 l12'><b>Autor:</b> $row[nombre_autor]</div>
          <div class='col s12 m12 l12'><b>Categoria:</b> $row[nombre_genero]</div>
          <div class='col s12 m12 l12'><b>Editorial:</b> $row[nombre_editorial]</div>
          <div class='col s12 m12 l12'><b>Precio:</b> $row[precio_libro]</div>
          <div class='col s12 m12 l12'><b>Numero de paginas:</b> $row[numeroPag_libro]</div>
          <div class='col s12 m12 l12'><b>Numero de ventas:</b> $row[NumVent_libro]</div>          
          <div class='col s12 m12 l12'><b>Valoracion:</b> $row[valoracion]</div>
          
        </div>
      </div>
      <div class='blue-grey lighten-2 modal-footer'>
        <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</a>
      </div>
    </div>


    <div id='eliminar$row[id_libro]' class='modal modal-fixed-footer'>
      <div class='modal-content blue-grey lighten-4'>
        <h4>¿Desea eliminar el libro '$row[nombre_libro]'? </h4>
        <p>¿Esta seguro que quiere eliminar este libro? si lo elimina se perdera toda la informacion de este.</p>
        <form  method='post'enctype='multipart/form-data' >          
                  <div class='input-field col s1 m1 hide'>
                    <input id='idlibdel' type='text' name='idlibdel' value='$row[id_libro]' />
                    </div>
      </div>
      <div class='blue-grey lighten-2 modal-footer'>
      <button type='submit' id='btn_eliminarlib' name='btn_eliminarlib' href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</button>
        <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Cancelar</a>
      </div>
      </form>
    </div>
    ");
  }
?>
<!--modal del grafico 1-->
<div id='grafico' class='modal modal-fixed-footer'>
      <div class='modal-content blue-grey lighten-4'>
        <div class='row'>
        <!--<canvas id="myChart" width="400" height="400"></canvas>  -->
        <canvas id="myChart" width="400" height="400"></canvas>
        </div>
      </div>
      <div class='blue-grey lighten-2 modal-footer'>
        <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat black white-text'>Aceptar</a>
      </div>
    </div>

<!--modal del grafico 2-->
<div id='grafico2' class='modal modal-fixed-footer'>
      <div class='modal-content blue-grey lighten-4'>
        <div class='row'>
        <!--<canvas id="myChart" width="400" height="400"></canvas>  -->
        <canvas id="myChart2" width="400" height="400"></canvas>
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
    var datos2 = {
          //estos son los nombres de los campos que los llamo desde la base de datos por codigo php
          labels: [ <?php
                        foreach($grafico as $row){
                          print("
                          '$row[nombre_libro]',
                          ");
                        }
                      ?>
                    ],
            //datasets viene siendo los atributos de los labels        
            datasets: [{
                label: 'libro',
                //aqui mando a llamar los valores desde la base de datos
                data: [
                  <?php
                    foreach($grafico as $row){
                      print("
                      $row[NumVent_libro],
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
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
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
        type: 'bar',
        // aqui mando a llamar el el objeto que cree anteriormente 'datos'
        data: datos2 ,
        //estas son las opciones que tiene el grafico, es decir los atributos que puedes ponerle
        options: {
          responsive: true,
          title:{
              display: true,
              text: 'Top 5 libros mas vendidos'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        userCallback: function(label, index, labels) {
                        // cuando el valor del suelo es el mismo que el valor que tenemos un número entero
                        if (Math.floor(label) === label) {
                            return label;
                        }

                    },
                    }
                }]
            }
            
            
        }   
      });
    
/*
//ESTA FUNCION ES PARA ACTUALIZAR LOS DATOS A TIEMPO REAL 
  function getRandom(){
    return Math.round(Math.random()*100)
  }

  setInterval(function(){   
    var newData=[ 
      [getRandom(),getRandom(),getRandom(),getRandom(),getRandom()],
   ];  
   $.each(datos.datasets, function(i, dataset){
    dataset.data = newData[i];
   });
   window.bar.update();
  }, 3000);
*/
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
                        foreach($ganancias as $row){
                          print("
                          '$row[nombre_libro]',
                          ");
                        }
                      ?>
                    ],
            //datasets viene siendo los atributos de los labels        
            datasets: [{
                label: 'libro',
                //aqui mando a llamar los valores desde la base de datos
                data: [
                  <?php
                    foreach($ganancias as $row){
                      print("
                      $row[Ganancias_neta],
                      ");
                    }
                  ?>
                ],
                //aqui le pongo los colores a las barras uno para cada barra
                backgroundColor: [
                  <?php
                  foreach($ganancias as $row){
                    print("
                    random_rgba(),                    
                    ");
                  }
                ?>
                ],
                //aqui le pongo los colores al borde de las barras uno para cada barra
                borderColor: [
                  <?php
                  foreach($ganancias as $row){
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
        type: 'line',
        // aqui mando a llamar el el objeto que cree anteriormente 'datos'
        data: datos ,
        //estas son las opciones que tiene el grafico, es decir los atributos que puedes ponerle
        options: {
          responsive: true,
          spanGaps: true,
          title:{
              display: true,
              text: 'Ganancias totales de la venta de cada libro'
            },                
            scales: {
            yAxes: [{
                stacked: true
            }]
        }
                  }   
      });
      //genera colores rgba aletorios
      function random_rgba() {
        var o = Math.round, r = Math.random, s = 255;
        return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + '0.5)';
    }
    });
</script>    
    