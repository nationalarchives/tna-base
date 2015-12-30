<?php get_header(); ?>

<main id="content" role="main">
	<article id="primary" class="content-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<p>PAGE</p>
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</article>
	<?php get_sidebar(); ?>
</main>

<?php get_footer(); ?>