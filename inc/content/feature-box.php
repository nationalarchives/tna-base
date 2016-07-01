<?php
global $post;

/* Feature box */
$content_with_feat_box = '<div class="col-xs-12 col-sm-8 col-md-8">';
$content_with_feat_img = '<div class="col-xs-12 col-sm-6 col-md-6">';
$feat_box = get_post_meta(get_the_ID(), 'feat_box', true);

if (!empty( $feat_box )) { // This is the custom field block
	echo $content_with_feat_box;
	if (have_posts()) :
		while (have_posts()) :
			the_post();
			the_content();
			echo '</div>';
			echo '<div class="col-xs-12 col-sm-4 col-md-4"><div class="well">'.wpautop($feat_box).'</div></div>';
		endwhile;
	endif;
} elseif (has_post_thumbnail()) { // This is the feature image block.
	echo $content_with_feat_img;
	if (have_posts()) :
		while (have_posts()) :
			the_post();
			the_content();
			echo '</div>';
			echo '<div class="col-xs-12 col-sm-6 col-md-6">';
			$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'feature-box-thumb' );
			?>
			<figure>
				<img src="<?php echo make_path_relative($image_url[0]); ?>" class="img-responsive" alt="<?php echo $post->post_title ?>">
				<?php get_image_caption() ?>
			</figure>
			<?php
			echo '</div>';
		endwhile;
	endif;
} elseif (empty($feat_box) && the_post_thumbnail() == null){
	echo $content_with_feat_box;
	if (have_posts()) :
		while (have_posts()) :
			the_post();
			the_content();
		endwhile;
	endif;
	echo '</div>';
	echo '<div class="col-xs-12 col-sm-4 col-md-4">&nbsp;</div>';
}
?>