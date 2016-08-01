WW.rentOutForm = function ($) {
    
    //Cities
    var SwedenCities = ['Stockholm','Göteborg','Malmö'];
    var NetherlandsCities = ['Amsterdam'];

    // Areas
    var GoteborgAreas = ['Hisingen','Centrum','Västra-Centrum','Östra-Centrum','Billda','Mölndal','Kungsbacka','Hovås','Partille','Lerum','Härryda','Sävedalen','Angered','Torslanda','Västra-Frölunda','Gunnilse','Kungälv','Långedrag','Kullavik'];
    var MalmoAreas = ['Lund','Malmö-Centrum','Malmö-Syd','Malmö-Väst','Malmö-Öst','Malmö-Norr'];
    var StockholmAreas = ['Botkyrka','Danderyd','Ekerö','Haninge','Huddinge','Järfälla','Lidingö','Nacka--Skarpnäck','Norrtälje','Salem','Sigtuna','Sollentuna','Solna','Bromma','Enskede--Årsta','Hägersten--Liljeholmen','Katarina--Sofia','Kista--Spånga','Hässelby--Vällingby','Kungsholmen','Gamla-Stan','Södermalm','Skärholmen--Bredäng','Vasastan--Norrmalm','Farsta','Östermalm--Djurgården','Sundbyberg','Södertälje','Tyresö','Täby','Upplands-Väsby','Upplands-Bro','Vallentuna','Vaxholm','Värmdeö','Österåker'];

    //Areas & apartment price
    var ApartmentPrice = {
        // stockholm
        Botkyrka:{room_1:5900,room_2:9000,room_3:13500,room_4:14500,room_5:15500},
        Danderyd:{room_1:9200,room_2:10000,room_3:13900,room_4:14900,room_5:15900},
        Ekerö:{room_1:6000,room_2:8000,room_3:12500,room_4:15000,room_5:16000},
        Haninge:{room_1:7500,room_2:9000,room_3:12000,room_4:13000,room_5:14000},
        Huddinge:{room_1:6300,room_2:8500,room_3:11000,room_4:16000,room_5:17000},
        Järfälla:{room_1:7500,room_2:1e4,room_3:12000,room_4:17000,room_5:18000},
        Lidingö:{room_1:9000,room_2:11500,room_3:12500,room_4:18000,room_5:19000},
        'Nacka--Skarpnäck':{room_1:8500,room_2:1e4,room_3:13500,room_4:18000,room_5:19000},
        Norrtälje:{room_1:4800,room_2:7000,room_3:9000,room_4:13000,room_5:14000},
        Salem:{room_1:4800,room_2:7000,room_3:9000,room_4:13000,room_5:14000},
        Sigtuna:{room_1:7500,room_2:9000,room_3:1e4,room_4:13000,room_5:14000},
        Sollentuna:{room_1:7500,room_2:1e4,room_3:13500,room_4:16500,room_5:17500},
        Solna:{room_1:9000,room_2:12000,room_3:1e4,room_4:16000,room_5:17000},
        Bromma:{room_1:9000,room_2:12000,room_3:13500,room_4:18500,room_5:19500},
        'Enskede--Årsta':{room_1:8000,room_2:11000,room_3:13000,room_4:16000,room_5:17000},
        'Hägersten--Liljeholmen':{room_1:9000,room_2:12000,room_3:1e4,room_4:15000,room_5:16000},
        'Katarina--Sofia':{room_1:8500,room_2:12000,room_3:15000,room_4:17500,room_5:18500},
        'Kista--Spånga':{room_1:6500,room_2:11600,room_3:14250,room_4:18900,room_5:19900},
        'Hässelby--Vällingby':{room_1:6500,room_2:11600,room_3:14250,room_4:18900,room_5:19900},
        Kungsholmen:{room_1:11000,room_2:14400,room_3:21000,room_4:24300,room_5:25300},
        'Gamla-Stan':{room_1:9500,room_2:11800,room_3:19500,room_4:22500,room_5:23500},
        'Södermalm':{room_1:11000,room_2:12000,room_3:2e4,room_4:23500,room_5:24500},
        'Skärholmen--Bredäng':{room_1:6250,room_2:9500,room_3:14200,room_4:17500,room_5:18500},
        'Vasastan--Norrmalm':{room_1:11000,room_2:14100,room_3:19350,room_4:25000,room_5:26500},
        Farsta:{room_1:9000,room_2:10250,room_3:13100,room_4:16400,room_5:17400},
        'Östermalm--Djurgården':{room_1:11000,room_2:14500,room_3:19600,room_4:23500,room_5:24500},
        Sundbyberg:{room_1:9500,room_2:13250,room_3:12950,room_4:15200,room_5:16200},
        'Södertälje':{room_1:6000,room_2:7200,room_3:9500,room_4:12500,room_5:13500},
        'Tyresö':{room_1:8500,room_2:9500,room_3:12500,room_4:14000,room_5:15000},
        'Täby':{room_1:9200,room_2:11200,room_3:12800,room_4:13500,room_5:14500},
        'Upplands-Väsby':{room_1:6250,room_2:9500,room_3:14200,room_4:17500,room_5:18500},
        'Upplands-Bro':{room_1:6250,room_2:9500,room_3:14200,room_4:17500,room_5:18500},
        Vallentuna:{room_1:9200,room_2:11200,room_3:12800,room_4:13500,room_5:14500},
        Vaxholm:{room_1:9200,room_2:11200,room_3:12800,room_4:13500,room_5:14500},
        'Värmdeö':{room_1:9200,room_2:11200,room_3:12800,room_4:13500,room_5:14500},
        'Österåker':{room_1:6000,room_2:7200,room_3:9500,room_4:12500,room_5:13500},
        // goteborg
        Hisingen:{room_1:7200,room_2:8500,room_3:10200,room_4:11200,room_5:12500},
        Centrum:{room_1:8500,room_2:1e4,room_3:12500,room_4:13500,room_5:14500},
        'Västra-Centrum':{room_1:7500,room_2:8700,room_3:10500,room_4:11700,room_5:13800},
        'Östra-Centrum':{room_1:7500,room_2:8700,room_3:10500,room_4:11700,room_5:13800},
        Billda:{room_1:6500,room_2:7300,room_3:9400,room_4:10400,room_5:11500},
        'Mölndal':{room_1:6500,room_2:7300,room_3:9400,room_4:10400,room_5:11500},
        Kungsbacka:{room_1:5000,room_2:6200,room_3:7500,room_4:8300,room_5:9500},
        'Hovås':{room_1:5000,room_2:6200,room_3:7500,room_4:8300,room_5:9500},
        Partille:{room_1:5000,room_2:6200,room_3:7500,room_4:8300,room_5:9500},
        Lerum:{room_1:5000,room_2:6200,room_3:7500,room_4:8300,room_5:9500},
        'Härryda':{room_1:5000,room_2:6200,room_3:7500,room_4:8300,room_5:9500},
        'Sävedalen':{room_1:5000,room_2:6200,room_3:7500,room_4:8300,room_5:9500},
        Angered:{room_1:5000,room_2:6200,room_3:7500,room_4:8300,room_5:9500},
        Torslanda:{room_1:5000,room_2:6200,room_3:7500,room_4:8300,room_5:9500},
        'Västra-Frölunda':{room_1:6500,room_2:7300,room_3:9400,room_4:10400,room_5:11500},
        Gunnilse:{room_1:5000,room_2:6200,room_3:7500,room_4:8300,room_5:9500},
        'Kungälv':{room_1:5000,room_2:6200,room_3:7500,room_4:8300,room_5:9500},
        'Långedrag':{room_1:6500,room_2:7300,room_3:9400,room_4:10400,room_5:11500},
        Kullavik:{room_1:6500,room_2:7300,room_3:9400,room_4:10400,room_5:11500},
        // malmo
        Lund:{room_1:4900,room_2:6700,room_3:7200,room_4:9500,room_5:10500},
        'Malmö-Centrum':{room_1:5500,room_2:6900,room_3:8500,room_4:10500,room_5:12000},
        'Malmö-Syd':{room_1:5300,room_2:6700,room_3:8300,room_4:10200,room_5:11200},
        'Malmö-Väst':{room_1:5300,room_2:6700,room_3:8300,room_4:10200,room_5:11200},
        'Malmö-Öst':{room_1:5300,room_2:6700,room_3:8300,room_4:10200,room_5:11200},
        'Malmö-Norr':{room_1:5300,room_2:6700,room_3:8300,room_4:10200,room_5:11200}
    };

    var VillaPrice = {
        Botkyrka:{under:15000,above:17500},
        Danderyd:{under:17500,above:2e4},
        'Ekerö':{under:17500,above:2e4},
        Haninge:{under:17500,above:2e4},
        Huddinge:{under:17500,above:2e4},
        'Järfälla':{under:17500,above:2e4},
        'Lidingö':{under:19000,above:23000},
        'Nacka--Skarpnäck':{under:19000,above:23000},
        'Norrtälje':{under:15000,above:17500},
        Salem:{under:15000,above:17500},
        Sigtuna:{under:15000,above:17500},
        Sollentuna:{under:17500,above:2e4},
        Solna:{under:17500,above:2e4},
        Bromma:{under:17500,above:2e4},
        'Enskede--Årsta':{under:19000,above:22000},
        'Hägersten--Liljeholmen':{under:17500,above:2e4},
        'Katarina, Sofia':{under:19000,above:22000},
        'Kista--Spånga':{under:17500,above:2e4},
        'Hässelby--Vällingby':{under:17500,above:2e4}
        ,Kungsholmen:{under:19000,above:22000},
        'Gamla-Stan':{under:19000,above:22000},
        'Södermalm':{under:19000,above:22000},
        'Skärholmen--Bredäng':{under:17500,above:2e4},
        'Vasastan--Norrmalm':{under:19000,above:22000},
        Farsta:{under:17500,above:2e4},
        'Östermalm--Djurgården':{under:19000,above:22000},
        Sundbyberg:{under:17500,above:2e4},
        'Södertälje':{under:17500,above:2e4},
        'Tyresö':{under:19000,above:22000},
        'Täby':{under:19000,above:22000},
        'Upplands-Väsby':{under:19000,above:22000},
        'Upplands-Bro':{under:19000,above:22000},
        Vallentuna:{under:19000,above:22000},
        Vaxholm:{under:17500,above:2e4},
        'Värmdeö':{under:17500,above:2e4},
        'Österåker':{under:17500,above:2e4},
        Hisingen:{under:12500,above:14500},
        Centrum:{under:14500,above:17500},
        'Västra-Centrum':{under:14500,above:17500},
        'Östra-Centrum':{under:14500,above:17500},
        Billda:{under:15000,above:18000},
        'Mölndal':{under:15000,above:18000},
        Kungsbacka:{under:12500,above:14500},
        'Hovås':{under:15000,above:18000},
        Partille:{under:14500,above:17500},
        Lerum:{under:14500,above:17500},
        'Härryda':{under:14500,above:17500},
        'Sävedalen':{under:14500,above:17500},
        Angered:{under:12500,above:14500},
        Torslanda:{under:12500,above:14500},
        'Västra-Frölunda':{under:12500,above:14500},
        Gunnilse:{under:12500,above:14500},
        'Kungälv':{under:12500,above:14500},
        'Långedrag':{under:15000,above:18000},
        Kullavik:{under:14500,above:17500},
        Lund:{under:12000,above:15000},
        'Malmö-Centrum':{under:14000,above:17000},
        'Malmö-Syd':{under:13500,above:16500},
        'Malmö-Väst':{under:13500,above:16500},
        'Malmö-Öst':{under:13500,above:16500},
        'Malmö-Norr':{under:13500,above:16500}
    };

    var sharedroomPrice = {
        Botkyrka:2500,
        Danderyd:3000,
        'Ekerö':3000,
        Haninge:3000,
        Huddinge:3000,
        'Järfälla':3000,
        'Lidingö':3500,
        'Nacka--Skarpnäck':3500,
        'Norrtälje':2500,
        Salem:2500,
        Sigtuna:2500,
        Sollentuna:3000,
        Solna:3500,
        Bromma:4000,
        'Enskede--Årsta':4000,
        'Hägersten--Liljeholmen':3500,
        'Katarina--Sofia':4000,
        'Kista--Spånga':3000,
        'Hässelby--Vällingby':3000,
        Kungsholmen:4000,
        'Gamla-Stan':4000,
        'Södermalm':4000,
        'Skärholmen--Bredäng':3000,
        'Vasastan--Norrmalm':4500,
        Farsta:2500,
        'Östermalm--Djurgården':4500,
        Sundbyberg:3500,
        'Södertälje':2500,
        'Tyresö':3000,
        'Täby':3000,
        'Upplands-Väsby':2500,
        'Upplands-Bro':2500,
        Vallentuna:3000,
        Vaxholm:3000,
        'Värmdeö':3000,
        'Österåker':2500,
        Hisingen:2500,
        Centrum:3500,
        'Västra-Centrum':3000,
        'Östra-Centrum':3000,
        Billda:2500,
        'Mölndal':2500,
        Kungsbacka:2000,
        'Hovås':2500,
        Partille:2000,
        Lerum:2000,
        'Härryda':2000,
        'Sävedalen':2000,
        Angered:2000,
        Torslanda:2000,
        'Västra-Frölunda':2500,
        Gunnilse:2000,
        'Kungälv':2000,
        'Långedrag':2500,
        Kullavik:2000,
        Lund:2800,
        'Malmö-Centrum':3200,
        'Malmö-Syd':3000,
        'Malmö-Väst':3000,
        'Malmö-Öst':3000,
        'Malmö-Norr':3000
    };

    var priceInput = $('#price');
    var priceOutput = $('#priceRenthia');
    var priceNotification = $('.js-price-notification');

    var value = null;

    function init() {

        replaceToValid();
        filterCities();
        filterAreas();
        $('#icon-villa-default').show();
        $('#icon-apartment-default').show();
        $('#icon-sharedroom-default').show();
        $('#icon-villa-checked').hide();
        $('#icon-apartment-checked').hide();
        $('#icon-sharedroom-checked').hide();
        $('#rentoutFormDate').hide();
        $('#rentoutFormPrice').hide();
        $('#rentoutFormOpenHouse').hide();
        $('#rentoutFormImage').hide();
        $('#rentoutFormUtilities').hide();
        $('#rentoutFormExtra').hide();
        $('#step_2Btn').hide();
        $('#rentoutFormSubmitBtn').hide();
        $('#rentoutFormPersonalInfo').hide();

        $('#rentoutCountries').on('change', filterCities);
        $('#rentoutCities').on('change', filterAreas);
        $('#type-villa').on('change', togglePropertyIcons);
        $('#type-apartment').on('change', togglePropertyIcons);
        $('#type-terraced').on('change', togglePropertyIcons);

        $('#rentoutAreas').on('change', rentPriceCalculate);
        $('#volume').on('change', rentPriceCalculate);
        $('#rooms').on('change', rentPriceCalculate);

        $('#step_1BtnNext').on('click', function(){
            if($('#postcode').val().length === 0){
                alert('Please fill in your postcode.');
            }
            else if($('#address').val().length === 0){
                alert('Please fill in your address.');
            }
            else if($('#volume').val().length === 0){
                alert('Please fill in your property size.');
            }
            else if($('#description').val().length === 0){
                alert('Please fill in your property description.');
            }
            else{
                $('#rentoutFormDate').show();
                $('#rentoutFormPrice').show();
                $('#step_2Btn').show();
                $('#step_1Btn').hide();
            }
        });
        $('#step_2BtnNext').on('click', function(){
            if($('#date-from').val().length === 0 ||$('#date-to').val().length === 0 ){
                alert('Please complete your rent out date.');
            }
            else{
                $('#rentoutFormOpenHouse').show();
                $('#rentoutFormImage').show();
                $('#rentoutFormExtra').show();
                $('#rentoutFormUtilities').show();
                $('#rentoutFormSubmitBtn').show();
                $('#rentoutFormPersonalInfo').show();
                $('#step_1Btn').hide();
                $('#step_2Btn').hide();
            }
        });
        priceInput.on('focusout', function () {

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

                priceNotification.slideDown(200);

                value = $(priceInput).val();
                var valueRethia = Math.round(Number(value) * 1.1);

                $(this).val(value);
                priceOutput.val(valueRethia);
                $('#priceRenthiaDisplay').html(valueRethia);
            }
        });
    }
    
    function replaceToValid(){
        $('#rentoutAreas option').each(function(){
            var myStr = $(this).val();
            myStr = myStr.replace(' ', '-');
            myStr = myStr.replace(',', '-');
            $(this).val(myStr);
        });
    }


    function filterCities(){
        var selectedCountry = $('#rentoutCountries option:selected').val();
        if (selectedCountry === 'Sverige' || selectedCountry === 'Sweden'){
            $('#rentoutCities option').each(function(){
                var theString = $(this).val();
                if(jQuery.inArray(theString, SwedenCities) !== -1){
                    $(this).show();
                }
                else{
                    $(this).hide();
                }
            });
            $('#rentoutCities option[value = "Stockholm"]').prop('selected', true);
            $('#chosenCity').html('Stockholm');
            $('.currency').html('SEK');
        }
        else if(selectedCountry === 'Netherlands'){
            $('#rentoutCities option').each(function(){
                var theString = $(this).val();
                if(jQuery.inArray(theString, NetherlandsCities) !== -1){
                    $(this).show();
                }
                else{
                    $(this).hide();
                }
            });
            $('#rentoutCities option[value = "Amsterdam"]').prop('selected', true);
            $('#chosenCity').html('Amsterdam');
            $('.currency').html('Eur');

        }
    }

    function filterAreas(){
        var selectedCity = $('#rentoutCities option:selected').val();
        if (selectedCity === 'Stockholm'){
            $('#rentoutAreas option').each(function(){
                var theString = $(this).val();
                if(jQuery.inArray(theString, StockholmAreas) !== -1){
                    $(this).show();
                }
                else{
                    $(this).hide();
                }
            });
            $('#rentoutAreas option[value = "Botkyrka"]').prop('selected', true);
            $('#chosenArea').html('Botkyrka');
        }
        else if(selectedCity === 'Göteborg'){
            $('#rentoutAreas option').each(function(){
                var theString = $(this).val();
                if(jQuery.inArray(theString, GoteborgAreas) !== -1){
                    $(this).show();
                }
                else{
                    $(this).hide();
                }
            });
            $('#rentoutAreas option[value = "Hisingen"]').prop('selected', true);
            $('#chosenArea').html('Hisingen');
        }
        else if(selectedCity === 'Malmö'){
            $('#rentoutAreas option').each(function(){
                var theString = $(this).val();
                if(jQuery.inArray(theString, MalmoAreas) !== -1){
                    $(this).show();
                }
                else{
                    $(this).hide();
                }
            });
            $('#rentoutAreas option[value = "Lund"]').prop('selected', true);
            $('#chosenArea').html('Lund');
        }
    }

    function togglePropertyIcons(){

        if($('#type-villa').is(':checked')){
            $('#icon-villa-default').hide();
            $('#icon-apartment-default').show();
            $('#icon-sharedroom-default').show();
            $('#icon-villa-checked').show();
            $('#icon-apartment-checked').hide();
            $('#icon-sharedroom-checked').hide();
        }
        else if($('#type-apartment').is(':checked')){
            $('#icon-villa-default').show();
            $('#icon-apartment-default').hide();
            $('#icon-sharedroom-default').show();
            $('#icon-villa-checked').hide();
            $('#icon-apartment-checked').show();
            $('#icon-sharedroom-checked').hide();
        }
        else if($('#type-terraced').is(':checked')){
            $('#icon-villa-default').show();
            $('#icon-apartment-default').show();
            $('#icon-sharedroom-default').hide();
            $('#icon-villa-checked').hide();
            $('#icon-apartment-checked').hide();
            $('#icon-sharedroom-checked').show();
        }
        rentPriceCalculate();
    }

    function rentPriceCalculate(){

        // if choose netherlands, no suggested price so far
        if($('#rentoutCountries option:selected').val() === 'Netherlands'){
            priceInput.val(0);
        }
        else{
            var selectedArea, selectedRoom, Volume;
            selectedArea = $('#rentoutAreas :selected').val();
            selectedRoom = $('#rooms').val();
            Volume = $('#volume').val();
            if($('#type-villa').is(':checked')){
                value = VillaPrice[selectedArea];
                if( Volume < 200 ){
                    value = value.under;
                }
                else if(Volume >= 200 ){
                    value = value.above;
                }
            }
            else if($('#type-apartment').is(':checked')){
                if(selectedRoom === '1 room' || selectedRoom === '1 rum'){
                    value = ApartmentPrice[selectedArea].room_1;
                }
                else if(selectedRoom === '2 rooms' || selectedRoom === '2 rum'){
                    value = ApartmentPrice[selectedArea].room_2;
                }
                else if(selectedRoom === '3 rooms' || selectedRoom === '3 rum'){
                    value = ApartmentPrice[selectedArea].room_3;
                }
                else if(selectedRoom === '4 rooms' || selectedRoom === '4 rum'){
                    value = ApartmentPrice[selectedArea].room_4;
                }
                else if(selectedRoom === '5 rooms' || selectedRoom === '5 rum'){
                    value = ApartmentPrice[selectedArea].room_5;
                }
            }
            else if($('#type-terraced').is(':checked')){
                value = sharedroomPrice[selectedArea];
            }

            priceInput.val(value);

            if (priceInput.val().length > 0) {
                priceNotification.slideDown(200);
                var valueRethia = Math.round(Number(value) * 1.1);
                priceOutput.val(valueRethia);
                $('#priceRenthiaDisplay').html(valueRethia);
            }
        }
    }

    init();

    // frontend.php ändra versionsnummer på scriptet

    return this;
};