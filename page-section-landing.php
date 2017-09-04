<?php
/*
Template Name: Section landing
*/
get_header(); ?>

<?php get_template_part( 'breadcrumb' ); ?>

	<main id="primary" role="main" class="content-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
                    <?php while ( have_posts() ) : the_post();
                        get_template_part( 'partials/feature-box' );
                    endwhile; ?>
				</div>
			</div>
            <div class="row equal-heights" id="equal-heights">
			    <?php get_template_part( 'partials/children-grandchildren-loop' ); ?>
            </div>
		</div>
	</main>

<?php get_footer(); ?>