// Toggles the mega menu

$.fn.mega_menu_interactions = function () {
    return this.each(function () {
        var $this = $(this);
        $this.on('click', function () {
            $('#nav').slideToggle('fast');
        })
    });
};

// Displays the promotional image

$.fn.append_promotional_image = function () {
    return this.each(function () {
        var $this = $(this);
        $this.append('<li class="imgContent"><a href="http://nationalarchives.gov.uk/first-world-war/" title="First World War 100 - read about our centenary programme"><img src="http://www.nationalarchives.gov.uk/images/home/menu-first-world-war-b.jpg" alt="Explore First World War 100" class="img-responsive"></a></li>');
    })
};

// Sets up the WebTrends handlers

$('a', '.mega-menu').on('click', function (e) {
    if (typeof dcsMultiTrack == 'function') {
        var text = $(e.target).text();
        dcsMultiTrack(
            'DCS.dcsuri',
            '/menu/' + text,
            'WT.ti',
            'Menu - ' + text
        )
    }
});

// Replacing anchor-only links

$('.mega-menu a[href="#"]').each(function () {
    var $this = $(this),
        text = $this.text();
    $this.replaceWith($('<div>', {
        'text': text,
        'class': 'mg-more'
    }))
});

// Creating the home links

$(".main-ul > li > a").each(function () {
    var $this = $(this),
        $items = $this.next(),
        $link,
        $li;

    $this.addClass('mg-more');

    $link = $('<a>', {
        'href': $this.attr('href'),
        'text': $this.text() + ' home'
    });

    $li = $('<li>').append($link);

    $li.prependTo($items);
});

$('.mg-more').on('click', function (e) {
    if ($(window).width() < 480) {
        e.preventDefault();
        $(this).next().slideToggle('fast');
    }
});








;'use strict';

// Note:    This is a jQuery plugin and therefore has a dependency on jQuery being
//          loaded before the script is run

(function ($) {

    $.fn.add_attributes_to_target_blank = function () {
        return this.each(function () {
            var $this = $(this);
            if ($this.attr('target') === '_blank') {
                $this.attr('rel', 'noopener noreferrer');
            }
        });
    };

})(jQuery);;$('a[target="_blank"]').add_attributes_to_target_blank();

$('#mega-menu-pull-down, #mega-menu-mobile').mega_menu_interactions();

$("ul.sub-menu:last").append_promotional_image();