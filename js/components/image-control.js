
/*------------------------------------*\
    #IMG CONTROL
\*------------------------------------*/
/*
      
    This module both lazy loads images and changes the src 
    depending on the viewport size.



    Examples:


    Standard lazy load image

    <div class="img-control-wrap js-img-control-wrap">
        <div class="img-control-wrap__inner js-img-control-wrap__inner">
            <img src="<?php bloginfo('template_directory'); ?>/img/build/media/blank.gif"
                class="js-img-control"
                data-lg-src="<?php bloginfo('template_directory'); ?>/img/build/media/600x400.jpg"
                data-lg-width="600"
                data-lg-height="400"
                data-fluid="true"
                alt="">
        </div>
    </div>


    Lazy load image that spans full container width, even if container is larger than img.

    <div class="img-control-wrap js-img-control-wrap">
        <div class="img-control-wrap__inner js-img-control-wrap__inner">
            <img src="<?php bloginfo('template_directory'); ?>/img/build/media/blank.gif"
                class="js-img-control"
                data-lg-src="http://lorempixel.com/400/200/sports"
                data-lg-width="400"
                data-lg-height="200"
                data-span-container="true"
                data-fluid="true"
                alt="">
        </div>
    </div>


    Lazy load image that also has smaller version for sm screens

    <div class="img-control-wrap js-img-control-wrap">
        <div class="img-control-wrap__inner js-img-control-wrap__inner">
            <img src="<?php bloginfo('template_directory'); ?>/img/build/media/blank.gif"
                class="js-img-control"
                data-lg-src="http://lorempixel.com/400/600/sports"
                data-lg-width="400"
                data-lg-height="600"
                data-sm-src="http://lorempixel.com/100/100/sports"
                data-sm-width="100"
                data-sm-height="100"
                data-fluid="true"
                alt="">
        </div>
    </div>

    Lazy load image that also has smaller version for md screens

    <div class="img-control-wrap js-img-control-wrap">
        <div class="img-control-wrap__inner js-img-control-wrap__inner">
            <img src="<?php bloginfo('template_directory'); ?>/img/build/media/blank.gif"
                class="js-img-control"
                data-lg-src="http://lorempixel.com/400/600/sports"
                data-lg-width="400"
                data-lg-height="600"
                data-md-src="http://lorempixel.com/100/100/sports"
                data-md-width="100"
                data-md-height="100"
                data-fluid="true"
                alt="">
        </div>
    </div>

*/

(($) => {
    $(() => {
        'use strict';
        WW.imgControl = (function(){
            const options = {
                lazyOffset: 300,
                scrollFrameRate: 3
            };
            let globals = {
                scrollLooping: true,
                isSmallScreen: false,
                isMediumScreen: false,
                images: null,
                checkifSmallScreen() {
                    if (WW.checkCurrentMediaQuery.screenXs) {
                        return true;
                    }
                    return false;
                },

                checkifMediumScreen() {
                    if (WW.checkCurrentMediaQuery.screenSm) {
                        return true;
                    }
                    return false;
                },

                populateImagesArray() {
                    let array = [];
                    $('.js-img-control').each(function() {
                        let that = $(this),
                            imgObj = that.data();
                        imgObj.el = that;
                        imgObj.hasLoadedLg = false;
                        imgObj.hasLoadedMd = false;
                        imgObj.hasLoadedSm = false;
                        imgObj.offsetTop = Math.floor(that.offset().top);
                        array.push(imgObj);
                    });
                    globals.images = array;
                },

                generateImagePlaceholders() {
                    let imagesArray = globals.images,
                        width = 0,
                        height = 0,
                        paddingBottom = 0,
                        img = null;
                    imagesArray.forEach(item => {
                        if (globals.isSmallScreen) {
                            width = item.smWidth || item.lgWidth;
                            height = item.smHeight || item.lgHeight;
                        } else if (globals.isMediumScreen) {
                            width = item.mdWidth || item.lgWidth;
                            height = item.mdHeight || item.lgHeight;
                        } else {
                            width = item.lgWidth;
                            height = item.lgHeight;
                        }
                        paddingBottom = (height/width) * 100;
                        img = item.el;
                        if (!item.spanContainer) {
                            if (img.data('fluid')) {
                                img.closest('.js-img-control-wrap').css({
                                    'max-width': width + 'px'
                                });                             
                            } else {
                                img.closest('.js-img-control-wrap').css({
                                    'width': width + 'px'
                                }); 
                            }
                        }
                        img.closest('.js-img-control-wrap__inner').css({
                            'padding-bottom' : paddingBottom +  '%'
                        });     
                    });
                },

                isImageInViewport(scrollOffset) {
                    let imageArray = globals.images,
                        winHeight = $(window).height(),
                        winBottomPosition = scrollOffset + winHeight,
                        isInScreen = img => {
                            return (winBottomPosition + options.lazyOffset) > img.offsetTop;
                        };
                    imageArray.forEach(img => {
                        if (!img.hasLoadedLg) {
                            // image has not yet loaded large img
                            if (!globals.isSmallScreen) {
                                // current screen is large
                                if (isInScreen(img)) {
                                    globals.loadInImage(img);
                                    img.hasLoadedLg = true;
                                    img.hasLoadedMd = false;
                                    img.hasLoadedSm = false;
                                }
                            }
                        }
                        if (!img.hasLoadedMd) {
                            // Not yet loaded small image
                            if (globals.isMediumScreen) {
                                // current screen is small
                                if (isInScreen(img)) {
                                    globals.loadInImage(img);
                                    img.hasLoadedLg = false;
                                    img.hasLoadedMd = true;
                                    img.hasLoadedSm = false;
                                }
                            }
                        } 
                        if (!img.hasLoadedSm) {
                            // Not yet loaded small image
                            if (globals.isSmallScreen) {
                                // current screen is small
                                if (isInScreen(img)) {
                                    globals.loadInImage(img);
                                    img.hasLoadedLg = false;
                                    img.hasLoadedMd = false;
                                    img.hasLoadedSm = true;
                                }
                            }
                        }
                    });
                },

                loadInImage(imgObj) {
                    let src = null,
                        el = imgObj.el;
                    if (globals.isSmallScreen) {
                        src = imgObj.smSrc;
                        if (!src) {
                            // no small src defined fallback to large src
                            src = imgObj.lgSrc;
                        }
                    } else if (globals.isMediumScreen) {
                        src = imgObj.mdSrc;
                        if (!src) {
                            // no small src defined fallback to large src
                            src = imgObj.lgSrc;
                        }
                    } else {
                        src = imgObj.lgSrc;
                    }
                    el.attr('src', src).load().css('opacity', 1);
                },

                detectScroll() {
                    let isLooping = globals.scrollLooping,
                        offset = window.pageYOffset;

                    (function loop() {
                        offset = window.pageYOffset;
                        globals.isImageInViewport(offset);

                        if (isLooping) {
                            setTimeout(loop, 1000 / options.scrollFrameRate);
                        }

                    }());
                }
            };

            return {
                init: function initialise() {
                    const that = this;
                    // determine if small or medium screen or neither.
                    globals.isSmallScreen = globals.checkifSmallScreen();
                    globals.isMediumScreen = globals.checkifMediumScreen();

                    if (!globals.images) {
                        // images array not populated -> then populate
                        globals.populateImagesArray();
                        globals.detectScroll();
                    }

                    globals.generateImagePlaceholders();
                    that.getImageOffsets();

                    // Re-initialise on page resize -- if screen size has transitioned through Sass $screen-sm breakpoint.
                    const resizeScreen = () => {
                        const debounce = 200;
                        setTimeout(() => {
                            that.getImageOffsets();
                            if (globals.checkifSmallScreen()) {
                                // is small screen
                                if (!globals.isSmallScreen) {
                                    //screen was previously not small
                                    globals.isSmallScreen = true;
                                    globals.isMediumScreen = false;
                                    initialise.call(that,{
                                        lazyOffset: options.lazyOffset,
                                        scrollFrameRate: options.scrollFrameRate
                                    });
                                }

                            } else if (globals.checkifMediumScreen()) {
                                // is medium screen
                                if (!globals.isMediumScreen) {
                                    //screen was previously not medium
                                    globals.isSmallScreen = false;
                                    globals.isMediumScreen = true;
                                    initialise.call(that,{
                                        lazyOffset: options.lazyOffset,
                                        scrollFrameRate: options.scrollFrameRate
                                    });
                                }
                            } else {
                                // is large screen
                                if (globals.isSmallScreen || globals.isMediumScreen) {
                                    // screen was previously not large
                                    globals.isSmallScreen = false;
                                    globals.isMediumScreen = false;
                                    initialise.call(that,{
                                        lazyOffset: options.lazyOffset,
                                        scrollFrameRate: options.scrollFrameRate
                                    });
                                }
                            }
                        }, debounce);
                    };
                    const efficientFn = WW.debounce(resizeScreen, 300);
                    $(window).on('resize', efficientFn);
                    $(window).on('orientationchange', resizeScreen);

                    return WW;
                },

                getImageOffsets () {
                    let imageArray = globals.images,
                        imageOffset = 0;
                    imageArray.forEach(img => {
                        imageOffset = Math.floor(img.el.offset().top);
                        img.offsetTop = imageOffset;
                    });
                }   

            };
        }());
    });
})(jQuery);