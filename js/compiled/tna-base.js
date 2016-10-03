$.customEventer = function (passedObject) {
    var elementIdOrClass = passedObject.elementIdOrClass,
        eventToWatch = passedObject.eventToWatch,
        customEventToTrigger = passedObject.customEventToTrigger;

    $(document).on(eventToWatch, elementIdOrClass, function () {
        $(document).trigger(customEventToTrigger);
    });
};

$.toggleDisplayOfElement = function (toggler, togglee) {
    $(togglee).toggle();
    $(toggler).toggleClass('expanded');
};;"use strict";

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

// Replacing anchor-only links

$('.mega-menu a[href="#"]').each(function () {
    var $this = $(this),
        text = $this.text();
    $this.replaceWith($('<div>', {
        'text': text,
        'class': 'mg-more',
        'click': function() {
            $(this).next().slideToggle('fast');
        }
    }))
});

// Creating the home links

$.fn.append_home_links_to_mega_menu = function () {
    return this.each(function () {
        var $this = $(this),
            $items = $this.next(),
            $link,
            $li;

        $this.addClass('mg-more');

        $this.on('click', function (e) {
            if ($(window).width() < 480) {
                e.preventDefault();
                $(this).next().slideToggle('fast');
            }
        });

        $link = $('<a>', {
            'href': $this.attr('href'),
            'text': $this.text() + ' home'
        });

        $li = $('<li class="mobile-home-link">').append($link);

        $li.prependTo($items);
    })
};

// Sets up the WebTrends handlers

$.fn.webtrends_click_handler = function () {
    return this.each(function () {
        var $this = $(this);
        $this.on('click', function (e) {
            if (typeof dcsMultiTrack == 'function') {
                var text = $(e.target).text();
                dcsMultiTrack(
                    'DCS.dcsuri',
                    '/menu/' + text,
                    'WT.ti',
                    'Menu - ' + text
                )
            }
        })
    })
};;'use strict';

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

$(".main-ul > li > a").append_home_links_to_mega_menu();

$('a', '.mega-menu').webtrends_click_handler();;$(document).ready(function () {

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
});;$(document).ready(function () {
    var tnaSetThisCookie = function (name, days) {
        var d = new Date();
        d.setTime(d.getTime() + 1000 * 60 * 60 * 24 * days);
        document.cookie = name + "=true;path=/;expires=" + d.toGMTString() + ';';
    };

    var tnaCheckForThisCookie = function (name) {
        if (document.cookie.indexOf(name) === -1) {
            return false;
        } else {
            return true;
        }
    };

    $(function () { // All content must be placed within this IIFE.
        $('#mega-menu-pull-down').show();
        if (!tnaCheckForThisCookie("dontShowCookieNotice")) {
            $('<div class="cookieNotice">We use cookies to improve services and ensure they work for you. Read our <a title="Our cookie policy" href="http://www.nationalarchives.gov.uk/legal/cookies.htm">cookie policy</a>. <a title="Close cookie policy notice" href="#" id="cookieCutter">Close</a></div>').css({
                padding: '5px',
                "text-align": "center",
                backgroundColor: '#FCE45C',
                position: 'fixed',
                bottom: 0,
                'font-size': '14px',
                width: '100%',
                display: 'none'
            }).appendTo('body');

            setTimeout(function () {
                $('.cookieNotice').slideDown(1000);
            }, 1000);
        }
    });

    // 2.4 Binding to document (event delegation)
    $(document).on('click', '#cookieCutter', function (e) {
        e.preventDefault();
        tnaSetThisCookie('dontShowCookieNotice', 365);
        $('.cookieNotice').hide();
    });

});;$(document).ready(function () {
    // Hide search option
    $('#search-field-wrapper ul').hide();
    // $.showExpander()
    $.showExpander = function () {
        if ($('.expander').length) {
            $('.expander').delay(200).slideDown(400);
        }
    };

    $('.formDestinationChanger').on('click', function () {
        var placeholder = $(this).attr('data-placeholder'),
            target = $(this).attr('data-target'),
            fieldName = $(this).attr('data-fieldName');

        $.toggleDisplayOfElement('#scope-selector', '#search-field-wrapper ul');

        $('#tnaSearch').attr({'placeholder': placeholder, 'name': fieldName});
        $('#globalSearch').attr('action', target);
    });

    // When click change the arrow position
    $('#scope-selector').click(function () {
        $('#search-field-wrapper ul').toggle();
        if ($('#search-field-wrapper ul:visible').size() != 0) {
            $(this).addClass('expanded');
        }
        else {
            $(this).removeClass('expanded');
        }
    });

    $(document).on('click', '#search-controls li', function (e) {
        $('#search-controls li').removeClass('selected');
        $(e.target).addClass('selected');
    });

    // Global search - larger screens
    $(document).one('toggleSearchOptionsOnce', function () {
        $.toggleDisplayOfElement('#scope-selector', '#search-field-wrapper ul');
    });

    $(document).on('toggleSearchOptions', function () {
        $.toggleDisplayOfElement('#scope-selector', '#search-field-wrapper ul');
        $(document).off('toggleSearchOptionsOnce');
    });

    // Global search - smaller screens
    $(document).on('change', '.mobileSearchDestinationOption', function () {
        var target = $(this).attr('data-target'),
            placeholder = $(this).attr('data-placeholder'),
            fieldName = $(this).attr('data-fieldName');
        $('#mobile-search-field').attr({'placeholder': placeholder, 'name': fieldName}).focus();
        $('#mobileGlobalSearch').attr('action', target);
    });


    //Hides the responsive search
    $('#mobileGlobalSearch').css('display', 'none');
    //Responsive Search Menu Toggle
    $('.search-expander').click(function () {
        $('#mobileGlobalSearch').slideToggle('fast');
    });
    //Add a class and removes the class per click.
    $('button.search-expander').on('click', function () {
        $(this).toggleClass('search-close');
    });


    $('input:radio[name=radioSearchGroup]').change(function () {
        if (this.value == 'search_website') {
            //Changes the form action url
            $('form').attr('action', 'http://www.nationalarchives.gov.uk/search/search_results.aspx');
            //changes name attribute
            $('#mobileGlobalSearch input[name="_q"]').attr('name', 'QueryText');
            //changes the placeholder
            $('input[name="QueryText"]').attr('placeholder', 'Search our website...');
        }
        else if (this.value == 'search_records') {
            //Changes the form action url
            $('form').attr('action', 'http://discovery.nationalarchives.gov.uk/SearchUI/s/res');
            //changes name attribute
            $('#mobileGlobalSearch input[name="QueryText"]').attr('name', '_q');
            //changes the placeholder
            $('input[name="_q"]').attr('placeholder', 'Search our records...');
        }
    });


});;$(document).ready(function () {
    $('.eye_caption').on('click', function () {
        $('.image_caption_back').toggle();
    });
});
