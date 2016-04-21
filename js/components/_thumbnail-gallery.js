/*------------------------------------*\
    #IMG SWAP GALLERy
\*------------------------------------*/

/**
 * function for a gallery swapping out thumbails with the large image.
 */


// WW.thumbnailGallery = function($) {
//     'use strict';
//     const imgLoaded = (el) => {
//         setTimeout(() => {
//             el.animate({opacity : 1}, 300);
//         }, 200);
//     };

//     function swapImg(event) {
//         const clickTarget = $(event.target),
//             targetSrc = clickTarget.data('large-src'),
//             largeImg = $(this).find('.js-swap-img-gallery__lg');
//         if (targetSrc && !clickTarget.hasClass('current-image')) {
//             // if a thumbnail has been clicked and has a largesrc data attribute
//             $(this).find('.js-single-sm-img')
//                 .parent()
//                 .removeClass('current-image');
//             clickTarget.parent()
//                 .addClass('current-image');
//             largeImg.animate({
//                 opacity : 0
//             }, 300, () => {
//                 largeImg.attr('src', targetSrc);
//                 largeImg.attr('src', targetSrc).load(imgLoaded(largeImg));
//             });

//         }
//     }

//     $('.js-swap-img-gallery').on('click', swapImg);

//     return this;
// };

// add the following to main.js: .thumbnailGallery($)
        

