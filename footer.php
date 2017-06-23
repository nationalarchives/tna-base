<a title="Go back to top" href="#" id="goTop"></a>
<?php
	global $post;

	if (!has_category('hide-newsletter',$post->ID)) : ?>
			<div class="container">
				<?php get_template_part( 'partials/footer-newsletter' );?>
			</div>
	<?php endif;
?>
<footer id="footer" class="breather-top-bottom" role="contentinfo">
	<div class="container">
		<?php get_template_part( 'partials/footer-content' ); ?>
	</div>
</footer>

<?php wp_footer(); ?>
<?php get_template_part( 'partials/tna', 'footer' ); ?>

</body>
</html>