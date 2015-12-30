<?php get_header(); ?>

	<div id="primary" class="content-area">
		<div class="container">
			<div class="row">
				<main id="main" class="col-xs-12 col-sm-12 col-md-8" role="main">
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<p>SINGLE</p>
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</article>
				</main>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>