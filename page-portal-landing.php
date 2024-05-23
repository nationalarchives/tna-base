<?php
/*
Template Name: Portal landing
*/
get_header(); ?>

<?php while ( have_posts() ) : the_post();
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
<div class="portal-landing">
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
		<?php if ($bar == 'Enable' || $bar == 'Top location') {
            $text = get_post_meta( $post->ID, 'stay_up_to_date_content', true );
            $color = get_post_meta( $post->ID, 'stay_up_to_date_colour', true );
			echo portal_connect_bar( $facebook, $twitter, $instagram, $newsletter, $color, $text );
		} ?>
	</div>
	<main id="main" role="main">
        <div class="intro-content">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-8">
                        <div class="intro-entry">
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <?php if ($intro_img){ ?>
                        <div class="intro-image" style="background-image: url(<?php echo $intro_img ?>);">
                        </div>
        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if (get_post_meta( $post->ID, 'feature_banner', true ) == 'Enable') {
            $banner_background_img_url = make_path_relative_no_pre_path( get_post_meta( $post->ID, 'feature_banner_background_img', true ) );
            $banner_background_img = !empty($banner_background_img_url) ? 'style="background-image: url('. $banner_background_img_url . ');"' : '';
            $banner_color = get_post_meta( $post->ID, 'feature_banner_colour', true );
            $banner_body = get_post_meta( $post->ID, 'feature_banner_body', true );
            $body_img_url = make_path_relative_no_pre_path(get_post_meta( $post->ID, 'feature_banner_body_img', true ));
            $banner_body_img = !empty($body_img_url) ? '<img src="'.$body_img_url.'" class="img-responsive" alt="'.get_post_meta( $post->ID, 'feature_banner_body_img_alt', true ).'">' : '';
            echo portal_display_feature_banner($banner_background_img, $banner_color, $banner_body, $banner_body_img);
        } ?>
        <div class="cards">
            <div class="container">
                <div class="row">
                    <?php
                    for ( $i=0 ; $i<=9 ; $i++ ) {

                        $expire     = get_post_meta( $post->ID, 'portal_card_expire_'.$i, true );

                        $args = array(
                            'id'            => $i,
                            'url'           => get_post_meta( $post->ID, 'portal_card_url_'.$i, true ),
                            'title'         => get_post_meta( $post->ID, 'portal_card_title_'.$i, true ),
                            'description'   => get_post_meta( $post->ID, 'portal_card_excerpt_'.$i, true ),
                            'image'         => get_post_meta( $post->ID, 'portal_card_img_'.$i, true ),
                            'event_date'    => get_post_meta( $post->ID, 'portal_card_date_'.$i, true ),
                            'label'         => get_post_meta( $post->ID, 'portal_card_label_'.$i, true )
                        );

                        $heading = get_post_meta( $post->ID, 'portal_card_section_heading_'.$i, true );
                        $color = get_post_meta( $post->ID, 'portal_card_section_color', true );
                        if (!empty($heading))
                        {
                            echo display_card_section_heading($heading, $color);
                        }

                        if ( portal_is_card_active( $expire ) ) {

                            echo display_card( $args );

                        } else {

                            echo portal_fallback_card( $i );

                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php if (get_post_meta( $post->ID, 'display_link_cards', true ) == 'Enable') {
            $color = get_post_meta( $post->ID, 'link_cards_colour', true );
            $cards = [];
            $content_type = get_post_meta( $post->ID, 'content_link_cards', true );
            for ( $i=0 ; $i<=5 ; $i++ ) {
                if (!empty(get_post_meta( $post->ID, 'portal_link_card_url_'.$i, true ))) {
                    $card = [
                        'url'           => get_post_meta( $post->ID, 'portal_link_card_url_'.$i, true ),
                        'title'         => get_post_meta( $post->ID, 'portal_link_card_title_'.$i, true )
                    ];
                    array_push($cards, $card);
                }
            }
            echo portal_display_link_cards($color, get_post_meta( $post->ID, 'portal_link_card_section_heading', true ), $cards, $content_type);
        }
        if ($bar == 'Bottom location') {
            $text = get_post_meta( $post->ID, 'stay_up_to_date_content', true );
            $color = get_post_meta( $post->ID, 'stay_up_to_date_colour', true );
            echo portal_connect_bar( $facebook, $twitter, $instagram, $newsletter, $color, $text );
        } ?>
	</main>
</div>
<?php endwhile; ?>

<?php get_footer(); ?>