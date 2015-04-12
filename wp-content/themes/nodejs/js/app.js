$(document).ready(function () {
	$('.mobile-menu').on('click', function (evt) {
		evt.stopPropagation();
		evt.preventDefault();
		$('.main-menu').toggleClass('open');
	});

	$('.venue-gallery__item').colorbox({
		rel: 'gal',
		maxWidth: '95%',
		maxHeight: '95%'
	});

	var carosuelId = 'speaker-carousel';
	if ($('#' + carosuelId).get(0)) {
		speakerCarousel(carosuelId);
	}
});


function speakerCarousel(id) {
	var carousel = $("#" + id);

	carousel.owlCarousel({
		itemsCustom: [
			[0, 1],
			[768, 2],
			[1200, 3]
		],
		navigation: true,
		pagination: false
	});

	$(".next").click(function () {
		carousel.trigger('owl.next');
	})
	$(".prev").click(function () {
		carousel.trigger('owl.prev');
	})
}