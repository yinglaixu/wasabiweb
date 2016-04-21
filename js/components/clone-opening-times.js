

WW.cloneOpeningTimes = function($) {
    'use strict';

    function clone(e) {
        e.preventDefault();
        const numberOfGroups = $('.js-clone-opening-times-group').length;
        $(this)
            .parent()
            .find('.js-clone-opening-times-group')
            .last()
            .clone()
            .appendTo('#opening-times-wrap')
            .find('.js-clone-opening-times-group__date')
            .find('label')
            .attr('for', `open-date-${numberOfGroups + 1}`)
            .closest('.js-clone-opening-times-group__date')
            .find('input')
            .attr({
                id:   `open-date-${numberOfGroups + 1}`,
                name: 'rentout[open-date][]',
                value: ''
            })
            .closest('.js-clone-opening-times-group')
            .find('.js-clone-opening-times-group__time')
            .find('select')
            .attr({
                id:   `open-time-${numberOfGroups + 1}`,
                name: 'rentout[open-time][]',
                value: ''
            })
            .prev('label')            
            .find('.js-styled-select-text')
            .text('Välj tid')
            .closest('.js-clone-opening-times-group')
            .find('.js-datepicker')
            .ionDatePicker();

        // Only 2 open houses at the moment
        $(this).remove();
    }

    $('.js-clone-opening-times-btn').on('click', clone);
    return this;
};

