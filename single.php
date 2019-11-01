<?php defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' );

get_header( 'primary' );
?>

<main class="container">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<article <?php post_class(); ?>>
				<?php get_template_part( 'partials/meta', get_post_type() ); ?>

				<h1><?php the_title(); ?></h1>

				<?php the_content(); ?>
			</article>
			<?php
		endwhile;
	endif;
	?>
</main>

<?php get_footer(); ?>
