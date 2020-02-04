$(document).ready(function(){
    var $imageCaption = $(".image_caption_back");
    var ariaExpanded = $.parseJSON($(".eye_caption").attr("aria-expanded").toLowerCase());
    var ariaHidden = $.parseJSON($imageCaption.attr("aria-hidden").toLowerCase());

    $(".eye_caption").on('click', function(){
        $imageCaption.toggle();
        ariaHidden = !ariaHidden;
        ariaExpanded = !ariaExpanded;
        $imageCaption.attr('aria-hidden', ariaHidden);
        $(this).attr('aria-expanded', ariaExpanded);
    })
});
