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
                <main id="main" role="main">
                    <div class="row equal-heights">
                        <?php
                        $boxes  = array();
                        $n      = get_post_meta( $post->ID, 'number_of_boxes', true );
                        for ($i = 1; $i <= $n; $i++) {
                            $boxes[$i]['title']   = get_post_meta( $post->ID, 'box_title_' . $i, true );
                            $boxes[$i]['url']     = get_post_meta( $post->ID, 'box_title_url_' . $i, true );
                            $boxes[$i]['image']   = get_post_meta( $post->ID, 'box_image_url_' . $i, true );
                            $boxes[$i]['content'] = wpautop(get_post_meta( $post->ID, 'box_content_' . $i, true ));
                            $boxes[$i]['display'] = get_post_meta( $post->ID, 'box_width_' . $i, true );
                        }
                        get_content_meta_boxes( $boxes );
                        ?>
                    </div>
                </main>
            </div>
        <?php endwhile; ?>
    </div>

<?php get_footer(); ?>