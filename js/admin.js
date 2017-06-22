/**
 * WP Admin JS.
 */

jQuery(document).ready(function() {
    jQuery('.media-metabox-button-js').on('click', function() {

        var $this = jQuery(this);

        $target = jQuery('#' + $this.attr('name'));

        tb_show('', 'media-upload.php?TB_iframe=true');

        window.send_to_editor = function(html) {
            url = jQuery( 'img', jQuery( html ) ).attr('src');
            $target.val(url);
            tb_remove();
        };

        return false;
    });
});