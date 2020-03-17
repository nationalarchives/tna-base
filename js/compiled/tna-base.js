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
};

var customizeTweetMedia = function() {
    jQuery('.entry-content').find('.twitter-timeline').contents().find('.timeline-Tweet-text').css('font-size', '1.148em', 'line-height', '1.6em');
    jQuery('.entry-content').find('.twitter-timeline').contents().find('.timeline-Tweet-text').css('line-height', '1.58em');
    jQuery('.entry-content').find('.twitter-timeline').contents().find('h1').css('font-size', '1.45em');

}

jQuery('.entry-content').delegate('#twitter-widget-0','DOMSubtreeModified propertychange', function() {
    customizeTweetMedia();
});
;"use strict";

// Creating the home links

$.fn.mega_menu_enhancements = function () {

    // Mega menu button

    $('#mega-menu-pull-down, #mega-menu-mobile').each(function () {
        var $this = $(this);
        $this.on('click', function () {
            $('#nav').slideToggle('fast');
        })
    });;

    // Establishing toggle behaviour for links with .toggle-sub-menu

    $(document).on('click', '.toggle-sub-menu', function (e) {
        if ($(window).width() < 480) {
            var $this = $(this);
            e.preventDefault();
            $this.toggleClass('expanded').next().slideToggle('fast');
        }
    });

    // Replacing anchor-only links

    $('.mega-menu a[href="#"]').each(function () {
        var $this = $(this),
            text = $this.text();
        $this.replaceWith($('<div>', {
            'text': text,
            'class': 'toggle-sub-menu',
            'id': 'more-link'
        }));
    });

    return this.each(function () {
        var $this = $(this),
            $items = $this.next(),
            $link,
            $li;

        $this.addClass('toggle-sub-menu');


        $link = $('<a>', {
            'href': $this.attr('href'),
            'text': $this.text() + ' home'
        });

        $li = $('<li class="mobile-home-link">').append($link);

        $li.prependTo($items);

    })
};


// Displays the promotional image

$.fn.append_promotional_image = function () {
    return this.each(function () {
        var $this = $(this);
        $this.append('<li class="imgContent"><a href="https://www.nationalarchives.gov.uk/about/visit-us/whats-on/with-love/" title="With Love"><img src="//www.nationalarchives.gov.uk/images/home/menu-with-love.jpg" alt="With Love" class="img-responsive tna-img-responsive"></a></li>');
    })
};
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

})(jQuery);;
tnaSetThisCookie = function (name, days) {
    var d = new Date();
    d.setTime(d.getTime() + 1000 * 60 * 60 * 24 * days);
    document.cookie = name + "=true;path=/;expires=" + d.toGMTString() + ';';
};

tnaCheckForThisCookie = function (name) {
    if (document.cookie.indexOf(name) === -1) {
        return false;
    } else {
        return true;
    }
};

$(document).ready(function () {

    $(function () { // All content must be placed within this IIFE.
        $('#mega-menu-pull-down').show();
        if (!tnaCheckForThisCookie("dontShowCookieNotice")) {
            $('<div class="cookieNotice">We use cookies to improve services and ensure they work for you. Read our <a title="Our cookie policy" href="https://www.nationalarchives.gov.uk/legal/cookies.htm">cookie policy</a>. <a title="Close cookie policy notice" href="#" id="cookieCutter">Close</a></div>').css({
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
            $('form').attr('action', 'https://www.nationalarchives.gov.uk/search/search_results.aspx');
            //changes name attribute
            $('#mobileGlobalSearch input[name="_q"]').attr('name', 'QueryText');
            //changes the placeholder
            $('input[name="QueryText"]').attr('placeholder', 'Search our website...');
        }
        else if (this.value == 'search_records') {
            //Changes the form action url
            $('form').attr('action', 'https://discovery.nationalarchives.gov.uk/SearchUI/s/res');
            //changes name attribute
            $('#mobileGlobalSearch input[name="QueryText"]').attr('name', '_q');
            //changes the placeholder
            $('input[name="_q"]').attr('placeholder', 'Search our records...');
        }
    });


});;$(document).ready(function(){
    if($(".image_caption_back").length){
        var $imageCaption = $(".image_caption_back");
        var ariaExpanded = $.parseJSON($(".eye_caption").attr("aria-expanded").toLowerCase());
        var ariaHidden = $.parseJSON($imageCaption.attr("aria-hidden").toLowerCase());

        $(".eye_caption").on('click', function(){
            $imageCaption.toggle();
            ariaHidden = !ariaHidden;
            ariaExpanded = !ariaExpanded;
            $imageCaption.attr('aria-hidden', ariaHidden);
            $(this).attr('aria-expanded', ariaExpanded);
        })
    }
});
;// The process for adding JavaScript to this repository is as follows:

// (1) If it involves the use of a third-party plugin or library, place the required file within the /lib directory
// (2) Task specific scripts should be added to this directory
// (3) Any generic, reusable utilities should be placed within generic-utilities.js
// (4) The newly created file should be added to the 'uglify' task within Gruntfile.js
/*
 * The National Archives
 * Author:  Mihai Diaconita - WEB TEAM
 * Newsletter Back To Origin Jquery plugin
 * */

$(function() {
  $('a[class="anchor-link"]').on('click', function() {
    if (
      location.pathname.replace(/^\//, '') ==
        this.pathname.replace(/^\//, '') &&
      location.hostname == this.hostname
    ) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate(
          {
            scrollTop: target.offset().top
          },
          500
        );
        return false;
      }
    }
  });
});
;$('a[target="_blank"]').add_attributes_to_target_blank();

$('ul.sub-menu:last').append_promotional_image();

$('.mega-menu > ul > li > a').mega_menu_enhancements();