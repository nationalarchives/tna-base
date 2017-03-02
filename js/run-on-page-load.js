$('a[target="_blank"]').add_attributes_to_target_blank();

$('#mega-menu-pull-down, #mega-menu-mobile').mega_menu_toggle();

$("ul.sub-menu:last").append_promotional_image();

$(".main-ul > li > a").append_home_links_to_mega_menu();

$('a', '.mega-menu').webtrends_click_handler();

// Make sure the signup newsletter form matches the ID below
// By default target element is $('input[name="ReturnURL"]')
$('#signup').newsletterBackToOrigin();