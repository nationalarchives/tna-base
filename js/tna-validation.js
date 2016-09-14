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
                $errorMsg = $('<div>', {
                    'class': 'error',
                    'text': 'Error in input'
                }).css('display', 'none');

            $errorMsg.insertBefore($email);

            $email.on('keyup change', function () {
                var $this = $(this);

                showError($.isEmail($this.val()) === false, $errorMsg);

            });

        });
    };

    var showError = function (boolean, $el) {
        if (boolean) {
            $el.show();
            $('input[type="submit"]', '.fixture').prop('disabled', true);
        } else {
            $el.hide();
            $('input[type="submit"]', '.fixture').prop('disabled', false);
        }
    };

    $.html5ValidationAvailable = function () {
        return (typeof document.createElement('input').checkValidity == 'function');
    };

    $.isEmail = function (str) {
        return (/^[\w.%+\-]+@[\w.\-]+\.[A-Za-z]{2,6}$/.test(str) || str.length === 0);
    };

}(jQuery));