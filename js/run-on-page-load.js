$('a[target="_blank"]').add_attributes_to_target_blank();

$("ul.sub-menu:last").append_promotional_image();

$(".mega-menu > ul > li > a").mega_menu_enhancements();

$('a', '.mega-menu').webtrends_click_handler();

// Make sure the signup newsletter form matches the ID below
// By default target element is $('input[name="ReturnURL"]')
$('#signup').newsletterBackToOrigin();