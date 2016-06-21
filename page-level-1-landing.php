<?php
/*
Template Name: Level 1 landing
*/
get_header(); ?>
<?php get_template_part( 'breadcrumb' ); ?>

	<div id="primary" class="level-one">
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="container">
			<div class="row" role="banner">
				<div class="col-md-12">
					<article class="banner feature-img-bg" <?php
					if ( has_post_thumbnail() ) {
						$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full-page-width' ); ?>
						style="background-image: url(<?php echo make_path_relative( $thumbnail_src[0] ); ?>);"
					<?php } ?>>
						<div class="entry-header">
							<h1><?php the_title(); ?></h1>
						</div>
							<?php if( empty( $post->post_content) ) {
								// Do nothing - banner content overlay is not displayed
							} else {
								// Banner content overlay
								?>
								<div class="entry-content">
									<div class="col-xs-9">
										<?php the_content(); ?>
									</div>
								<?php
								$buttonTitle = get_post_meta( $post->ID, 'action_button_title', true );
								$buttonUrl = get_post_meta( $post->ID, 'action_button_url', true );
								if ( $buttonTitle ) { ?>
									<div class="col-xs-3 text-right call-to-action-button">
										<a href="<?php echo $buttonUrl; ?>" title="<?php echo $buttonTitle; ?>" class="ghost-button">
											<?php echo $buttonTitle; ?>
										</a>
									</div>
								<?php } ?>
								</div>
							<?php } ?>
					</article>
				</div>
			</div>
			<main id="main" role="main">
				<div class="row equal-heights">
						<?php
						$n = get_post_meta( $post->ID, 'number_of_boxes', true );
						for ($i = 1; $i <= $n; $i++) {
							// Fetch page meta values
							$title = get_post_meta( $post->ID, 'box_title_'.$i, true );
							$url = get_post_meta( $post->ID, 'box_title_url_'.$i, true );
							$image = get_post_meta( $post->ID, 'box_image_url_'.$i, true );
							$content = get_post_meta( $post->ID, 'box_content_'.$i, true );
							$display = get_post_meta( $post->ID, 'box_width_'.$i, true );
							// Condition to set box width and add appropriate classes
							if ( $display == 'at full width' ) {
								$mdCol = '12';
								$colClass = 'box-full';
							} elseif ( $display == 'at a half' ) {
								$mdCol = '6';
								$colClass = 'box-half';
							} else {
								$mdCol = '4';
								$colClass = 'box-third';
							}
							if ( !empty( $title ) && $display != 'disabled' ) {
								?>
								<div class="col-md-<?php echo $mdCol . ' box-' . $i . ' ' . $colClass; ?>">
									<article>
										<?php if ( !empty( $image ) ) { ?>
												<div class="entry-header feature-img-bg" style="background-image: url(<?php echo $image; ?>);">
											<?php }  else { ?>
												<div class="entry-header">
											<?php } ?>
											<h2>
												<?php if ( !empty( $url ) ) { ?>
												<a href="<?php echo $url ?>">
													<?php echo $title ?>
												</a>
												<?php } else { echo $title; } ?>
											</h2>
										</div>
										<div class="entry-content clearfix">
											<?php echo $content ?>
										</div>
									</article>
								</div>
							<?php } else {
								// Box has either no title or is disabled so do nothing
							}
						} ?>
				</div>
			</main>
		</div>
		<?php endwhile; ?>
	</div>

<?php get_footer(); ?>