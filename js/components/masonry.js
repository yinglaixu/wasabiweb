WW.masonry = function($) {
    'use strict';
    function init() {
        $('.js-masonry').masonry({
            // options...
            itemSelector: '.js-masonry__item'
        });
    }
    setTimeout(init, 500);
    window.onload = init;

    return this;
};