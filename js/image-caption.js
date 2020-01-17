$(document).ready(function () {
    var $imageCaption = $(".image_caption_back");
    var ariaHidden = $(".eye_caption").attr("aria-hidden") === "true";
    var ariaExpanded = $imageCaption.attr("aria-expanded") === "true";

    $('.eye_caption').on('click', function () {
        $imageCaption.toggle();
        $imageCaption.attr('aria-expanded', !ariaExpanded);
        $(this).attr("aria-hidden", !ariaHidden);
    });
});
