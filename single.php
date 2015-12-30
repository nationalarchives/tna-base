<?php get_header(); ?>

	<main id="content" role="main">
		<div class="container">
			<div class="row">
				<article id="primary" class="content-area col-lg-8">
					<p>SINGLE</p>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</article>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</main>

<?php get_footer(); ?>