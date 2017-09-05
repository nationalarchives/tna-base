<?php
/*
 * Template Name: Level 1 landing
 *
 */
get_header(); ?>

<?php get_template_part( 'breadcrumb' ); ?>

	<div id="primary" class="level-one">
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="container">
			<div class="row" role="banner">
				<div class="col-md-12">
					<?php
					$image      = make_path_relative_no_pre_path( get_feature_image_url( 'full-page-width', true ) );
					$title      = get_the_title();
					$content    = get_the_content();
					$button     = get_post_meta( $post->ID, 'action_button_title', true );
					$url        = get_post_meta( $post->ID, 'action_button_url', true );
					get_page_banner( 'level one', $title, $image, $content, $button, $url );
					?>
				</div>
			</div>
			<main id="main" role="main">
				<?php get_template_part( 'partials/content-boxes' ); ?>
			</main>
		</div>
		<?php endwhile; ?>
	</div>

<?php get_footer(); ?>