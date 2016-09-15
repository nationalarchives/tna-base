/**
 * Validation for newsletter HTML
 */

(function ($) {

    $.fn.newsletterValidation = function () {

        if ($.html5ValidationAvailable() === false) {
            return;
        }

        return this.each(function () {

            var $this = $(this),
                $email = $this.find('input[type=email]'),
                $submit = $this.find('input[type=submit]');

            $.manageState($email, $submit);

            $email.on('keyup change', function () {
                $.manageState($(this), $submit);
            });
        });
    };

    $.html5ValidationAvailable = function () {
        return (typeof document.createElement('input').checkValidity == 'function');
    };

    $.isEmail = function (str) {
        return (/^[\w.%+\-]+@[\w.\-]+\.[A-Za-z]{2,6}$/.test(str));
    };

    $.manageState = function ($email, $submit) {
        $submit.prop('disabled', !$.isEmail($email.val()));
    };

}(jQuery));