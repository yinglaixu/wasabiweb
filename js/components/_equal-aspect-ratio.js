/*------------------------------------*\
    #EQUAL ASPECT RATIO
\*------------------------------------*/
/*
      
    Gets the aspect ratio of all elements passed in that have a descendant using the js-img-control module,
    it will then set all the aspect ratios of the passed elements equal to the tallest.


    Each group requires a class of '.js-equal-aspect-ratio-group' surrounding the group.
    Element with 'padding-bottom hack' requires a class of '.js-equal-aspect-ratio'

    Dependancies: img-control.js

*/

// WW.equalAspectRatio = function($) {
//     'use strict';
//     let minmimAspectRatio = 1.1,  // 1== height = width, 2== height = width*2
//         getTallest,
//         setAspectRatios;

//     getTallest = (groups) => {
//         let tallest = [];
//         groups.forEach((elements) => {
//             let tempTallest = 0;
//             elements.forEach((val) => {
//                 tempTallest = tempTallest > val.aspectRatio ? tempTallest : val.aspectRatio;
//             });
//             tallest.push(tempTallest = tempTallest > minmimAspectRatio ? tempTallest : minmimAspectRatio);
//         });
//         setAspectRatios(groups, tallest);
//     };
//     setAspectRatios = (groups, tallest) => {
//         groups.forEach((elements, index) => {
//             elements.forEach((val) => {
//                 let el = val.el;
//                 $(el).css('padding-bottom', tallest[index]*100 + '%');
//             });
//         });
//     };
//     (() => {
//         let groups = [];
//         $('.js-equal-aspect-ratio-group').each(function() {
//             let elements = [];
//             $(this).find('.js-equal-aspect-ratio').each(function() {
//                 let el = $(this),
//                     img = el.find('.js-img-control'),
//                     imgHeight = img.data('lg-height'),
//                     imgWidth = img.data('lg-width'),
//                     aspectRatio = imgHeight/imgWidth;
//                 elements.push({
//                     el,
//                     aspectRatio
//                 });
//             });
//             groups.push(elements);           
//         });
//         getTallest(groups);
//     })();

//     return this;
// };

// add the following to main.js .equalAspectRatio($)