
/*------------------------------------*\
    #STEPPER CONTROL
\*------------------------------------*/

/* function that allows a stepper, where the user can use a + or - or text field
 to indicate a quantity.

 requires stepper-boxes.scss

    <ul class="inline-list js-stepper-qty-wrap">
        <li class="stepper-box">
            <input type="number" class="stepper-box__text-input js-stepper-qty-total" value="1">
        </li>
        <li class="stepper-box stepper-box--alpha js-stepper-qty-increase">+</li>
        <li class="stepper-box stepper-box--alpha js-stepper-qty-decrease">-</li>
    </ul>
*/


// WW.stepperControl = function($) {
//     'use strict';
//     $('.js-stepper-qty-wrap').each(function() {
//         var that = $(this);
//         var increment = that.find('.js-stepper-qty-increase'),
//             decrement = that.find('.js-stepper-qty-decrease'),
//             total = that.find('.js-stepper-qty-total');
//         total.on('change, keydown. keyup', function() {
//             var that = $(this),
//                 value = that.val();
//             if (!value) {
//                 // non-numerical input
//                 that.val('');
//             }
//             if (value ==='0') {
//                 that.val('1');
//             }
//         });
//         total.on('blur', function() {
//             var val = $(this).val();
//             if (!val) {
//                 $(this).val('1');
//             }
//         });
//         increment.on('click', adjustCount);
//         decrement.on('click', adjustCount);
//         function adjustCount(e) {
//             var count = total.val();
//             if ($(e.target).hasClass('js-stepper-qty-increase')) {
//                 count ++;
//             } else {
//                 count --;
//             }
//             count = count || 1;
//             total.val(count);
//         }
//     });
//     return this;
// };

// place this code in main.js: .stepperControl($)

