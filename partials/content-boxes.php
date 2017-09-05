<div class="row equal-heights">
	<?php
	global $post;
	// Loop generating boxes
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