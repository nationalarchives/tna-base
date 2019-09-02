<div class="cards">
    <div class="container">
        <div class="row">
            <?php
            $heading    = get_post_meta( $post->ID, 'level_one_cards_heading', true );
            $page       = str_replace(' ', '_', strtolower(get_the_title()));

            if ( $heading ) {
                echo '<div class="col-xs-12"><h2>'.$heading.'</h2></div>';
            }

            for ($i = 1; $i <= 12; $i++) {
                $title   = get_post_meta( $post->ID, 'card_level_one_title_' . $i, true );
                $url     = get_post_meta( $post->ID, 'card_level_one_url_' . $i, true );
                $image   = get_post_meta( $post->ID, 'card_level_one_image_' . $i, true );
                $excerpt = wpautop(get_post_meta( $post->ID, 'card_level_one_excerpt_' . $i, true ));
                $label   = get_post_meta( $post->ID, 'card_level_one_label_' . $i, true );
                $date    = '';
                $id      = $page.'_'.$i;

                if ( $url != '' ) {
                    if ( $label != 'Please select a label' ) {
                        echo display_card( $id, $url, $title, $excerpt, $image, $date, $label );
                    }
                }
            }
            ?>
        </div>
    </div>
</div>