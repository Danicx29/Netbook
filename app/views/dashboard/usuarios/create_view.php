<form method='post' enctype='multipart/form-data'  autocomplete= 'off'>
    <div class="container">
          <!-- Page Content goes here -->
          <h1 class="white-text center">Agregar libro</h1>
          <div class="row">
            <!--agregando camposs -->
            <div class="input-field col s12 m6 l6">
              <input id="nombre" name="nombre" type="text" class="validate white-text center">
              <label for="nombre">Nombre</label>
            </div>

            <div class="input-field col s12 m6 l6">
              <input id="apellido" name="apellido" type="text" class="validate white-text center">
              <label for="apellido">Apellido</label>
            </div>

            <div class="input-field col s12 m6 l6">
            <input id="email" name="email" type="email" class="validate">
            <label for="email">Email</label>
            </div>
            <div class="input-field col s12 m6 l6">
                    <input id="nickname" name="nickname" type="text" class="validate white-text center">
                    <label for="nickname">Nombre de usuario</label>
            </div>
            <div class="input-field col s12 m6 l6">
                <input id="contra1" name="contra1" type="password" class="validate">
                <label for="contra1">Ingresa la contraseña</label>
            </div>
            <!--
            <div class="input-field col s12 m6 l6">
                <input id="contra2" id="contra2" type="password" class="validate">
                <label for="contra2">Repite la contraseña</label>
            </div>
            -->
            <div class='input-field col s12 m6'>
                    <?php
                    Page::showSelect("Tipo usuario", "tipo_usu", $object->getcodtipouso(), $object->gettipousu());
                    ?>
                </div>
                                
            <div class='file-field input-field col s12 m6'>
                <div class='btn waves-effect'>
                    <span><i class='material-icons'>image</i></span>
                    <input type='file' name='archivo' required/>
                </div>
                <div class='file-path-wrapper'>
                    <input type='text' class='file-path validate' placeholder='Seleccione una imagen'/>
                </div>
            </div>    
                               
        </div>
        <div class='row center-align'>
        <a href='usuarios.php' class='btn waves-effect red tooltipped' data-tooltip='Cancelar'><i class='material-icons'>cancel</i></a>
        <button type='submit' name='crearlibro' class='btn waves-effect black tooltipped' data-tooltip='Crear'><i class='material-icons'>save</i></button>
        </div>
        </div>    
</form>     