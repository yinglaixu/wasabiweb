/*------------------------------------*\
    #SCREEN-RESIZE-EVENTS 
\*------------------------------------*/

WW.screenResizeEvents = ($, ...funcs) => {
    'use strict';
    const debounceTime = 200;
    const efficientFn = WW.debounce(() => {
        window.requestAnimationFrame(() => {
            funcs.forEach(func => { func($); });
        });
    }, debounceTime);
    $(window).on('resize', efficientFn);
};