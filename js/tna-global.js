/**
 * TNA - Global js
 */

// 1    $.backToTopLink() Displays a back to top link when the user has scrolled on longer pages.
//      Defaults are provided but can be overridden with options argument (object)
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

