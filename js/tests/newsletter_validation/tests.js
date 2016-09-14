QUnit.module("Checking the DOM before plugin is applied", {
    beforeEach: function () {
        $('input[type=email]', '.fixture').val('');
    }
});

QUnit.test("Check required elements are available in fixture", function (assert) {
    assert.ok($('form', '.fixture').length == 1, "The form is present");
    assert.ok($('input[type=email]', '.fixture').length == 1, "The email input is present");
    assert.equal($('input[type=email]', '.fixture').val(), "", "The email address is empty");
});

QUnit.module("Checking the utilities", {
    beforeEach: function () {
        $('input[type=email]', '.fixture').val('');
    }
});
QUnit.test("Check if the browser supports HTML5 validation", function (assert) {
    assert.equal($.html5ValidationAvailable(), true);
});

QUnit.test("Test $.isEmail() function", function (assert) {
    assert.equal($.isEmail('john'), false, "John is not an email address");
    assert.equal($.isEmail('john@com'), false, "john@com is not an email address");
    assert.equal($.isEmail('john.com'), false, "john.com is not an email address");
    assert.equal($.isEmail('john@john.com'), true, "john@john.com is an email address");
});

QUnit.module("Checking the interactions", {
    beforeEach: function () {
        $('input[type=email]', '.fixture').val('').trigger('change');
        $('.error').remove();
    },
    afterEach: function () {
        $('input[type=email]', '.fixture').val('').trigger('change');
    }
});


QUnit.test("The error message is created by the plugin", function (assert) {
    assert.equal($('.error', '.fixture').length, 0, "There is no .error div before the plugin has run");
    $('form', '.fixture').newsletterValidation();
    assert.equal($('.error', '.fixture').length, 1, "The .error div is present after the plugin has run");
});

QUnit.test("There is no error message shown initially", function (assert) {
    $('form', '.fixture').newsletterValidation();
    var display = $('.error', '.fixture').css('display');
    assert.equal(display, 'none', "The .error div has 'display: none'");

});

QUnit.test("The error message is shown when incorrect content is entered", function (assert) {
    $('form', '.fixture').newsletterValidation();
    $('input[type=email]', '.fixture').val('wrong input').trigger('change');
    var display = $('.error', '.fixture').css('display');
    assert.equal(display, 'block', "The .error div has 'display: none'");
});
