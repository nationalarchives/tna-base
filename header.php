<!DOCTYPE html>
<html lang="en-gb" class="no-js tna-template tna-template--light-theme">

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

<body <?php body_class('tna-template__body'); ?>>
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
    <a href="#breadcrumb-holder" class="tna-skip-link" data-module="tna-skip-link">
        Skip to main content
    </a>
    <header class="tna-global-header" data-module="tna-global-header">
        <div class="tna-container tna-global-header__main">
            <div class="tna-column tna-column--flex-1 tna-column--order-2">
                <span class="tna-global-header__logo-wrapper">
                    <a href="https://www.nationalarchives.gov.uk/" class="tna-global-header__logo tna-global-header__logo--link" title="The National Archives">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" class="tna-logo" viewBox="0 0 160 160" width="96" height="96">
                        <title>The National Archives</title>
                        <path fill="transparent" d="M0 0h160v160H0z" class="tna-logo__background" />
                        <g class="tna-logo__foreground" fill="currentColor">
                        <path d="M1.9 107.2h156.3V158H1.9v-50.8zm0-52.7h156.3v50.8H1.9V54.5zm0-52.6h77.2v50.8H1.9V1.9zm79 0h77.2v50.8H80.9V1.9zm0-1.9H0v160h160V0H80.9z" />
                        <path d="M21.3 19.5h-5.4v-3h14.3v3h-5.4v18.4h-3.5zM31.6 16.5H35v9h8.4v-9h3.4v21.4h-3.4v-9.3H35v9.3h-3.4zM50.9 16.5h12.2v3h-8.8v6.1h7.4v3h-7.4v6.3h8.8v3H50.9zM19.7 69.2h3.8l6.4 12.5c.6 1.1 1.1 2.7 1.6 4h.2c-.2-1.7-.3-3.6-.3-4.8V69.2h3.5v21.4h-3.7l-6.3-12.3c-.7-1.4-1.2-2.7-1.7-4.2H23c.2 1.4.3 3.3.3 5v11.5h-3.5c-.1 0-.1-21.4-.1-21.4zM47.8 82.6l-1.7-6.3c-.3-1.1-.6-2.2-.9-3.8H45c-.3 1.6-.5 2.6-.8 3.8l-1.7 6.3h5.3zM43 69.2h4.2l6.2 21.4h-3.5l-1.5-5.2h-6.6l-1.4 5.2h-3.6L43 69.2zM57.2 72.3h-5.4v-3.1H66v3.1h-5.4v18.4h-3.4zM67.8 69.2h3.5v21.4h-3.5zM87.5 80c0-5.3-1.7-8-4.8-8-3.2 0-4.8 2.7-4.8 8 0 5.2 1.6 7.9 4.8 7.9 3.2 0 4.8-2.7 4.8-7.9m-13.3 0c0-7 3-11.1 8.5-11.1 5.4 0 8.4 4.1 8.4 11.1 0 6.9-3 11-8.4 11s-8.5-4.1-8.5-11M94.3 69.2H98l6.4 12.5c.6 1.1 1.2 2.7 1.7 4h.2c-.2-1.7-.3-3.6-.3-4.8V69.2h3.4v21.4h-3.7l-6.3-12.3c-.7-1.4-1.2-2.7-1.7-4.2h-.2c.2 1.4.3 3.3.3 5v11.5h-3.5V69.2zM122.4 82.6l-1.7-6.3c-.3-1.1-.6-2.2-.9-3.8h-.2c-.3 1.6-.5 2.6-.8 3.8l-1.7 6.3h5.3zm-4.8-13.4h4.2l6.2 21.4h-3.5l-1.5-5.2h-6.6l-1.4 5.2h-3.6l6.2-21.4zM129.9 69.2h3.5v18.4h8.4v3.1h-11.9zM26.9 135.2l-1.7-6.3c-.3-1.1-.6-2.2-.9-3.8h-.2c-.3 1.6-.5 2.6-.8 3.8l-1.7 6.3h5.3zm-4.8-13.4h4.2l6.2 21.4H29l-1.5-5.2h-6.6l-1.4 5.2h-3.6l6.2-21.4zM39.9 132.5c2.5 0 3.4-1.6 3.4-3.9 0-2.2-1-3.8-3.4-3.8h-2.7v7.7h2.7zm-6.1-10.7h6.4c4.5 0 6.7 2.4 6.7 6.6 0 3.1-1.5 5.6-3.7 6.3v.2c1 1.1 4 7.5 4.8 7.9v.5h-3.8c-1-.6-3.6-7.2-4.4-7.8h-2.5v7.8h-3.5v-21.5zM52.9 132.5c0 5.3 1.9 8 4.8 8s4-2 4-5.2l3.5.1c0 .2.1.4.1.6 0 4.4-2.1 7.5-7.5 7.5-5.2 0-8.5-3.9-8.5-11.1 0-7.1 3.3-11 8.5-11 6.4 0 7.5 4.6 7.5 7.2 0 .3 0 .7-.1.9l-3.5.1c0-3.3-1.2-5.2-4-5.2-2.9.2-4.8 2.9-4.8 8.1M68 121.8h3.5v9.1h8.3v-9.1h3.5v21.5h-3.5v-9.4h-8.3v9.4H68zM87.9 121.8h3.5v21.4h-3.5zM94.2 121.8h3.6l3.2 12.3c.5 1.9.8 3.6 1.1 5.6h.2c.3-2 .6-3.7 1.1-5.6l3.2-12.3h3.6l-6.1 21.4H100l-5.8-21.4zM112.7 121.8H125v3.1h-8.8v6h7.4v3h-7.4v6.3h8.8v3.1h-12.3zM130.4 136c0 .2-.1.5-.1.8 0 1.9.8 3.7 3.4 3.7 2.1 0 3.3-1.2 3.3-2.9 0-1.6-.7-2.4-2.2-3l-3.4-1.3c-2.4-.9-4.2-2.4-4.2-5.7 0-3.5 2.3-6.1 6.6-6.1 5.5 0 6.4 3.6 6.4 5.9 0 .3 0 .7-.1 1.1l-3.4.1c0-.2.1-.5.1-.7 0-1.7-.6-3.2-3-3.2-2.1 0-3 1.2-3 2.8 0 1.7.9 2.5 2.2 2.9l3.5 1.3c2.6 1 4.3 2.6 4.3 5.8 0 3.6-2.4 6.1-7 6.1-5.9 0-6.8-3.9-6.8-6.5 0-.3 0-.6.1-1l3.3-.1z" />
                        </g>
                    </svg>
                    </a>
                </span>
            </div>
            <div class="tna-column tna-column--order-2 tna-global-header__navigation-button-wrapper">
                <button class="tna-global-header__navigation-button" type="button" aria-controls="tna-header__navigation tna-header__top-navigation" hidden>
                    Menu
                    <span class="tna-global-header__hamburger"></span>
                </button>
            </div>
            <nav class="tna-column tna-column--full-small tna-column--full-tiny tna-column--order-3 tna-global-header__navigation-wrapper" id="tna-header__navigation" aria-label="Primary">
                <ul class="tna-global-header__navigation">
                    <li class="tna-global-header__navigation-item">
                        <a href="https://www.nationalarchives.gov.uk/about/visit-us/" class="tna-global-header__navigation-item-link" tabindex="0">Visit</a>
                    </li>
                    <li class="tna-global-header__navigation-item">
                        <a href="https://www.nationalarchives.gov.uk/about/visit-us/whats-on/" class="tna-global-header__navigation-item-link" tabindex="0">What’s on</a>
                    </li>
                    <li class="tna-global-header__navigation-item">
                        <a href="https://dev-beta.nationalarchives.gov.uk/explore-the-collection/" class="tna-global-header__navigation-item-link" tabindex="0">Explore the collection</a>
                    </li>
                    <li class="tna-global-header__navigation-item">
                        <a href="https://www.nationalarchives.gov.uk/help-with-your-research/" class="tna-global-header__navigation-item-link" tabindex="0">Help using the archive</a>
                    </li>
                    <li class="tna-global-header__navigation-item">
                        <a href="https://www.nationalarchives.gov.uk/education/" class="tna-global-header__navigation-item-link" tabindex="0">Education</a>
                    </li>
                    <li class="tna-global-header__navigation-item">
                        <a href="https://www.nationalarchives.gov.uk/professional-guidance-and-services/" class="tna-global-header__navigation-item-link" tabindex="0">Professional guidance and services</a>
                    </li>
                </ul>
            </nav>
            <nav class="tna-column tna-column--full tna-column--order-1 tna-column--order-4-small tna-column--order-4-tiny tna-global-header__top-navigation-wrapper" id="tna-header__top-navigation" aria-label="Secondary">
                <ul class="tna-global-header__top-navigation">
                    <li class="tna-global-header__top-navigation-item">
                        <a href="https://www.nationalarchives.gov.uk/search/" class="tna-global-header__top-navigation-link" tabindex="0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="16"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                            </svg>
                            Search
                        </a>
                    </li>
                    <li class="tna-global-header__top-navigation-item">
                        <a href="https://shop.nationalarchives.gov.uk/" class="tna-global-header__top-navigation-link" tabindex="0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="16"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path d="M160 112c0-35.3 28.7-64 64-64s64 28.7 64 64v48H160V112zm-48 48H48c-26.5 0-48 21.5-48 48V416c0 53 43 96 96 96H352c53 0 96-43 96-96V208c0-26.5-21.5-48-48-48H336V112C336 50.1 285.9 0 224 0S112 50.1 112 112v48zm24 48a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm152 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                            </svg>
                            Shop
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
