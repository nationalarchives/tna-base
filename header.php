<!DOCTYPE html>
<html lang="en-gb">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta content="initial-scale = 1.0" name="viewport">

	<title><?php wp_title(''); ?></title>
	<?php wp_head(); ?>

	<!-- Fav Icon -->
	<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
	<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">

	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-2827241-1']);
		_gaq.push(['_setDomainName', 'nationalarchives.gov.uk']);
		_gaq.push(['_trackPageview']);
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>

</head>

<body <?php body_class(); ?>>

<header id="header" role="banner"><a id="skip-to-main-content" href="#breadcrumb-holder">Skip to Main Content</a>
	<div class="container">
		<div class="row">
			<div class="col-xs-3 col-sm-5" id="logo-holder">
				<button aria-label="Toggle menu" class="hidden-lg hidden-md hidden-sm" id="mega-menu-mobile" ></button>
				<a href="http://www.nationalarchives.gov.uk" title="Go to The National Archives homepage" class="visible-lg visible-md visible-sm">
					<img src="http://www.nationalarchives.gov.uk/wp-content/themes/tna/images/global/logo-white.png" alt="The National Archives" id="logo">
				</a>
			</div>
			<div class="col-xs-6 col-sm-2" id="mobile-logo-holder">
				<button aria-label="Toggle menu" id="mega-menu-pull-down"><span>Menu</span></button>
				<a href="http://www.nationalarchives.gov.uk" title="Go to The National Archives homepage" class="hidden-lg hidden-md hidden-sm">
					<img src="http://www.nationalarchives.gov.uk/wp-content/themes/tna/images/global/logo-white.png" alt="The National Archives" id="logo">
				</a>
			</div>
			<div class="col-xs-3 col-sm-5" id="search-field-wrapper">
				<form action="http://www.nationalarchives.gov.uk/search/quick_search.aspx" method="get" id="globalSearch" class="hidden-xs">
					<span id="scope-selector">&nbsp;</span>
					<input type="text" class="search-field" placeholder="Search our website..." id="tnaSearch" name="search_text" required aria-required="true" >
					<input type="submit" class="search-button" id="search-button" value="">
				</form>
				<ul>
					<li><a href="#" class="formDestinationChanger" data-target="http://www.nationalarchives.gov.uk/search/quick_search.aspx" data-placeholder="Search our website..." data-fieldName="search_text" role="button" aria-label="Change form destination to search the website">Search our website</a></li>
					<li><a href="#" class="formDestinationChanger" data-target="http://discovery.nationalarchives.gov.uk/SearchUI/s/res" data-placeholder="Search our records..." data-fieldName="_q" role="button" aria-label="Change form destination to search the catalogue">Search our records</a></li>
				</ul>
			</div>
		</div>
		<div class="row hidden-lg hidden-md hidden-sm">
			<div class="col-md-12">
				<button id="search-expander" style="position: absolute; right: 5px; top: -44px;" class="hasBeenInteractedWith ">&nbsp;</button>
				<form action="http://www.nationalarchives.gov.uk/search/quick_search.aspx" method="get" id="mobileGlobalSearch" style="display: block;">
					<div class = "input-group">
						<input type = "text" placeholder="Search our website...">
							<span class="input-group-addon">
								<input type="submit" value="">
							</span>
					</div>
					<label>
						<input name="radioSearchGroup" value="search_website" checked="" type="radio"> Search our website
					</label>
					<label>
						<input name="radioSearchGroup" value="search_records" type="radio"> Search our records
					</label>
				</form>
			</div>
		</div>
	</div>
	</div>
</header>
<nav id="nav" role="navigation">
	<?php get_template_part( 'inc/content/mega-menu' ); ?>
</nav>