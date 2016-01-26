/**
 * TNA - Global js
 */

// ----------------------------------------
// 1. Back to top
// 2. Website cookie
// ----------------------------------------

// 1. Back to top  - Displays a back to top link when the user has scrolled on longer pages.
//    Defaults are provided but can be overridden with options argument (object)
$(document).ready(function(){
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
    if (!tnaCheckForThisCookie("dontShowCookieNotice")) {
        $('<div class="cookieNotice">We use cookies to improve services and ensure they work for you. Read our <a href="http://www.nationalarchives.gov.uk/legal/cookies.htm">cookie policy</a>. <a href="#" id="cookieCutter">Close</a></div>').css({
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
// 3 Binding to document (event delegation)
// ----------------------------------------

$(document).on('click', '#nav h3', function(e){
    if($(window).width() < 480) {
        $(this).parents('nav').find('ul').slideToggle();
        $(this).toggleClass('expanded');
        e.preventDefault();
    } else {
        return;
    }
});

// Bindings to window
$(window).on({
    resize: function() {
        if($(window).width() > 480){
            $('#nav ul').show();
        }
    }
});