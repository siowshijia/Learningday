<?php defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' ); ?>
<article <?php post_class( 'article-loop' ); ?>>
	<?php get_template_part( 'partials/meta', get_post_type() ); ?>

	<h1><?php the_title(); ?></h1>

	<?php the_excerpt(); ?>
</article>
