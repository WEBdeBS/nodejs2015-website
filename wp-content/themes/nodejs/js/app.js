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

	if($('.talks__talk-list').get(0)){
		speakersTalks();
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

function speakersTalks(){
	$('.talks__talk-list').isotope({
		itemSelector: '.talk-item',
  		layoutMode: 'fitRows',
  		getSortData: {
      		name: '.sort-name',
      		level: '.sort-level',
      		date: '.sort-date'
      	},
      	sortAscending: {
	    	name: true,
	    	level: true,
	    	date: true,
	  	},
	  	filter: '.filter-talk',
	  	sortBy: 'name'
	});

	$('.speaker-order-links a').on( 'click', function(evt) {
	 	evt.stopPropagation();
	 	evt.preventDefault();
	 	$('.speaker-order-links a').removeClass('active');
	 	$(this).addClass('active');
    	var sortByValue = $(this).attr('data-sort-by');
    	var filterByValue = $(this).attr('filter-talk');
    	$('.talks__talk-list').isotope({ sortBy: sortByValue });
    	if(filterByValue){
    		$('.talks__talk-list').isotope({ filter: '.filter-talk' });
    	} else {
    		$('.talks__talk-list').isotope({ filter: '*' });
    	}
  	});
}