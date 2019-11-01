<?php
/**
 * Template Name: Full Width
 *
 * @package    WebImp
 * @subpackage ClientTheme
 * @since      Client Theme 1.0
 */

defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' );

get_header( 'primary' );
?>

<main>
	<article <?php post_class(); ?>>
		<?php if ( have_posts() ) { ?>
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		<?php } ?>
	</article>
</main>

<?php
get_footer();
