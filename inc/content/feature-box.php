<?php
global $post;
$feature_box    = get_post_meta( $post->ID, 'feat_box', true );
$feature_image  = make_path_relative_no_pre_path( get_feature_image_url( 'feature-box-thumb' ) );
$content_class  = ($feature_image) ? 'col-xs-12 col-sm-6 col-md-6' : 'col-xs-12 col-sm-8 col-md-8';
?>
<article>
    <div class="entry-header">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="row entry-content">
        <div class="<?php echo $content_class; ?>">
            <?php the_content(); ?>
        </div>
        <?php if ($feature_box) { ?>
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="well">
                    <?php echo wpautop($feature_box); ?>
                </div>
            </div>
        <?php } elseif ($feature_image) { ?>
            <div class="col-xs-12 col-sm-6 col-md-6">
                <figure class="feature-img">
                    <img src="<?php echo $feature_image; ?>" class="img-responsive" alt="<?php the_title(); ?>">
                </figure>
            </div>
        <?php } ?>
    </div>
</article>