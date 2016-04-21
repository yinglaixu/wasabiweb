WW.myPages = function($) {

    function init() {

        $('#toogleUserDetails').on('click', function(e) {

            e.preventDefault();

            $('#userDetails').slideToggle();

        });
    }

    init();

    return this;
};