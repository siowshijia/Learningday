<?php defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' ); ?>
<nav class="navbar navbar-expand-lg navbar-light navbar-static-top">
	<div class="container">
		<a class="navbar-brand" href="<?php bloginfo( 'url' ); ?>" title="<?php echo bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle Navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbar-primary">
			<form action="<?php echo esc_attr( site_url() ); ?>" class="form-inline my-2 my-lg-0" method="get">
				<div class="input-group">
					<input type="search" name="s" id="search" aria-label="Search" value="<?php the_search_query(); ?>" class="form-control" placeholder="Search the site &hellip;">
					<div class="input-group-append">
						<button class="btn btn-outline-dark my-2 my-sm-0" type="submit"><span class="fa fa-fw fa-search"></span></button>
					</div>
				</div>
			</form>
			<ul class="navbar-nav ml-auto">
				<?php
				wp_nav_menu(
					[
						'theme_location' => 'primary',
						'container'      => false,
						'items_wrap'     => '%3$s',
						'depth'          => 2,
						'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback()',
						'walker'         => new WP_Bootstrap_Navwalker(),
					]
				);
				?>
			</ul>
		</div>
	</div>
</nav>
