<?php
/*
Template Name: Portal landing
*/
get_header(); ?>

<div class="portal-landing">

<?php while ( have_posts() ) : the_post(); ?>

	<?php
	global $post;
    $banner_img   = make_path_relative_no_pre_path( get_feature_image_url( $post->ID, 'full', true ) );
	$logo         = make_path_relative_no_pre_path( get_post_meta( $post->ID, 'portal_logo', true ) );
	$bar          = get_post_meta( $post->ID, 'stay_up_to_date', true );
	$facebook     = get_post_meta( $post->ID, 'facebook_link', true );
	$twitter      = get_post_meta( $post->ID, 'twitter_link', true );
    $instagram    = get_post_meta( $post->ID, 'instagram_link', true );
	$newsletter   = get_post_meta( $post->ID, 'newsletter_link', true );
	$intro_img    = make_path_relative_no_pre_path( get_post_meta( $post->ID, 'intro_img', true ) );
	$class        = $logo ? 'portal-branding' : 'portal-title';
	?>

	<div class="banner feature-img" role="banner" <?php echo $banner_img ?>>
		<?php get_template_part( 'breadcrumb' ); ?>
		<div class="heading-banner">
			<div class="container">
				<div class="row">
					<div class="col-md-12 <?php echo $class ?>">
						<?php echo portal_brand( $logo, get_the_title() ); ?>
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
				<?php get_image_caption( 'top' ); ?>
			</div>
		</div>
		<?php if ($bar == 'Enable') {
			echo portal_connect_bar( $facebook, $twitter, $instagram, $newsletter );
		} ?>
	</div>
	<main id="main" role="main">
        <div class="intro-content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-9 col-sm-8">
                        <div class="intro-entry">
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-4">
                        <div class="intro-image" style="background-image: url(<?php echo $intro_img ?>);">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cards">
            <div class="container">
                <div class="row">
                    <?php
                    for ( $i=0 ; $i<=9 ; $i++ ) {
                        $url        = get_post_meta( $post->ID, 'portal_card_url_'.$i, true );
                        $title      = get_post_meta( $post->ID, 'portal_card_title_'.$i, true );
                        $excerpt    = get_post_meta( $post->ID, 'portal_card_excerpt_'.$i, true );
                        $image      = get_post_meta( $post->ID, 'portal_card_img_'.$i, true );
                        $date       = get_post_meta( $post->ID, 'portal_card_date_'.$i, true );
                        $label      = get_post_meta( $post->ID, 'portal_card_label_'.$i, true );
                        $expire     = get_post_meta( $post->ID, 'portal_card_expire_'.$i, true );

                        if ( portal_is_card_active( $expire ) ) {

                            echo display_card( $i, $url, $title, $excerpt, $image, $date, $label );

                        } else {

                            echo portal_fallback_card( $i );

                        }
                    }
                    ?>
                </div>
            </div>
        </div>
	</main>

<?php endwhile; ?>

</div>

<?php get_footer(); ?>