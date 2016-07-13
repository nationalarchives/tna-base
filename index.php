<?php get_header(); ?>
<?php get_template_part( 'breadcrumb' ); ?>

<div id="primary" class="content-area">
	<div class="container">
		<div class="row">
			<main id="main" class="col-sm-12" role="main">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="entry-header">
								<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							</div>
							<div class="entry-content clearfix">
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="button pull-right" title="Read more - <?php the_title(); ?>">Read more</a>
							</div>
						</article>
					<?php endwhile;
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
				<nav>
					<ul class="pager">
						<li class="previous"><?php next_posts_link( '&laquo; Older posts' ); ?></li>
						<li class="next"><?php previous_posts_link( 'Newer posts &raquo;' ); ?></li>
					</ul>
				</nav>
			</main>
		</div>
	</div>
</div>

<?php get_footer(); ?>

