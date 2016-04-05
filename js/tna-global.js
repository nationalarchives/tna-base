/**
 *
 * TNA - Global js
 *
 */

// ----------------------------------------
// TNA JS contents ------------------------
// ----------------------------------------
// 1. Back to top
// 2. Website cookie
// 3. Search our website
// 4. Mega menu
// ----------------------------------------

// A page can't be manipulated safely until the document is "ready."
$(document).ready(function(){

    // 1. Back to top  - Displays a back to top link when the user has scrolled on longer pages.
    //    Defaults are provided but can be overridden with options argument (object)

    // Check the position of the page
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('#goTop').stop().animate({right: '.5em'});
        } else {
            $('#goTop').stop().animate({right: '-100px'});
        }
    });
    // Click event to scroll back to top
    $('#goTop').click(function(){
        $('html, body').animate({scrollTop : 0},800);
        return false;
    });

    // ----------------------------------------

    // ----------------------------------------
    // 2 Website Cookie -----------------------
    // ----------------------------------------
    // 2.1 setThisCookie()

    tnaSetThisCookie = function (name, days) {
        var d = new Date();
        d.setTime(d.getTime() + 1000 * 60 * 60 * 24 * days);
        document.cookie = name + "=true;path=/;expires=" + d.toGMTString() + ';';
    };
    // 2.2 checkForThisCookie()
    tnaCheckForThisCookie = function (name) {
        if (document.cookie.indexOf(name) === -1) {
            return false;
        } else {
            return true;
        }
    };

    // 2.3 Cookie notification
    $(function(){ // All content must be placed within this IIFE.
        $('#mega-menu-pull-down').show();
        if (!tnaCheckForThisCookie("dontShowCookieNotice")) {
            $('<div class="cookieNotice">We use cookies to improve services and ensure they work for you. Read our <a title="Our cookie policy" href="http://www.nationalarchives.gov.uk/legal/cookies.htm">cookie policy</a>. <a title="Close cookie policy notice" href="#" id="cookieCutter">Close</a></div>').css({
                padding: '5px',
                "text-align" : "center",
                backgroundColor : '#FCE45C',
                position : 'fixed',
                bottom : 0,
                'font-size' : '14px',
                width : '100%',
                display : 'none'
            }).appendTo('body');

            setTimeout(function(){
                $('.cookieNotice').slideDown(1000);
            }, 1000);
        }

    });

    // 2.4 Binding to document (event delegation)
    $(document).on('click', '#cookieCutter', function(e){
        e.preventDefault();
        tnaSetThisCookie('dontShowCookieNotice', 365);
        $('.cookieNotice').hide();
    });
    // ----------------------------------------

    // ----------------------------------------
    // 3 Search our website -------------------

    // Hide search option
    $('#search-field-wrapper ul').hide();
    // $.showExpander()
    $.showExpander = function(){
        if ($('.expander').length) {
            $('.expander').delay(200).slideDown(400);
        }
    };

    // $.customEventer()
    $.customEventer = function(passedObject) {
        var elementIdOrClass = passedObject.elementIdOrClass,
            eventToWatch = passedObject.eventToWatch,
            customEventToTrigger = passedObject.customEventToTrigger;

        $(document).on(eventToWatch, elementIdOrClass, function(){
            $(document).trigger(customEventToTrigger);
        });
    };

    // Generic toggle method. Does not include any bindings since it is designed to be used with
    $.toggleDisplayOfElement = function(toggler, togglee) {
        $(togglee).toggle();
        $(toggler).toggleClass('expanded');
    };

    $('.formDestinationChanger').on('click', function() {
        var placeholder = $(this).attr('data-placeholder'),
            target = $(this).attr('data-target'),
            fieldName = $(this).attr('data-fieldName');

        $.toggleDisplayOfElement('#scope-selector', '#search-field-wrapper ul');

        $('#tnaSearch').attr({'placeholder' : placeholder, 'name' : fieldName});
        $('#globalSearch').attr('action', target);
    });

    // When click change the arrow position
    $('#scope-selector').click(function() {
        $('#search-field-wrapper ul').toggle();
        if ($('#search-field-wrapper ul:visible').size() != 0) {
            $(this).addClass('expanded');}
        else {
            $(this).removeClass('expanded');}
    });

    $(document).on('click', '#search-controls li', function(e){
        $('#search-controls li').removeClass('selected');
        $(e.target).addClass('selected');
    });

    // Global search - larger screens
    $(document).one('toggleSearchOptionsOnce', function() {
        $.toggleDisplayOfElement('#scope-selector', '#search-field-wrapper ul');
    });

    $(document).on('toggleSearchOptions', function() {
        $.toggleDisplayOfElement('#scope-selector', '#search-field-wrapper ul');
        $(document).off('toggleSearchOptionsOnce');
    });

    // Global search - smaller screens
    $(document).on('change', '.mobileSearchDestinationOption', function(){
        var target = $(this).attr('data-target'),
            placeholder = $(this).attr('data-placeholder'),
            fieldName = $(this).attr('data-fieldName');
        $('#mobile-search-field').attr({'placeholder' : placeholder, 'name' : fieldName}).focus();
        $('#mobileGlobalSearch').attr('action', target);
    });

    // ----------------------------------------
    // ----------------------------------------

    // ----------------------------------------
    // 4 Mega menu ----------------------------

    $('#mega-menu-pull-down').on('click', function () {
        $('#nav').slideToggle('fast');
    });
    $('#mega-menu-mobile').on('click', function () {
        $('#nav').slideToggle('fast');
    });
});


// -----------------------------------------------------------
//  Responsive search
// -----------------------------------------------------------


$(document).ready(function() {
    //Hides the responsive search
    $('#mobileGlobalSearch').css('display','none');
    //Responsive Search Menu Toggle
    $('.search-expander').click(function() {
      $('#mobileGlobalSearch').slideToggle('fast');
    });
    //Add a class and removes the class per click.
    $('button.search-expander').on('click', function() {
      $(this).toggleClass('search-close');
    });
});


// -----------------------------------------------------------


$(document).ready(function() {
    $('input:radio[name=radioSearchGroup]').change(function() {
        if (this.value == 'search_website') {
            //Changes the form action url
            $('form').attr('action', 'http://www.nationalarchives.gov.uk/search/search_results.aspx');
            //changes name attribute
            $('#mobileGlobalSearch input[name="_q"]').attr('name', 'QueryText');
            //changes the placeholder
            $('input[name="QueryText"]').attr('placeholder', 'Search our website...');
        }
        else if(this.value == 'search_records') {
            //Changes the form action url
            $('form').attr('action', 'http://discovery.nationalarchives.gov.uk/SearchUI/s/res');
            //changes name attribute
            $('#mobileGlobalSearch input[name="QueryText"]').attr('name', '_q');
            //changes the placeholder
            $('input[name="_q"]').attr('placeholder', 'Search our records...');
        }
    });
});


// -----------------------------------------------------------

// ----------------------------------------
// 3 Mega menu for mobile -----------------
// ----------------------------------------
$(document).ready(function(){
    // When click show the childrens of the main categories
    $(document).on('click', '#nav h3', function(e){
        if($(window).width() < 480) {
            $(this).next("ul").slideToggle("slow");
            $(this).toggleClass('expanded');
            e.preventDefault();
        } else {
            return;
        }
    });
    // Show/Hide ul on mobile and desktop
    if($(window).width() < 480) {
        $('#nav ul').hide();
        $('#nav ul li.mobileOnly').show();

    }else {
        $('#nav ul li.mobileOnly').hide();
    }

    // Bindings to window
    $(window).on({
        resize: function() {
            if($(window).width() > 480){
                $('#nav ul').show();
                $('#nav ul li.mobileOnly').hide();
            } else {
                $('#nav ul').hide();
                $('#nav ul li.mobileOnly').show();
            }
        }
    });
});
// ----------------------------------------


// ----------------------------------------

// ----------------------------------------
// Image caption toggle - -----------------
// ----------------------------------------
$('.eye_caption').on('click', function () {
    $('.image_caption_back').toggle();
});