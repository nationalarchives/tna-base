<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<h1><?php the_title(); ?></h1>
	</div>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>