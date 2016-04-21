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
    return this;
};

// paste following code in main.js: .styledSelect($)
