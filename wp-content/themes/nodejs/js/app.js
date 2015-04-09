$(document).ready(function() {
	$('.mobile-menu').on('click', function(evt){
		evt.stopPropagation();
		evt.preventDefault();
		$('.main-menu').toggleClass('open');
	});
	
	$('.venue-gallery__item').colorbox({rel:'gal', maxWidth: '95%', maxHeight: '95%'});
});