<!DOCTYPE html>
<html lang="en-gb" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta content="initial-scale = 1.0" name="viewport">
    <!-- tna_wp_head -->
    <?php tna_wp_head(); ?>
    <!-- end tna_wp_head -->
    <?php get_template_part( 'partials/header-meta' ); ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Manage Google Analytics Cookies -->
    <?php      
       if (function_exists('handle_GA_script')) {
            handle_GA_script('cookies_policy');
       }  
    ?>
</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T8DSWV" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <?php
    if(function_exists('wp_cookie_banner_hook')) {
        wp_cookie_banner_hook();
    }
	if (function_exists('notification_banner')){
		notification_banner();
	}
?>
    <header id="header" role="banner">
        <a id="skip-to-main-content" href="#breadcrumb-holder">Skip to Main Content</a>
        <div class="container">
            <div class="row">
                <div class="col-xs-2 col-sm-5" id="logo-holder">
                    <button aria-label="Toggle menu" id="mega-menu-mobile"></button>
                    <a href="https://www.nationalarchives.gov.uk" title="Go to The National Archives homepage"
                        class="visible-lg visible-md visible-sm">
                        <img src="<?php echo str_replace( home_url(), '', get_template_directory_uri() ); ?>/img/logo-white.png"
                            srcset="<?php echo str_replace( home_url(), '', get_template_directory_uri() ); ?>/img/tna-horizontal-white-logo.svg"
                            alt="The National Archives" class="img-responsive logo">
                    </a>
                </div>
                <div class="col-xs-8 col-sm-2" id="mobile-logo-holder">
                    <button title="Main menu" aria-label="Toggle menu" id="mega-menu-pull-down"
                        class="hidden-xs"><span>Menu</span></button>
                    <a href="https://www.nationalarchives.gov.uk" title="Go to The National Archives homepage"
                        class="hidden-lg hidden-md hidden-sm">
                        <img src="<?php echo str_replace( home_url(), '', get_template_directory_uri() ); ?>/img/logo-white.png"
                            srcset="<?php echo str_replace( home_url(), '', get_template_directory_uri() ); ?>/img/tna-horizontal-white-logo.svg"
                            alt="The National Archives" class="img-responsive">
                    </a>
                </div>
            <?php include 'inc/global-search-desktop.php' ?>
            </div>
            <?php include 'inc/global-search-mobile.php' ?>
        </div>
    </header>

    <nav id="nav" role="navigation" class="navigation">
        <div class="mega-menu clearfix">
            <?php
            get_template_part( 'partials/mega-menu' );
		?>
        </div>
    </nav>
