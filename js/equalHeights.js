// ----------------------------------------
// Equal Heights -----------------
// ----------------------------------------

$('#equal-heights').fadeIn('slow');

$(window).load(function() {
    equalheight('.equal-heights > div');
});

$(window).resize(function(){
    equalheight('.equal-heights > div');
});