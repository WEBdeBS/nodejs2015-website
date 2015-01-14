$(document).ready(function() {

  $('.nav a').click(function(e) {
    e.preventDefault();
    var tokens = $(this).attr('href').split('/');
    window.location.hash = tokens[tokens.length - 2];
  });

});