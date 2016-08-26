<?php
/*
Template Name: My contract
*/
?>
<?php
// Is user logged in?
if( ! is_user_logged_in() ) {
	wp_safe_redirect( icl_t('Theme-login', 'Login page link') );
	exit;
}

// Do this user own this property?
$user = wp_get_current_user();
$obj_id = intval( $_GET['id'] );
$owner = get_field( 'owner', $obj_id );
if( ! ( intval( $user->ID ) === intval( $owner['ID'] ) ) ) {
	wp_safe_redirect( site_url() );
	exit;
};
?>
<?php get_header(); ?>



<?php

// Save some page variables
$contract_form_title = get_field('contract_form_title');
$view_contract_btn = get_field('view_contract_btn');
$explanation_contract_form = get_field('explanation_contract_form');
$form_title_1 = get_field('form_title_1');
$form_desc_1 = get_field('form_description_1');
$form_title_2 = get_field('form_title_2');
$form_desc_2 = get_field('form_description_2');
$form_title_3 = get_field('form_title_3');
$form_desc_3 = get_field('form_description_3');
$form_title_4 = get_field('form_title_4');
$form_desc_4 = get_field('form_description_4');

// contract content
$contract_content_title = get_field('contract_content_title');
$change_contract_btn = get_field('change_contract_btn');
$subtitle_1 = get_field('contract_subtitle_1');
$subtitle_2 = get_field('contract_subtitle_2');
$subtitle_3 = get_field('contract_subtitle_3');
$subtitle_4_apartment = get_field('contract_subtitle_4_apartment');
$subtitle_4_house = get_field('contract_subtitle_4_house');
$subtitle_5 = get_field('contract_subtitle_5');
$subtitle_6 = get_field('contract_subtitle_6');
$subtitle_7 = get_field('contract_subtitle_7');
$subtitle_8 = get_field('contract_subtitle_8');
$subtitle_9 = get_field('contract_subtitle_9');
$subtitle_10 = get_field('contract_subtitle_10');
$subtitle_11 = get_field('contract_subtitle_11');
$subtitle_12 = get_field('contract_subtitle_12');

$rental_price_landlord = get_field('rent_price_for_landlord');
$rental_price_tenant = get_field('rent_price_for_tenant');
$rental_period_1 = get_field('rental_period_1');
$rental_period_2 = get_field('rental_period_2');
$rental_period_3 = get_field('rental_period_3');
$care_wellbeing_1 = get_field('care_and_well_being_1');
$care_wellbeing_2 = get_field('care_and_well_being_2');
$equipment_and_inspection = get_field('equipment_and_inspection');
$insurance_and_liability = get_field('insurance_and_liability');
$tenure = get_field('tenure');
$validity = get_field('contract_validity');
$key_sets_info = get_field('key_sets_info');
$showing = get_field('showing');
$extra_info = get_field('contract_extra_info');

// Everything is OK
$post = get_post( $obj_id );

setup_postdata( $post );

// prepare the translation of the value to swedish
$furnished_condition = get_field('contact_furnished_condition');
$apartment_utilities = get_field('contract_apartment_rental_utilities');
$house_utilities = get_field('contract_house_rental_utilities');

$property_type = get_field('property_type');
$property_name = $subtitle_4_apartment;
$operation_fee_type = 'electricity';
$operation_fee = get_field('contract_electricity_fee');

if ($property_type == 'villa') {
	$property_name = $subtitle_4_house;
	$operation_fee_type = 'operation';
	$operation_fee = get_field('contract_operation_fee');
}

$if_keep_pets = get_field('contract_keep_pets');

$current_language = ICL_LANGUAGE_CODE;
$translation_of_furnish = array('furnished' => 'möblerad', 'partly furnished' => 'delvis möblerad', 'unfurnished' => 'omöblerad');
$translation_of_operation_type = array('electricity' => 'el', 'operation' => 'maxavgift');
$translation_of_keep_pets = array('is not allowed' => 'inte tillåtet', 'is allowed' => 'tillåtet');
$translation_of_utilities = array('storage' => 'förråd', 'parking' => 'parkeringsplats', 'cable-tv' => 'kabel TV', 'heat' => 'värme',
	'community' => 'samhällsavgift', 'garbage' => 'sophantering', 'garage' => 'garage', 'water' => 'vatten', 'electricity/gas' => 'el/gas',
	'wi-fi' => 'wi-fi');

if ($current_language === 'sv'){
	$furnished_condition = (string)$furnished_condition;
	$if_keep_pets = (string)$if_keep_pets;

	$furnished_condition = $translation_of_furnish[$furnished_condition];
	$operation_fee_type = $translation_of_operation_type[$operation_fee_type];
	$if_keep_pets = $translation_of_keep_pets[$if_keep_pets];
}

?>


<div class="c-page-content js-page-content" id="mainContent">
	<div class="c-site-header-placeholder">
	</div>
	<main role="main">

		<section class="o-section" id="contract-form" style="display: block;">
			<?php
			$val = $GLOBALS['simplerap'];
			$error_style = 'style="color:red"';
			?>
			<form class="c-block-form" id="landlordcontractform" method="post" enctype="multipart/form-data">
				<input type="hidden" name="contractform" value="true">
				<input type="hidden" name="property_id" value="<?php echo $post->ID; ?>">
				<?php
				$complete = 0;
				if(get_field('contract_complete')){
					$complete = 1;
				}
				?>
				<input type="hidden" name="contract_condition" value="<?php echo $complete; ?>">
				<input type="hidden" name="contract[useremail]" value="<?php the_field('owner'); ?>">
				<input type="hidden" name="contract[first_name]" value="<?php the_field('first_name'); ?>">
				<input type="hidden" name="contract[surname]" value="<?php the_field('surname'); ?>">
				<div class="o-site-wrap o-site-wrap--padding">
					<ul class="c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]">
						<li class="u-hard--sides">
							<div class="o-grid u-text-center">
								<div class="o-grid__item u-3/4@sm-up u-text-center">
									<h1><?php echo $contract_form_title; ?></h1>
									<a class="c-btn c-btn--md c-btn--brand" id="btn-view-contract">
										<?php echo $view_contract_btn; ?>
									</a>
									<p></p>
									<p><?php echo $explanation_contract_form; ?></p>
								</div>
							</div>
						</li>
<!--basic info						-->
						<li class="u-hard--sides">
							<ul class="o-grid o-grid--matrix">
								<li class="o-grid__item">
									<h3 class="u-flush--bottom"><?php echo $form_title_1; ?></h3>
									<p><?php echo $form_desc_1; ?></p>
								</li>
								<li class="o-grid__item u-1/3@sm-up">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="personalNumber">
												<strong><?php echo icl_t('Theme-mycontract', 'Personal number'); ?>:</strong>
											</label>
										</li>
										<li>
											<input required type="text" name="contract[landlordpersonalnumber]" id="personalNumber" class="c-text-input c-text-input--lg" placeholder="yyyymmdd-xxxx" value="<?php the_field('contract_landlord_personal_number'); ?>">
										</li>
									</ul>
								</li>
								<li class="o-grid__item u-1/3@sm-up">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="address">
												<strong><?php echo icl_t('Theme-form', 'Address'); ?>:</strong>
											</label>
										</li>
										<li>
											<input required type="text" name="contract[address]" id="address" class="c-text-input c-text-input--lg" placeholder="<?php echo icl_t('Theme-form', 'Address placeholder'); ?>" value="<?php the_field('address'); ?>">
										</li>
									</ul>
								</li>

								<li class="o-grid__item u-1/3@sm-up">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="address">
												<strong><?php echo icl_t('Theme-mycontract', 'Room number'); ?>:</strong>
											</label>
										</li>
										<li>
											<input required type="text" name="contract[roomnumber]" id="roomnumber" class="c-text-input c-text-input--lg" placeholder=" " value="<?php the_field('landlord_room_number'); ?>">
										</li>
									</ul>
								</li>
<!--bank account								-->
								<li class="o-grid__item u-1/3@sm-up">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="landlordbankname">
												<strong><?php echo icl_t('Theme-mycontract', 'Bank name'); ?>:</strong>
											</label>
										</li>
										<li>
											<input required type="text" name="contract[landlordbankname]" id="landlordbankname" class="c-text-input c-text-input--lg" placeholder=" " value="<?php the_field('contract_landlord_bank_name'); ?>">
										</li>
									</ul>
								</li>
								<li class="o-grid__item u-1/3@sm-up">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="landlordbankclearingnumber">
												<strong><?php echo icl_t('Theme-mycontract', 'Clearing number'); ?>:</strong>
											</label>
										</li>
										<li>
											<input required type="text" name="contract[landlordbankclearingnumber]" id="landlordbankclearingnumber" class="c-text-input c-text-input--lg" placeholder=" " value="<?php the_field('landlord_bank_clearing_number'); ?>">
										</li>
									</ul>
								</li>
								<li class="o-grid__item u-1/3@sm-up">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="landlordbankaccountnumber">
												<strong><?php echo icl_t('Theme-mycontract', 'Account number'); ?>:</strong>
											</label>
										</li>
										<li>
											<input required type="text" name="contract[landlordbankaccountnumber]" id="landlordbankaccountnumber" class="c-text-input c-text-input--lg" placeholder=" " value="<?php the_field('contract_landlord_bank_account_number'); ?>">
										</li>
									</ul>
								</li>
							</ul>
						</li>
<!--rental period						-->
						<li class = "u-hard--sides">
							<ul class="o-grid o-grid--matrix">
								<li class="o-grid__item">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<h3 class="u-flush--bottom"><?php echo $form_title_2; ?></h3>
											<p><?php echo $form_desc_2; ?>.</p>
										</li>
										<li class="u-form-center-items">
											<?php $period_type = get_field('contract_rental_period_choice'); ?>
											<ul class="o-inline-list o-inline-list--spaced">
												<li>
													<input class="c-styled-input-el u-hidden" type="radio" name = "contract[rental_period_choice]" value="period_1" id="type-period_1" <?php if( $period_type === 'period_1' ) echo 'checked'; ?>>
													<label class="c-styled-input-option c-styled-input-option--radio" for="type-period_1">
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio">
                                                            <svg class="c-styled-input-option__svg">
																<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-circle"></use>
															</svg>
                                                        </span>
														<?php echo icl_t('Theme-mycontract', 'Rental period 1'); ?>
													</label>
												</li>
												<li>
													<input class="c-styled-input-el u-hidden" type="radio" value="period_2" name = "contract[rental_period_choice]" id="type-period_2" <?php if( $period_type === 'period_2' ) echo 'checked'; ?>>
													<label class="c-styled-input-option c-styled-input-option--radio" for="type-period_2">
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio">
                                                            <svg class="c-styled-input-option__svg">
																<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-circle"></use>
															</svg>
                                                        </span>
														<?php echo icl_t('Theme-mycontract', 'Rental period 2'); ?>
													</label>
												</li>
												<li>
													<input class="c-styled-input-el u-hidden" type="radio" value="period_3"  name = "contract[rental_period_choice]" id="type-period_3" <?php if( $period_type === 'period_3' ) echo 'checked'; ?>>
													<label class="c-styled-input-option c-styled-input-option--radio" for="type-period_3">
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio">
                                                            <svg class="c-styled-input-option__svg">
																<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-circle"></use>
															</svg>
                                                        </span>
														<?php echo icl_t('Theme-mycontract', 'Rental period 3'); ?>
													</label>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<!--<!--Rental period 1						-->
								<li class="o-grid__item contract_rental_period_1" style = "display: none;">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="rentalperiod1">
												<strong><?php echo icl_t('Theme-mycontract', 'From date to further notice'); ?>:</strong>
											</label>
										</li>
										<li>
											<?php
											$period_1_date_from = '';
											if( get_field('contract_rental_period_1') ) {
												$period_1_date_from = get_field( 'contract_rental_period_1' );
												$period_1_date_from = new DateTime( $period_1_date_from );
												$period_1_date_from = date_i18n( 'Y-m-d', $period_1_date_from->getTimestamp() );
											}
											?>
											<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer js-datepicker" data-lang="sv" data-years="1995-2020" data-format="YYYY-MM-DD" data-sundayfirst="false">
												<input name="contract[rentalperiod1]" id="rentalperiod1" type="text" placeholder="<?php echo date("Y-m-d"); ?>" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php echo $period_1_date_from; ?>">
                                                <span class="c-addon-group--inside__addon">
                                                    <span class="c-svg-icon c-svg-icon--calendar">
                                                        <svg class="c-svg-icon__svg c-svg-icon--calendar__svg">
															<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-calendar"></use>
														</svg>
                                                    </span>
                                                </span>
											</div>
										</li>
									</ul>
								</li>
								<!--<!--Rental period 2						-->
								<li class="o-grid__item u-1/2@sm-up contract_rental_period_2" style = "display: none;">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="period2datefrom">
												<strong><?php echo icl_t('Theme-mycontract', 'From date'); ?>:</strong>
											</label>
										</li>
										<li>
											<?php
											$period_2_date_from = '';
											if( get_field('contract_rental_period_2_date_from') ) {
												$period_2_date_from = get_field( 'contract_rental_period_2_date_from' );
												$period_2_date_from = new DateTime( $period_2_date_from );
												$period_2_date_from = date_i18n( 'Y-m-d', $period_2_date_from->getTimestamp() );
											}
											?>
											<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer js-datepicker" data-lang="sv" data-years="1995-2020" data-format="YYYY-MM-DD" data-sundayfirst="false">
												<input name="contract[rentalperiod2datefrom]" id="period2datefrom" type="text" placeholder="<?php echo date("Y-m-d"); ?>" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php echo $period_2_date_from; ?>">
                                                <span class="c-addon-group--inside__addon">
                                                    <span class="c-svg-icon c-svg-icon--calendar">
                                                        <svg class="c-svg-icon__svg c-svg-icon--calendar__svg">
															<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-calendar"></use>
														</svg>
                                                    </span>
                                                </span>
											</div>
										</li>
									</ul>
								</li>
								<li class="o-grid__item u-1/2@sm-up contract_rental_period_2" style = "display: none;">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="period2dateto">
												<strong><?php echo icl_t('Theme-mycontract', 'To date'); ?>:</strong>
											</label>
										</li>
										<li>
											<?php
											$period_2_date_to = '';
											if( get_field('contract_rental_period_2_date_to') ) {
												$period_2_date_to = get_field( 'contract_rental_period_2_date_to' );
												$period_2_date_to = new DateTime( $period_2_date_to );
												$period_2_date_to = date_i18n( 'Y-m-d', $period_2_date_to->getTimestamp() );
											}
											?>
											<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer js-datepicker" data-lang="sv" data-years="1995-2020" data-format="YYYY-MM-DD" data-sundayfirst="false">
												<input name="contract[rentalperiod2dateto]" id="period2dateto" type="text" placeholder="<?php echo date("Y-m-d"); ?>" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php echo $period_2_date_to; ?>">
                                                <span class="c-addon-group--inside__addon">
                                                    <span class="c-svg-icon c-svg-icon--calendar">
                                                        <svg class="c-svg-icon__svg c-svg-icon--calendar__svg">
															<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-calendar"></use>
														</svg>
                                                    </span>
                                                </span>
											</div>
										</li>
									</ul>
								</li>
								<!--<!--Rental period 3						-->
								<li class="o-grid__item u-1/2@sm-up contract_rental_period_3" style = "display: none;">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="period3datefrom">
												<strong><?php echo icl_t('Theme-mycontract', 'From date'); ?>:</strong>
											</label>
										</li>
										<li>
											<?php
											$period_3_date_from = '';
											if( get_field('contract_rental_period_3_date_from') ) {
												$period_3_date_from = get_field( 'contract_rental_period_3_date_from' );
												$period_3_date_from = new DateTime( $period_3_date_from );
												$period_3_date_from = date_i18n( 'Y-m-d', $period_3_date_from->getTimestamp() );
											}
											?>
											<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer js-datepicker" data-lang="sv" data-years="1995-2020" data-format="YYYY-MM-DD" data-sundayfirst="false">
												<input name="contract[rentalperiod3datefrom]" id="period3datefrom" type="text" placeholder="<?php echo date("Y-m-d"); ?>" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php echo $period_3_date_from; ?>">
                                                <span class="c-addon-group--inside__addon">
                                                    <span class="c-svg-icon c-svg-icon--calendar">
                                                        <svg class="c-svg-icon__svg c-svg-icon--calendar__svg">
															<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-calendar"></use>
														</svg>
                                                    </span>
                                                </span>
											</div>
										</li>
									</ul>
								</li>
								<li class="o-grid__item u-1/2@sm-up contract_rental_period_3" style = "display: none;">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="period3dateto">
												<strong><?php echo icl_t('Theme-mycontract', 'To date'); ?>:</strong>
											</label>
										</li>
										<li>
											<?php
											$period_3_date_to = '';
											if( get_field('contract_rental_period_3_date_to') ) {
												$period_3_date_to = get_field( 'contract_rental_period_3_date_to' );
												$period_3_date_to = new DateTime( $period_3_date_to );
												$period_3_date_to = date_i18n( 'Y-m-d', $period_3_date_to->getTimestamp() );
											}
											?>
											<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer js-datepicker" data-lang="sv" data-years="1995-2020" data-format="YYYY-MM-DD" data-sundayfirst="false">
												<input name="contract[rentalperiod3dateto]" id="period3dateto" type="text" placeholder="<?php echo date("Y-m-d"); ?>" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php echo $period_3_date_to; ?>">
                                                <span class="c-addon-group--inside__addon">
                                                    <span class="c-svg-icon c-svg-icon--calendar">
                                                        <svg class="c-svg-icon__svg c-svg-icon--calendar__svg">
															<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-calendar"></use>
														</svg>
                                                    </span>
                                                </span>
											</div>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<!--apartment utilities								-->
						<li class="u-hard--sides">
							<ul class="o-grid o-grid--matrix">
								<li class="o-grid__item">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<h3 class="u-flush--bottom"><?php echo $form_title_3; ?></h3>
											<p><?php echo $form_desc_3; ?></p>
										</li>
									</ul>
								</li>
							</ul>
							<?php
							$property_type = get_field('property_type');
							?>
							<p id="property-type" style="display: none;"><?php echo $property_type ?></p>
							<ul class="o-grid o-grid--matrix apartment-utilities" style="display: none;">
								<?php $utils = get_field('contract_apartment_rental_utilities'); ?>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up" id ="electricity-label">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[apartmentrentalutilities][]"  value="electricity" id="con-electricity" <?php if( in_array( 'electricity', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="con-electricity">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
										<?php echo icl_t('Theme-mycontract', 'Electricity/gas'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[apartmentrentalutilities][]"  value="water" id="con-water" <?php if( in_array( 'water', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="con-water">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
										<?php echo icl_t('Theme-mycontract', 'Water'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[apartmentrentalutilities][]"  value="heat" id="con-heat" <?php if( in_array( 'heat', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="con-heat">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
										<?php echo icl_t('Theme-mycontract', 'Heat'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[apartmentrentalutilities][]"  value="garage" id="con-garage" <?php if( in_array( 'garage', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="con-garage">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
										<?php echo icl_t('Theme-mycontract', 'Garage'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[apartmentrentalutilities][]"  value="wi-fi" id="con-wifi" <?php if( in_array( 'wi-fi', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="con-wifi">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
										<?php echo icl_t('Theme-mycontract', 'Wi-Fi'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[apartmentrentalutilities][]"  value="cable-tv" id="con-cable-tv" <?php if( in_array( 'cable-tv', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="con-cable-tv">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
										<?php echo icl_t('Theme-mycontract', 'Cable TV'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[apartmentrentalutilities][]"  value="parking" id="con-parking" <?php if( in_array( 'parking', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="con-parking">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
										<?php echo icl_t('Theme-mycontract', 'Parking place'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[apartmentrentalutilities][]"  value="storage" id="con-storage" <?php if( in_array( 'storage', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="con-storage">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
										<?php echo icl_t('Theme-mycontract', 'Storage'); ?>
									</label>
								</li>
							</ul>
							<ul class="o-grid o-grid--matrix house-utilities" style="display: none;">
								<li class="o-grid__item u-form-center-items">
									<ul class="o-inline-list o-inline-list--spaced">
										<?php $pet = get_field('contract_house_kallhyra'); ?>
										<li>
											<input class="c-styled-input-el u-hidden" type="radio" name="contract[kallhyra]" value="yes" id="type-is-kall" <?php if( $pet === 'yes' ) echo 'checked'; ?>>
											<label class="c-styled-input-option c-styled-input-option--radio" for="type-is-kall">
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio">
                                                            <svg class="c-styled-input-option__svg">
																<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-circle"></use>
															</svg>
                                                        </span>
												<?php echo icl_t('Theme-mycontract', 'Kallhyra'); ?>
											</label>
										</li>
										<li>
											<input class="c-styled-input-el u-hidden" type="radio" name="contract[kallhyra]"  value="no" id="type-isnt-kall" <?php if( $pet === 'no' ) echo 'checked'; ?>>
											<label class="c-styled-input-option c-styled-input-option--radio" for="type-isnt-kall">
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio">
                                                            <svg class="c-styled-input-option__svg">
																<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-circle"></use>
															</svg>
                                                        </span>
												<?php echo icl_t('Theme-mycontract', 'Is not Kallhyra'); ?>
											</label>
										</li>
									</ul>
								</li>
								<div class="o-grid__item" id="house-utilities-show">
									<?php $utils_house = get_field('contract_house_rental_utilities'); ?>
									<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
										<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[houserentalutilities][]"  value="electricity" id="conh-electricity" <?php if( in_array( 'electricity', $utils_house ) ) echo 'checked'; ?>>
										<label class="c-styled-input-option c-styled-input-option--radio" for="conh-electricity">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
											<?php echo icl_t('Theme-mycontract', 'Electricity/gas'); ?>
										</label>
									</li>
									<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
										<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[houserentalutilities][]"  value="water" id="conh-water" <?php if( in_array( 'water', $utils_house ) ) echo 'checked'; ?>>
										<label class="c-styled-input-option c-styled-input-option--radio" for="conh-water">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
											<?php echo icl_t('Theme-mycontract', 'Water'); ?>
										</label>
									</li>
									<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
										<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[houserentalutilities][]"  value="heat" id="conh-heat" <?php if( in_array( 'heat', $utils_house ) ) echo 'checked'; ?>>
										<label class="c-styled-input-option c-styled-input-option--radio" for="conh-heat">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
											<?php echo icl_t('Theme-mycontract', 'Heat'); ?>
										</label>
									</li>
									<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
										<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[houserentalutilities][]"  value="garage" id="conh-garage" <?php if( in_array( 'garage', $utils_house ) ) echo 'checked'; ?>>
										<label class="c-styled-input-option c-styled-input-option--radio" for="conh-garage">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
											<?php echo icl_t('Theme-mycontract', 'Garage'); ?>
										</label>
									</li>
									<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
										<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[houserentalutilities][]"  value="wi-fi" id="conh-wifi" <?php if( in_array( 'wi-fi', $utils_house ) ) echo 'checked'; ?>>
										<label class="c-styled-input-option c-styled-input-option--radio" for="conh-wifi">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
											<?php echo icl_t('Theme-mycontract', 'Wi-Fi'); ?>
										</label>
									</li>
									<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
										<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[houserentalutilities][]"  value="cable-tv" id="conh-cable-tv" <?php if( in_array( 'cable-tv', $utils_house ) ) echo 'checked'; ?>>
										<label class="c-styled-input-option c-styled-input-option--radio" for="conh-cable-tv">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
											<?php echo icl_t('Theme-mycontract', 'Cable TV'); ?>
										</label>
									</li>
									<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
										<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[houserentalutilities][]"  value="parking" id="conh-parking" <?php if( in_array( 'parking', $utils_house ) ) echo 'checked'; ?>>
										<label class="c-styled-input-option c-styled-input-option--radio" for="conh-parking">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
											<?php echo icl_t('Theme-mycontract', 'Parking place'); ?>
										</label>
									</li>
									<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
										<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[houserentalutilities][]"  value="garbage" id="conh-garbage" <?php if( in_array( 'garbage', $utils_house ) ) echo 'checked'; ?>>
										<label class="c-styled-input-option c-styled-input-option--radio" for="conh-garbage">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
											<?php echo icl_t('Theme-mycontract', 'Garbage handling'); ?>
										</label>
									</li>
									<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
										<input class="c-styled-input-el u-hidden" type="checkbox" name="contract[houserentalutilities][]"  value="community" id="conh-community" <?php if( in_array( 'community', $utils_house ) ) echo 'checked'; ?>>
										<label class="c-styled-input-option c-styled-input-option--radio" for="conh-community">
												<span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
													<svg class="c-styled-input-option__svg">
														<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
													</svg>
												</span>
											<?php echo icl_t('Theme-mycontract', 'Community fee'); ?>
										</label>
									</li>
									<!--operation fee for house-->
									<ul class="o-grid o-grid--matrix house-utilities" style="display: none; margin-top: 20px;">
										<li class="o-grid__item u-1/3@sm-up">
											<ul class="o-bare-list o-bare-list--spaced-sixth">
												<li>
													<label for="operationfee">
														<strong><?php echo icl_t('Theme-mycontract', 'Operation fee'); ?>:</strong>
													</label>
												</li>
												<li>
													<input type="text" name="contract[operationfee]" id="operationfee" class="c-text-input c-text-input--lg" placeholder=" " value="<?php the_field('contract_operation_fee'); ?>">
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</ul>
							<!--electricity fee	for apartment					-->
							<ul class="o-grid o-grid--matrix" id="contract-electricity-fee" style="display: none; margin-top: 20px;">
								<li class="o-grid__item u-1/3@sm-up">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="electricityfee">
												<strong><?php echo icl_t('Theme-mycontract', 'Electricity fee'); ?>:</strong>
											</label>
										</li>
										<li>
											<input type="text" name="contract[electricityfee]" id="electricityfee" class="c-text-input c-text-input--lg" placeholder=" " value="<?php the_field('contract_electricity_fee'); ?>">
										</li>
									</ul>
								</li>
							</ul>

						</li>
<!-- pets, key-->
						<li class="u-hard--sides">
							<ul class="o-grid o-grid--matrix">
								<li class="o-grid__item">
									<h3 class="u-flush--bottom"><?php echo $form_title_4; ?></h3>
									<p><?php echo $form_desc_4; ?></p>
								</li>
								<!--if furnished								-->
								<li class="o-grid__item">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<strong><?php echo icl_t('Theme-form', 'Hometype'); ?>:</strong>
										</li>
										<li class="u-form-center-items">
											<ul class="o-inline-list o-inline-list--spaced">
												<?php $type = get_field('contact_furnished_condition'); ?>
												<li>
													<input class="c-styled-input-el u-hidden" type="radio" name="contract[furnishedcondition]" value="is furnished" id="type-full" <?php if( $type === 'is furnished' ) echo 'checked'; ?>>
													<label class="c-styled-input-option c-styled-input-option--radio" for="type-full">
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio">
                                                            <svg class="c-styled-input-option__svg">
																<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-circle"></use>
															</svg>
                                                        </span>
														<?php echo icl_t('Theme-mycontract', 'Is furnished'); ?>
													</label>
												</li>
												<li>
													<input class="c-styled-input-el u-hidden" type="radio" name="contract[furnishedcondition]"  value="partly furnished" id="type-partly" <?php if( $type === 'partly furnished' ) echo 'checked'; ?>>
													<label class="c-styled-input-option c-styled-input-option--radio" for="type-partly">
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio">
                                                            <svg class="c-styled-input-option__svg">
																<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-circle"></use>
															</svg>
                                                        </span>
														<?php echo icl_t('Theme-mycontract', 'Partly furnished'); ?>
													</label>
												</li>
												<li>
													<input class="c-styled-input-el u-hidden" type="radio" name="contract[furnishedcondition]"  value="unfurnished" id="type-none" <?php if( $type === 'unfurnished' ) echo 'checked'; ?>>
													<label class="c-styled-input-option c-styled-input-option--radio" for="type-none">
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio">
                                                            <svg class="c-styled-input-option__svg">
																<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-circle"></use>
															</svg>
                                                        </span>
														<?php echo icl_t('Theme-mycontract', 'Unfurnished'); ?>
													</label>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<!--if pets								-->
								<li class="o-grid__item u-1/3@sm-up">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<strong><?php echo icl_t('Theme-mycontract', 'Keep pets'); ?>:</strong>
										</li>
										<li class="u-form-center-items">
											<ul class="o-inline-list o-inline-list--spaced">
												<?php $pet = get_field('contract_keep_pets'); ?>
												<li>
													<input required class="c-styled-input-el u-hidden" type="radio" name="contract[keeppets]" value="is allowed" id="type-canpet" <?php if( $pet === 'is allowed' ) echo 'checked'; ?>>
													<label class="c-styled-input-option c-styled-input-option--radio" for="type-canpet">
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio">
                                                            <svg class="c-styled-input-option__svg">
																<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-circle"></use>
															</svg>
                                                        </span>
														<?php echo icl_t('Theme-mycontract', 'Is allowed'); ?>
													</label>
												</li>
												<li>
													<input class="c-styled-input-el u-hidden" type="radio" name="contract[keeppets]"  value="is not allowed" id="type-cantpet" <?php if( $pet === 'is not allowed' ) echo 'checked'; ?>>
													<label class="c-styled-input-option c-styled-input-option--radio" for="type-cantpet">
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio">
                                                            <svg class="c-styled-input-option__svg">
																<use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-circle"></use>
															</svg>
                                                        </span>
														<?php echo icl_t('Theme-mycontract', 'Is not allowed'); ?>
													</label>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<!--key sets					-->
								<li class="o-grid__item u-1/3@sm-up">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="address">
												<strong><?php echo icl_t('Theme-mycontract', 'Key sets'); ?>:</strong>
											</label>
										</li>
										<li>
											<input required type="text" name="contract[keysets]" id="keysets" class="c-text-input c-text-input--lg" placeholder=" " value="<?php the_field('contract_key_sets'); ?>">
										</li>
									</ul>
								</li>
								<!--extra note-->
								<li class="o-grid__item">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="extranote">
												<strong><?php echo icl_t('Theme-mycontract', 'Other paragraphs'); ?>:</strong>
											</label>
										</li>
										<li>
											<?php $extraInfo = get_field('contract_landlord_extra_note'); ?>
											<textarea name="contract[extranote]" id="extranote" class="c-text-input c-text-input--lg" placeholder="fill in the extra note" value="<?php the_field('contract_landlord_extra_note'); ?>"><?php echo $extraInfo; ?>
											</textarea>
										</li>
									</ul>
								</li>
							</ul>
						</li>
<!--submit btn						-->
						<li class="u-hard--sides">
							<button type="submit" id="btn-contract-form-submit" class="c-btn c-btn--xl c-btn--alpha">
								<?php echo icl_t('Theme-form', 'Submit form'); ?>
							</button>
						</li>
					</ul>
				</div>
			</form>
		</section>
		<section class="o-section" id="contract-content" style="display: none;">
			<div class="o-site-wrap o-site-wrap--padding u-bg-eta" style="padding-left: 5rem; padding-right: 5rem;">
				<div class="o-grid u-text-center">
					<img class="c-site-logo__img u-svg"
						 src="<?php bloginfo( 'template_directory' ); ?>/build/img/logo-contract.png"
						 alt="<?php bloginfo( 'name' ); ?>"
						 style="width:30%;"
					>
				</div>
				<ul class="c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]">
					<li class="u-hard--sides">
						<div class="o-grid u-text-center">
							<div class="o-grid__item u-3/4@sm-up u-text-center">
								<h1><?php echo $contract_content_title; ?></h1>
								<a class="c-btn c-btn--md c-btn--brand" id="btn-change-contract">
									<?php echo $change_contract_btn; ?>
								</a>
							</div>
						</div>
					</li>
					<li class="u-hard--sides">
						<p><?php echo icl_t('Theme-mycontract', 'The lease is entered'); ?>
							<strong><?php the_field('contract_enter_date'); ?></strong>
							<?php echo icl_t('Theme-mycontract', 'between'); ?> (1)
							<strong><?php the_field('first_name'); ?></strong>
							<strong><?php the_field('surname'); ?></strong>-<strong><?php the_field('contract_landlord_personal_number'); ?></strong>
							<?php echo icl_t('Theme-mycontract', 'Landlord and'); ?> (2)

							<?php $i = 0; if( have_rows('contract_tenant') ) : while( have_rows('contract_tenant') ) : the_row(); $i++; ?>
								<strong><?php the_sub_field('name'); ?></strong>-<strong><?php the_sub_field('personal_number'); ?></strong>,
							<?php endwhile; endif; ?>

							<?php echo icl_t('Theme-mycontract', 'Tenant'); ?>
							<?php echo icl_t('Theme-mycontract', 'Renthia'); ?>.
						</p>
					</li>
					<li class="u-hard--sides">
						<h3><?php echo $subtitle_1;?></h3>
						<p><?php echo icl_t('Theme-mycontract', 'The landlord hereby leases'); ?>
							<strong><?php the_field('rooms'); ?></strong> <?php echo icl_t('Theme-mycontract', 'room'); ?>,
							<?php echo icl_t('Theme-mycontract', 'about'); ?>
							<strong><?php the_field('volume'); ?></strong> m<sup>2</sup>,
							<?php echo icl_t('Theme-mycontract', 'with address'); ?>
							<strong><?php the_field('address'); ?></strong>,
							<?php echo icl_t('Theme-mycontract', 'number of apartment'); ?>
							<strong><?php the_field('landlord_room_number'); ?></strong>,
							<strong><?php the_field('area'); ?></strong>
							<?php echo icl_t('Theme-mycontract', 'rental object'); ?>.
						</p>
					</li>
<!--rental period					-->
					<li class="u-hard--sides">
						<h3><?php echo $subtitle_2;?></h3>
						<div class="contract_rental_period_1" style="display: none">
							<p>
								<?php echo icl_t('Theme-mycontract', 'From'); ?>
								<strong><?php the_field('contract_rental_period_1'); ?></strong>.
								<?php echo $rental_period_1; ?>
							</p>
						</div>
						<div class="contract_rental_period_2" style="display: none">
							<p>
								<?php echo icl_t('Theme-mycontract', 'From'); ?>
								<strong><?php the_field('contract_rental_period_2_date_from'); ?></strong>
								<?php echo icl_t('Theme-mycontract', 'To'); ?>
								<strong><?php the_field('contract_rental_period_2_date_to'); ?></strong>.
								<?php echo $rental_period_2; ?>
							</p>
						</div>
						<div class="contract_rental_period_3" style="display: none">
							<p>
								<?php echo icl_t('Theme-mycontract', 'From'); ?>
								<strong><?php the_field('contract_rental_period_3_date_from'); ?></strong>
								<?php echo icl_t('Theme-mycontract', 'To'); ?>
								<strong><?php the_field('contract_rental_period_3_date_to'); ?></strong>.
								<?php echo $rental_period_3; ?>
							</p>
						</div>
						<p>
							<?php echo icl_t('Theme-mycontract', 'The property is'); ?>
							<strong><?php echo $furnished_condition; ?></strong>.
						</p>
					</li>
<!--rental price					-->
					<li class="u-hard--sides">
						<h3><?php echo $subtitle_3;?></h3>
						<ul class="o-grid">
							<li class="o-grid__item u-1/2@sm-up">
								<ul class="o-grid o-bare-list">
									<li class="o-grid__item">
										<h4><?php echo icl_t('Theme-mycontract', 'Tenant title'); ?></h4>
									</li>
									<li class="o-grid__item u-1/2">
										<?php echo icl_t('Theme-mycontract', 'Rental price'); ?>:
									</li>
									<li class="o-grid__item u-1/2">
										<strong><?php $rent_price = get_field('price'); $rent_price = $rent_price * 1.00; echo round($rent_price); ?> SEK</strong>
									</li>
									<li class="o-grid__item u-1/2">
										<?php echo icl_t('Theme-mycontract', 'Insurance premium'); ?>:
									</li>
									<li class="o-grid__item u-1/2">
										<strong><?php $insurance_price = $rent_price * 0.02; echo round($insurance_price); ?> SEK</strong>
									</li>
									<li class="o-grid__item u-1/2">
										<?php echo icl_t('Theme-mycontract', 'In total'); ?>:
									</li>
									<li class="o-grid__item u-1/2">
										<strong><?php $rent_price = $rent_price + $insurance_price; echo round($rent_price); ?> SEK</strong>
									</li>
									<li class="o-grid__item u-1/2">
										<?php echo icl_t('Theme-mycontract', 'Deposit'); ?>:
									</li>
									<li class="o-grid__item u-1/2">
										<strong><?php $deposit = get_field('tenant_deposit'); echo round($deposit); ?> SEK</strong>
									</li>
									<li class="o-grid__item u-1/2">
										<?php echo icl_t('Theme-mycontract', 'First month payment'); ?>:
									</li>
									<li class="o-grid__item u-1/2">
										<strong><?php $first_price = $deposit + $rent_price; echo round($first_price); ?> SEK</strong>
									</li>
									<li class="o-grid__item u-1/2">
										<?php echo icl_t('Theme-mycontract', 'Invoice received mail'); ?>:
									</li>
									<li class="o-grid__item u-1/2">
										<?php $i = 0; if( have_rows('contract_tenant') ) : while( have_rows('contract_tenant') ) : the_row(); $i++; ?>
											<strong><?php the_sub_field('email'); ?></strong>
										<?php endwhile; endif; ?>
									</li>
									<li><p></p></li>
									<li class="o-grid__item">
										<?php echo $rental_price_tenant; ?>
									</li>
								</ul>
							</li>
							<li class="o-grid__item u-1/2@sm-up">
								<ul class="o-grid o-bare-list">
									<li class="o-grid__item">
										<h4><?php echo icl_t('Theme-mycontract', 'Landlord'); ?></h4>
									</li>
									<li class="o-grid__item u-1/2">
										<?php echo icl_t('Theme-mycontract', 'Rental price'); ?>:
									</li>
									<li class="o-grid__item u-1/2">
										<strong><?php $rent_price = get_field('price'); $rent_price = $rent_price * 1.00; echo round($rent_price); ?> SEK</strong>
									</li>
									<li class="o-grid__item u-1/2">
										<?php echo icl_t('Theme-mycontract', 'Renthia service charge'); ?>:
									</li>
									<li class="o-grid__item u-1/2">
										<strong><?php the_field('contract_renthia_charge_portion'); ?>%</strong>
									</li>
									<li class="o-grid__item u-1/2">
										<?php echo icl_t('Theme-mycontract', 'Received rental price'); ?>:
									</li>
									<li class="o-grid__item u-1/2">
										<strong><?php $charge_portion = get_field('contract_renthia_charge_portion'); $received_price = $rent_price - $rent_price * $charge_portion * 0.01; echo round($received_price); ?> SEK</strong>
									</li>
									<li class="o-grid__item u-1/2">
										<?php echo icl_t('Theme-mycontract', 'Bank name'); ?>:
									</li>
									<li class="o-grid__item u-1/2">
										<strong><?php the_field('contract_landlord_bank_name'); ?></strong>
									</li>
									<li class="o-grid__item u-1/2">
										<?php echo icl_t('Theme-mycontract', 'Clearing number'); ?>:
									</li>
									<li class="o-grid__item u-1/2">
										<strong><?php the_field('landlord_bank_clearing_number'); ?></strong>
									</li>
									<li class="o-grid__item u-1/2">
										<?php echo icl_t('Theme-mycontract', 'Account number'); ?>:
									</li>
									<li class="o-grid__item u-1/2">
										<strong><?php the_field('contract_landlord_bank_account_number'); ?></strong>
									</li>

									<li><p></p></li>
									<li class="o-grid__item">
										<?php echo $rental_price_landlord; ?>
									</li>

								</ul>
							</li>
						</ul>
					</li>
<!--rental utilities					-->
					<li class="u-hard--sides">
						<div>
							<h3>
								<?php echo $property_name; ?>
							</h3>
							<p>
								<?php echo icl_t('Theme-mycontract', 'The rental will include'); ?>:
								<strong>
									<?php
									if ($property_type === 'villa') {

										$length = count($house_utilities) - 1;
										if ($current_language === 'en'){
											foreach ($house_utilities as $util){
												if($util != $house_utilities[$length]){
													$util = $util.', ';
												}
												echo $util;
											}
										}
										else if($current_language === 'sv'){
											foreach ($house_utilities as $util){
												if($util != $house_utilities[$length]){
													$util = (string)$util;
													$util = $translation_of_utilities[$util];
													$util = $util.', ';
												}
												echo $util;
											}
										}

									}
									else if ($property_type === 'apartment'){
										$length = count($apartment_utilities) - 1;
										if ($current_language === 'en'){
											foreach ($apartment_utilities as $util){
												if($util != $apartment_utilities[$length]){
													$util = $util.', ';
												}
												echo $util;
											}
										}
										else if($current_language === 'sv'){
											foreach ($apartment_utilities as $util){
												if($util != $apartment_utilities[$length]){
													$util = (string)$util;
													$util = $translation_of_utilities[$util];
													$util = $util.', ';
												}
												echo $util;
											}
										}
									}
									?>
								</strong>
							</p>
							<p>
								<?php echo icl_t('Theme-mycontract', 'If'); ?> <strong><?php echo $operation_fee_type ?></strong> <?php echo icl_t('Theme-mycontract', 'is included, the cost of'); ?>
								<?php echo icl_t('Theme-mycontract', 'will be a maximum of'); ?>
								<strong><?php echo $operation_fee ?> SEK / <?php echo icl_t('Theme-mycontract', 'month'); ?></strong>.
								<?php echo icl_t('Theme-mycontract', 'Excess amounts will be'); ?>.
							</p>
						</div>
					</li>
<!--care and well-being					-->
					<li class="u-hard--sides">
						<h3><?php echo $subtitle_5; ?></h3>
						<ul class="o-bare-list o-bare-list--spaced-sixth">
							<?php echo $care_wellbeing_1; ?>
							<li>
								- <?php echo icl_t('Theme-mycontract', 'Tenant title'); ?>
								<strong><?php echo $if_keep_pets; ?></strong>
								<?php echo icl_t('Theme-mycontract', 'to keep pets in the rented property'); ?>.
							</li>
							<?php echo $care_wellbeing_2; ?>
						</ul>
					</li>
<!--equipment / inspection					-->
					<li class="u-hard--sides">
						<h3><?php echo $subtitle_6; ?></h3>
						<ul class="o-bare-list o-bare-list--spaced-sixth"><?php echo $equipment_and_inspection; ?></ul>
					</li>
<!--Insurance / Liability-->
					<li class="u-hard--sides">
						<h3><?php echo $subtitle_7; ?></h3>
						<ul class="o-bare-list o-bare-list--spaced-sixth"><?php echo $insurance_and_liability; ?></ul>
					</li>
<!--Tenure					-->
					<li class="u-hard--sides">
						<ul class="o-bare-list o-bare-list--spaced-sixth">
						<h3><?php echo $subtitle_8; ?></h3>
						<li>
							- <?php echo icl_t('Theme-mycontract', 'The rent shall be occupied'); ?>: <br/>
							<?php $i = 0; if( have_rows('contract_tenant') ) : while( have_rows('contract_tenant') ) : the_row(); $i++; ?>
								<strong><?php the_sub_field('name'); ?></strong><br/>
							<?php endwhile; endif; ?>
						</li>
						<?php echo $tenure; ?>
						</ul>
					</li>
<!--Validity					-->
					<li class="u-hard--sides">
						<h3><?php echo $subtitle_9; ?></h3>
						<p><?php echo $validity; ?></p>
					</li>
<!--show					-->
					<li class="u-hard--sides">
						<h3><?php echo $subtitle_10; ?></h3>
						<p><?php echo $showing; ?></p>
					</li>
<!--keys					-->
					<li class="u-hard--sides">
						<h3><?php echo $subtitle_11; ?></h3>
						<p>
							<strong><?php the_field('contract_key_sets') ?></strong> <?php echo icl_t('Theme-mycontract', 'The keys is handed'); ?>.
						</p>
						<p><?php echo $key_sets_info; ?></p>
					</li>
<!--extra info					-->
					<li class="u-hard--sides">
						<h3><?php echo $subtitle_12; ?></h3>
						<p><strong><?php the_field('contract_landlord_extra_note') ?></strong></p>
					</li>
					<li class="u-hard--sides">
						<p><?php echo $extra_info; ?></p>
					</li>
				</ul>
			</div>
		</section>

	</main>
</div>

<?php get_footer(); ?>