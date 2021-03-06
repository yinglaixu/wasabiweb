/*------------------------------------*\
    #MAIN
\*------------------------------------*/   

(($) => {
    $(() => {
        /**  
         *  If you need to create any additional functions please create them in seperate files
         *  and put them in js/components/FILE_NAME.js, structure them like the example
         *  function below and call them inside of the function chain below, passing in $ as
         *  an argument.
     

         * always use the WW namespace

WW.functionName = function($) {
    ...
    //and return 'this' to allow other functions to continue the WW chain.
    return this;
};

        */


        WW.start($)
            .checkCurrentMediaQuery.init($)
            .slider($)
            .imgControl.init($)
            .toggleUiPopup($)
            .sticky($)
            .setResultMapWidth($)
            .googlemaps($)
            .masonry($)
            .styledSelect($)
            .datepicker($)
            .modalDialog($)
            .cloneOpeningTimes($)
            .sectionCollapse($)
            .blockSlider($)
            .rentOut($)
            .rentOutForm($)
            .updateProperty($)
            .myPages($)
            .screenResizeEvents($,
                WW.checkCurrentMediaQuery.init,
                WW.sticky
                // pass in function names as arguments.
                // e.g :
                //WW.navbar,
                //WW.peppermint
            );
    });

})(jQuery);
