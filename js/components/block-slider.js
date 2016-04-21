/*

This component will slide the items intermittently if they are wider than their surrounding container,
you can use your grid system to decide how many items to show at once, it will automatically re-adjust
on screen resize event.

Dependencies: grid, block-slider.js - activate the plugin by uncommenting in the plugins file,

<div id="block-slider">
    <div class="js-block-slider__wrap">
        <div class="row js-block-slider__items">
            <div class="col-md-2 col-sm-3 col-xs-4">
               ...
            </div>
            <div class="col-md-2 col-sm-3 col-xs-4">
               ...
            </div>
            <div class="col-md-2 col-sm-3 col-xs-4">
               ...
            </div>
            <div class="col-md-2 col-sm-3 col-xs-4">
               ...
            </div>
            <div class="col-md-2 col-sm-3 col-xs-4">
               ...
            </div>
            <div class="col-md-2 col-sm-3 col-xs-4">
               ...
            </div>
        </div>                    
    </div>                    
</div>


*/


/*

    You can set the options below to cusomize the interval and wrapping classnames.

*/

WW.blockSlider = function($) {

    $('#block-slider').BlockSlider({
        slideInterval: 700
    });
    return this;
};
