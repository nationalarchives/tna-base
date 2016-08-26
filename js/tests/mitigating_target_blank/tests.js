QUnit.test("Links are present in DOM", function (assert) {
    assert.equal($('a', '#qunit-fixture').length, 5, "There are five links on the page");
    assert.ok($('a[target="_blank"]', '#qunit-fixture').length === 3, "Three of the links have 'target=\"_blank\" attribute");
});

QUnit.test("Before running, no 'rel' attributes are present", function (assert) {
    $('a', '#qunit-fixture').each(function () {
        assert.equal($(this).attr('rel'), undefined, "There is no 'rel' attribute on any link");
    });
});

QUnit.test("add_attributes_to_target function exists test", function (assert) {
    assert.ok(typeof $.fn.add_attributes_to_target_blank == "function", "add_attributes_to_target_blank is a function");
});

QUnit.test("Plugin should act on links with [target=_blank]", function (assert) {

    $('a', '#qunit-fixture').add_attributes_to_target_blank();

    $('a', '#qunit-fixture').each(function () {
        var $this = $(this);

        if ($this.attr('target') === '_blank') {
             assert.equal($this.attr('rel'), 'noopener noreferrer', "The rel attribute is set");
        } else {
             assert.equal($this.attr('rel'), undefined, "The rel attribute is not set");
        }
    })

});

