
tnaSetThisCookie = function (name, days) {
    var d = new Date();
    d.setTime(d.getTime() + 1000 * 60 * 60 * 24 * days);
    document.cookie = name + "=true;path=/;expires=" + d.toGMTString() + ';';
};

tnaCheckForThisCookie = function (name) {
    if (document.cookie.indexOf(name) === -1) {
        return false;
    } else {
        return true;
    }
};

$(document).ready(function () {

    $(function () { // All content must be placed within this IIFE.
        $('#mega-menu-pull-down').show();
        if (!tnaCheckForThisCookie("dontShowCookieNotice")) {
            $('<div class="cookieNotice">We use cookies to improve services and ensure they work for you. Read our <a title="Our cookie policy" href="http://www.nationalarchives.gov.uk/legal/cookies.htm">cookie policy</a>. <a title="Close cookie policy notice" href="#" id="cookieCutter">Close</a></div>').css({
                padding: '5px',
                "text-align": "center",
                backgroundColor: '#FCE45C',
                position: 'fixed',
                bottom: 0,
                'font-size': '14px',
                width: '100%',
                display: 'none'
            }).appendTo('body');

            setTimeout(function () {
                $('.cookieNotice').slideDown(1000);
            }, 1000);
        }
    });

    // 2.4 Binding to document (event delegation)
    $(document).on('click', '#cookieCutter', function (e) {
        e.preventDefault();
        tnaSetThisCookie('dontShowCookieNotice', 365);
        $('.cookieNotice').hide();
    });

});