/*------------------------------------*\
    #SLIDER 
\*------------------------------------*/

/*!
 * Peppermint touch slider
 * v. 1.3.7 | https://github.com/wilddeer/Peppermint
 * Copyright Oleg Korsunsky | http://wd.dizaina.net/
 *
 * Depends on Event Burrito (included) | https://github.com/wilddeer/Event-Burrito
 * MIT License
 */


WW.slider = function($){
    'use strict';
    const init = () => {


        // adds 'is-active' class to current slide
        // const showCurrentSlide = (slider, slide) => {
        //     const slidesWrap = slider.find('.c-slider-slides');
        //     slide +=1;
        //     slidesWrap.children().removeClass('is-active');
        //     slidesWrap.children(':nth-child(' + slide +')').addClass('is-active');
        // };

        (() => {
            const slider = $('#single-property-slider');
            slider.Peppermint({
                speed: 500,
                touchSpeed: 300,
                dots: false,
                disableIfOneSlide: true,
                slideshow: false,
                mouseDrag: true,
                cssPrefix: 'c-slider-',
                slideshowInterval: 1000,
                // onSlideChange (slide) {
                //     showCurrentSlide(slider, slide);
                // },
                    
                stopSlideshowAfterInteraction: true
            });
            /** Left and right buttons if used uncomment and match the IDs */
            $('#single-property-slider-left-arrow').click(slider.data('Peppermint').prev);
            $('#single-property-slider-right-arrow').click(slider.data('Peppermint').next);
        })();  
    };

    if ($('.js-slider').length) {
        init();
    }
    return this;
};
