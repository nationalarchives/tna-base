/**
 * Admin JS.
 */

jQuery(document).ready( function( $ ) {

    $('#upload_media_button').click(function() {

        formfield = $('#upload_media').attr('name');
        tb_show( '', 'media-upload.php?type=image&amp;TB_iframe=true' );
        return false;
    });

    window.send_to_editor = function(html) {

        imgurl = $('img',html).attr('src');
        $('#upload_media').val(imgurl);
        tb_remove();
    }

});