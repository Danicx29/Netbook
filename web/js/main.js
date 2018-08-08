$( document ).ready(function(){
    $(".button-collapse").sideNav( );
    $('.slider').slider({indicators:false});
    $('.carousel.carousel-slider').carousel({fullWidth: true});
    $('ul.tabs').tabs();
    $('#perfil_inicio').click(function(){
        $('ul.tabs').tabs('select_tab', 'panel1');
    });
    $('#perfil_editar').click(function(){
        $('ul.tabs').tabs('select_tab', 'panel2');
    });
    $('#perfil_clave').click(function(){
        $('ul.tabs').tabs('select_tab', 'panel3');
    });
    $('#perfil_pago').click(function(){
        $('ul.tabs').tabs('select_tab', 'panel4');
    });
    $('#perfil_historial').click(function(){
        $('ul.tabs').tabs('select_tab', 'panel5');
    });
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false // Close upon selecting a date,
      });
    $('select').material_select();
    $('.materialboxed').materialbox();
    $('.collapsible').collapsible();
    $('.modal').modal({
        dismissible: true, // Modal can be dismissed by clicking outside of the modal
        opacity: .5, // Opacity of modal background
        inDuration: 300, // Transition in duration
        outDuration: 200, // Transition out duration
        startingTop: '4%', // Starting top style attribute
        endingTop: '10%', // Ending top style attribute
      }
    );
    $('#siguiente').click(function(){
        $('#registro').carousel('next');
    });
    $('#siguiente2').click(function(){
        $('#registro').carousel('next');
    });
    $('.carousel').carousel({fullWidth:true,padding:50,noWrap:true });
    $('#next_lista').click(function(){
        $('#carousel_lista').carousel('next');
    });
    $('#previous_lista').click(function(){
        $('#carousel_lista').carousel('prev');
    });
})