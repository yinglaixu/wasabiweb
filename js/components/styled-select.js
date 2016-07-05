/*------------------------------------*\
    #STYLED SELECT
\*------------------------------------*/

/* populate label on select change with value of selected item.
    -- useful for when we want to 'style' a select box by setting its
        opacity to 0 and styling a label to act as the select.
        eg:
*/


WW.styledSelect = function($) {
    'use strict';
    $(document).on('change', 'select', function() {
        var el = $(this),
            val = el.find(':selected').text();
        el.siblings('label').find('.js-styled-select-text').text(val);
    });

    // add a cover to Amsterdam
    var theItem = $('a[href="##"]').children();
    theItem.addClass('c-region-block_block-overlay');

    // toggle drop down menu
    $(".drop-down-button").click(function(e) {
        e.preventDefault();
        /*  Toggle the CSS closed class which reduces the height of the UL thus
         hiding all LI apart from the first */
        $(this).next().toggleClass("open");
    });

    return this;
};

// paste following code in main.js: .styledSelect($)
