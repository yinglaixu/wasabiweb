/*------------------------------------*\
    #EQUAL HEIGHTS
\*------------------------------------*/

/*

    Sets all selected elements on a given row (elements with the same offset from the 
    top of the document) to have an equal height.
    The height they all get is equal to the height of the tallest element.

    To use this simply add the class '.js-equal-height' to each element that 
    you want to match the height with

    E.G.

    <div class="row">
        <div class="col-sm-4 js-equal-height">
            ...
        </div>
        <div class="col-sm-4 js-equal-height">
            ...
        </div>
        <div class="col-sm-4 js-equal-height">
            ...
        </div>
    </row>

*/


// WW.equalHeights = function($) {
//     'use strict';
//     let execute,
//         efficientFn,
//         elementsArray,
//         elements;
//     execute = () => {
//         let count = 0;
//         if (elements.length) {
//             elements.height('auto');
//             elementsArray.forEach((val, outerIndex, array) => {
//                 elementsArray.forEach((innerVal, innerIndex) => {
//                     const el = array[innerIndex],
//                         outerOffsetTop = array[outerIndex].offset().top,
//                         innerOffsetTop = el.offset().top,
//                         iHeight = array[outerIndex].outerHeight(),
//                         elHeight = el.outerHeight();
//                     if (count !== outerIndex && 
//                         outerOffsetTop === innerOffsetTop && 
//                         iHeight >= elHeight) {
//                         // check it's not the current item &&
//                         // two elements are in the same vertical position.
//                         // set the heights equal to the tallest.
//                         el.css({'height' : iHeight});
//                     }
//                     count ++;
//                 });
//             });
//         }
//     };
//     elementsArray = [];
//     elements = $('.js-equal-height');
//     efficientFn = WW.debounce(() => {
//         window.requestAnimationFrame(() => {
//             execute();
//         });
//     }, 200);
//     elements.each(function() {
//         elementsArray.push($(this));
//     });

//     execute();
//     $(window).on('resize', efficientFn);

//     return this;
// };

// paste the following into main.js .equalHeights($)
