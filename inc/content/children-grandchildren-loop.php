<?php
$page_id    = ( is_front_page() ? 0 : get_the_ID() ); //Gets the id for the current page.
$childpages = new WP_Query( array(
        'post_type'      => 'page',
        'post_parent'    => $page_id,
        'posts_per_page' => - 1,
        'post__not_in'   => array( get_option( 'page_on_front' ) ),
        'orderby'        => 'menu_order date',
        'order'          => 'ASC'
    )
);
while ( $childpages->have_posts() ) : $childpages->the_post();

    $redirect = get_post_meta( $post->ID, 'redirectUrl', true );
    $page_link  = ($redirect) ?  $redirect : make_path_relative( get_page_link() );
    $feature_image  = make_path_relative_no_pre_path( get_feature_image_url( 'landing-page-children-thumb' ) );
    ?>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <article>
            <div class="entry-header">
                <h2>
                    <a href="<?php echo $page_link; ?>" title="<?php echo $post->post_title ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>
            </div>
            <div class="entry-content clearfix">
                <?php if ( $feature_image ) { ?>
                <a href="<?php echo $page_link; ?>" class="thumbnail" title="<?php echo $post->post_title ?>">
                    <img src="<?php echo $feature_image; ?>" class="img-responsive" alt="<?php echo $post->post_title ?>">
                </a>
                <?php } ?>

                <?php if ( has_excerpt( $post->ID ) ) {
                    echo the_excerpt();
                } else {
                    echo '<p>' . first_sentence( get_the_content() ) . '</p>';
                } ?>

                <?php $child_page_id = get_the_ID();
                // loop through the sub-pages for each child page as grandchildren.
                $grandchildrenpages = new WP_Query( array(
                        'post_type'      => 'page',
                        'post_parent'    => $child_page_id,
                        'posts_per_page' => - 1,
                        'orderby'        => 'menu_order date',
                        'order'          => 'ASC'
                    )
                );
                if ( $grandchildrenpages->have_posts() ): ?>
                    <ul class="child">
                        <?php while ( $grandchildrenpages->have_posts() ) : $grandchildrenpages->the_post();
                            $redirect = get_post_meta( $post->ID, 'redirectUrl', true );
                            $page_link  = ($redirect) ?  $redirect : make_path_relative( get_page_link() );
                            ?>
                            <li>
                                <a href="<?php echo $page_link; ?>" title="<?php echo $post->post_title ?>">
                                    <?php the_title(); ?>
                                </a>
                            </li>
                        <?php endwhile;
                        wp_reset_query(); ?>
                    </ul>
                <?php endif; ?>
            </div>
        </article>
    </div>
<?php endwhile;
wp_reset_postdata(); ?>
