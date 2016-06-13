<?php
/*
Template Name: Level 1 landing
*/
get_header(); ?>
<?php get_template_part( 'breadcrumb' ); ?>

	<div id="primary" class="level-one">
		<?php while ( have_posts() ) : the_post(); ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<article class="banner" <?php
					if ( has_post_thumbnail() ) {
						$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
						style="background: url(<?php echo make_path_relative( $thumbnail_src[0] ); ?>) center center;background-size: cover;"
					<?php } ?>>
						<div class="entry-header">
							<h1><?php the_title(); ?></h1>
						</div>
							<?php if( empty( $post->post_content) ) {
								// Do nothing
							} else { ?>
								<div class="entry-content">
								<?php the_content(); ?>
								</div>
							<?php } ?>
					</article>
				</div>
			</div>
			<div class="row">
				<main id="main" role="main">
					<div class="col-md-4">
						<article>
							<div class="entry-header">
								<h2>title</h2>
							</div>
							<div class="row entry-content">
								content
							</div>
						</article>
					</div>
					<div class="col-md-4">
						<article>
							<div class="entry-header">
								<h2>title</h2>
							</div>
							<div class="row entry-content">
								content
							</div>
						</article>
					</div>
					<div class="col-md-4">
						<article>
							<div class="entry-header">
								<h2>title</h2>
							</div>
							<div class="row entry-content">
								content
							</div>
						</article>
					</div>
					<div class="col-md-6">
						<article>
							<div class="entry-header">
								<h2>title</h2>
							</div>
							<div class="row entry-content">
								content
							</div>
						</article>
					</div>
					<div class="col-md-6">
						<article>
							<div class="entry-header">
								<h2>title</h2>
							</div>
							<div class="row entry-content">
								content
							</div>
						</article>
					</div>
				</main>
			</div>
		</div>
		<?php endwhile; ?>
	</div>

<?php get_footer(); ?>