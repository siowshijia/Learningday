<?php defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' ); ?>
<ul class="list-meta">
	<li><span class="fa fa-fw fa-calendar"></span> <?php echo get_the_date(); ?></li>
	<?php if ( $categories = get_the_category_list( ',' ) ) { ?>
		<li><span class="fa fa-fw fa-folder"></span> <?php echo $categories; ?></li>
	<?php } ?>
</ul>
