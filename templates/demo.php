<?php
/**
 * Template Name: Demo
 *
 * @package    WebImp
 * @subpackage ClientTheme
 * @since      Client Theme 1.0
 */

defined( 'ABSPATH' ) || exit( 'Direct file access not permitted.' );

get_header( 'primary' );
?>
<main>
	<header>
		<?php if ($slides = get_field('slides')) { ?>
			<div class="swiper-container swiper-home">
				<div class="swiper-wrapper">
					<?php foreach ($slides as $slide) { ?>
						<div class="swiper-slide d-flex align-items-center" style="background-image:url('<?php echo $slide['background_image']['sizes']['background-cover']; ?>');">
							<div class="container text-center">
								<h1><?php echo $slide['title']; ?></h1>
							</div>
						</div>
					<?php } ?>
				</div>
				<div class="swiper-pagination"></div>
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>
			</div>
		<?php } ?>
	</header>

	<?php if (get_field('icon_title') || get_field('icon_lead_title') || get_field('icons')) { ?>
		<section class="section-base">
			<div class="container">
				<h2 class="section-title"><?php echo get_field('icon_title'); ?></h2>
				<p class="section-lead"><?php echo get_field('icon_lead_title'); ?></p>

				<?php if ($icons = get_field('icons')) { ?>
					<div class="masonry-grid row">
						<?php foreach ($icons as $icon) { ?>
							<div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="text-center">
									<span class="fa-stack fa-4x">
										<span class="fas fa-circle fa-stack-2x"></span>
										<span class="<?php echo $icon['icon']; ?> fa-stack-1x fa-inverse"></span>
									</span>
									<p><?php echo $icon['description']; ?></p>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</section>
	<?php } ?>

	<?php if (get_field('service_title') || get_field('service_lead_title') || get_field('services')) { ?>
		<section class="section-base section-services">
			<div class="container">
				<h2 class="section-title"><?php echo get_field('icon_title'); ?></h2>
				<p class="section-lead"><?php echo get_field('icon_lead_title'); ?></p>

				<?php if ($services = get_field('services')) { ?>
					<div class="masonry-grid row">
						<?php foreach ($services as $service) { ?>
							<div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4 col-lg-4">
								<div class="card mb-3">
									<a href="<?php echo $service['url']; ?>" class="display-block">
										<img src="<?php echo $service['image']['sizes']['medium']; ?>" alt="Image Title when images aren't loaded" class="card-img-top">
									</a>

									<div class="card-body">
										<h5 class="m-t-none"><?php echo $service['title']; ?></h5>
										<p class="card_text"><?php echo $service['caption']; ?></p>
										<a href="<?php echo $service['url']; ?>" class="btn btn-primary">Read More</a>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</section>
	<?php } ?>
</main>

<?php
get_footer();
