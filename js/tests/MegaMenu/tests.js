QUnit.module("Mega menu toggle");

QUnit.test("#mega-menu-pull-down toggles #nav", function (assert) {

    var done = assert.async();

    $('#mega-menu-pull-down, #mega-menu-mobile').mega_menu_toggle();

    assert.equal($('#nav').css('display'), 'none', "Clicking on #mega-menu-pull-down reveals a hidden #nav item");

    $('#mega-menu-pull-down').click();

    setTimeout(function () {
        assert.equal($('#nav').css('display'), 'block', "Clicking on #mega-menu-pull-down reveals a hidden #nav item");
        done();
    }, 1000);

});

QUnit.module("Appending home links to mega menu");

QUnit.test("The .toggle-sub-menu links should NOT exist before the plugin is applied", function (assert) {

    assert.ok($('.toggle-sub-menu').length == 0, 'There are no ".toggle-sub-menu" links in the DOM');

});

QUnit.test("Every target element should have a .toggle-sub-menu link after the plugin is applied", function (assert) {

    $items = $(".mega-menu > ul > li > a");

    $items.append_home_links_to_mega_menu();

    $items.each(function () {

        assert.ok($(this).hasClass('toggle-sub-menu'), 'All .toggle-sub-menu links are in the DOM');
    })

});

QUnit.test("The first link in every .sub-menu should have the class .mobile-home-link (unless it is the 'More...' link)", function (assert) {

    $(".mega-menu > ul > li > a").append_home_links_to_mega_menu();

    $('.sub-menu li:first-child').each(function () {

        var $this = $(this);

        // This is brittle but will suffice for the refactoring

        if ($this.text() !== 'Bookshop') {
            assert.ok($this.hasClass('mobile-home-link'), $this.text() + ' has the ".mobile-home-link" class');
        }
    })

});

if ($(window).width() > 500) {
    QUnit.test("The 'More...' link should not toggle its siblings at larger screen sizes", function (assert) {

        $items.append_home_links_to_mega_menu();

        var $moreLink = $('#more-link'),
            $siblingUL = $moreLink.next();

        assert.equal($siblingUL.css('display'), 'block', "The sibling UL is initially shown");

        var done = assert.async();

        $moreLink.click();

        setTimeout(function () {
            assert.equal($siblingUL.css('display'), 'block', "The sibling UL is still shown after $moreLink has been clicked");
            done();
        }, 1000);

    });

}

if ($(window).width() < 500) {
    QUnit.test("Clicking '.toggle-sub-menu' links on a smaller screen should result in the adjacent sibling being toggled", function (assert) {

        $items.append_home_links_to_mega_menu();

        var $moreLinks = $('.toggle-sub-menu');

        $moreLinks.each(function () {

            var $this = $(this);

            assert.equal($this.next().css('display'), 'block', "The sibling UL is initially shown");

            var done = assert.async();

            $this.click();

            setTimeout(function () {
                assert.equal($this.next().css('display'), 'none', "The sibling UL is not shown after $moreLink has been clicked");
                done();
            }, 1000);
        });

    });
}


QUnit.module("Dynamic webtrends click handlers");

QUnit.test("No links should have click handlers before the plugin is applied", function (assert) {

    $('a').each(function () {
        assert.ok(typeof this.onclick !== 'function', "No links in the mega menu have click handlers");
    });

});


QUnit.module("Promotional image");

QUnit.test("The promotional image should NOT exist in the DOM before the plugin is applied", function (assert) {

    assert.ok($("ul.sub-menu:last .imgContent").length == 0, 'The promotional image does not exist');

});

QUnit.test("The promotional image should exist in the DOM after the plugin is applied", function (assert) {

    $("ul.sub-menu:last").append_promotional_image();

    assert.ok($("ul.sub-menu:last .imgContent").length == 1, 'The promotional image does exist');

});