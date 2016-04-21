<?php
/*
Template Name: My property
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
$price_first_row = get_field('price-first_row');
$price_second_row = get_field('price-second_row');
$price_third_row = get_field('price-third_row');
$description_text = get_field('description_text');
$update_button_text = get_field('button_text');

// Everything is OK
$post = get_post( $obj_id );

setup_postdata( $post );
?>
<div class="c-page-content js-page-content" id="mainContent">
	<div class="c-site-header-placeholder">
	</div>
	<main role="main">

		<section class="o-section">
			<?php
			$val = $GLOBALS['simplerap'];
			$error_style = 'style="color:red"';
			?>
			<form class="c-block-form" id="landlordform" method="post" enctype="multipart/form-data">
				<input type="hidden" name="updatepropertyform" value="true">
				<input type="hidden" name="property_id" value="<?php echo $post->ID; ?>">
				<?php wp_nonce_field( 'update_property_validation', 'update_property_nonce' ); ?>
				<div class="o-site-wrap o-site-wrap--padding">
					<ul class="c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]">
						<li class="u-hard--sides">
							<div class="o-grid u-text-center">
								<div class="o-grid__item u-3/4@sm-up u-text-center">
									<h1><?php the_title(); ?></h1>
								</div>
							</div>
						</li>
						<li class="u-hard--sides">
							<ul class="o-grid o-grid--matrix">
								<li class="o-grid__item u-1/2@sm-up">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="area" <?php if( $val->rapCheckError('rentout-area') ) echo $error_style; ?>>
												<strong><?php echo icl_t('Theme-form', 'Area'); ?>:</strong>
											</label>
										</li>
										<li>
											<input required type="text" name="rentout[area]" id="area" class="c-text-input c-text-input--lg" placeholder="<?php echo icl_t('Theme-form', 'Area placeholder'); ?>" value="<?php the_field('area'); ?>">
										</li>
									</ul>
								</li>
								<li class="o-grid__item u-1/2@sm-up">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li <?php if( $val->rapCheckError('rentout-property-type') ) echo $error_style; ?>>
											<strong><?php echo icl_t('Theme-form', 'Hometype'); ?>:</strong>
										</li>
										<li class="u-form-center-items">
											<ul class="o-inline-list o-inline-list--spaced">
												<?php $type = get_field('property_type'); ?>
												<li>
													<input required class="c-styled-input-el u-hidden" type="radio" name="rentout[property-type]" value="villa" id="type-villa" <?php if( $type === 'villa' ) echo 'checked'; ?>>
													<label class="c-styled-input-option c-styled-input-option--radio" for="type-villa">
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio">
                                                            <svg class="c-styled-input-option__svg">
	                                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-circle"></use>
                                                            </svg>
                                                        </span>
														<?php echo icl_t('Theme-form-options', 'Villa'); ?>
													</label>
												</li>
												<li>
													<input class="c-styled-input-el u-hidden" type="radio" name="rentout[property-type]"  value="apartment" id="type-apartment" <?php if( $type === 'apartment' ) echo 'checked'; ?>>
													<label class="c-styled-input-option c-styled-input-option--radio" for="type-apartment">
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio">
                                                            <svg class="c-styled-input-option__svg">
	                                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-circle"></use>
                                                            </svg>
                                                        </span>
														<?php echo icl_t('Theme-form-options', 'Apartment'); ?>
													</label>
												</li>
												<li>
													<input class="c-styled-input-el u-hidden" type="radio" name="rentout[property-type]"  value="terraced" id="type-terraced" <?php if( $type === 'terraced' ) echo 'checked'; ?>>
													<label class="c-styled-input-option c-styled-input-option--radio" for="type-terraced">
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio">
                                                            <svg class="c-styled-input-option__svg">
	                                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-circle"></use>
                                                            </svg>
                                                        </span>
														<?php echo icl_t('Theme-form-options', 'Terraced'); ?>
													</label>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<li class="o-grid__item u-1/2@sm-up">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="rooms" <?php if( $val->rapCheckError('rentout-rooms') ) echo $error_style; ?>>
												<strong><?php echo icl_t('Theme-form', 'Rooms'); ?>:</strong>
											</label>
										</li>
										<li>
											<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right">
												<input required name="rentout[rooms]" id="rooms" type="number" placeholder="5" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_field('rooms'); ?>">
                                                <span class="c-addon-group--inside__addon">
                                                    <?php echo icl_t('Theme-form', 'Rooms amount'); ?>
                                                </span>
											</div>
										</li>
									</ul>
								</li>
								<li class="o-grid__item u-1/2@sm-up">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="volume" <?php if( $val->rapCheckError('rentout-volume') ) echo $error_style; ?>>
												<strong><?php echo icl_t('Theme-form', 'Size'); ?>:</strong>
											</label>
										</li>
										<li>
											<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right">
												<input required name="rentout[volume]" id="volume" type="number" placeholder="85" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php the_field('volume'); ?>">
                                                <span class="c-addon-group--inside__addon">
                                                    m<sup>2</sup>
                                                </span>
											</div>
										</li>
									</ul>
								</li>
								<li class="o-grid__item">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="address" <?php if( $val->rapCheckError('rentout-address') ) echo $error_style; ?>>
												<strong><?php echo icl_t('Theme-form', 'Address'); ?>:</strong>
											</label>
										</li>
										<li>
											<input required type="text" name="rentout[address]" id="address" class="c-text-input c-text-input--lg" placeholder="<?php echo icl_t('Theme-form', 'Address placeholder'); ?>" value="<?php the_field('address'); ?>">
										</li>
									</ul>
								</li>
								<li class="o-grid__item u-1/2@sm-up">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="date-from" <?php if( $val->rapCheckError('rentout-date-from') ) echo $error_style; ?>>
												<strong><?php echo icl_t('Theme-form', 'From date'); ?>:</strong>
											</label>
										</li>
										<li>
											<?php
											$date_from = '';
											if( get_field('date_from') ) {
												$date_from = get_field( 'date_from' );
												$date_from = new DateTime( $date_from );
												$date_from = date_i18n( 'Y-m-d', $date_from->getTimestamp() );
											}
											?>
											<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer js-datepicker" data-lang="sv" data-years="1995-2020" data-format="YYYY-MM-DD" data-sundayfirst="false">
												<input required name="rentout[date-from]" id="date-from" type="text" placeholder="<?php echo date("Y-m-d"); ?>" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php echo $date_from; ?>">
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
								<li class="o-grid__item u-1/2@sm-up">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="date-to" <?php if( $val->rapCheckError('rentout-date-to') ) echo $error_style; ?>>
												<strong><?php echo icl_t('Theme-form', 'To date'); ?>:</strong>
											</label>
										</li>
										<li>
											<?php
											$date_to = '';
											if( get_field('date_to') ) {
												$date_to = get_field( 'date_to' );
												$date_to = new DateTime( $date_to );
												$date_to = date_i18n( 'Y-m-d', $date_to->getTimestamp() );
											}
											?>
											<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer js-datepicker" data-lang="sv" data-years="1995-2020" data-format="YYYY-MM-DD" data-sundayfirst="false">
												<input name="rentout[date-to]" id="date-to" type="text" placeholder="<?php echo date("Y-m-d"); ?>" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php echo $date_to; ?>">
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
								<li class="o-grid__item">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="price" <?php if( $val->rapCheckError('rentout-price') ) echo $error_style; ?>>
												<strong><?php echo icl_t('Theme-form', 'Price'); ?>:</strong>
											</label>
										</li>

										<li>
											<div class="c-addon-group c-addon-group--inside c-addon-group--inside--right">
												<input required name="rentout[price]" id="update-price" type="number" placeholder="129999" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php echo intval( get_field('price') ); ?>">
                                                <span class="c-addon-group--inside__addon">
                                                    <?php echo icl_t('Theme-form', 'Price cost per month'); ?>
                                                </span>
											</div>
										</li>

										<li class="display-none" id="js-update-price-notification">
											<?php echo $price_first_row; ?> (<span id="customer-price"></span> + 10% = <span id="full-price"></span>)<br>
											<?php echo $price_second_row; ?><br>
											<?php echo $price_third_row; ?> <?php the_field('price'); ?>
										</li>

									</ul>
								</li>
								<li class="o-grid__item">
									<ul class="o-bare-list o-bare-list--spaced-sixth">
										<li>
											<label for="description" <?php if( $val->rapCheckError('rentout-description') ) echo $error_style; ?>>
												<strong><?php echo icl_t('Theme-form', 'Description'); ?>:</strong>
											</label>
										</li>
										<li>
											<input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[update-content]" id="update-content">
											<label class="c-styled-input-option c-styled-input-option--radio" for="update-content">
	                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
	                                            <svg class="c-styled-input-option__svg">
		                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
	                                            </svg>
	                                        </span>
												<?php echo $description_text; ?>
											</label>
										</li>
										<li style="display: none;" id="description-content">
											<textarea required style="height:300px" name="rentout[description]" id="description" type="number" placeholder="<?php echo icl_t('Theme-form', 'Description placeholder'); ?>" class="c-text-input c-text-input--textarea"><?php the_content(); ?></textarea>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="u-hard--sides">
							<ul class="o-grid o-grid--matrix">
								<?php $utils = get_field('utilities'); ?>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="heat" id="chk-heat" <?php if( in_array( 'heat', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="chk-heat">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
	                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
										<?php echo icl_t('Theme-form-options', 'Heat'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="water" id="chk-water" <?php if( in_array( 'water', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="chk-water">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
	                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
										<?php echo icl_t('Theme-form-options', 'Water'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="dishwasher" id="chk-dishwasher" <?php if( in_array( 'dishwasher', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="chk-dishwasher">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
	                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
										<?php echo icl_t('Theme-form-options', 'Dishwasher'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="wheelchair" id="chk-wheelchair" <?php if( in_array( 'wheelchair', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="chk-wheelchair">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
	                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
										<?php echo icl_t('Theme-form-options', 'Wheelchair access'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="pets" id="chk-pets" <?php if( in_array( 'pets', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="chk-pets">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
	                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
										<?php echo icl_t('Theme-form-options', 'Pets'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="shower" id="chk-shower" <?php if( in_array( 'shower', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="chk-shower">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
	                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
										<?php echo icl_t('Theme-form-options', 'Shower'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="smoking" id="chk-smoking-allowed" <?php if( in_array( 'smoking', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="chk-smoking-allowed">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
	                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
										<?php echo icl_t('Theme-form-options', 'Smoking'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="washing_machine" id="chk-washing-machine" <?php if( in_array( 'washing_machine', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="chk-washing-machine">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
	                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
										<?php echo icl_t('Theme-form-options', 'Washing machine'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="toilet" id="chk-toilet" <?php if( in_array( 'toilet', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="chk-toilet">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
	                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
										<?php echo icl_t('Theme-form-options', 'Toilet'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="wifi" id="chk-wifi" <?php if( in_array( 'wifi', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="chk-wifi">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
	                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
										<?php echo icl_t('Theme-form-options', 'Wi-Fi'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="tv" id="chk-tv" <?php if( in_array( 'tv', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="chk-tv">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
	                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
										<?php echo icl_t('Theme-form-options', 'TV'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="parking" id="chk-parking" <?php if( in_array( 'parking', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="chk-parking">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
	                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
										<?php echo icl_t('Theme-form-options', 'Parking'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="electricity" id="chk-electricity" <?php if( in_array( 'electricity', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="chk-electricity">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
	                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
										<?php echo icl_t('Theme-form-options', 'Electricity'); ?>
									</label>
								</li>
								<li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
									<input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="furniture" id="chk-furnished" <?php if( in_array( 'furniture', $utils ) ) echo 'checked'; ?>>
									<label class="c-styled-input-option c-styled-input-option--radio" for="chk-furnished">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
	                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
										<?php echo icl_t('Theme-form-options', 'Furniture'); ?>
									</label>
								</li>
							</ul>
						</li>
						<li class="u-hard--sides">
							<?php // Current images, already uploaded to the server ?>
							<ul class="o-grid o-grid--matrix u-flush--bottom" id="current-images">
								<?php if( have_rows('images') ) : while( have_rows('images') ) : the_row(); ?>
									<?php $image = get_sub_field('image'); ?>
									<li class="o-grid__item u-1/3 u-1/4@xs-up u-1/5@sm-up u-1/6@md-up remove-current-image" data-id="<?php echo $image['id']; ?>">
										<div class="c-svg-icon c-svg-icon--remove-img">
											<input type="hidden" name="currentImages[]" value="<?php echo $image['id']; ?>">
											<img src="<?php echo $image['sizes']['175x175']; ?>" alt="">
											<svg class="c-svg-icon__svg c-svg-icon--remove-img__svg">
												<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="http://localhost/renthia/wp-content/themes/wasabiweb/build/img/sprite.svg#icon-cross"></use>
											</svg>
										</div>
									</li>
								<?php endwhile; endif; ?>
							</ul>
							<div id="deleted-images">
								<?php // Here will input fields for "deleted" images appear. (update-property.js) ?>
							</div>
							<ul class="o-grid o-grid--matrix u-flush--bottom" id="preview-images">
								<?php // Here will chosen images from the user be displayed. (rent-out.js) ?>
							</ul>
							<label for="choose-file" class="c-btn c-btn--epsilon c-btn--lg">
								+ <?php echo icl_t('Theme-form', 'Add image'); ?>
							</label>
							<div id="attached-images">
								<?php
								// At the moment: just one file at the time can be added. If multiple files
								// should be able to be added at the same time, javascript (rent-out.js) changes is needed.
								?>
								<input type="file" id="choose-file" class="image-files" accept="image/*" style="display: none"/>
							</div>
						</li>
						<li class="u-hard--sides">
							<button type="submit" class="c-btn c-btn--xl c-btn--alpha">
								<?php echo $update_button_text; ?>
							</button>
						</li>
					</ul>
				</div>
			</form>
		</section>

	</main>
</div>

<?php get_footer(); ?>
