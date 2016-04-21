/*------------------------------------*\
    #CHECK-CURRENT-MEDIA-QUERY 
\*------------------------------------*/

WW.checkCurrentMediaQuery = {
    screenXs: false,
    screenSm: false,
    screenMd: false,
    screenLg: false,
    screenXl: false,
    init ($){
        'use strict';
        const elFontSize = $('#showBp').css('font-size'),
            mq = WW.checkCurrentMediaQuery;
        mq.screenXs = false;
        mq.screenSm = false;
        mq.screenMd = false;
        mq.screenLg = false;
        mq.screenXl = false;
        if (elFontSize === '5px') mq.screenXs = true;
        if (elFontSize === '4px') mq.screenSm = true;
        if (elFontSize === '3px') mq.screenMd = true;
        if (elFontSize === '2px') mq.screenLg = true;
        if (elFontSize === '1px') mq.screenXl = true;
        return WW;
    }
};