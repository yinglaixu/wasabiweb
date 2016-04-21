WW.updateProperty = function($){

    function init() {

        $('#current-images').on('click', '.remove-current-image', function(){
            var that, input, html, id;
            that = $(this);
            input = prompt('Are you sure you want to delete the image? Type "OK" if you are.');
            if(input === 'OK' || input === 'ok') {
                that.fadeOut('fast', function(){
                    that.remove();
                });
                id = that.data('id');
                html = `<input type="hidden" name="deleteImages[]" value="${id}">`;
                $('#deleted-images').append(html);
            }
        });

        $('#update-content').on('change', function(){

            $('#description-content').slideToggle();
        });

        updatePrice();
    }

    function updatePrice() {

        var original_price = Number($('#update-price').val());
        var value = original_price;
        var priceNotification = $('#js-update-price-notification');
        var timer;

        $('#update-price').on('keyup', function () {

            var that = $(this);
            clearTimeout( timer );
            timer = setTimeout( function() {

                var new_value = Number(that.val());

                if(new_value === original_price) {
                    $(priceNotification).slideUp();
                    return false;
                }

                /*
                 Prevent from adding 10% multiple times
                 unless the field value is actually
                 changed
                 */
                if (new_value === value) {
                    return false;
                }

                /*
                 If the field has any value add 10%
                 and round it to remove decimals
                 */
                if (new_value > 0) {

                    $(priceNotification).slideDown();

                    value = Math.round(new_value * 1.1);

                    that.val(value);
                    $('#customer-price').html(new_value);
                    $('#full-price').html(value);
                }

            }, 500 );
        });
    }

    init();

    return this;
};
