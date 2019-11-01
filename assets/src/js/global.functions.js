/*eslint-disable */
function scrollToElem( elem ) {
	const bodyRect = jQuery( 'body' )
		.get( 0 )
		.getBoundingClientRect();
	const elemRect = jQuery( elem )
		.get( 0 )
		.getBoundingClientRect();
	const offset = elemRect.top - bodyRect.top - 20;

	jQuery( 'html, body' ).animate(
		{
			scrollTop: offset,
		},
		'slow'
	);
}
/*eslint-enable */

jQuery.fn.visible = function( partial ) {
	const $t = jQuery( this ),
		$w = jQuery( window ),
		viewTop = $w.scrollTop(),
		viewBottom = viewTop + $w.height(),
		_top = $t.offset().top,
		_bottom = _top + $t.height(),
		compareTop = true === partial ? _bottom : _top,
		compareBottom = true === partial ? _top : _bottom;

	return compareBottom <= viewBottom && compareTop >= viewTop;
};
