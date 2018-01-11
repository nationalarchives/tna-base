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

<?php endwhile; ?>

</div>

<?php get_footer(); ?>