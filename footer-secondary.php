<?php defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' ); ?>
	<footer>
		<?php get_template_part( 'partials/navbar', 'secondary' ); ?>

		<ul class="nav-social">
			<li><a href="https://www.facebook.com/webimpsg/" class="brand-facebook" target="_blank" data-toggle="tooltip" title="Visit us on Facebook"><span class="fa fa-fw fa-facebook-official"></span></a></li>
		</ul>

		<p class="text-center text-muted">Copyright &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?></p>

		<?php wp_footer(); ?>
	</footer>
</body>
</html>
