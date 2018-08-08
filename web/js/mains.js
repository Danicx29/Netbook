  $(document).ready(function () {
      //TABS
    $('ul.tabs').tabs('select_tab', 'tab_id');

    //SIDENAV
    $('.button-collapse').sideNav({
        menuWidth: 300, // Default is 300
        edge: 'right', // Choose the horizontal origin
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true, // Choose whether you can drag to open on touch screens,
        //  onOpen: function(el) {
        //onClose: function(el) {
      }
      );
      
      //MODALES
         // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
       //COMBOBOX
       $('select').material_select();
       //PICKDATE
       $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year,
        today: 'Today',
        clear: 'Clear',
        close: 'Ok',
        closeOnSelect: false // Close upon selecting a date,
      });
      
      $('select').material_select();
  });
