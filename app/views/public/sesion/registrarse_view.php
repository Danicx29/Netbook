
    <main>
            <form method='post'>
        <div class="fondo1 ">
            <!--Fondo de pantalla registro-->
            <div class="row">
                <div class="col s12 m3 l4">
                </div>
                <div class="col s12 m6 l4">
                    <div class="centrar">
                        <div class="center-align paralelogramo ">
                            <div class="center-align cuadrado ">
                                <div class="carousel carousel-slider center">                                    
                                        <div class="carousel-item  white-text" href="#one!" id="registro">
                                            <h5 class="center-align black-text ">Registro de Usuario</h5>
                                            <div class="row">
                                            <div class="input-field col s12">
                                            <i class="material-icons prefix black-text">account_circle</i>
                                            <input id="regnom" name="regnom" type="text" class="validate black-text">
                                            <label for="regnom">Nombre</label>
                                          </div>
                                          <div class="input-field col s12">
                                            <i class="material-icons prefix black-text">account_circle</i>
                                            <input id="regapell" name="regapell" type="text" class="validate black-text">
                                            <label for="regapell ">Apellido</label>
                                          </div>
                                           <div class="input-field col s12">
                                            <i class="material-icons prefix black-text">account_circle</i>
                                            <input id="nickname" name="nickname" type="text" class="validate black-text">
                                            <label for="nickname ">Nickname</label>
                                          </div>
                                              
                                          
                                            </div>                                            
                                            
                                                <div class=" black-text  col s12 m12 l12 ">
                                                    <a class="green btn waves-effect waves-light" id="siguiente">Seguiente
                                                        <i class=" material-icons right"></i>
                                                    </a>
                                                </div>

                                            

                                        </div>
                                        <div class="carousel-item  white-text" href="#two!">
                                        <h5 class="center-align black-text ">Registro de Usuario</h5>
                                        <div class="row">
                                       
                                            <div class=" center-align black-text input-field col s12 m12 l12">
                                                <i class="material-icons prefix">account_circle</i>
                                                <input class="black-text center-align" id="email" name="email" type="email" class="validate">
                                                <label class="gray-text" for="email">Correo Electronico</label>
                                            </div>
                                        
                                        
                                            <div class=" black-text input-field col s12 m12 l12">
                                                <i class="material-icons prefix">https</i>
                                                <input class="black-text center-align" id="contra" name="contra" type="password" class="validate">
                                                <label class="gray-text" for="contra">contraseña</label>
                                            </div>
                                            
                                            </div>
                                        
                                            
                                                <div class=" black-text  col s12 m12 l12 ">
                                                    <a class="green btn waves-effect waves-light" id="siguiente2" >Seguiente
                                                        <i class=" material-icons right"></i>
                                                    </a>
                                                </div>
                                            
                                        </div>
                                        <div class="carousel-item  white-text" href="#three!">
                                            <h5 class="center-align black-text ">Forma de pago</h5>
                                            <div class="row">                                            
                                                        <div class="input-field col s12 m12 l12">
                                                            <i class="black-text material-icons prefix">credit_card</i>
                                                            <input class="black-text" id="credicard" name="credicard" type="text" class="validate">
                                                            <label class="gray-text" for="credicard">Numero de tarjeta</label>
                                                        </div>                                                                                                        
                                                        <div class="input-field col s6">
                                                            <i class="black-text material-icons prefix">date_range</i>
                                                            <input class="black-text" id="celular" name="celular" type="tel" class="validate">
                                                            <label class="gray-text" for="celular">mes-año</label>
                                                        </div>
                                                        <div class="input-field col s6">
                                                            <i class="black-text material-icons prefix">fiber_pin</i>
                                                            <input class="black-text" id="cvc" name="cvc" type="tel" class="validate">
                                                            <label class="gray-text" for="cvc">cvc</label>
                                                        </div>
                                                    
                                                        <div class="col s6 m6 l6">
                                                                <p>
                                                                    <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                                                                    <label class="black-text" for="filled-in-box">He ledido</label>
                                                                </p>
                                                        </div>

                                                        <div class="col s6 m6 l6">
                                                            <!-- Modal Trigger -->
                                                            <a class="waves-effect waves-light  modal-trigger" href="#modal1">Terminos y condiciones</a>
                                                        </div>
                            
                                                    <div class="row">
                                                        <div class=" black-text  col s12 m12 l12 center-align">
                                                            <a href="inicio.html">
                                                                <button class="red btn waves-effect waves-light" id="siguiente2" type="submit" name="btncrearusu">Finalizar
                                                                    <i class=" material-icons right"></i>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>                                    
                                </div>
                                <div class="row ">
                                    <div class=" ight-blue-text  col s12 m12 l12">
                                            <a href="login.php" class=" blue btn waves-effect waves-light" type="" name="action">Iniciar sesión
                                                <i class="material-icons right"></i>
                                            </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class=" black-text  col s12 m12 l12 ">
                                            <a href="recuperar.php" class=" red btn waves-effect waves-light" type="" name="action">Recuperar clave
                                                <i class="material-icons right"></i>
                                            </a>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col s12 m3 l4">

                </div>

            </div>
        </div>
 
    </form>

        <!--Terminos y condiciones-->
        <!-- Modal Structure -->
        <div id="modal1" class="modal modal-fixed-footer">
            <div class="modal-content">
                <h4>Terminos y condiciones</h4>
                <p>NetBook brinda un servicio de suscripción que permite a nuestros miembros acceder a libros, obras, novelas
                    y audio libros(el "contenido de NetBook") transmitidos a través de Internet a ciertos dispositivos conectados
                    a Internet ("dispositivos listos para NetBook").
                    <br>
                    <br> El servicio de NetBook lo presta NetBook International B.V., una sociedad de responsabilidad limitada
                    de los Centro America. Los presentes Términos de uso rigen la utilización que haga de nuestro servicio.
                    Según se utilice en estos Términos de uso, las frases “el servicio de NetBook”, “nuestro servicio” o
                    “el servicio” se refieren al servicio brindado por NetBook para descubrir y ver contenido de NetBook,
                    incluidas todas las características y funcionalidades, recomendaciones y críticas, el sitio web y las
                    interfaces de usuario, además de todo el contenido y software asociado a nuestro servicio.
                    <br>
                    <br> Membresía: Su membresía de NetBook continuará mes a mes hasta que la cancele. Para usar el servicio
                    de NetBook, debe tener acceso a Internet y un dispositivo listo para NetBook, y pro porcionar una forma
                    de pago actual, válida y aceptada, que se puede actualizar cuando resulte necesario ("Forma de pago").
                    A menos que cancele su membresía antes de la fecha de facturación mensual, nos autoriza a cobrarle la
                    membresía del próximo mes a su Forma de pago (ver "Cancelación" a continuación). Podrá encontrar los
                    detalles específicos sobre su membresía de NetBook visitando nuestro sitio web y haciendo clic en el
                    vínculo "Tu cuenta", disponible en la parte superior de cualquier página del sitio web de NetBook, bajo
                    su nombre de perfil.
                    <br>
                    <br> Facturación3.1. Ciclo de facturación. Los cargos de membresía por el servicio de NetBook y cualquier
                    otro cargo en el que incurra en relación con el uso que haga del servicio de NetBook, como impuestos
                    y posibles gastos de transacción, se cobrarán mensualmente a su Forma de Pago en el día calendario correspondiente
                    al comienzo de la porción de pago de su membresía. En ciertos casos, su fecha de pago podría cambiar,
                    por ejemplo si su Forma de pago no se estableció satisfactoriamente o si su membresía paga comenzó un
                    día que no está incluido en un determinado mes. Visite nuestro sitio web y haga clic en el vínculo "Detalles
                    de facturación", en la página "Tu cuenta" para ver su próxima fecha de pago.
                    <br>
                    <br> 3.2. Formas de pago. Puede cambiar su Forma de pago al visitar nuestro sitio web y hacer clic en el
                    vínculo "Tu cuenta". Si el pago no se pudiera hacer satisfactoriamente, debido a la fecha de vencimiento,
                    la falta de fondos o si usted no modifica la información de su Forma de pago o cancela su cuenta, podemos
                    suspender su acceso al servicio hasta que obtengamos una Forma de pago válida. Al actualizar su Forma
                    de pago, usted nos autoriza a continuar cobrando a través de la Forma de pago actualizada y usted sigue
                    siendo responsable de los importes no cobrados. Esto podría resultar en un cambio en las fechas de cobro.
                    Para algunas Formas de pago, el emisor puede cobrarle ciertos cargos, como cargos de transacción extranjera
                    u otros cargos relacionados con el procesamiento de su Forma de pago. Los impuestos locales varían en
                    función de la Forma de pago usada. Consulte con el proveedor de servicios de su Forma de pago para obtener
                    información.
                    <br>
                    <br> 3.3. Cancelación. Puede cancelar la membresía de NetBook en cualquier momento, y continuará teniendo
                    acceso al servicio hasta el final del ciclo de facturación mensual. En la medida permitida por la ley
                    aplicable, los pagos no son reembolsables y no se otorgarán reembolsos ni créditos por los períodos de
                    membresía utilizados parcialmente o por el contenido de NetBook no visto. Para cancelar, visite la página
                    "Tu cuenta" y siga las instrucciones. Si cancela su membresía, su cuenta se cerrará automáticamente al
                    final de su facturación mensual actual. Para ver cuándo se cerrará su cuenta, haga clic en "Detalles
                    facturación" en la página "Tu cuenta". Si se suscribió a NetBook mediante su cuenta con un tercero como
                    Forma de pago y desea cancelar su membresía de NetBook en cualquier momento, es posible que tenga que
                    hacerlo a través de dicho tercero, ya sea, al visitar su cuenta con el tercero correspondiente para desactivar
                    su renovación automática o al cancelar la suscripción al servicio de NetBook a través de ese tercero.
                    También podrá encontrar información de sobre la facturación de su membresía de NetBook, si visita su
                    cuenta con el tercero correspondiente.
                    <br>
                    <br> 3.4. Cambios en el precio y Planes de servicio. Podemos cambiar nuestros planes de servicio y el precio
                    de nuestro servicio de vez en cuando. Sin embargo, cualquier cambio en los precios o en nuestros planes
                    de servicio se aplicará a usted no antes de los 30 días siguientes a la notificación.
                </p>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </form>
    </main>