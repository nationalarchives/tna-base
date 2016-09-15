QUnit.module("Checking the DOM before plugin is applied", {});

QUnit.test("Check required elements in fixture", function (assert) {
    assert.ok($('form', '.fixture').length == 1, "The form is present");
    assert.ok($('input[type=email]', '.fixture').length == 1, "The email input is present");
    assert.equal($('input[type=email]', '.fixture').val(), "", "The email address is empty");
    assert.ok($('input[type=submit]', '.fixture').prop('disabled') == false, "The submit button is NOT disabled before the plugin has run");
});

QUnit.module("Checking the custom utilities created for this plugin", {});

QUnit.test("Test $.isEmail() function 'happy path'", function (assert) {

    ['john@john.com', 'mary@mary.com'].forEach(function (i) {
        assert.equal($.isEmail(i), true, "john@john.com is an email address");
    });

    ['john', 'mary', 'john.com', 'john@com'].forEach(function (i) {
        assert.equal($.isEmail(i), false, "John is not an email address");
    });
});

QUnit.module("State of the DOM after the plugin has run", {});

QUnit.test("The submit button is disabled", function (assert) {
    $('#signup').newsletterValidation();
    assert.ok($('input[type=submit]', '.fixture').prop('disabled') == true, "The submit button is disabled after the plugin is run");
});

QUnit.module("State of the DOM in response to user interactions", {});

QUnit.test("If a valid string is provided, the submit button is no longer disabled", function (assert) {
    var done = assert.async();
    $('input[type=email]', '.fixture').val('mail@test.com').trigger('change');
    setTimeout(function () {
        assert.ok($('input[type=submit]', '.fixture').prop('disabled') === false, "The submit button is not disabled after a valid email has been entered");
        done();
    }, 400);
});

QUnit.test("If an invalid string is provided, the submit button should be disabled again", function (assert) {
    var done = assert.async();
    setTimeout(function () {
        $('input[type=email]', '.fixture').val('mail@test').trigger('change');
        assert.ok($('input[type=submit]', '.fixture').prop('disabled') === true, "The submit button is disabled after an invalid email has been entered");
        done();
    }, 400);
});

QUnit.test("If an empty string is provided, the submit button should be disabled again", function (assert) {
    var done = assert.async();
    setTimeout(function () {
        $('input[type=email]', '.fixture').val('').trigger('change');
        assert.ok($('input[type=submit]', '.fixture').prop('disabled') === true, "The submit button is disabled after an empty string is provided");
        done();
    }, 400);
});
