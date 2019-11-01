<?php defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' );

/*
 * Template Name: Full Width
 */

get_header( 'primary' );
?>

<main>
	<article class="section-base">
		<div class="container-md text-center">
			<h1 class="section-title">Page Not Found</h1>
			<p>Unfortunately, the page you're looking for is not here. You might like to try going back to the <a href="<?php bloginfo( 'url' ); ?>">homepage</a>.</p>
		</div>
	</article>
</main>

<?php
get_footer();
