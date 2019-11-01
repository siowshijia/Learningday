( function( $ ) {
	$( document ).ready( function() {
		const $masonryGrid = $( '.masonry-grid' ).masonry( {
			itemSelector: '.masonry-grid-item',
			columnWidth: '.masonry-grid-item',
			percentPosition: true,
		} );

		$masonryGrid.imagesLoaded().progress( function() {
			$masonryGrid.masonry( 'layout' );
		} );
	} );
}( jQuery ) );
