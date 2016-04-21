/*------------------------------------*\
    #START 
\*------------------------------------*/


/*  
 * General functions that are depended on by other components
**/

WW.start = function($) {
    'use strict';

    
    
    const body = document.body;

    WW.isTouch = (() => {
        const touch = /Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i.test(navigator.userAgent || navigator.vendor || window.opera);
        if (touch) {
            body.className += ' touch';
            return true;
        }
    })();

    WW.iOS = (() => {
        const is_iOS = ( navigator.userAgent.match(/(iPad|iPhone|iPod)/g) ? true : false ),
            is_iOS7 = navigator.userAgent.match(/(iPad|iPhone);.*CPU.*OS 7_\d/i);
        if (is_iOS7 ) {
            body.className += ' iOS7';
        }
        if (is_iOS) {
            body.className += ' iOS';
            return true;
        }
    })();

    WW.scrollbarWidth = (() => {
        const scrollDiv = document.createElement('div');
        scrollDiv.className = 'c-scrollbar-measure';
        body.appendChild(scrollDiv);
        const width = scrollDiv.offsetWidth - scrollDiv.clientWidth;
        body.removeChild(scrollDiv);
        return width;
    })();

    WW.debounce = (func, wait, immediate) => {
        let timeout;
        return () => {
            const context = this, 
                args = arguments;
            const later = () => {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    };

    return this;
};
