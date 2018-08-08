<form method='post' enctype='multipart/form-data'>
<div class="container">
          <!-- Page Content goes here -->
          <h1 class="white-text center">Modificar libro</h1>
          <div class="row">
            
            <div class="input-field col s12 m6 l6">
              <input id="nomlib" name="nomlib" type="text" value='<?php print($object->getnombre_libro()) ?>' class="validate black-text center">
              <label for="name
              ">Nombre del libro</label>
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
            <div class='input-field col s12 m6'>
            <?php
            Page::showSelect("Autores", "select_eutores", $object->getcod_Atr(), $object->getautoress());
            ?>
        </div> 

            <div class='input-field col s12 m6'>
            <?php
            Page::showSelect("Editoriales", "select_editoriales", $object->getcod_edt(), $object->geteditorialess());
            ?>
        </div> 
        <div class='input-field col s12 m6'>
            <?php
            Page::showSelect("Genero", "select_genero", $object->getcod_gnr(), $object->getgeneross());
            ?>
        </div> 
        
           
            <div class="input-field col s12 m6 l6">
              <textarea id="descriplibro" name="descriplibro"  class="materialize-textarea center"><?php print($object->getdescrip_libro()) ?></textarea>
              <label for="textarea1">Descripcion del libro</label>
            </div>
            
            <div class='input-field col s6 m3'>
          	<i class='material-icons prefix'>event_available</i>
          	<input id='numpag' name='numpag' type='number' value='<?php print($object->getnumero_pag()) ?>' class='validate' max='999' min='0' step='any'  required/>
          	<label for='numpag'>Numero de paginas</label>
        </div>
        <div class='input-field col s6 m3'>
          	<i class='material-icons prefix'>shopping_cart</i>
          	<input id='preciolib' type='number' name='preciolib' value='<?php print($object->getprecio_libro()) ?>' class='validate' max='99999.99' min='0.01' step='any'  required/>
          	<label for='precpreciolibio'>Precio ($)</label>
        </div>
        <div class="input-field col s12 m6 l6">
              <input id="link" name="link" type="text" class="validate black-text center" value='<?php print($object->getlink()) ?>'>
              <label for="name">Ingrese el link</label>
            </div>
        <div class='input-field col s1 m1 hide'>
                    <input id='valoracion' type='text' name='valoracion' value='0.0' />
        </div>

      <div class='input-field col s1 m1 hide'>
      <input id='ventas' type='text' name='ventas' value='0' />
      </div>
          </div>
        </div>
        <div class='row center-align'>
        <a href='libros.php?pagina=1' class='btn waves-effect red tooltipped' data-tooltip='Cancelar'><i class='material-icons'>cancel</i></a>
        <button type='submit' name='actualizar_libro' class='btn waves-effect black tooltipped' data-tooltip='Crear'><i class='material-icons'>save</i></button>
    </div>       
</form>        