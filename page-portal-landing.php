<?php
/*
Template Name: Portal landing
*/
get_header(); ?>

<div class="portal-landing">

<?php while ( have_posts() ) : the_post(); ?>

	<?php
	global $post;
    $banner_img = make_path_relative_no_pre_path( get_feature_image_url( $post->ID, 'full' ) )
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
		<?php
		$bar          = get_post_meta( $post->ID, 'stay_up_to_date', true );
		$facebook     = get_post_meta( $post->ID, 'facebook_link', true );
		$twitter      = get_post_meta( $post->ID, 'twitter_link', true );
		$newsletter   = get_post_meta( $post->ID, 'newsletter_link', true );

		if ($bar == 'Enable') {
			echo display_stay_up_to_date_bar( $facebook, $twitter, $newsletter );
		}
		?>
	</div>
	<main id="main" role="main">
		<div class="container">
			<div class="flex-row">
				<div class="col-card-12">
					<div class="card intro-card">
						<div class="intro-content">
							<div class="intro-entry">
								<div class="entry-content">
									<?php the_content(); ?>
								</div>
							</div>
							<div class="entry-image" style="background-image: url(<?php echo get_post_meta( $post->ID, 'intro_img', true ); ?>)"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="flex-row">
				<?php
				for ( $i=0 ; $i<=6 ; $i++ ) {
					$url        = get_post_meta( $post->ID, 'portal_card_url_'.$i, true );
					$title      = get_post_meta( $post->ID, 'portal_card_title_'.$i, true );
					$excerpt    = get_post_meta( $post->ID, 'portal_card_excerpt_'.$i, true );
					$image      = get_post_meta( $post->ID, 'portal_card_img_'.$i, true );
					$date       = get_post_meta( $post->ID, 'portal_card_date_'.$i, true );

					echo display_portal_card( $i, $url, $title, $excerpt, $image, $date );
				}
				?>
			</div>
		</div>
	</main>

<?php endwhile; ?>

</div>

<?php get_footer(); ?>