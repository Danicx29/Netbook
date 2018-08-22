<form method='post' enctype='multipart/form-data'  autocomplete= 'off'>
    <div class="container">    
          <!-- Page Content goes here -->
          <h1 class="white-text center">Modificar tu contraseña</h1>
          <div class='row center-align'>
                <label>CLAVE ACTUAL</label>
            </div>
          <div class="row">   
            <div class="input-field col s12 m6 l6">
                <input id="contra1" name="contra1" type="password" class="validate">
                <label for="contra1">Ingresa la contraseña</label>
            </div>
            <div class="input-field col s12 m6 l6">
                <input id="contra2" name="contra2" type="password" class="validate">
                <label for="contra2">Confirmar la contraseña</label>
            </div>               
        </div>
        <div class='row center-align'>
                <label>CLAVE NUEVA</label>
            </div>
          <div class="row">   
            <div class="input-field col s12 m6 l6">
                <input id="contra3" name="contra3" type="password" class="validate">
                <label for="contra3">Ingresa la contraseña</label>
            </div>
            <div class="input-field col s12 m6 l6">
                <input id="contra4" name="contra4" type="password" class="validate">
                <label for="contra4">Confirmar la contraseña</label>
            </div>               
        </div>
        <div class='row center-align'>
        <a href='update_user.php' class='btn waves-effect red tooltipped' data-tooltip='Cancelar'><i class='material-icons'>cancel</i></a>
        <button type='submit' name='modifusupass' class='btn waves-effect black tooltipped' data-tooltip='Crear'><i class='material-icons'>save</i></button>
        </div>
    </div>    
</form>     