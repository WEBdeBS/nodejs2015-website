$(document).ready(function() {
	$('.mobile-menu').on('click', function(evt){
		evt.stopPropagation();
		evt.preventDefault();
		$('.main-menu').toggleClass('open');
	});
});