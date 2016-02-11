<div class="row equal-heights" id="equal-heights">
	<?php
	$page_id    = ( is_front_page() ? 0 : get_the_ID() ); //Gets the id for the current page.
	$childpages = new WP_Query( array(
			'post_type'      => 'page',
			'post_parent'    => $page_id,
			'posts_per_page' => - 1,
			'post__not_in'   => array( get_option( 'page_on_front' ) ),
			'orderby'        => 'menu_order date',
			'order'          => 'ASC'
		)
	);
	while ( $childpages->have_posts() ) : $childpages->the_post();
		?>
		<div class="col-xs-12 col-sm-6 col-md-6">
			<article>
				<div class="entry-header">
					<h2>
						<a href="<?php echo make_path_relative( get_page_link() ); ?>">
							<?php the_title(); ?>
						</a>
					</h2>
				</div>
				<div class="entry-content clearfix">
					<?php
					$image_id  = get_post_thumbnail_id( $page->ID );
					$image_url = wp_get_attachment_image_src( $image_id, 'landing-page-children-thumb', false );
					if ( $image_url ) {
						?>
						<a href="<?php echo make_path_relative( get_page_link( $page->ID ) ) ?>" class="thumbnail"
						   title="<?php echo $page->post_title ?>">
							<img src="<?php echo( make_path_relative( $image_url[0] ) ); ?>" class="img-responsive">
						</a>
						<?php
					}
					?>
					<?php
					if ( has_excerpt( $post->ID ) ) {
						echo the_excerpt();
					} else {
						echo "<p>" . first_sentence( get_the_content() ) . "</p>";
					}
					?>
					<?php
					$child_page_id = get_the_ID();
					// loop through the sub-pages for each child page as grandchildren.
					$grandchildrenpages = new WP_Query( array(
							'post_type'      => 'page',
							'post_parent'    => $child_page_id,
							'posts_per_page' => - 1,
							'cat'            => - EXCLUDE_FROM_INDEX_PAGE,
							'orderby'        => 'menu_order date',
							'order'          => 'ASC'
						)
					);
					if ( $grandchildrenpages->have_posts() ):
						?>
						<ul class="child">
							<?php
							while ( $grandchildrenpages->have_posts() ) : $grandchildrenpages->the_post();
								?>
								<li>
									<a href="<?php echo make_path_relative( get_page_link() ); ?>"><?php the_title(); ?></a>
								</li>
							<?php endwhile;
							wp_reset_query(); ?>
						</ul>
					<?php endif; ?>
				</div>
			</article>
		</div>
	<?php endwhile;
	wp_reset_postdata();
	?>
</div>