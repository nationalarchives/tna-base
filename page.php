<?php get_header(); ?>

	<div id="primary" class="content-area">
		<div class="container">
			<div class="row">
				<main id="main" class="col-xs-12 col-sm-12 col-md-8" role="main">
					<?php
					while ( have_posts() ) : the_post();
						get_template_part ( 'content' );
					endwhile;
					?>
				</main>
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>

<?php get_footer(); ?>