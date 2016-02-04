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