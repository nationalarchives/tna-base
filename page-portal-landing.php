<?php
/*
Template Name: Portal landing
*/
get_header(); ?>

<div class="portal-landing">

<?php while ( have_posts() ) : the_post(); ?>

	<?php
	$feature_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
	if ( $feature_img ) {
		$banner_img = 'style="background: url(' . make_path_relative( $feature_img[0] ) . ') no-repeat center center;background-size: cover;"';
	} else {
		$banner_img = '';
	}
	?>

	<div class="banner feature-img" role="banner" <?php echo $banner_img ?>>
		<?php get_template_part( 'breadcrumb' ); ?>
		<div class="heading-banner text-center">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
				<?php get_image_caption( 'top' ); ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="flex-row">
			<div class="col-card-12">
				<div class="card hero-banner clearfix">
					<div class="entry-image" style="background-image: url(http://www.nationalarchives.gov.uk//wp-content/uploads/sites/24/2017/12/New-season-banner.jpg)"></div>
					<div class="hero-banner-entry">
						<div class="entry-content feature">
							<div class="content-type">Feature</div>
							<h3>What's On 2018</h3>
							<p>Book now for our January to March season of talks, webinars, family events and more.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php endwhile; ?>

</div>

<?php get_footer(); ?>