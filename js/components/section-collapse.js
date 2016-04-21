/*------------------------------------*\
 #SECTION COLLAPSE
 \*------------------------------------*/

/*
 Used for section sections that collapse on small screens, they
 can be toggled in or out of view.
 Typical use case is a section nav.

 NOTE:: Depends on section-collapse.scss

 */


WW.sectionCollapse = function ($) {
    'use strict';
    $('body').on('click', '.js-section-collapse__toggle', function (e) {
        $(this).closest('.js-section-collapse')
            .toggleClass('section-collapse--is-open');
    });
    return this;
};