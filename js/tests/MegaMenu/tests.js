QUnit.module("Mega menu interactions");

QUnit.test("Checking #mega-menu-pull-down shows #nav", function (assert) {

    var done = assert.async();

    $('#nav').hide();

    $('#mega-menu-pull-down, #mega-menu-mobile').mega_menu_interactions();

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

QUnit.test("The mg-more links should exist after the plugin is applied", function (assert) {

    $(".main-ul > li > a").append_home_links_to_mega_menu();

    assert.ok($('.mg-more').length > 0, 'There are "mg-more" links in the DOM');

});

