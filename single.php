<?php get_header(); ?>
<?php get_template_part( 'breadcrumb' ); ?>

	<div id="primary" class="content-area standard-page">
		<div class="container">
			<div class="row">
				<main id="main" class="col-xs-12 col-sm-8 col-md-8" role="main">
					<?php
					while ( have_posts() ) : the_post();
						get_template_part( 'content' );
					endwhile;
					?>
				</main>
				<?php
				$sidebar = get_post_meta( $post->ID, 'sidebar', true );
				if ( $sidebar == 'false' ) {
					// do nothing
				} else {
					get_sidebar( $sidebar );
				}
				?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>