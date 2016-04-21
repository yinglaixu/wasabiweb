/*------------------------------------*\
    HIGHLIGHT-LOCATION 
\*------------------------------------*/

/*

    Highlights the position that the user has scrolled to.


    <ul class="navbar__nav float-left js-navbar__nav">
        <li><a href="#section1" class="js-hightlight-location">Section 1</a></li>
        <li><a href="#section2" class="js-hightlight-location">Section 2</a></li>
        <li><a href="#section3" class="js-hightlight-location">Section 3</a></li>
    </ul>

    ...

    <div id="section1" data-highlight-offset="95">
        Lorem ispsum...
    </div>
    <div id="section2" data-highlight-offset="95">
        Lorem ispsum...
    </div>
    <div id="section3" data-highlight-offset="95">
        Lorem ispsum...
    </div>


*/

// WW.highlightLocation = function($){
//     'use strict';
//     if (!$('.js-hightlight-location').length) {
//         return this;
//     }
//     //store links and targets
//     var linksAndTargets = [];
//     function init() {
//         linksAndTargets = [];
//         $('.js-hightlight-location').each(function(){
//             var el = $(this),
//                 target = $(el.attr('href')),
//                 targetDataOffset = target.data('highlight-offset') || 0,
//                 targetTop = target.offset().top - targetDataOffset - 2, // last didgit for rounding error.
//                 targetBottom = targetTop + target.outerHeight()+2, // last didgit for rounding error.
//                 link = {
//                     link : el,
//                     target : target,
//                     targetTop : targetTop,
//                     targetBottom : targetBottom
//                 };

//             linksAndTargets.push(link);
//         });
//     }

//     function scrollHandler() {
//         var scrollTop = $(window).scrollTop();
//         linksAndTargets.map(function(item) {
//             if (scrollTop > item.targetTop && scrollTop < item.targetBottom) {
//                 $('.js-hightlight-location').removeClass('is-active');
//                 item.link.addClass('is-active');
//             }
//         }); 
//     }


//     $(window).scroll(function() {
//         window.requestAnimationFrame(scrollHandler);
//     });

//     $(window).resize(function() {
//         // re-initialize on resize due to heights & offsets likely changing.
//         window.requestAnimationFrame(init);
//     });

//     init();

//     return this;
// };

// add following to main.js .highlightLocation($)