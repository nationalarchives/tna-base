<!DOCTYPE html>
<html lang="en-gb" class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta content="initial-scale = 1.0" name="viewport">
<title><?php wp_title('&#8211;','true','right'); ?><?php bloginfo('name'); ?></title>
<?php tna_wp_head(); ?>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="/wp-includes/wlwmanifest.xml" />
<?php get_template_part( 'inc/content/tna', 'head' ); ?>
<!-- Fav Icon -->
<link rel="shortcut icon" type="image/vnd.microsoft.icon" href="<?php echo str_replace(home_url(), '', get_template_directory_uri()); ?>/img/favicon.ico">
<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo str_replace(home_url(), '', get_template_directory_uri()); ?>/img/favicon.ico">
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
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "url": "http://www.nationalarchives.gov.uk/",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "http://www.nationalarchives.gov.uk/search/search_results.aspx?Page=1&QueryText={search_term}&SelectedDatabases=WEBSITE",
    "query-input": "required name=search_term"
  }
}
</script>
</head>
<body <?php body_class(); ?>>
<header id="header" role="banner"><a id="skip-to-main-content" href="#breadcrumb-holder">Skip to Main Content</a>
	<div class="container">
		<div class="row">
			<div class="col-xs-2 col-sm-5" id="logo-holder">
				<button aria-label="Toggle menu" id="mega-menu-mobile" ></button>
				<a href="http://www.nationalarchives.gov.uk" title="Go to The National Archives homepage" class="visible-lg visible-md visible-sm">
					<img src="<?php echo str_replace(home_url(), '', get_template_directory_uri()); ?>/img/logo-white.png" alt="The National Archives" id="logo" class="img-responsive">
				</a>
			</div>
			<div class="col-xs-8 col-sm-2" id="mobile-logo-holder">
				<button aria-label="Toggle menu" id="mega-menu-pull-down" class="hidden-xs"><span>Menu</span></button>
				<a href="http://www.nationalarchives.gov.uk" title="Go to The National Archives homepage" class="hidden-lg hidden-md hidden-sm">
					<img src="<?php echo str_replace(home_url(), '', get_template_directory_uri()); ?>/img/logo-white.png" alt="The National Archives" id="logo" class="img-responsive">
				</a>
			</div>
			<div class="col-xs-2 col-sm-5" id="search-field-wrapper">
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
				<button class="search-expander">&nbsp;</button>
				<form method="get" id="mobileGlobalSearch" style="display: block;" name="responsiveSearch" action="http://www.nationalarchives.gov.uk/search/search_results.aspx">
					<div class = "input-group">
						<input type = "text" placeholder="Search our website..." required aria-required="true" name="QueryText" value="">
						<span class="input-group-addon"><input type="submit" value=""></span>
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