/*------------------------------------*\
    #TRUNCATE MULTIPLE LINES
\*------------------------------------*/
/* 
    Calls the dotdotdot jQuery plugin for any element that has a class of .js-multi-line-truncate,
    The plugin will truncate a body of text that exceeds the height of the element and add three dots '...'
    to the end of the text where the truncation begins.

    For this to work the element has to be given a height in the css, a nice trick is to make the line height a multiple of the height.
    e.g. a height of 60px and 3 lines of text gives a line-height of 20px.

    <div class="js-multi-line-truncate">Lorem Ipsum...</div>



*/

// WW.truncateMultiLines = function($) {
//     'use strict';
//     $('.js-multi-line-truncate').each(function() {
//         $(this).dotdotdot({
//             lastCharacter : {
//                 noEllipsis : ['.']
//             }
//         });
//     });
//     return this;
// };

// place following code in main.js: truncateMultiLines($);


