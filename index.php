<?php get_header(); ?>
<?php get_template_part( 'breadcrumb' ); ?>

<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<main id="main" class="col-sm-12" role="main">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						get_template_part( 'content' );
					endwhile;
				else : ?>
					<article>
						<div class="entry-header">
							<h1>Nothing found</h1>
						</div>
						<div class="entry-content clearfix">
							<p>It appears we don't have any published posts.</p>
						</div>
					</article>
				<?php endif; ?>
				<div>
					<ul class="pager">
						<li class="previous"><?php next_posts_link(__('&#8249; Older posts' )); ?></li>
						<li class="next"><?php previous_posts_link(__('Newer posts &#8250;')); ?></li>
					</ul>
				</div>
			</main>
		</div>
	</div>
</div>

<?php get_footer(); ?>

