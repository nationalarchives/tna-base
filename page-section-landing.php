<?php
/*
Template Name: Section landing
*/

/* Variables */
$content_with_feat_box = '<div class="col-md-8">';
$content_with_feat_img = '<div class="col-md-6">';
$feat_box = get_post_meta(get_the_ID(), 'feat_box', true);
//$feat_img = the_post_thumbnail( 'landing-page-thumb', array( 'class' => 'img-responsive' ) );
?>
<?php get_header(); ?>
<?php get_template_part ( 'breadcrumb' ); ?>
    <main id="primary" role="main" class="content-area">
        <div class="container">
           <div class="row">
               <div class="col-md-12">
                   <article>
                      <div class="entry-header">
                          <h1><?php the_title(); ?></h1>
                      </div>
                      <div class="row entry-content">
                          <?php
                            if (!empty( $feat_box )) { // This is the custom field block
                                echo $content_with_feat_box;
                                if (have_posts()) :
                                    while (have_posts()) :
                                        the_post();
                                        the_content();
                                        echo '</div>';
                                        echo '<div class="col-md-4"><div class="well">'.$feat_box.'</div></div>';
                                    endwhile;
                                endif;
                            } elseif (has_post_thumbnail()) { // This is the feature image block.
                                echo $content_with_feat_img;
                                if (have_posts()) :
                                    while (have_posts()) :
                                        the_post();
                                        the_content();
                                        echo '</div>';
                                        echo '<div class="col-md-6">';
                                        the_post_thumbnail( 'landing-page-thumb', array( 'class' => 'img-responsive' ) );
                                        echo '</div>';
                                    endwhile;
                                endif;
                            } elseif (empty($feat_box) && the_post_thumbnail() == null){
                                echo $content_with_feat_box;
                                if (have_posts()) :
                                    while (have_posts()) :
                                        the_post();
                                        the_content();
                                    endwhile;
                                endif;
                                echo '</div>';
                                echo '<div class="col-md-4">&nbsp;</div>';
                            }
                          ?>
                      </div>
                   </article>
               </div>
           </div>
           <div class="row">
               <div class="col-md-6">
                   <article>
                       <div class="entry-header">
                           <h2>Title 1</h2>
                       </div>
                       <div class="entry-content">
                           <p>Avengers Assemble. Earths Mightiest Heroes reunite with their biggest guns at the forefront to take on familiar enemies and new threats alike. The Avengers return. New threats.</p>
                       </div>
                   </article>
               </div>
               <div class="col-md-6">
                   <article>
                       <div class="entry-header">
                           <h2>Title 1</h2>
                       </div>
                       <div class="entry-content">
                           <p>Avengers Assemble. Earths Mightiest Heroes reunite with their biggest guns at the forefront to take on familiar enemies and new threats alike. The Avengers return. New threats.</p>
                       </div>
                   </article>
               </div>
           </div>
        </div>
    </main>
<?php get_footer(); ?>