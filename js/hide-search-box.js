// The process for adding JavaScript to this repository is as follows:

// (1) If it involves the use of a third-party plugin or library, place the required file within the /lib directory
// (2) Task specific scripts should be added to this directory
// (3) Any generic, reusable utilities should be placed within generic-utilities.js
// (4) The newly created file should be added to the 'uglify' task within Gruntfile.js
/*
 * The National Archives
 * Author:  John Heery - WEB TEAM
 * Hiding the search box in the header for the /webarchives pages
 * */

function hideElementByIdIfExists(id) {
    const $el = document.getElementById(id)
    if($el) {
        $el.style.display = "none";
    }
}

if (window.location.href.indexOf("/webarchive") != -1) {
    hideElementByIdIfExists("global-search-desktop-component")
    hideElementByIdIfExists("global-search-mobile-component")
    hideElementByIdIfExists("tna-header__top-navigation")
}