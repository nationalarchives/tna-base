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

function get_content_meta_boxes( $boxes ) {
	foreach ( $boxes as $box ) {

		$mdCol      = ( $box['display'] == 'at full width' ) ? '12' : ( ( $box['display'] == 'at a half' ) ? '6' : '4');
		$colClass   = ( $box['display'] == 'at full width' ) ? 'box-full' : ( ( $box['display'] == 'at a half' ) ? 'box-half' : 'box-third');

		if ( !empty( $box['title'] ) && $box['display'] != 'disabled' ) { ?>
			<div class="col-md-<?php echo $mdCol . ' ' . $colClass; ?>">
				<article>
					<?php if ( !empty( $box['image'] ) ) { ?>
					<div class="entry-header feature-img-bg" style="background-image: url(<?php echo $box['image']; ?>);">
						<?php }  else { ?>
						<div class="entry-header">
							<?php } ?>
							<h2>
								<?php if ( !empty( $box['url'] ) ) { ?>
									<a href="<?php echo $box['url'] ?>">
										<?php echo $box['title'] ?>
									</a>
								<?php } else { echo $box['title']; } ?>
							</h2>
						</div>
						<div class="entry-content clearfix">
							<?php echo $box['content'] ?>
						</div>
				</article>
			</div>
		<?php }
	}
}

function get_content_boxes_from_children( $boxes ) {
	foreach ( $boxes as $box ) {
		?>
		<div class="col-xs-12 col-sm-6">
			<article>
				<div class="entry-header">
					<h2>
						<a href="<?php echo $box['url']; ?>" title="<?php echo $box['title'] ?>">
							<?php echo $box['title']; ?>
						</a>
					</h2>
				</div>
				<div class="entry-content">
					<?php if ( $box['image'] ) { ?>
						<a href="<?php echo $box['url']; ?>" class="thumbnail" title="<?php echo $box['title'] ?>">
							<img src="<?php echo $box['image']; ?>" class="img-responsive" alt="<?php echo $box['title'] ?>">
						</a>
					<?php }
					echo $box['excerpt'];
					if ( isset($box['child_pages']) ) { ?>
						<ul class="child">
							<?php foreach ( $box['child_pages'] as $child_page ) { ?>
								<li>
									<a href="<?php echo $child_page['url']; ?>" title="<?php echo $child_page['title'] ?>">
										<?php echo $child_page['title']; ?>
									</a>
								</li>
								<?php
							} ?>
						</ul>
					<?php } ?>
				</div>
			</article>
		</div>
		<?php
	}
}