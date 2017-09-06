<?php
/*
Template Name: Section landing
*/
get_header(); ?>

<?php get_template_part( 'breadcrumb' ); ?>

	<main id="primary" role="main" class="content-area">
		<div class="container">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="row">
				<div class="col-md-12">
                    <?php
	                    global $post;
	                    $image              = make_path_relative_no_pre_path( get_feature_image_url( $post->ID, 'feature-box-thumb' ) );
	                    $title              = get_the_title();
	                    $content            = get_the_content();
	                    $section_content    = get_post_meta( $post->ID, 'feat_box', true );
	                    get_page_banner( 'section', $title, $image, $content, '', '', $section_content );
                    ?>
				</div>
			</div>
            <div class="row equal-heights" id="equal-heights">
			    <?php
			    get_content_boxes_from_children( $post->ID );
			    ?>
            </div>
		<?php endwhile; ?>
		</div>
	</main>

<?php get_footer(); ?>