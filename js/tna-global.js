// The process for adding JavaScript to this repository is as follows:

// (1) If it involves the use of a third-party plugin or library, place the required file within the /lib directory
// (2) Task specific scripts should be added to this directory
// (3) Any generic, reusable utilities should be placed within generic-utilities.js
// (4) The newly created file should be added to the 'uglify' task within Gruntfile.js
/*
 * The National Archives
 * Author:  Mihai Diaconita - WEB TEAM
 * Newsletter Back To Origin Jquery plugin
 * */

(function ($) {
    $.fn.newsletterBackToOrigin = function (options) {
        var settings = $.extend({}, $.fn.newsletterBackToOrigin.defaults, options);
        return this.each(function () {
            var thankYouURL = "http://test.nationalarchives.gov.uk/about/get-involved/newsletters/the-national-archives-newsletter/thank-you/",
                newValue = "?oldurl=" + window.location.href;
                return settings.$element.val(thankYouURL + newValue);
        });
    }

    // Default settings
    $.fn.newsletterBackToOrigin.defaults = {
        $element: $('input[name="ReturnURL"]'),
    }
}(jQuery));