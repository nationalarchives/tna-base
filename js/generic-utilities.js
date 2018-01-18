$.customEventer = function (passedObject) {
    var elementIdOrClass = passedObject.elementIdOrClass,
        eventToWatch = passedObject.eventToWatch,
        customEventToTrigger = passedObject.customEventToTrigger;

    $(document).on(eventToWatch, elementIdOrClass, function () {
        $(document).trigger(customEventToTrigger);
    });
};

$.toggleDisplayOfElement = function (toggler, togglee) {
    $(togglee).toggle();
    $(toggler).toggleClass('expanded');
};



var customizeTweetMedia = function() {
    jQuery('.entry-content').find('.twitter-timeline').contents().find('.timeline-Tweet-text').css('font-size', '1.148em', 'line-height', '1.6em');
    jQuery('.entry-content').find('.twitter-timeline').contents().find('.timeline-Tweet-text').css('line-height', '1.58em');
    jQuery('.entry-content').find('.twitter-timeline').contents().find('h1').css('font-size', '1.45em');

}

jQuery('.entry-content').delegate('#twitter-widget-0','DOMSubtreeModified propertychange', function() {
    customizeTweetMedia();
});