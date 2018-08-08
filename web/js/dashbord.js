$('.button-collapse').sideNav({
    menuWidth: 300, // Default is 300
    edge: 'right', // Choose the horizontal origin
    closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
    draggable: true, // Choose whether you can drag to open on touch screens,
    //  onOpen: function(el) {
    //onClose: function(el) {
  }
  );
  $(document).ready(function () {
    $('ul.tabs').tabs('select_tab', 'tab_id');
  });