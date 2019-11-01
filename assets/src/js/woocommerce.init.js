( function( $ ) {
	$( document ).ready( function() {
		// hide shipping address fields when 'local pickup' is selected
		function checkShippingMethod( elem ) {
			let $elem;

			if ( elem !== undefined ) {
				$elem = $( elem );
			} else {
				$elem = $(
					'body.woocommerce form.checkout input[name^="shipping_method"]:checked'
				);
			}

			if ( $elem ) {
				// eslint-disable-next-line vars-on-top
				const val = $elem.val();

				if ( val.match( '^local_pickup' ) ) {
					// local
					$( '#customer_details .col-shipping' ).fadeOut();
				} else {
					// delivery
					$( '#customer_details .col-shipping' ).fadeIn();
					scrollToElem( '.wc-checkout-form .col-shipping' );
				}
			}
		}

		if ( 0 < $( 'body.woocommerce form.checkout' ).length ) {
			$( 'body.woocommerce form.checkout' ).on(
				'change',
				'input[name^="shipping_method"]',
				function() {
					checkShippingMethod( this );
				}
			);

			checkShippingMethod();
		}
	} );
}( jQuery ) );
