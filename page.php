<?php get_header(); ?>

	<div id="primary">
		<div class="container">
			<div class="row">
				<main id="content" class="content-area col-xs-12 col-sm-12 col-md-8 col-lg-8" role="main">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<p>PAGE</p>
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</article>
				</main>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>