<form method='post'  autocomplete= 'off'>
        <div class="col s12 m12 l12">
                <ul class="collection">
                        <li class="boxsizes input-field collection-item">
                                <i class="material-icons prefix">account_circle</i>
                                <input id="nickname" name="nickname" type="text" class="validate">
                                <label class="movetext" for="nickname"> Usuario</label>

                        </li>
                        <li class="boxsizes input-field  collection-item">
                                <i class="material-icons prefix">vpn_key</i>
                                <input  name="password" id="password" type="password" class="validate">
                                <label for="password">Contraseña</label>
                        </li>

                </ul>
        </div>

        <div class=" center-align ">
                        <div class="row ">
                                <div class="g-recaptcha" data-sitekey="6LdA7WsUAAAAAAXI8_cjHuhb9dEgJmX0BC2T29rp"></div>
                        </div>
                        <button class=" blue btn waves-effect waves-light" id="iniciar" type="submit" name="iniciar">Ingresar
                                <i class="material-icons right"></i>
                        </button>
        </div>
</form>