<?php get_template_part( 'partials/footer-content' ); ?>

<?php wp_footer(); ?>

<script>
	if(window.TNAFrontend && window.TNAFrontend.initAll) {
		window.TNAFrontend.initAll()
	}
	if(window.TNAFrontendAnalytics && window.TNAFrontendAnalytics.GA4) {
		new TNAFrontendAnalytics.GA4({ addTrackingCode: false })
	}
</script>

</body>

</html>
