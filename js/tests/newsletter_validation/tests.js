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

QUnit.module("Checking the custom utilities created for this plugin", {
    beforeEach: function () {
        $('input[type=email]', '.fixture').val('');
        $('input[type="submit"]', '.fixture').prop('disable', false);
    }
});

QUnit.test("Check if the browser supports HTML5 validation", function (assert) {
    assert.equal($.html5ValidationAvailable(), true);
});

QUnit.test("Test $.isEmail() function 'happy path'", function (assert) {

    ['john@john.com', 'mary@mary.com'].forEach(function (i) {
        assert.equal($.isEmail(i), true, "john@john.com is an email address");
    });

    ['john', 'mary', 'john.com', 'john@com'].forEach(function (i) {
        assert.equal($.isEmail(i), false, "John is not an email address");
    });

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
    var display = $('.error', '.fixture').css('display');
    assert.equal(display, 'none', "The .error div has 'display: none'");
});

QUnit.test("Check if submit button is not disabled", function(assert) {
    $('form', '.fixture').newsletterValidation();
    var disable = $('input[type="submit"]', '.fixture').prop('disable');
    assert.ok(disable != true, 'The submit button is not disabled');
});