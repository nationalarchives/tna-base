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

function get_content_boxes_from_children( $id ) {
	$pages = get_pages( array(
		'sort_order' => 'asc',
		'sort_column' => 'menu_order',
		'child_of' => $id,
		'parent' => $id
	) );
	foreach ( $pages as $page ) {
		$redirect = get_post_meta( $page->ID, 'redirectUrl', true );
		$page_link  = ($redirect) ?  $redirect : make_path_relative( get_page_link( $page->ID ) );
		$feature_image  = make_path_relative_no_pre_path( get_feature_image_url( $page->ID, 'landing-page-children-thumb' ) );
		$excerpt = ( $page->post_excerpt ) ? $page->post_excerpt : '<p>' . first_sentence( $page->post_content ) . '</p>'; ?>
		<div class="col-xs-12 col-sm-6">
			<article>
				<div class="entry-header">
					<h2>
						<a href="<?php echo $page_link; ?>" title="<?php echo $page->post_title ?>">
							<?php echo $page->post_title; ?>
						</a>
					</h2>
				</div>
				<div class="entry-content">
					<?php if ( $feature_image ) { ?>
						<a href="<?php echo $page_link; ?>" class="thumbnail" title="<?php echo $page->post_title ?>">
							<img src="<?php echo $feature_image; ?>" class="img-responsive" alt="<?php echo $page->post_title ?>">
						</a>
					<?php }
					echo $excerpt;
					$child_pages = get_pages( array(
						'sort_order' => 'asc',
						'sort_column' => 'menu_order',
						'child_of' => $page->ID,
						'parent' => $page->ID
					) );
					if ( $child_pages ) { ?>
						<ul class="child">
							<?php foreach ( $child_pages as $child_page ) {
								$redirect = get_post_meta( $child_page->ID, 'redirectUrl', true );
								$page_link  = ($redirect) ?  $redirect : make_path_relative( get_page_link( $child_page->ID ) );
								?>
								<li>
									<a href="<?php echo $page_link; ?>" title="<?php echo $child_page->post_title ?>">
										<?php echo $child_page->post_title; ?>
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