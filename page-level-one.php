<?php
/*
 * Template Name: Level one
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
            <?php
            $section_1  = get_post_meta( $post->ID, 'level_one_template_part_1', true );
            $section_2  = get_post_meta( $post->ID, 'level_one_template_part_2', true );
            $section_3  = get_post_meta( $post->ID, 'level_one_template_part_3', true );

            if ( $section_1 ) {
                get_template_part( 'partials/'.$section_1 );
            }
            if ( $section_2 ) {
                get_template_part( 'partials/'.$section_2 );
            }

            get_template_part( 'partials/level-one-cards' );

            if ( $section_3 ) {
                get_template_part( 'partials/'.$section_3 );
            }
            ?>
        </main>
		<?php endwhile; ?>
	</div>

<?php get_footer(); ?>