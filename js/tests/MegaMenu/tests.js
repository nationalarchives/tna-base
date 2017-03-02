QUnit.module("Mega menu toggle");

QUnit.test("Checking #mega-menu-pull-down shows #nav", function (assert) {

    var done = assert.async();

    $('#nav').hide();

    $('#mega-menu-pull-down, #mega-menu-mobile').mega_menu_toggle();

    $('#mega-menu-pull-down').click();

    setTimeout(function () {
        assert.equal($('#nav').css('display'), 'block', "Clicking on #mega-menu-pull-down reveals a hidden #nav item");
        done();
    }, 1000);

});

QUnit.test("Checking #mega-menu-pull-down hides #nav", function (assert) {

    var done = assert.async();

    $('#nav').show();
    $('#mega-menu-pull-down').click();

    setTimeout(function () {
        assert.equal($('#nav').css('display'), 'none', "Clicking on #mega-menu-pull-down reveals a hidden #nav item");
        done();
    }, 1000);

});

QUnit.module("Promotional image");

QUnit.test("The promotional image should NOT exist in the DOM before the plugin is applied", function (assert) {

    assert.ok($("ul.sub-menu:last .imgContent").length == 0, 'The promotional image does not exist');

});

QUnit.test("The promotional image should exist in the DOM after the plugin is applied", function (assert) {

    $("ul.sub-menu:last").append_promotional_image();

    assert.ok($("ul.sub-menu:last .imgContent").length == 1, 'The promotional image does exist');

});

QUnit.module("Appending home links to mega menu");

QUnit.test("The mg-more links should NOT exist before the plugin is applied", function (assert) {

    assert.ok($('.mg-more').length == 0, 'There are no "mg-more" links in the DOM');

});

QUnit.test("Every target element should have a mg-more link after the plugin is applied", function (assert) {

    $items = $(".mega-menu > ul > li > a");

    $items.append_home_links_to_mega_menu();

    $items.each(function () {

        assert.ok($(this).hasClass('mg-more'), 'All "mg-more" links are in the DOM');
    })


});

if ($(window).width() > 500) {
    QUnit.test("The 'More...' link should not toggle its siblings at larger screen sizes", function (assert) {

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
    QUnit.test("Clicking '.mg-more' links on a smaller screen should result in the adjacent sibling being toggled", function (assert) {

        var $moreLinks = $('.mg-more');

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