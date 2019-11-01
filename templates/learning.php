<?php
/**
 * Template Name: Learning
 *
 * @package    WebImp
 * @subpackage ClientTheme
 * @since      Client Theme 1.0
 */

defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' );

get_header( 'primary' );
?>

<main>
    <section class="section-base">
        <div class="container">
            <h1>Hello world</h1>
            <p>Today is a learning day.</p>

            <?php
        	if ( have_posts() ) :
        		while ( have_posts() ) :
        			the_post();

                    the_content();
        		endwhile;
        	endif;
        	?>
        </div>
    </section>
</main>

<?php
get_footer();
