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
            var thankYouURL = "http://nationalarchives.gov.uk/about/get-involved/newsletters/thank-you/",
                thankYouURLTestlb = "http://getinvolved.testlb.nationalarchives.gov.uk/newsletters/thank-you/",
                thankYouURLTest = "http://test.nationalarchives.gov.uk/about/get-involved/newsletters/thank-you/",
                thankYouURLDev = "http://tna-base:8888/thank-you/",
                newValue = "?oldurl=" + window.location.href;

            if(window.location.href === "http://nationalarchives.gov.uk") {
                return settings.$element.val(thankYouURL + newValue);
            }
            else if(window.location.href === "http://getinvolved.testlb.nationalarchives.gov.uk") {
                return settings.$element.val(thankYouURLTestlb + newValue);
            }
            else if(window.location.href === "http://test.nationalarchives.gov.uk") {
                return settings.$element.val(thankYouURLTest + newValue);
            }
            else {
                return settings.$element.val(thankYouURLDev + newValue);
            }
        });
    }

    // Default settings
    $.fn.newsletterBackToOrigin.defaults = {
        $element: $('input[name="ReturnURL"]'),
    }
}(jQuery));