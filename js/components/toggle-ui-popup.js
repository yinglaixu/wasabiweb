/*------------------------------------*\
    #TOGGLE UI POPUP
\*------------------------------------*/

    /* allows for toggling of ui-popups.
        * The parent should have a class of '.js-ui-popup
        * The content of the popup has the class '.js-ui-popup__body'

        <div class="[ flyout flyout--click ] js-ui-popup">
            <div class="js-ui-popup__toggle">
                Flyout toggle                                     
            </div>
            <div class="flyout__body flyout__body--left-center flyout--click__body">
                Flyout body
            </div>
        </div>

        With the class of open being added to the outer div we can see it's easy to target the inner elements with css styling.

        # NOTE - doesn't use event.stopPopogation() as there are some issues with using this on a page with multiple popups.
    */




WW.toggleUiPopup = function($) {
    'use strict';

    $(document).on('click', function(e) {
        const $target = $(e.target);
        if ($target.closest('.js-ui-popup').length) {
            // clicked somewhere on ui popup 
            if ($target.closest('.js-ui-popup__toggle').length) {
                // clicked on the toggle component
                toggleHandler($target.closest('.js-ui-popup'));                
            }
        } else {
            // user has clicked elsewhere... close all ui-popups.
            $('.js-ui-popup').removeClass('is-open');
        }

        function toggleHandler($component) {
            if ($component.hasClass('is-open')) {
                // if the ui-popup component is open then close all ui-popups
                $('.js-ui-popup').removeClass('is-open');
            }
            else {
                // ui-popup component is not open, close all others and open ui-popup.
                $('.js-ui-popup').removeClass('is-open');
                $component.addClass('is-open');
            }
        }
    });

    return this;
};

// place following code in main.js: .toggleUiPopup($)


