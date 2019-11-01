<?php defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' );

if ( ! function_exists( 'verbose' ) ) {
	function verbose( $data ) {
		if ( current_user_can( 'manage_options' ) ) {
			echo '<pre>';
			print_r( $data );
			echo '</pre>';
		}
	}
}




if ( ! function_exists( 'theme_scripts' ) ) {
	function theme_scripts() {
		$package_name = THEME_TEXT_DOMAIN;
		$theme        = wp_get_theme();
		$version      = $theme->get( 'Version' );

		// makers.
		wp_register_style( 'makers', 'https://cdn.webimp.com.sg/fonts/webimp.css', [], '1.0.0' );

		// font awesome.
		wp_register_style( 'fontawesome', get_template_directory_uri() . '/assets/css/fontawesome.min.css', [], '5.11.2' );

		// main theme.
		wp_register_style( 'theme-styles', get_template_directory_uri() . '/assets/css/' . $package_name . '.min.css', [ 'fontawesome', 'theme-fonts', 'makers' ], $version );
		wp_register_script( 'theme-scripts', get_template_directory_uri() . '/assets/js/' . $package_name . '.min.js', [ 'jquery' ], $version, true );

		// woocommerce.
		wp_register_style( 'theme-wc-styles', get_template_directory_uri() . '/assets/css/' . $package_name . '-wc.min.css', [ 'makers', 'fontawesome', 'theme-fonts', 'woocommerce-general' ], $version );
		wp_register_script( 'theme-wc-scripts', get_template_directory_uri() . '/assets/js/' . $package_name . '-wc.min.js', [ 'jquery' ], $version, true );

		// custom fonts, used in the main stylesheet.
		wp_register_style( 'theme-fonts', theme_fonts_url(), [], $version );

		// masonry.
		wp_register_script( 'imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', [ 'jquery' ], '4.1.4', true );
		wp_register_script( 'masonry-layout', get_template_directory_uri() . '/assets/js/masonry.pkgd.min.js', [ 'jquery', 'imagesloaded' ], '4.2.1', true );
		wp_register_script( 'masonry-init', get_template_directory_uri() . '/assets/js/masonry.init.min.js', [ 'jquery', 'imagesloaded', 'masonry-layout' ], $version, true );

		// swiper.
		wp_register_style( 'swiper', get_template_directory_uri() . '/assets/css/swiper.min.css', [], '4.1.0' );
		wp_register_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper.min.js', [ 'jquery' ], '4.1.0', true );

		// swipebox.
		wp_register_style( 'swipebox', get_template_directory_uri() . '/assets/css/swipebox.min.css', [], '1.4.6' );
		wp_register_script( 'swipebox', get_template_directory_uri() . '/assets/js/swipebox.min.js', [ 'jquery' ], '1.4.6', true );

		// toolset's font awesome.
		wp_dequeue_style( 'font-awesome' );
		wp_deregister_style( 'font-awesome' );

		if ( is_page_template( 'templates/home.php' )
		|| is_page_template( 'templates/demo.php' )
		) {
			wp_enqueue_style( 'swiper' );
			wp_enqueue_script( 'swiper' );
			wp_enqueue_script( 'masonry-init' );
		}

		if ( function_exists( 'is_woocommerce' ) ) {
			switch ( true ) {
				case is_woocommerce():
				case is_cart():
				case is_checkout():
				case is_account_page():
				case is_wc_endpoint_url():
					wp_enqueue_style( 'theme-wc-styles' );
					wp_enqueue_script( 'theme-wc-scripts' );
					break;
				default:
					wp_enqueue_style( 'theme-styles' );
					break;
			}
		} else {
			wp_enqueue_style( 'theme-styles' );
		}

		wp_enqueue_script( 'theme-scripts' );
	}
	add_action( 'wp_enqueue_scripts', 'theme_scripts' );
}




if ( ! function_exists( 'theme_fonts_url' ) ) {
	function theme_fonts_url() {
		$fonts_url = '';
		$fonts     = [];

		$fonts[] = 'Open Sans:400,700';
		$fonts[] = 'Source Sans Pro:400,700';

		if ( $fonts ) {
			$fonts_url = add_query_arg(
				[
					'family' => rawurlencode( implode( '|', $fonts ) ),
				],
				'//fonts.googleapis.com/css'
			);
		}

		return $fonts_url;
	}
}




if ( ! function_exists( 'webimp_theme_setup' ) ) {
	function webimp_theme_setup() {
		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( THEME_TEXT_DOMAIN, get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'background-cover', 1200, 500, true );
		add_image_size( 'service-featured', 300, 200, true );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			[
				'primary'   => __( 'Primary Menu', THEME_TEXT_DOMAIN ),
				'secondary' => __( 'Secondary Menu', THEME_TEXT_DOMAIN ),
			]
		);

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			[
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			]
		);

		/**
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats',
			[
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
				'chat',
			]
		);

		/**
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style(
			[
				theme_fonts_url(),
			]
		);

		// hide Types' front-end display panel metabox.
		add_filter( 'types_information_table', '__return_false' );
	}
	add_action( 'after_setup_theme', 'webimp_theme_setup' );
}




if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page(
		[
			'page_title'  => __( 'Theme Options', THEME_TEXT_DOMAIN ),
			'capability'  => 'manage_options',
			'parent_slug' => 'themes.php',
		]
	);
}




if ( ! function_exists( 'theme_widgets' ) ) {
	function theme_widgets() {
		register_sidebar(
			[
				'name'          => __( 'Blog', THEME_TEXT_DOMAIN ),
				'id'            => 'sidebar-blog',
				'before_widget' => '<div id="%1$s" class="widget widget-%2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			]
		);
	}
	add_action( 'widgets_init', 'theme_widgets' );
}




if ( ! function_exists( 'theme_footer_link' ) ) {
	function theme_footer_link( $style = 'text', $type = 'website' ) {
		$site_url   = get_bloginfo( 'url' );
		$webimp_url = 'https://www.webimp.com.sg/solutions/';

		$components = wp_parse_url( $site_url );

		if ( $components['host'] ) {
			$domain = $components['host'];
		}

		switch ( $type ) {
			case 'ecommerce':
				$title           = 'E-Commerce';
				$webimp_solution = 'e-commerce/';
				break;
			default:
				$title           = 'Web Design';
				$webimp_solution = 'web-design-development/';
				break;
		}

		$final_url = add_query_arg(
			[
				'utm_source'   => $domain,
				'utm_campaign' => 'clients',
				'utm_medium'   => 'link',
				'utm_content'  => $style,
			],
			$webimp_url . $webimp_solution
		);

		switch ( $style ) {
			case 'logo':
				return '<a href="' . $final_url . '" rel="nofollow" target="_blank" data-toggle="tooltip" data-placement="top" title="' . $title . ' By Web Imp"><span class="wi wi-lg wi-logo wi-color"></span></a>';
			default:
				return $title . ' By <a href="' . $final_url . '" rel="nofollow" target="_blank" data-toggle="tooltip" data-placement="top" title="' . $title . ' By Web Imp">Web Imp</a>';
		}
	}
}




if ( ! function_exists( 'theme_archive_pagination' ) ) {
	function theme_archive_pagination( $echo = true ) {
		global $wp_query;

		$big = 999999999; // need an unlikely integer

		$pages = paginate_links(
			array(
				'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'    => '?paged=%#%',
				'current'   => max( 1, get_query_var( 'paged' ) ),
				'total'     => $wp_query->max_num_pages,
				'type'      => 'array',
				'prev_next' => true,
				'prev_text' => __( '« Prev', THEME_TEXT_DOMAIN ),
				'next_text' => __( 'Next »', THEME_TEXT_DOMAIN ),
			)
		);

		if ( is_array( $pages ) ) {
			$paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );

			$pagination = '<ul class="pagination">';

			foreach ( $pages as $page ) {
				$pagination .= "<li>$page</li>";
			}

			$pagination .= '</ul>';

			if ( $echo ) {
				echo $pagination;
			} else {
				return $pagination;
			}
		}
	}
}
