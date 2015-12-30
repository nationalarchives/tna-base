<?php get_header(); ?>

	<main id="content" role="main">
		<div class="container">
			<div class="row">
				<article id="primary" class="content-area col-xs-12 col-sm-12 col-md-8 col-lg-8">
					<p>PAGE</p>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</article>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</main>

<?php get_footer(); ?>