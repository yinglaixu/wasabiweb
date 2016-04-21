

WW.setResultMapWidth = function($) {
    'use strict';
    const placeholder = $('.js-results-map-placeholder');
    const map = $('.js-results-map');

    function setWidth() {
        map.width(placeholder.width());
    }

    setWidth();

    const debounceTime = 200;
    const efficientFn = WW.debounce(() => {
        window.requestAnimationFrame(() => {
            setWidth();
        });
    }, debounceTime);
    $(window).on('resize', efficientFn);

    return this;
};
