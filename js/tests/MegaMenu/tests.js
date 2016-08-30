QUnit.test("Checking #mega-menu-pull-down shows #nav", function (assert) {

    var done = assert.async();

    $('#nav').hide();
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

QUnit.test("The promotional image should exist in the DOM", function (assert) {

    assert.ok($("ul.sub-menu:last .imgContent").length == 1, 'The image content exists');

})