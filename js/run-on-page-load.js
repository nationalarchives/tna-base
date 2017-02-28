$('a[target="_blank"]').add_attributes_to_target_blank();

$('#mega-menu-pull-down, #mega-menu-mobile').mega_menu_button_toggle();


$("ul.sub-menu:last").append_promotional_image();

$(".mega-menu > ul > li > a").append_home_links_to_mega_menu();

$(document).on('click', '.mg-more', function (e) {
    if ($(window).width() < 480) {
        e.preventDefault();
        $(this).next().slideToggle('fast');
    }
});

$('a', '.mega-menu').webtrends_click_handler();

// Make sure the signup newsletter form matches the ID below
// By default target element is $('input[name="ReturnURL"]')
$('#signup').newsletterBackToOrigin();