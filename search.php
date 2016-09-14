<?php get_header(); ?>
<?php get_template_part('breadcrumb'); ?>

<div id="primary" class="content-area category_template">
    <div class="container">
        <div class="row">
            <main id="main" class="col-xs-12 col-sm-8 col-md-8" role="main">
                <article class="equal-heights">
                    <div class="entry-header">
                        <h1><?php _e( 'Search Results Found For', 'locale' ); ?> <?php the_search_query(); ?></h1>
                    </div>

                    <?php if ( have_posts() ) { ?>

                        <ul>

                            <?php while ( have_posts() ) { the_post(); ?>

                                <li>
                                    <h3><a href="<?php echo get_permalink(); ?>">
                                            <?php the_title();  ?>
                                        </a></h3>
                                    <?php  the_post_thumbnail('medium') ?>
                                    <?php echo substr(get_the_excerpt(), 0,200); ?>
                                    <div class="h-readmore"> <a href="<?php the_permalink(); ?>">Read More</a></div>
                                </li>

                            <?php } ?>

                        </ul>

                        <?php paginate_links(); ?>

                    <?php } ?>

                </article>
            </main>
            <aside id="sidebar" class="col-xs-12 col-sm-4" role="complementary">
                <div class="sidebar-header">
                    <h2>Search</h2>
                </div>
                <?php get_search_form(); ?>
            </aside>
            </div>


    </div>
</div>
</div>

<?php get_footer(); ?>


