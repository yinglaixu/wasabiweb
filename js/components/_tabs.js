/*------------------------------------*\
    #TABS
\*------------------------------------*/

// Allows tabbed content, uses tabs.scss for styling.

// EXAMPLE: - match the data-target to the id of matching tab.
/*
<div class="tabs js-tabs">
    <div class="tabs__toggle-group">
        <div class="tabs__toggle-group__item">
            <button class="tabs__toggle-group__btn js-tab-toggle" data-target="#tab-foo">
                Foo
            </button>                                
        </div>
        <div class="tabs__toggle-group__item">
            <button class="tabs__toggle-group__btn js-tab-toggle" data-target="#tab-bar">
                Bar
            </button>                                
        </div>          
    </div>                    
    <div class="tabs__tab is-open js-tab" id="tab-foo">
        Tab foo
    </div>
    <div class="tabs__tab js-tab" id="tab-bar">
        Tab bar
    </div>
</div>

*/

// WW.tabs = function($) {
//     'use strict';
//     $('.js-tabs').on('click', '.js-tab-toggle', function() {
//         var $that = $(this),
//             target = $that.data('target');
//         if (!$(target).hasClass('is-open')) {
//             $that.closest('.js-tabs')
//                 .find('.js-tab-toggle')
//                 .removeClass('is-active');
//             $that.addClass('is-active')
//                 .closest('.js-tabs')
//                 .find('.js-tab')
//                 .removeClass('is-open')
//                 .parent()
//                 .find(target)
//                 .addClass('is-open');
//         }
//     });
//     return this;
// };

// place this code in main.js: .tabs($)