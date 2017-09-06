<?php
/**
 * Template parts
 *
 */

function get_page_banner( $type, $title, $image='', $content='', $button='', $url='', $section_content='' ) {
	if ( $type == 'level one' ) { ?>
		<article class="banner feature-img feature-img-bg" <?php echo $image; ?>>
			<div class="entry-header">
				<h1><?php echo $title; ?></h1>
			</div>
			<?php if ( $content ) { ?>
				<div class="entry-content">
					<div class="col-xs-9 page-content">
						<?php echo $content; ?>
					</div>
					<?php if ( $button ) { ?>
						<div class="col-xs-3 call-to-action-button">
							<a href="<?php echo $url; ?>" title="<?php echo $button; ?>"
							   class="ghost-button">
								<?php echo $button; ?>
							</a>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
			<?php get_image_caption( 'top' ) ?>
		</article>
	<?php } elseif ( $type == 'section' ) {
		$content_class  = ($image && !$section_content) ? 'col-xs-12 col-sm-6 col-md-6' : 'col-xs-12 col-sm-8 col-md-8';
		?>
		<article>
			<div class="entry-header">
				<h1><?php echo $title; ?></h1>
			</div>
			<div class="row entry-content">
				<div class="<?php echo $content_class; ?>">
					<?php echo $content; ?>
				</div>
				<?php if ($section_content) { ?>
					<div class="col-xs-12 col-sm-4 col-md-4">
						<div class="well">
							<?php echo wpautop($section_content); ?>
						</div>
					</div>
				<?php } elseif ($image) { ?>
					<div class="col-xs-12 col-sm-6 col-md-6">
						<figure class="feature-img">
							<img src="<?php echo $image; ?>" class="img-responsive" alt="<?php echo $title; ?>">
							<?php get_image_caption( 'top' ) ?>
						</figure>
					</div>
				<?php } ?>
			</div>
		</article>
	<?php }
}

function get_content_boxes( $boxes ) {

	foreach ( $boxes as $box ) {

		$title      = $box['title'];
		$url        = $box['url'];
		$image      = $box['image'];
		$content    = $box['content'];
		$display    = $box['display'];

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

		if ( !empty( $title ) && $display != 'disabled' ) { ?>
			<div class="col-md-<?php echo $mdCol . ' ' . $colClass; ?>">
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
		<?php }
	}
}