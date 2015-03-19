$(document).ready(function() {

  $('.nav li:not(.page-item-48) a').click(function(e) {
    e.preventDefault();
    var tokens = $(this).attr('href').split('/');
    window.location.hash = tokens[tokens.length - 2];
  });

});
