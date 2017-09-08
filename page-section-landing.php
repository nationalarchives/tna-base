<?php
/*
Template Name: Section landing
*/
get_header(); ?>

<?php get_template_part( 'breadcrumb' ); ?>

	<main id="primary" role="main" class="content-area">
		<div class="container">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="row">
					<div class="col-md-12">
						<?php
						global $post;
						$image           = make_path_relative_no_pre_path( get_feature_image_url( $post->ID, 'feature-box-thumb' ) );
						$title           = get_the_title();
						$content         = wpautop(get_the_content());
						$section_content = wpautop(get_post_meta( $post->ID, 'feat_box', true ));
						get_page_banner( 'section', $title, $image, $content, '', '', $section_content );
						?>
					</div>
				</div>
				<div class="row equal-heights" id="equal-heights">
					<?php
					$i     = 1;
					$n     = 1;
					$boxes = array();
					$id    = is_front_page() ? 0 : $post->ID;
					$pages = get_pages( array(
						'sort_order'  => 'asc',
						'sort_column' => 'menu_order',
						'exclude'     => array( $post->ID ),
						'child_of'    => $id,
						'parent'      => $id,
					) );
					foreach ( $pages as $page ) {
						$redirect               = get_post_meta( $page->ID, 'redirectUrl', true );
						$boxes[ $i ]['title']   = $page->post_title;
						$boxes[ $i ]['url']     = ( $redirect ) ? $redirect : make_path_relative( get_page_link( $page->ID ) );
						$boxes[ $i ]['image']   = make_path_relative_no_pre_path( get_feature_image_url( $page->ID, 'landing-page-children-thumb' ) );
						$boxes[ $i ]['excerpt'] = ( $page->post_excerpt ) ? $page->post_excerpt : first_sentence( $page->post_content );
						$child_pages            = get_pages( array(
							'sort_order'  => 'asc',
							'sort_column' => 'menu_order',
							'child_of'    => $page->ID,
							'parent'      => $page->ID
						) );
						if ( $child_pages ) {
							foreach ( $child_pages as $child_page ) {
								$redirect                                  = get_post_meta( $child_page->ID, 'redirectUrl', true );
								$boxes[ $i ]['child_pages'][ $n ]['title'] = $child_page->post_title;
								$boxes[ $i ]['child_pages'][ $n ]['url']   = ( $redirect ) ? $redirect : make_path_relative( get_page_link( $child_page->ID ) );
								$n ++;
							}
						}
						$i ++;
					}
					get_content_children_boxes( $boxes );
					?>
				</div>
			<?php endwhile; ?>
		</div>
	</main>

<?php get_footer(); ?>