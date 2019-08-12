<?php
/*
 * Template Name: Level 1 landing
 *
 */
get_header(); ?>

<?php get_template_part( 'breadcrumb' ); ?>

	<div id="primary" class="level-one">
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="container">
			<div class="row" role="banner">
				<div class="col-md-12">
					<?php
					global $post;
					$image      = make_path_relative_no_pre_path( get_feature_image_url( $post->ID, 'full-page-width', true ) );
					$title      = get_the_title();
					$content    = wpautop(get_the_content());
					$button     = get_post_meta( $post->ID, 'action_button_title', true );
					$url        = get_post_meta( $post->ID, 'action_button_url', true );
					get_page_banner( 'level one', $title, $image, $content, $button, $url );
					?>
				</div>
			</div>
        </div>
        <main id="main" role="main">
            <div class="cards">
                <div class="container">
                    <div class="row">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            $title   = get_post_meta( $post->ID, 'card_level_one_title_' . $i, true );
                            $url     = get_post_meta( $post->ID, 'card_level_one_url_' . $i, true );
                            $image   = get_post_meta( $post->ID, 'card_level_one_image_' . $i, true );
                            $excerpt = wpautop(get_post_meta( $post->ID, 'card_level_one_excerpt_' . $i, true ));
                            $label   = get_post_meta( $post->ID, 'card_level_one_label_' . $i, true );
                            $date    = '';

                            if ( $title != '' ||  $url != '' ) {

                                echo display_card( $i, $url, $title, $excerpt, $image, $date, $label );

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