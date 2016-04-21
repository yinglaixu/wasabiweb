/*------------------------------------*\
    #STICKY 
\*------------------------------------*/


/*  makes an element sticky when the user scrolls past it's offset.

    when there are multiple objects that are sticky you may wish to add an 
    additional offset through the data-sticky-offset attribute.

    Requires a parent element in order to calculate the original offset once 
    the child element is sticky,This stops the page jumping up once the element 
    becomes affixed.

    <div class="js-sticky-parent">
        <div class="js-sticky" data-sticky-offset="0">
            Content
        </div>
    </div>

*/

WW.sticky = function($) {
    'use strict';
    let offsetTop,
        previousOffset = window.pageYOffset, // used to determine if 
                                            //user has just scrolled.
        stickyElements = [],
        fixElements,
        WPnavbarHeight = 0,
        shrinkOffset = 200; // distance to scroll from fixed to shrink,
                            // applies to navbar only.
    setTimeout(() => {
        // fixes issues with WP admin bar.
        WPnavbarHeight = $('#wpadminbar').outerHeight() || 0;
        if ($(window).width() < 600) {
            // WP admin bar is not position:fixed below this screen size.
            WPnavbarHeight = 0;
        }
    }, 500);

    fixElements = currentScroll => {
        stickyElements.forEach((el, index) => {
            let offset = 0;
            if (WW.checkCurrentMediaQuery.screenLg || WW.checkCurrentMediaQuery.screenXl) {
                offset =  el.dataOffset;
            }
            if (currentScroll > ((el.positionTop - 
                offset) - WPnavbarHeight)) {
                if (!el.isFixed) {
                    el.element.addClass('is-fixed')
                        .css('top', (offset + 
                        WPnavbarHeight) + 'px');
                    el.isFixed = true;
                }
                if (currentScroll > ((el.positionTop - 
                    (-shrinkOffset + offset)) - 
                    WPnavbarHeight)) {
                    el.element.addClass('is-shrunk');
                } else {
                    el.element.removeClass('is-shrunk');
                }
            } else {
                if (el.isFixed) {
                    el.element.removeClass('is-fixed')
                        .css('top', 'auto');
                    el.isFixed = false;
                }
            }
        });
    };

    $('.js-sticky').each(function() {
        // cache all the stick elements into an array.
        const that = $(this);
        stickyElements.push({
            element : that,
            dataOffset : that.data('sticky-offset') || 0,
            parent : that.closest('.js-sticky-parent'),
            positionTop : that.parent().offset().top,
            isFixed : false
        });

    });

    const loop = () => {
        offsetTop = window.pageYOffset;
        if (offsetTop == previousOffset) {
            requestAnimationFrame(loop);
            return false;
        } else {
            previousOffset = offsetTop;
        }
        fixElements(offsetTop);
        requestAnimationFrame(loop);
    };
    if (stickyElements.length) {
        fixElements(window.pageYOffset);

        // Call the loop for the first time
        requestAnimationFrame(loop);
    }
    return this;
};
