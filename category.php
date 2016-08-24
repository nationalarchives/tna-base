<?php get_header(); ?>
<?php get_template_part('breadcrumb'); ?>

<div id="primary" class="content-area category_template">
    <div class="container">
        <div class="row">
            <main id="main" class="col-sm-12" role="main">
                <article class="equal-heights">
                    <div class="entry-header">
                        <h1><?php foreach ((get_the_category()) as $category) {
                                echo $category->cat_name . ' ';
                            } ?></h1>
                    </div>

                    <?php
                    if (have_posts()) :
                    while (have_posts()) :
                    the_post(); ?>

                    <?php
                    $page_id = $post->ID;
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($page_id), 'single-post-thumbnail');
                    $childimage = wp_get_attachment_image_src(get_post_thumbnail_id($post->post_parent), 'single-post-thumbnail');
                    ?>
                    <div class="col-md-4">
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>">
                        <div class="image_back" style="background-image: url('<?php

                        if (has_post_thumbnail($page_id)) {
                            echo make_path_relative($image[0]);
                        } else {
                            echo bloginfo('template_directory') . '/img/no-image.pg';
                        }
                        ?>')">

                        </div>
                        <h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </h2>

                        <div class="entry-content clearfix">
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="button pull-right"
                               title="Read more - <?php the_title(); ?>">Read more</a>
                        </div>
                </article>
        </div>
        <?php endwhile;
        else : ?>
            <article>
                <div class="entry-header">
                    <h1>Nothing found</h1>glossary
                </div>
                <div class="entry-content clearfix">
                    <p>It appears we don't have any published posts.</p>
                </div>
            </article>
        <?php endif; ?>

        <nav>
            <ul class="pager">
                <li class="previous"><?php next_posts_link('&laquo; Older posts'); ?></li>
                <li class="next"><?php previous_posts_link('Newer posts &raquo;'); ?></li>
            </ul>
        </nav>
        </article>

        </main>
    </div>
</div>
</div>

<?php get_footer(); ?>

