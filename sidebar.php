<aside id="sidebar" class="col-xs-12 col-sm-4" role="complementary">
    <div>
        <div class="sidebar-header">
            <h2>
                <?php
                // This gets home and parent page IDs
                $parent_id = $post->post_parent;
                $home_id = get_option('page_on_front');
                // This gets the link to the parent page, based on the parent page ID
                $parent_page_id = ($parent_id == 0 ? get_option('page_on_front') : $parent_id);
                $redirectHeading = get_post_meta( $parent_page_id, 'redirectUrl', true );
                if ( $redirectHeading ) { ?>
                    <a href="<?php echo $redirectHeading; ?>">
                <?php } else { ?>
                    <a href="<?php echo make_path_relative( get_permalink($parent_page_id) ); ?>">
                <?php } ?>
                    Also in <?php echo get_the_title($parent_page_id);?>
                </a>
            </h2>
        </div>
        <div class="sidebar-nav clearfix">
            <ul class="sibling">
                <?php
                $args = array(
                    'child_of' => $parent_id,
                    'parent' => $parent_id,
                    'hierarchical' => 0,
                    'sort_column' => 'menu_order',
                    'exclude' => array( $post->ID, $home_id ),
                    'post_type' => 'page',
                    'post_status' => 'publish'
                );
                $pages = get_pages( $args );
                foreach ( $pages as $page ) {
                    $redirect = get_post_meta( $page->ID, 'redirectUrl', true );
                    if ( $redirect ) { ?>
                        <li>
                            <a href="<?php echo $redirect; ?>" title="<?php echo $page->post_title ?>">
                                <?php echo $page->post_title; ?>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li>
                            <a href="<?php echo make_path_relative( get_page_link( $page->ID ) ); ?>" title="<?php echo $page->post_title ?>">
                                <?php echo $page->post_title; ?>
                            </a>
                        </li>
                    <?php }
                } ?>
            </ul>
        </div>
    </div>
</aside>