<?php global $post; ?>
<article class="banner feature-img feature-img-bg" <?php echo make_path_relative_no_pre_path( get_feature_image_url( 'full-page-width', true ) ); ?>>
<div class="entry-header">
	<h1><?php the_title(); ?></h1>
</div>
<?php
$buttonTitle = get_post_meta( $post->ID, 'action_button_title', true );
$buttonUrl = get_post_meta( $post->ID, 'action_button_url', true );
if( empty( $post->post_content ) ) {
	// Do nothing - banner content overlay is not displayed
} else {
	// Banner content overlay
	?>
	<div class="entry-content">
		<div class="col-xs-9 page-content">
			<?php the_content(); ?>
		</div>
		<?php
		if ( $buttonTitle ) { ?>
			<div class="col-xs-3 call-to-action-button">
				<a href="<?php echo $buttonUrl; ?>" title="<?php echo $buttonTitle; ?>" class="ghost-button">
					<?php echo $buttonTitle; ?>
				</a>
			</div>
		<?php } ?>
	</div>
<?php } ?>
<?php get_image_caption( 'top' ) ?>
</article>