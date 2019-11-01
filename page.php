<?php defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' );

get_header( 'primary' );
?>

<main class="container">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class( 'section-base section-' . get_post_field( 'post_name' ) ); ?>>
				<div class="container-md">
					<h1 class="section-title"><?php the_title(); ?></h1>

					<?php the_content(); ?>
				</div>
			</article>
			<?php
		endwhile;
	endif;
	?>
</main>

<?php
get_footer();
