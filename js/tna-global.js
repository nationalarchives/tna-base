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
            var thankYouURL = "http://www.nationalarchives.gov.uk/about/get-involved/newsletters/the-national-archives-newsletter/thank-you/",
                newValue = "?oldurl=" + window.location.href;
                return settings.$element.val(thankYouURL + newValue);
        });
    }

    // Default settings
    $.fn.newsletterBackToOrigin.defaults = {
        $element: $('input[name="ReturnURL"]'),
    }
}(jQuery));

// 	This JavaScript/jQuery snippet changes the image and caption that appear in the global footer.
//	It has been extracted to a stand-alone file so that it can be shared across applications,
//	keeping the footer consistent across applications.
$(document).ready(function(){
    ({
        server : "https://www.nationalarchives.gov.uk/",
        imageSource : "images/global/inf-14-345-expo-67.jpg",
        imageDescription : "Cutting-edge racing car design in the 1960s at Montreal Expo 67",
        linkText : "INF 14/345",
        linkHref : "https://www.flickr.com/photos/nationalarchives/5960779782/",
        linkTitle : "External website - opens in new window",
        linkTarget : "_blank",
        init : function() {
            var caption = $('#flickr-caption'),
                imageContainer = $('#flickr-image'),
                image = imageContainer.find('img'),
                imageLink = imageContainer.find('a');

            caption.text(this.imageDescription);

            imageLink.attr('href', this.linkHref);

            image.attr({'src' : this.server + this.imageSource, 'alt' : this.imageDescription});

            $('<a>', {
                href : this.linkHref,
                title : this.linkTitle,
                text : this.linkText,
                target : this.linkTarget
            }).appendTo(caption).before(' (').after(')');
        }
    }).init();
})
