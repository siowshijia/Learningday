<?php
/**
 * Template Name: Home
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
						<div class="swiper-slide" style="background-image:url('<?php echo $slide['background_image']['sizes']['background-cover']; ?>')">
							<div class="container">
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

	<section class="section-base">
		<div class="container">
			<h2 class="section-title">Section Title</h2>
			<p class="section-lead">Section lead is a short sentence without any full stop</p>
			<div class="masonry-grid row">
				<div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<div class="text-center">
						<span class="fa-stack fa-5x">
							<span class="fa fa-square-o fa-stack-2x"></span>
							<span class="fa fa-twitter fa-stack-1x"></span>
						</span>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquet viverra quam id blandit. Sed efficitur finibus tincidunt. Mauris condimentum hendrerit libero, eu dapibus urna tempus quis.</p>
					</div>
				</div>
				<div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<div class="text-center">
						<span class="fa-stack fa-5x">
							<span class="fa fa-square-o fa-stack-2x"></span>
							<span class="fa fa-google fa-stack-1x"></span>
						</span>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquet viverra quam id blandit. Sed efficitur finibus tincidunt. Mauris condimentum hendrerit libero, eu dapibus urna tempus quis.</p>
					</div>
				</div>
				<div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4 col-lg-4">
					<div class="text-center">
						<span class="fa-stack fa-5x">
							<span class="fa fa-square-o fa-stack-2x"></span>
							<span class="fa fa-facebook fa-stack-1x"></span>
						</span>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquet viverra quam id blandit. Sed efficitur finibus tincidunt. Mauris condimentum hendrerit libero, eu dapibus urna tempus quis.</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="section-base section-services">
		<div class="container">
			<h2 class="section-title">Services Title</h2>
			<p class="section-lead">Section lead is a short sentence without any full stop</p>
			<div class="masonry-grid row">
				<?php for($i = 0; $i < 8 ; $i++) { ?>
					<div class="masonry-grid-item col-xs-12 col-sm-6 col-md-4 col-lg-3">
						<div class="card mb-3">
							<a href="#" class="display-block">
								<img src="//via.placeholder.com/300x200" alt="Image Title when images aren't loaded" class="card-img-top">
							</a>

							<div class="card-body">
								<h5 class="m-t-none">Image Caption</h5>
								<p class="card_text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								<a href="#" class="btn btn-primary">Read More</a>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
