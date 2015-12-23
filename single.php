<?php get_header(); ?>

<main id="content" role="main">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<p>SINGLE</p>
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</main>

<?php get_footer(); ?>