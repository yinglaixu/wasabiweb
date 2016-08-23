WW.datepicker = function($) {
    'use strict';
    if (WW.isTouch) {
        $('.js-datepicker').find('input').attr('type', 'date').css({
            '-webkit-appearance': 'none',
            'min-height' : '34px'
        });
    }
    if ($('.js-datepicker').length) {
        $('.js-datepicker').ionDatePicker();
    }

    return this;
};