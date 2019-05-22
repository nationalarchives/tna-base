$(document).ready(function () {
    // Hide search option
    $('#search-field-wrapper ul').hide();
    // $.showExpander()
    $.showExpander = function () {
        if ($('.expander').length) {
            $('.expander').delay(200).slideDown(400);
        }
    };

    $('.formDestinationChanger').on('click', function () {
        var placeholder = $(this).attr('data-placeholder'),
            target = $(this).attr('data-target'),
            fieldName = $(this).attr('data-fieldName');

        $.toggleDisplayOfElement('#scope-selector', '#search-field-wrapper ul');

        $('#tnaSearch').attr({'placeholder': placeholder, 'name': fieldName});
        $('#globalSearch').attr('action', target);
    });

    // When click change the arrow position
    $('#scope-selector').click(function () {
        $('#search-field-wrapper ul').toggle();
        if ($('#search-field-wrapper ul:visible').size() != 0) {
            $(this).addClass('expanded');
        }
        else {
            $(this).removeClass('expanded');
        }
    });

    $(document).on('click', '#search-controls li', function (e) {
        $('#search-controls li').removeClass('selected');
        $(e.target).addClass('selected');
    });

    // Global search - larger screens
    $(document).one('toggleSearchOptionsOnce', function () {
        $.toggleDisplayOfElement('#scope-selector', '#search-field-wrapper ul');
    });

    $(document).on('toggleSearchOptions', function () {
        $.toggleDisplayOfElement('#scope-selector', '#search-field-wrapper ul');
        $(document).off('toggleSearchOptionsOnce');
    });

    // Global search - smaller screens
    $(document).on('change', '.mobileSearchDestinationOption', function () {
        var target = $(this).attr('data-target'),
            placeholder = $(this).attr('data-placeholder'),
            fieldName = $(this).attr('data-fieldName');
        $('#mobile-search-field').attr({'placeholder': placeholder, 'name': fieldName}).focus();
        $('#mobileGlobalSearch').attr('action', target);
    });


    //Hides the responsive search
    $('#mobileGlobalSearch').css('display', 'none');
    //Responsive Search Menu Toggle
    $('.search-expander').click(function () {
        $('#mobileGlobalSearch').slideToggle('fast');
    });
    //Add a class and removes the class per click.
    $('button.search-expander').on('click', function () {
        $(this).toggleClass('search-close');
    });


    $('input:radio[name=radioSearchGroup]').change(function () {
        if (this.value == 'search_website') {
            //Changes the form action url
            $('form').attr('action', 'https://www.nationalarchives.gov.uk/search/search_results.aspx');
            //changes name attribute
            $('#mobileGlobalSearch input[name="_q"]').attr('name', 'QueryText');
            //changes the placeholder
            $('input[name="QueryText"]').attr('placeholder', 'Search our website...');
        }
        else if (this.value == 'search_records') {
            //Changes the form action url
            $('form').attr('action', 'http://discovery.nationalarchives.gov.uk/SearchUI/s/res');
            //changes name attribute
            $('#mobileGlobalSearch input[name="QueryText"]').attr('name', '_q');
            //changes the placeholder
            $('input[name="_q"]').attr('placeholder', 'Search our records...');
        }
    });


});