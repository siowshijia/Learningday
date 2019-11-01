<?php defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' ); ?>
<ul id="navbar-secondary" class="list-inline">
	<?php
	wp_nav_menu(
		[
			'theme_location' => 'secondary',
			'container'      => false,
			'items_wrap'     => '%3$s',
			'depth'          => 1,
			'fallback_cb'    => false,
			'walker'         => new WP_Bootstrap_Navwalker(),
		]
	);
	?>
</ul>
