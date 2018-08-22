<!--<div class="container"> -->
   <!-- agregando contenedores de los botones -->
   <div class="row center">
<?php
require_once("../../app/models/dashboard/usuarios/usuarios.class.php");
if (isset($_SESSION['tipo_usuario_dashboard'])){
  $object2 = new mtsUsuario;
  if($object2->setid_tipousu($_SESSION['tipo_usuario_dashboard'])){
    if($object2->CargarPermisos()){
      if($object2->getpermiso_libros()==2){
        print('
        <div class="col s6 m4 l4">
        <a href="../libros/libros.php?pagina=1">
          <img class="waves-effect waves-green btn-floating  ImagesSizes spaceimage1 circle z-depth-5 " src="../../web/img/libro_icono.png"
            title="Libros" alt="Libros">
        </a>
      </div>
        ');
    }
    else{
      /*$filename = basename($_SERVER['PHP_SELF']);
      if ($filename == "libros.php") {
        Page::showMessage(2, "No tienes el rango suficiente para entrar a esta funcion", "../../menu/menu.php");
      }*/
    }
    //ocultar o ver autore y editoriales
    if($object2->getpermiso_autoyedit()==2){
      print('
      <div class="col s6 m4 l4">
      <a href="../autoryeditorial/autoryeditorial.php">
        <img class="waves-effect waves-green btn-floating  ImagesSizes spaceimage1 circle z-depth-5" src="../../web/img/Icono_autor.png"
          title="Autor y Editoriales" alt="Autor">
      </a>
      <!-- <img class="waves-effect waves-green btn-floating modal-trigger ImagesSizes spaceimage1 circle z-depth-5" href="#modal1"  src="Img/Icono_autor.png" title="Autor y Editoriales" alt="Autor"> -->
    </div>
      ');
  }
  else{
    /*$filename = basename($_SERVER['PHP_SELF']);
    if ($filename == "libros.php") {
      Page::showMessage(2, "No tienes el rango suficiente para entrar a esta funcion", "../../menu/menu.php");
    }*/
  }
  //categorias
  if($object2->getpermiso_categorias()==2){
    print('
    <!--<div class="col s6 m4 l4">
        <img class="waves-effect waves-green btn-floating  ImagesSizes spaceimage1 circle z-depth-5"  src="Img/icono_valoracion.png" title="Valoracion" alt="Valoracion">
      </div> -->
    <div class="col s6 m4 l4">
      <a href="../categorias/categorias.php">
        <img class="waves-effect waves-green btn-floating  ImagesSizes spaceimage2 circle z-depth-5" src="../../web/img/icono_categoria.png"
          title="Categorias" alt="Categorias">
      </a>
    </div>
    ');
}
else{
  /*$filename = basename($_SERVER['PHP_SELF']);
  if ($filename == "libros.php") {
    Page::showMessage(2, "No tienes el rango suficiente para entrar a esta funcion", "../../menu/menu.php");
  }*/
}
//usuarios
if($object2->getpermiso_usuarios()==2){
    print('
    <div class=" col s6 m4 l4 hide-on-small-only">
      <a href="../usuarios/usuarios.php">
        <img class=" waves-effect waves-green btn-floating  ImagesSizes spaceimage2 circle z-depth-5" src="../../web/img/icono_usuarios.png"
          title="Usuarios" alt="Usuarios">
      </a>
    </div>
    <div class=" col s6 m4 l4 hide-on-large-only hide-on-med-only ">
      <img class=" waves-effect waves-green btn-floating    circle z-depth-5" src="../../web/img/icono_usuarios.png"
        title="Usuarios" alt="Usuarios">
    </div>
    ');
}
else{
  /*$filename = basename($_SERVER['PHP_SELF']);
  if ($filename == "libros.php") {
    Page::showMessage(2, "No tienes el rango suficiente para entrar a esta funcion", "../../menu/menu.php");
  }*/
}
//solicitudes
if($object2->getpermiso_solicitudes()==2){
    print('
    <div class=" col s6 m4 l4">
    <a href="../solicitudes/solicitudes.php?pagina=1">
      <img class="waves-effect waves-green btn-floating modal-trigger ImagesSizes spaceimage2 circle z-depth-5"
         src="../../web/img/icono_solicitudes.png" title="Solicitudes" alt="Ventas">
    </a>
    </div>
    ');
}
else{
  /*$filename = basename($_SERVER['PHP_SELF']);
  if ($filename == "libros.php") {
    Page::showMessage(2, "No tienes el rango suficiente para entrar a esta funcion", "../../menu/menu.php");
  }*/
}
//ventas
if($object2->getpermiso_ventas()==2){
  print('
  <div class=" col s6 m4 l4">
      <img class=" waves-effect waves-green btn-floating modal-trigger ImagesSizes spaceimage2 circle z-depth-5"
        href="#modal1" src="../../web/img/icono_ventas.png" title="Ventas" alt="Ventas">
    </div>
  ');
}
else{
/*$filename = basename($_SERVER['PHP_SELF']);
if ($filename == "libros.php") {
  Page::showMessage(2, "No tienes el rango suficiente para entrar a esta funcion", "../../menu/menu.php");
}*/
}
  }
}
}
  ?>
  </div>
  <!-- </div> -->
  <!-- estructura de los modales -->
  <div id="modal1" class="modal blue-grey lighten-4">
    <div class="modal-content ">
      <div class="row">
        <div class="col s12 m12">
          <div class="row">
            <h4 class="flow-text black-text center-align">
              <b>Historial de ventas</b>
            </h4>
            <div class="col s12 m12 l12 ">
              <div class="card-panel hoverable">
                <h5 class=" blue-text center-align">Ventas</h5>
                <form method='post' enctype='multipart/form-data'  autocomplete= 'off'>
                        <div class='input-field col s12 m8 l8 center'>
                            <i class='material-icons prefix'>search</i>
                            <input id='buscar' type='text' name='busqueda'/>
                            <label for='buscar'>Buscador libros</label>
                        </div>
                        <div class='input-field col s6 m4'>
                            <button type='submit' name='buscar' class='btn waves-effect green tooltipped' data-tooltip='Buscar por nombre de usuario'><i class='material-icons'>check_circle</i></button>
                        </div>
                    </form>
                <table class="striped">
                  <thead>
                    <tr>
                    <th>USUARIO</th>
                      <th>NOMBRE DEL LIBRO</th>
                      <th>PRECIO DEL LIBRO</th>
                      <th>CODIGO DE CUENTA</th>
                      <th>CODIGO DE VENTA</th>
                      
                    </tr>
                  </thead>

                  <tbody>
                  <?php
                  $ventax = $object->getventas();
                        foreach($ventax as $row){
                          print("
                          <tr>
                          <td>$row[nickname]</td>
                          <td>$row[nombre_libro]</td>
                          <td>$row[precio_libro]</td>
                          <td>$row[codigoUsa_cuenta]</td>
                          <td>$row[codigoNum_venta]</td>
                          
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
    <div class=" modal-footer blue-grey lighten-2 ">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat black white-text">Salir</a>
    </div>
  </div>
