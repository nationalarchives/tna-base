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
					<?php get_template_part( 'partials/banner-action-button' ); ?>
				</div>
			</div>
			<main id="main" role="main">
				<?php get_template_part( 'partials/content-boxes' ); ?>
			</main>
		</div>
		<?php endwhile; ?>
	</div>

<?php get_footer(); ?>