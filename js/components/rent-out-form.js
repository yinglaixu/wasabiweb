WW.rentOutForm = function ($) {

    var priceInput = $('#price');
    var priceNotification = $('.js-price-notification');

    function init() {

        var value = null;

        /*
         When house price input field
         looses focus
         */
        $(priceInput).on('focusout', function () {

            /*
             Prevent from adding 10% multiple times
             unless the field value is actually
             changed
             */
            if (Number($(this).val()) === value) {
                return false;
            }

            /*
             If the field has any value add 10%
             and round it to remove decimals
             */
            if ($(this).val().length > 0) {

                $(priceNotification).slideDown(200);

                value = $(this).val();
                value = Math.round(Number(value) * 1.1);

                $(this).val(value);
            }
        });

    }

    init();

    // frontend.php ändra versionsnummer på scriptet

    return this;
};