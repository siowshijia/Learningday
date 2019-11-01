<?php defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' );

if ( ! function_exists( 'theme_wc_setup' ) ) {
	function theme_wc_setup() {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// make the Bookings calender default to the month with the first available booking.
		add_filter( 'wc_bookings_calendar_default_to_current_date', '__return_false' );

		// other actions and filters here
	}
	add_action( 'after_setup_theme', 'theme_wc_setup' );
}




/**
 * Replace WooCommerce input classes to Boostrap's.
 *
 * @access public
 * @param  array  $args
 * @param  string $key
 * @param  string $value
 *
 * @return array
 */
function theme_wc_form_field_args( $args, $key, $value ) {
	foreach ( $args['class'] as $class_index => $class ) {
		if ( in_array( $class, [ 'form-row-first', 'form-row-last', 'form-row', 'form-row-wide' ] ) ) {
			unset( $args['class'][ $class_index ] );
			array_push( $args['class'], 'form-group' );

			if ( ! in_array( $key, [ 'shipping_country', 'billing_country' ] ) ) {
				$args['input_class'] = [];
				array_push( $args['input_class'], 'form-control' );
			}
		}
	}

	if ( $args['type'] == 'password' ) {
		$args['input_class'] = [ 'form-control' ];
	}

	if ( $args['type'] == 'textarea' ) {
		$args['input_class'] = [ 'form-control' ];
	}

	return $args;
}
add_filter( 'woocommerce_form_field_args', 'theme_wc_form_field_args', 10, 3 );




/**
 * Add active class so nav links status works with Bootstrap.
 *
 * @access public
 * @param  array $classes
 * @param  obj   $endpoint
 *
 * @return array
 */
function theme_wc_account_menu_item_classes( $classes, $endpoint ) {
	foreach ( $classes as $class ) {
		if ( in_array( $class, [ 'is-active' ] ) ) {
			array_push( $classes, 'active' );
		}
	}

	return $classes;
}
add_filter( 'woocommerce_account_menu_item_classes', 'theme_wc_account_menu_item_classes', 10, 2 );




/**
 * Default breadcrumb to Boostrap classes.
 *
 * @access public
 * @param  array $args
 *
 * @return array
 */
function theme_wc_breadcrumb_defaults( $args ) {
	return [
		'delimiter'   => '',
		'wrap_before' => '<ol class="breadcrumb">',
		'wrap_after'  => '</ol>',
		'before'      => '<li>',
		'after'       => '</li>',
	];
}
add_filter( 'woocommerce_breadcrumb_defaults', 'theme_wc_breadcrumb_defaults', 10, 1 );




/**
 * Output script to hide shipping fields if 'local pickup' is selected.
 *
 * @access public
 *
 * @return array
 */
function theme_wc_after_checkout_form() {
	global $woocommerce;

	$chosen_methods = WC()->session->get( 'chosen_shipping_methods' );

	$chosen_shipping_no_ajax = $chosen_methods[0];

	if ( strpos( $chosen_shipping_no_ajax, 'local_pickup' ) === 0 ) { ?>
		<script type="text/javascript">jQuery('#customer_details .col-shipping').fadeOut();</script>
		<?php
	}
}
add_action( 'woocommerce_after_checkout_form', 'theme_wc_after_checkout_form' );
