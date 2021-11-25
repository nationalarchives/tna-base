"use strict";

// Creating the home links

$.fn.mega_menu_enhancements = function () {

    // Mega menu button

    $('#mega-menu-pull-down, #mega-menu-mobile').each(function () {
        var $this = $(this);
        $this.on('click', function () {
            $('#nav').slideToggle('fast');
            $this.toggleClass('expanded');
        })
    });

    // Establishing toggle behaviour for links with .toggle-sub-menu

    $(document).on('click keydown keyup', '.toggle-sub-menu', function (e) {

        if(e.type ==="keyup") {
            return;
        }

        if(e.type === "keydown" && e.key !== "Enter") {
            return;
        }

        if (window.innerWidth <= 480) {
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
};


// Displays the promotional image

$.fn.append_promotional_image = function () {
    return this.each(function () {
        var $this = $(this);
        $this.append('<li class="imgContent"><a href="https://www.nationalarchives.gov.uk/20s-people/" title="20s People"><img src="https://cdn.nationalarchives.gov.uk/images/20s-people-mega-menu-image.jpg" alt="20s People" class="img-responsive tna-img-responsive"></a></li>');
    })
};

// moreLinkFocusManager()

// The purpose of this function is to ensure that the more link can receive keyboard focus
// at the point when event handlers are attached to it.

$.moreLinkFocusManager = function() {

    $('#more-link').attr('tabindex', function () {
        return window.innerWidth > 480 ? '-1' : '0';
    });
};

// Bindings to window
$(window).on({
    resize: function() {
        $.moreLinkFocusManager();
    }
});
