<?php defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' );

get_header( 'primary' ); ?>

<main class="container">
	<div class="row">
		<section class="col-md-8">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
					<?php get_template_part( 'partials/loop', get_post_type() ); ?>
					<?php
			endwhile;
			endif;
			?>

			<?php if ( $pagination = theme_archive_pagination( false ) ) { ?>
				<div class="text-center">
					<?php echo $pagination; ?>
				</div>
			<?php } ?>
		</section>

		<aside class="col-md-4">
			<?php if ( is_active_sidebar( 'sidebar-blog' ) ) { ?>
				<div class="widgets">
					<?php dynamic_sidebar( 'sidebar-blog' ); ?>
				</div>
			<?php } else { ?>
				<div class="alert alert-info">
					<span class="fa fa-fw fa-info-circle"></span> No widgets found.
				</div>
			<?php } ?>
		</aside>
	</div>
</main>

<?php
get_footer();
