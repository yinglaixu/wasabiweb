WW.myPages = function($) {

    function init() {

        // my-pages

        $('#toogleUserDetails').on('click', function(e) {

            e.preventDefault();

            $('#userDetails').slideToggle();

        });

        if($('#contractStatus').html() === 'complete' || $('#contractStatus').html() === 'Färdigställt'){
            $('#icon-contract').hide();
            $('#icon-contract-alive').show();
            $('#contractStatus').addClass('completeStatus');
        }
        if($('#inventoryStatus').html() === 'complete' || $('#inventoryStatus').html() === 'Färdigställt'){
            $('#icon-inventory').hide();
            $('#icon-inventory-alive').show();
            $('#inventoryStatus').addClass('completeStatus');
        }
        if($('#inspectionStatus').html() === 'complete' || $('#inspectionStatus').html() === 'Färdigställt' ){
            $('#icon-inspection').hide();
            $('#icon-inspection-alive').show();
            $('#inspectionStatus').addClass('completeStatus');
        }

        // initialize my contract

        // if the contract is complete
        if ($('input[name="contract_condition"]').val() == '1'){
            $('#contract-form').hide();
            $('#btn-change-contract').hide();
            $('#contract-content').show();
            $('#contract-content').addClass('convertToPdf');
            $('.c-site-footer').hide();
            $('.c-site-header').hide();
        }

        // else
        var contractPropertyType = $('#property-type').html();
        if (contractPropertyType == 'villa'){
            $('.apartment-utilities').hide();
            $('.house-utilities').show();
        }
        else{
            $('.apartment-utilities').show();
            $('.house-utilities').hide();
        }

        var contractPeriodType = $('input:radio[name="contract[rental_period_choice]"]:checked').val();
        if(contractPeriodType == 'period_1'){
            $('.contract_rental_period_1').slideDown();
            $('.contract_rental_period_2').hide();
            $('.contract_rental_period_3').hide();
        }
        else if(contractPeriodType == 'period_2'){
            $('.contract_rental_period_2').slideDown();
            $('.contract_rental_period_1').hide();
            $('.contract_rental_period_3').hide();
        }
        else if(contractPeriodType == 'period_3'){
            $('.contract_rental_period_3').slideDown();
            $('.contract_rental_period_1').hide();
            $('.contract_rental_period_2').hide();
        }

        if($('input#con-electricity').is(':checked')){
            $('#contract-electricity-fee').slideDown();
        }

        if($('input#type-isnt-kall').is(':checked')){
            $('#house-utilities-show').slideDown();
        }

// interaction part of my contract
        $('#electricity-label').click(function(){
            if($('input#con-electricity').is(':checked')){
                $('#contract-electricity-fee').slideDown();
            }
            else{
                $('#contract-electricity-fee').hide();
            }
        });

        $('input:radio[name="contract[rental_period_choice]"]').change(function(){
            if($(this).val() == 'period_1'){
                $('.contract_rental_period_1').slideDown();
                $('.contract_rental_period_2').hide();
                $('.contract_rental_period_3').hide();
            }
            else if($(this).val() == 'period_2'){
                $('.contract_rental_period_2').slideDown();
                $('.contract_rental_period_1').hide();
                $('.contract_rental_period_3').hide();
            }
            else if($(this).val() == 'period_3'){
                $('.contract_rental_period_3').slideDown();
                $('.contract_rental_period_1').hide();
                $('.contract_rental_period_2').hide();
            }
        });

        $('input:radio[name="contract[kallhyra]"]').change(function() {
            if ($(this).val() == 'yes') {
                $('#house-utilities-show').hide();
            }
            else if ($(this).val() == 'no') {
                $('#house-utilities-show').slideDown();
            }
        });

        $('#btn-view-contract').click(function(){
            $('#contract-content').fadeIn();
            $('#contract-form').fadeOut();
        });

        $('#btn-change-contract').click(function(){
            $('#contract-content').fadeOut();
            $('#contract-form').fadeIn();
        });

        // initialize my inventory list

        // if the contract is complete
        if ($('input[name="inventory_condition"]').val() == '1'){
            $('#inventory-form').hide();
            $('#btn-change-inventory').hide();
            $('#inventory-content').show();
            $('#inventory-content').addClass('convertToPdf');
            $('.c-site-footer').hide();
            $('.c-site-header').hide();
        }

// switch
        $('#btn-view-inventory').click(function(){
            $('#inventory-content').fadeIn();
            $('#inventory-form').fadeOut();
        });

        $('#btn-change-inventory').click(function(){
            $('#inventory-content').fadeOut();
            $('#inventory-form').fadeIn();
        });
//clone

        $('#btn-add-kitchen').click(function(e){
            e.preventDefault();
            addInventoryList('kitchen');
            initRemove();
        });

        $('#btn-add-livingroom').click(function(e){
            e.preventDefault();
            addInventoryList('livingroom');
            initRemove();
        });

        $('#btn-add-bathroom').click(function(e){
            e.preventDefault();
            addInventoryList('bathroom');
            initRemove();
        });

        $('#btn-add-toalett').click(function(e){
            e.preventDefault();
            addInventoryList('toalett');
            initRemove();
        });

        $('#btn-add-bedroom').click(function(e){
            e.preventDefault();
            addInventoryList('bedroom');
            initRemove();
        });

        $('#btn-add-entrance').click(function(e){
            e.preventDefault();
            addInventoryList('entrance');
            initRemove();
        });

        $('#btn-add-others').click(function(e){
            e.preventDefault();
            addInventoryList('others');
            initRemove();
        });

 // initialize my inventory list

        // if the contract is complete
        if ($('input[name="inspection_condition"]').val() == '1'){
            $('#inspection-form').hide();
            $('#btn-change-inspection').hide();
            $('#inspection-content').show();
            $('#inspection-content').addClass('convertToPdf');
            $('.c-site-footer').hide();
            $('.c-site-header').hide();
        }

// switch
        $('#btn-view-inspection').click(function(){
            $('#inspection-content').fadeIn();
            $('#inspection-form').fadeOut();
        });

        $('#btn-change-inspection').click(function(){
            $('#inspection-content').fadeOut();
            $('#inspection-form').fadeIn();
        });
//clone
        $('#btn-add-ins-kitchen').click(function(e){
            e.preventDefault();
            addinspectionList('kitchen');
            initRemove();
        });

        $('#btn-add-ins-livingroom').click(function(e){
            e.preventDefault();
            addinspectionList('livingroom');
            initRemove();
        });

        $('#btn-add-ins-bathroom').click(function(e){
            e.preventDefault();
            addinspectionList('bathroom');
            initRemove();
        });

        $('#btn-add-ins-toalett').click(function(e){
            e.preventDefault();
            addinspectionList('toalett');
            initRemove();
        });

        $('#btn-add-ins-bedroom').click(function(e){
            e.preventDefault();
            addinspectionList('bedroom');
            initRemove();
        });

        $('#btn-add-ins-entrance').click(function(e){
            e.preventDefault();
            addinspectionList('entrance');
            initRemove();
        });

        $('#btn-add-ins-others').click(function(e){
            e.preventDefault();
            addinspectionList('others');
            initRemove();
        });

        // trash

        var initRemove = function(){
            $('.trash').click(function(e){
                e.preventDefault();
                $(this).closest('ul').remove();
            });
        };

        $('.trash').click(function(e){
            e.preventDefault();
            $(this).closest('ul').remove();
        });


    }

    function addInventoryList(room){
        var roomName = 'inventory[' + room + '-name][]';
        var roomCount = 'inventory[' + room + '-count][]';
        var appendedList;
        var plusList = `
			<ul class="o-grid o-grid--matrix u-flush--bottom">
				<li class="o-grid__item u-1/2@sm-up js-clone-inventory-group__name">
					<ul class="o-bare-list o-bare-list--spaced-sixth">
					<li>
					<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
					<input name="${roomName}" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value=" ">
					</div>
					</li>
					</ul>
				</li>
				<li class="o-grid__item u-1/4@sm-up js-clone-inventory-group__description">
					<ul class="o-bare-list o-bare-list--spaced-sixth">
					<li>
					<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
					<input name="${roomCount}" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value=" ">
					</div>
					</li>
					</ul>
				</li>
				<li class="o-grid__item u-1/4@sm-up">
					<a href="#" class="c-svg-icon c-svg-icon--trash trash">
						<svg class="c-svg-icon__svg c-svg-icon--trash__svg">
							<use xlink:href="http://www.renthia.com/wp-content/themes/wasabiweb/build/img/sprite.svg#icon-trash"></use>
						</svg>
					</a>
				</li>
			</ul>`;

        switch(room){
        case 'kitchen':
            appendedList = $('#inventory-kitchen-lists');
            break;
        case 'livingroom':
            appendedList = $('#inventory-livingroom-lists');
            break;
        case 'bathroom':
            appendedList = $('#inventory-bathroom-lists');
            break;
        case 'toalett':
            appendedList = $('#inventory-toalett-lists');
            break;
        case 'bedroom':
            appendedList = $('#inventory-bedroom-lists');
            break;
        case 'entrance':
            appendedList = $('#inventory-entrance-lists');
            break;
        case 'others':
            appendedList = $('#inventory-others-lists');
            break;
        }

        appendedList.append(plusList);
    }

    function addinspectionList(room){
        var roomName = 'inspection[' + room + '][]';
        var appendedList;
        var plusList = `
			<ul class="o-grid o-grid--matrix u-flush--bottom">
				<li class="o-grid__item u-3/4@sm-up js-clone-inspection-group__name">
					<ul class="o-bare-list o-bare-list--spaced-sixth">
					<li>
					<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer">
					<input name="${roomName}" type="text" placeholder=" " class="c-text-input c-text-input--lg c-addon-group--inside__input" value=" ">
					</div>
					</li>
					</ul>
				</li>
				<li class="o-grid__item u-1/4@sm-up">
					<a href="#" class="c-svg-icon c-svg-icon--trash trash">
						<svg class="c-svg-icon__svg c-svg-icon--trash__svg">
							<use xlink:href="http://www.renthia.com/wp-content/themes/wasabiweb/build/img/sprite.svg#icon-trash"></use>
						</svg>
					</a>
				</li>
			</ul>`;

        switch(room){
        case 'kitchen':
            appendedList = $('#inspection-kitchen-lists');
            break;
        case 'livingroom':
            appendedList = $('#inspection-livingroom-lists');
            break;
        case 'bathroom':
            appendedList = $('#inspection-bathroom-lists');
            break;
        case 'toalett':
            appendedList = $('#inspection-toalett-lists');
            break;
        case 'bedroom':
            appendedList = $('#inspection-bedroom-lists');
            break;
        case 'entrance':
            appendedList = $('#inspection-entrance-lists');
            break;
        case 'others':
            appendedList = $('#inspection-others-lists');
            break;
        }

        appendedList.append(plusList);
    }

    init();

    return this;
};