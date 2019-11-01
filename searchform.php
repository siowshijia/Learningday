<?php defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' ); ?>
<form action="<?php echo esc_attr( site_url() ); ?>" method="get">
	<div class="form-group">
		<div class="input-group">
			<input type="search" name="s" id="search" aria-label="Search" value="<?php the_search_query(); ?>" class="form-control" placeholder="Search the site &hellip;">
			<span class="input-group-append">
				<button type="submit" class="btn btn-outline-secondary"><span class="fa fa-fw fa-search"></span></button>
			</span>
		</div>
	</div>
</form>
