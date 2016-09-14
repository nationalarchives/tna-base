QUnit.module("Checking the DOM", {
    beforeEach: function () {
        $('input[type=email]', '.fixture').val('');
    }
});

QUnit.test("Check if form with signup id is present", function (assert) {
    assert.ok($('form', '.fixture').length == 1, "The form with a specific ID is present");
});

QUnit.test("Check if input type email is present", function (assert) {
    assert.ok($('input[type=email]', '.fixture').length == 1, "The form with a specific input type is present");
});

QUnit.test("Check if the email field is empty", function (assert) {
    assert.equal($('input[type=email]', '.fixture').val(), "", "The email address is empty");
});

QUnit.module("Checking the utilities", {
    beforeEach: function () {
        $('input[type=email]', '.fixture').val('');
        $('input[type="submit"]', '.fixture').prop('disable', false);
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

QUnit.test("Check if submit button is not disabled", function(assert) {
    $('form', '.fixture').newsletterValidation();
    var disable = $('input[type="submit"]', '.fixture').prop('disable');
    assert.ok(disable != true, 'The submit button is not disabled');
});