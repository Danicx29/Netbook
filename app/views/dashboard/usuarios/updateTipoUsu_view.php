<form method='post' autocomplete=off enctype='multipart/form-data'>
    <div class="container">
        <!--card a mano-->
        <br>
        <br>    
        <div class="row">
            <div class="col s12 m12">
                <div class="card  blue-grey darken-1">
                    <div class="card-content white-text">
                        <span class="card-title center">Modificar tipo usuario</span>
                    <!-- Page Content goes here -->
            <div class="row">
                <!--agregando camposs -->
                <div class="input-field col s12 m12 l12">
                <input id="nombre" name="nombre" type="text" class="validate white-text center"  value='<?php print($object->getnombre_tipoUsu()) ?>'>
                <label for="nombre">Nombre del tipo de usuario</label>
                </div>
            <span class="card-title center">Asignación de permisos</span>
            
            <!--libros-->            
            <div class='col s6 m4'>
                <p>
                    <?php
                        if($object->getpermiso_libros()==2){
                            print(' <input type="checkbox" id="permLibros" name="permLibros" checked />');
                        }else{
                            print('<input type="checkbox" id="permLibros" name="permLibros" />');
                        }
                    ?>  
                    <label for="permLibros">
                    <span class="white-text">
                    Libros                       
                    </span>
                </p>
            </div>
            <!--Autores y editoriales-->
            <div class='col s6 m4'>
                <p>
                    <?php
                        if($object->getpermiso_autoyedit()==2){
                            print('<input type="checkbox" id="permAutYEdit" name="permAutYEdit" checked />');
                        }else{
                            print('<input type="checkbox" id="permAutYEdit" name="permAutYEdit" />');
                        }
                    ?>                     
                    <label for="permAutYEdit">
                    <span class="white-text">
                    Autores y editoriales                
                    </span>
                </p>
            </div>
            <!--Categorias-->
            <div class='col s6 m4'>
                <p>
                    <?php
                        if($object->getpermiso_categorias()==2){
                            print('<input type="checkbox" id="permCategoria" name="permCategoria" checked />');
                        }else{
                            print('<input type="checkbox" id="permCategoria" name="permCategoria" />');
                        }
                    ?>                     
                    <label for="permCategoria">
                    <span class="white-text">
                    Categorias               
                    </span>
                </p>
            </div>  
            <!--Usuario-->
            <div class='col s6 m4'>
                <p>
                    <?php
                        if($object->getpermiso_usuarios()==2){
                            print('<input type="checkbox" id="permUsuario" name="permUsuario" checked />');
                        }else{
                            print('<input type="checkbox" id="permUsuario" name="permUsuario" />');
                        }
                    ?>                    
                    <label for="permUsuario">
                    <span class="white-text">
                    Usuario               
                    </span>
                </p>
            </div>
            <!--Solicitudes-->        
            <div class='col s6 m4'>
                <p>
                    <?php
                        if($object->getpermiso_solicitudes()==2){
                            print('<input type="checkbox" id="permSolicitudes" name="permSolicitudes" checked />');
                        }else{
                            print('<input type="checkbox" id="permSolicitudes" name="permSolicitudes" />');
                        }
                    ?>                    
                    <label for="permSolicitudes">
                    <span class="white-text">
                    Solicitudes               
                    </span>
                </p>
            </div>         
            <!--ventas-->        
            <div class='col s6 m4'>
                <p>
                    <?php
                        if($object->getpermiso_ventas()==2){
                            print('<input type="checkbox" id="permVentas" name="permVentas" checked />');
                        }else{
                            print('<input type="checkbox" id="permVentas" name="permVentas" />');
                        }
                    ?>                    
                    <label for="permVentas">
                    <span class="white-text">
                    Ventas               
                    </span>
                </p>
            </div>   
                    </div>
                </div>
            </div> 
        </div>
        </div>
        <div class='row center-align'>
        <a href='Tipo_usuarios.php?pagina=1' class='btn waves-effect red tooltipped' data-tooltip='Cancelar'><i class='material-icons'>cancel</i></a>
        <button type='submit' name='crearPermiso' class='btn waves-effect black tooltipped' data-tooltip='Crear'><i class='material-icons'>save</i></button>
        </div>
        </div>    
</form>     