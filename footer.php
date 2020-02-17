<footer id="footer" role="contentinfo">
    <?php
    global $post;
    if ( is_object($post) ) {
        if (!has_category('hide-newsletter', $post->ID)) {
            get_template_part('partials/footer-newsletter');
        }
    }
    ?>
    <div class="footer-content">
        <div class="container">
            <?php get_template_part( 'partials/footer-content' ); ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>