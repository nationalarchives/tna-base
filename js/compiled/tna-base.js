'use strict';

// Note:    This is a jQuery plugin and therefore has a dependency on jQuery being
//          loaded before the script is run

(function ($) {

    $.fn.add_attributes_to_target_blank = function () {
        return this.each(function () {
            var $this = $(this);
            if ($this.attr('target') === '_blank') {
                $this.attr('rel', 'noopener noreferrer');
            }
        });
    };

})(jQuery);;$('a[target="_blank"]').add_attributes_to_target_blank();