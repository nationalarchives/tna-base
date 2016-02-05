<?php
/*
Template Name: Section landing
*/
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
                          <?php change_layout(); ?>
                      </div>
                   </article>
               </div>
           </div>
           <div class="row">
               <?php
                 /*$page_id = get_the_ID(); //Gets the id for the current page.

                 // loop through the sub-pages for the current page.
                 $childpages = new WP_Query(array(
                         'post_type' => 'page',
                         'post_parent' => $page_id,
                         'posts_per_page' => -1,
                         'orderby' => 'menu_order date',
                         'order' => 'ASC'
                     )
                 );
                 while ($childpages->have_posts()) : $childpages->the_post();*/
               ?>
               <div class="col-md-6">
                   <article>
                       <div class="entry-header">
                           <h2>Title 1</h2>
                       </div>
                       <div class="entry-content">
                           <a href="#" class="thumbnail">
                                <img src="http://lorempixel.com/1600/500/sports/2" class="img-responsive child-img" alt="Cinque Terre">
                           </a>
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
                           <a href="#" class="thumbnail">
                               <img src="http://lorempixel.com/1600/500/sports/1" class="img-responsive child-img" alt="Cinque Terre">
                           </a>
                           <p>Avengers Assemble. Earths Mightiest Heroes reunite with their biggest guns at the forefront to take on familiar enemies and new threats alike. The Avengers return. New threats.</p>
                       </div>
                   </article>
               </div>
               <!--<div class="col-md-6">
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
               <div class="col-md-6">
                   <article>
                       <div class="entry-header">
                           <h2>Title 1</h2>
                       </div>
                       <div class="entry-content">
                           <p>Avengers Assemble. Earths Mightiest Heroes reunite with their biggest guns at the forefront to take on familiar enemies and new threats alike. The Avengers return. New threats.</p>
                       </div>
                   </article>
               </div>-->
           </div>
        </div>
    </main>
<?php get_footer(); ?>