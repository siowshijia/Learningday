<?php defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' ); ?>
	<footer class="section-base">
		<div class="text-center text-muted">
			<small>Copyright &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?></small>
			<p><small><?php echo theme_footer_link(); ?></small></p>
			<?php echo theme_footer_link( 'logo' ); ?>
		</div>
	</footer>

	<?php wp_footer(); ?>
</body>
</html>
