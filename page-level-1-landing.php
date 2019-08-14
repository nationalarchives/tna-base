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
					$content    = get_post_meta( $post->ID, 'level_one_tag_line', true );
					$button     = get_post_meta( $post->ID, 'action_button_title', true );
					$url        = get_post_meta( $post->ID, 'action_button_url', true );
					?>
                    <div class="banner feature-img feature-img-bg" <?php echo $image; ?>>
                        <div class="entry-header">
                            <h1><?php echo $title; ?></h1>
                        </div>
                        <?php if ( $content ) { ?>
                            <div class="entry-content">
                                <div class="tag-line">
                                    <?php echo $content; ?>
                                </div>
                                <?php if ( $button ) { ?>
                                    <div class="call-to-action-button">
                                        <a href="<?php echo $url; ?>" title="<?php echo $button; ?>"
                                           class="button">
                                            <?php echo $button; ?>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php get_image_caption( 'top' ) ?>
                    </div>
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

                            if ( $url != '' ) {

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