( function( $ ) {
	$( document ).ready( function() {
		new Swiper( '.swiper-home', {
			loop: true,
			autoplay: {
				delay: 5000,
			},
			pagination: {
				el: '.swiper-home .swiper-pagination',
			},
			navigation: {
				nextEl: '.swiper-home .swiper-button-next',
				prevEl: '.swiper-home .swiper-button-prev',
			},
		} );
	} );
}( jQuery ) );
