WW.masonry = function($) {
    'use strict';
    function init() {
        $('.js-masonry').masonry({
            // options...
            itemSelector: '.js-masonry__item'
        });

        $('.postList li:lt(6)').show();
        var items =  12;
        var shown =  3;
        $('#loadMore').click(function () {
            shown = $('.postList li:visible').size() + 3;
            if(shown < items) {$('.postList li:lt('+shown+')').show(300);}
            else {$('.postList li:lt('+items+')').show(300);
                $('#loadMore').hide();
            }
        });
    }
    setTimeout(init, 500);
    window.onload = init;

    return this;
};