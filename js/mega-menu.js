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
        'class': 'mg-more'
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

        $li = $('<li>').append($link);

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
};





