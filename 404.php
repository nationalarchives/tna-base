<?php get_header(); ?>
<?php get_template_part( 'breadcrumb' ); ?>

	<div id="primary" class="content-area">
		<div class="container">
			<div class="row">
				<main id="main" class="col-md-12" role="main">
					<article id="404-error">
						<div class="entry-header">
							<h1>Oops! That page can't be found</h1>
						</div>
						<div class="entry-content">
							<h2>404 Error</h2>
							<p>It looks like nothing was found at this location. Maybe try a search?</p>
							<?php get_search_form(); ?>
						</div>
					</article>
				</main>
			</div>
		</div>
	</div>

<?php get_footer(); ?>