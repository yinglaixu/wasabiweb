<?php
/*
Template Name: Page landlord Version 2
*/
?>
<?php /*
if( ! is_user_logged_in() ) {
    wp_safe_redirect( icl_t('Theme-login', 'Login page link') );
    exit;
}
*/?>

<?php
    $language = ICL_LANGUAGE_CODE;
?>


<?php get_header(); ?>

<div class="c-page-content js-page-content" id="mainContent">
    <div class="c-site-header-placeholder">
    </div>
	<main role="main">
            <?php get_template_part('partials/landlord-introduction'); ?>

        <div id = "listProperty">
            <?php get_template_part('partials/subpage-banner'); ?>
        </div>

        <section class="o-section">
            <?php
            $val = $GLOBALS['simplerap'];
            $error_style = 'style="color:red"';
            ?>



            <form class="c-block-form" id="landlordform" method="post" enctype="multipart/form-data">
                <input type="hidden" name="rentoutform" value="true">
                <div class="o-site-wrap o-site-wrap--padding">
                    <ul class = 'c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]'>
                        <li class = 'u-hard--sides'>
                            <div class="o-grid u-text-center">
                                <div class="o-grid__item u-3/4@sm-up u-text-center">
                                    <h1><?php the_title(); ?></h1>
                                    <div class="o-paragraph-group u-txt-md">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class = 'u-hard--sides'></li>
                    </ul>
                    <ul class="c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]">
                        <!--address-->
                        <li class="u-hard--sides" id = 'rentoutFormAddress'>
                            <h2 class="u-flush--bottom">
                                <?php echo icl_t('Theme-form', 'Address'); ?>
                            </h2>
                            <ul class="o-grid o-grid--matrix">

    <!--                                country-->
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label>
                                               <?php echo icl_t('Theme-form', 'Country'); ?>:
                                            </label>
                                        </li>

                                        <li>
                                            <div class="c-styled-select js-select">
                                                <?php
                                                $countries = get_field('rentout_countries');
                                                if($language === 'sv'|| $language === 'en'){
                                                    $country = $country ?: get_field('rentout_countries')[0]['rentout_country'];
                                                }
                                                else if($language === 'nl'){
                                                    $country = $country ?: get_field('rentout_countries')[1]['rentout_country'];
                                                }
                                                ?>
                                                <label class="c-styled-select__label c-styled-select__label--sm">
                                                    <span class="js-styled-select-text">
                                                        <?php echo $country; ?>
                                                    </span>
                                                    <svg class="c-styled-select__chevron">
                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-chevron"></use>
                                                    </svg>
                                                </label>
                                                <select class="c-styled-select__select" name="rentout[country]" id ="rentoutCountries">
                                                    <?php if( have_rows('rentout_countries') ) : while( have_rows('rentout_countries') ) : the_row(); ?>
                                                        <?php $current = get_sub_field('rentout_country'); ?>
                                                        <option value="<?php echo $current; ?>" <?php if( $current === $country ) echo "selected"; ?>> <?php echo $current; ?> </option>
                                                    <?php endwhile; endif; ?>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
    <!--                                city-->
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label>
                                                 <?php echo icl_t('Theme-form', 'City'); ?>:
                                            </label>
                                        </li>
                                        <li>
                                            <div class="c-styled-select js-select">
                                                <?php
                                                $cities = get_field('rentout_cities');
                                                $city = $city ?: get_field('rentout_cities')[0]['rentout_city'];
                                                ?>
                                                <label class="c-styled-select__label c-styled-select__label--sm">
                                                    <span class="js-styled-select-text" id ="chosenCity">
                                                        <?php echo $city; ?>
                                                    </span>
                                                    <svg class="c-styled-select__chevron">
                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-chevron"></use>
                                                    </svg>
                                                </label>
                                                <select class="c-styled-select__select" name="rentout[city]" id ="rentoutCities">
                                                    <?php if( have_rows('rentout_cities') ) : while( have_rows('rentout_cities') ) : the_row(); ?>
                                                        <?php $current = get_sub_field('rentout_city'); ?>
                                                        <option value="<?php echo $current; ?>"> <?php echo $current; ?> </option>
                                                    <?php endwhile; endif; ?>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
    <!--                                area-->
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label>
                                                 <?php echo icl_t('Theme-form', 'Area'); ?>:
                                            </label>
                                        </li>

                                        <li id="forSweden">
                                            <div class="c-styled-select js-select">
                                                <?php
                                                $area = $_POST['rentout']['area'];
                                                $areas = get_field('rentout_areas');
                                                $area = $area ?: get_field('rentout_areas')[0]['rentout_area'];
                                                ?>
                                                <label class="c-styled-select__label c-styled-select__label--sm">
                                                    <span class="js-styled-select-text" id ="chosenArea">
                                                        <?php echo $area; ?>
                                                    </span>
                                                    <svg class="c-styled-select__chevron">
                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-chevron"></use>
                                                    </svg>
                                                </label>
                                                <select class="c-styled-select__select" name="rentout[area]" id ="rentoutAreas">
                                                    <?php if( have_rows('rentout_areas') ) : while( have_rows('rentout_areas') ) : the_row(); ?>
                                                        <?php $current = get_sub_field('rentout_area'); ?>
                                                        <option value="<?php echo $current; ?>"> <?php echo $current; ?> </option>
                                                    <?php endwhile; endif; ?>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
    <!--                                zipcode-->
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="postcode" <?php if( $val->rapCheckError('rentout-postcode') ) echo $error_style; ?>>
                                                <?php echo icl_t('Theme-form', 'Zipcode'); ?>:
                                            </label>
                                        </li>
                                        <li>
                                            <input required type="text" name="rentout[postcode]" id="postcode" class="c-text-input c-text-input--lg" placeholder="<?php echo icl_t('Theme-form', 'Postnummer placeholder'); ?>" value="<?php esc_html_e( $_POST['rentout']['postcode'] ); ?>">
                                        </li>
                                    </ul>
                                </li>
    <!--                                address-->
                                <li class="o-grid__item u-1/1@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="address" <?php if( $val->rapCheckError('rentout-address') ) echo $error_style; ?>>
                                                <?php echo icl_t('Theme-form', 'Address'); ?>:
                                            </label>
                                        </li>
                                        <li>
                                            <input required type="text" name="rentout[address]" id="address" class="c-text-input c-text-input--lg" placeholder="<?php echo icl_t('Theme-form', 'Address placeholder'); ?>" value="<?php esc_html_e( $_POST['rentout']['address'] ); ?>">
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                         </li>
                        <!--property-->
                        <li class="u-hard--sides" id = 'rentoutFormProperty'>
                            <h2 class="u-flush--bottom">
                                <?php echo icl_t('Theme-form', 'Property'); ?>
                            </h2>
                            <ul class="o-grid o-grid--matrix">
                                <!--                                type of property-->
                                <li class="o-grid__item u-1/1@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li <?php if( $val->rapCheckError('rentout-property-type') ) echo $error_style; ?>>
                                            <?php echo icl_t('Theme-form', 'Hometype'); ?>:
                                        </li>
                                        <li class="u-form-center-items">
                                            <ul class="o-inline-list o-inline-list--spaced-double u-text-center">
                                                <li>
                                                    <input required class="c-styled-input-el u-hidden" type="radio" name="rentout[property-type]" value="villa" id="type-villa">
                                                    <label class="c-styled-input-option c-styled-input-option--radio" for="type-villa">
                                                        <p class="c-svg-icon--rentout-property-type">
                                                            <svg id = 'icon-villa-default' class="c-svg-icon--rentout-property-type__svg">
                                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-rentout-villa"></use>
                                                            </svg>
                                                            <svg id = 'icon-villa-checked' class="c-svg-icon--rentout-property-type__svg">
                                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-rentout-villa-checked"></use>
                                                            </svg>
                                                        </p>
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio" style = "display: none;">
                                                            <svg class="c-styled-input-option__svg">
                                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-circle"></use>
                                                            </svg>
                                                        </span>
                                                        <?php echo icl_t('Theme-form-options', 'Villa'); ?>
                                                    </label>
                                                </li>
                                                <li>
                                                    <input class="c-styled-input-el u-hidden" type="radio" name="rentout[property-type]"  value="apartment" id="type-apartment">
                                                    <label class="c-styled-input-option c-styled-input-option--radio" for="type-apartment">
                                                        <p class="c-svg-icon--rentout-property-type">
                                                            <svg id = 'icon-apartment-default' class="c-svg-icon--rentout-property-type__svg">
                                                                <use  xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-rentout-apartment"></use>
                                                            </svg>
                                                            <svg id = 'icon-apartment-checked' class="c-svg-icon--rentout-property-type__svg">
                                                                <use  xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-rentout-apartment-checked"></use>
                                                            </svg>
                                                        </p>
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio" style = "display:none;">
                                                            <svg class="c-styled-input-option__svg">
                                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-circle"></use>
                                                            </svg>
                                                        </span>
                                                        <?php echo icl_t('Theme-form-options', 'Apartment'); ?>
                                                    </label>
                                                </li>
                                                <li>
                                                    <input class="c-styled-input-el u-hidden" type="radio" name="rentout[property-type]"  value="terraced" id="type-terraced">
                                                    <label class="c-styled-input-option c-styled-input-option--radio" for="type-terraced">
                                                        <p class="c-svg-icon--rentout-property-type">
                                                            <svg id = 'icon-sharedroom-default' class="c-svg-icon--rentout-property-type__svg">
                                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-rentout-sharedroom"></use>
                                                            </svg>
                                                            <svg id = 'icon-sharedroom-checked' class="c-svg-icon--rentout-property-type__svg">
                                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-rentout-sharedroom-checked"></use>
                                                            </svg>
                                                        </p>
                                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--radio" style = "display:none;">
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
                                <!--                                room count-->
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label>
                                                <?php echo icl_t('Theme-form', 'Rooms'); ?>
                                            </label>
                                        </li>

                                        <li>
                                            <div class="c-styled-select js-select">
                                                <?php
                                                $room = $_POST['rentout']['rooms'];
                                                $rooms = get_field('rentout_rooms');
                                                $room = $room ?: get_field('rentout_rooms')[0]['rentout_room'];
                                                ?>
                                                <label class="c-styled-select__label c-styled-select__label--sm">
                                                    <span class="js-styled-select-text">
                                                        <?php echo $room; ?>
                                                    </span>
                                                    <svg class="c-styled-select__chevron">
                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-chevron"></use>
                                                    </svg>
                                                </label>
                                                <select class="c-styled-select__select" name="rentout[rooms]" id ="rooms">
                                                    <?php if( have_rows('rentout_rooms') ) : while( have_rows('rentout_rooms') ) : the_row(); ?>
                                                        <?php $current = get_sub_field('rentout_room'); ?>
                                                        <option value="<?php echo $current; ?>"> <?php echo $current; ?> </option>
                                                    <?php endwhile; endif; ?>
                                                </select>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="volume" <?php if( $val->rapCheckError('rentout-volume') ) echo $error_style; ?>>
                                                <?php echo icl_t('Theme-form', 'Size'); ?>:
                                            </label>
                                        </li>
                                        <li>
                                            <div class="c-addon-group c-addon-group--inside c-addon-group--inside--right">
                                                <input required name="rentout[volume]" id="volume" type="number" placeholder="85" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php esc_html_e( $_POST['rentout']['volume'] ); ?>">
                                                <span class="c-addon-group--inside__addon">
                                                    m<sup>2</sup>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <!--description-->
                                <li class="o-grid__item">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="description" <?php if( $val->rapCheckError('rentout-description') ) echo $error_style; ?>>
                                                <?php echo icl_t('Theme-form', 'Description'); ?>:
                                            </label>
                                            <small><?php echo icl_t('Theme-form', 'Description comment'); ?></small>
                                        </li>
                                        <li>
                                            <textarea required name="rentout[description]" id="description" type="text" placeholder="<?php echo icl_t('Theme-form', 'Description placeholder'); ?>" class="c-text-input c-text-input--textarea"><?php echo esc_textarea( $_POST['rentout']['description'] ); ?></textarea>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!--step1 btn-->
                        <li class="u-hard--sides" id = 'step_1Btn'>
                            <a href="#rentoutFormDate" class="[ c-btn c-btn--xl c-btn--alpha ] js-scroll" id = "step_1BtnNext">
                                <?php echo icl_t('Theme-form', 'NextBtn'); ?>
                            </a>
                        </li>
                        <!--rent out date-->
                        <li class="u-hard--sides" id = 'rentoutFormDate'>
                            <h2 class="u-flush--bottom"> <?php echo icl_t('Theme-form', 'Rent out date'); ?> </h2>
                            <p><?php echo icl_t('Theme-form', 'Rent out date comment'); ?></p>
                            <ul class="o-grid o-grid--matrix">
    <!--                                from date-->
                               <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="date-from" <?php if( $val->rapCheckError('rentout-date-from') ) echo $error_style; ?>>
                                                <?php echo icl_t('Theme-form', 'From date'); ?>:
                                            </label>
                                        </li>
                                        <li>
                                            <div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer js-datepicker" data-lang="sv" data-years="1995-2020" data-format="YYYY-MM-DD" data-sundayfirst="false">
                                                <input required name="rentout[date-from]" id="date-from" type="text" placeholder="<?php echo date("Y-m-d"); ?>" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php esc_html_e( $_POST['rentout']['date-from'] ); ?>">
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
    <!--                                to date-->
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="date-to" <?php if( $val->rapCheckError('rentout-date-to') ) echo $error_style; ?>>
                                                <?php echo icl_t('Theme-form', 'To date'); ?>:
                                            </label>
                                        </li>
                                        <li>
                                            <div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer js-datepicker" data-lang="sv" data-years="1995-2020" data-format="YYYY-MM-DD" data-sundayfirst="false">
                                                <input required name="rentout[date-to]" id="date-to" type="text" placeholder="<?php echo date("Y-m-d"); ?>" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php esc_html_e( $_POST['rentout']['date-to'] ); ?>">
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
<!--                        rent out price-->
                        <li class="u-hard--sides" id = 'rentoutFormPrice'>
                            <h2 class="u-flush--bottom"> <?php echo icl_t('Theme-form', 'Rent out price'); ?> </h2>
                            <ul class="o-grid o-grid--matrix">
    <!--                                price-->
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="price">
                                                <?php echo icl_t('Theme-form', 'Rent out price you want'); ?>
                                            </label>
                                        </li>

                                        <li>
                                            <div class="c-addon-group c-addon-group--inside c-addon-group--inside--right">
                                                <input required id="price" type="number" placeholder="129999" class="c-text-input c-text-input--lg c-addon-group--inside__input">
                                                <span class="c-addon-group--inside__addon">
                                                    <span class="currency">kr</span><?php echo icl_t('Theme-form', 'Month'); ?>
                                                </span>
                                            </div>
                                        </li>

                                        <li class="js-price-notification display-none">
                                            <p><?php echo icl_t('Theme-form', 'Rent out price recommend comment'); ?></p>
                                        </li>
                                    </ul>
                                </li>
    <!--                                Renthia rentout price-->
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="price" <?php if( $val->rapCheckError('rentout-price') ) echo $error_style; ?>>
                                                <strong><?php echo icl_t('Theme-form', 'Rent out price Renthia'); ?>:</strong>
                                            </label>
                                        </li>

                                        <li>
                                            <div class="c-addon-group c-addon-group--inside c-addon-group--inside--right" id = 'priceRenthiaInput'>
                                                <input required type="hidden" name="rentout[price]" id="priceRenthia" type="number" placeholder="139999" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php esc_html_e( $_POST['rentout']['price'] ); ?>">
                                            </div>

                                            <div class="c-addon-group c-addon-group--inside c-addon-group--inside--right">
                                                <input disabled type="number" id = "priceRenthiaDisplay" placeholder="139999" class="c-text-input c-text-input--lg c-addon-group--inside__input" value=" ">
                                                    <span class="c-addon-group--inside__addon">
                                                        <span class="currency">kr</span><?php echo icl_t('Theme-form', 'Month'); ?>
                                                    </span>
                                            </div>
                                        </li>
                                        <li class="js-price-notification display-none">
                                            <?php the_field( 'add_ten_percent_info_heading' ); ?>

                                            <?php if( have_rows( 'add_ten_percent_info' ) ): ?>
                                                <ul class="o-bare-list o-bare-list--spaced-half">

                                                    <?php while ( have_rows( 'add_ten_percent_info' ) ) : the_row(); ?>

                                                        <li class="c-svg-icon c-svg-icon--tick">
                                                            <svg class="c-svg-icon__svg c-svg-icon--tick__svg">
                                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick"></use>
                                                            </svg>
                                                            <?php the_sub_field( 'add_ten_percent_info_row' ); ?>
                                                        </li>

                                                    <?php endwhile; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!--step2 btn-->
                        <li class="u-hard--sides" id = 'step_2Btn'>
                            <a href="#rentoutFormUtilities" class="[ c-btn c-btn--xl c-btn--alpha ] js-scroll" id = "step_2BtnNext">
                                <?php echo icl_t('Theme-form', 'NextBtn'); ?>
                            </a>
                            <a href="#rentoutFormAddress" class="[ c-btn c-btn--md c-btn--viewmore ] js-scroll" id = "step_2BtnBack">
                                <?php echo icl_t('Theme-form', 'BackBtn'); ?>
                            </a>
                        </li>
                        <!--utilities-->
                        <li class="u-hard--sides" id = 'rentoutFormUtilities'>
                            <h2 class="u-flush--bottom">
                                <?php the_field('utilities-heading'); ?>
                            </h2>
                            <p><?php the_field('utilities-text'); ?></p>
                            <ul class="o-grid o-grid--matrix">
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/4@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="heat" id="chk-heat">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-heat">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'Heat'); ?>
                                    </label>

                                </li>
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/4@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="water" id="chk-water">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-water">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'Water'); ?>
                                    </label>
                                </li>
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/4@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="dishwasher" id="chk-dishwasher">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-dishwasher">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'Dishwasher'); ?>
                                    </label>
                                </li>
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/4@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="wheelchair" id="chk-wheelchair">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-wheelchair">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'Wheelchair access'); ?>
                                    </label>
                                </li>
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/4@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="pets" id="chk-pets">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-pets">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'Pets'); ?>
                                    </label>
                                </li>
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/4@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="shower" id="chk-shower">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-shower">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'Shower'); ?>
                                    </label>
                                </li>
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/4@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="smoking" id="chk-smoking-allowed">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-smoking-allowed">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'Smoking'); ?>
                                    </label>
                                </li>
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/4@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="washing_machine" id="chk-washing-machine">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-washing-machine">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'Washing machine'); ?>
                                    </label>
                                </li>
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/4@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="toilet" id="chk-toilet">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-toilet">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'Toilet'); ?>
                                    </label>
                                </li>
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/4@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="wifi" id="chk-wifi">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-wifi">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'Wi-Fi'); ?>
                                    </label>
                                </li>
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/4@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="tv" id="chk-tv">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-tv">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'TV'); ?>
                                    </label>
                                </li>
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/4@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="parking" id="chk-parking">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-parking">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'Parking'); ?>
                                    </label>
                                </li>
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/4@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="electricity" id="chk-electricity">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-electricity">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'Electricity'); ?>
                                    </label>
                                </li>
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/4@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[utils][]"  value="furniture" id="chk-furnished">
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
                        <!--openhouse-->
                        <li class="u-hard--sides" id = 'rentoutFormOpenHouse'>
                            <h2 class="u-flush">
                                <?php the_field('open_house-heading'); ?>
                            </h2>
                            <p><?php the_field('open_house-text'); ?></p>
                            <div id="opening-times-wrap">
                                <div class="js-clone-opening-times-group">
                                    <ul class="o-grid o-grid--matrix u-flush--bottom">
                                        <li class="o-grid__item u-1/2@sm-up js-clone-opening-times-group__date">
                                            <ul class="o-bare-list o-bare-list--spaced-sixth">
                                                <li>
                                                    <label for="open-date-1">
                                                        <?php echo icl_t('Theme-form', 'Date'); ?>:
                                                    </label>
                                                </li>
                                                <li>
                                                    <div class="c-addon-group c-addon-group--inside c-addon-group--inside--right u-pointer js-datepicker" data-lang="sv" data-years="1995-2020" data-format="YYYY-MM-DD" data-sundayfirst="false">
                                                        <input name="rentout[open-date][]" id="open-date-1" type="text" placeholder="<?php echo date("Y-m-d"); ?>" class="c-text-input c-text-input--lg c-addon-group--inside__input" >
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
                                        <li class="o-grid__item u-1/2@sm-up js-clone-opening-times-group__time">
                                            <ul class="o-bare-list o-bare-list--spaced-sixth">
                                                <li>
                                                    <label>
                                                        <?php echo icl_t('Theme-form', 'Time'); ?>:
                                                    </label>
                                                </li>
                                                <li>
                                                    <div class="c-styled-select js-select">
                                                        <label class="c-styled-select__label c-styled-select__label--sm">
                                                            <span class="js-styled-select-text">
                                                                <?php echo icl_t('Theme-form', 'Choose time'); ?>
                                                            </span>
                                                            <span class="c-svg-icon c-svg-icon--time">
                                                                <svg class="c-svg-icon__svg c-svg-icon--time__svg">
                                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-clock"></use>
                                                                </svg>
                                                            </span>
                                                        </label>
                                                        <select class="c-styled-select__select" name="rentout[open-time][]" id="open-time-1">
                                                            <option value="stockholm" disabled selected><?php echo icl_t('Theme-form', 'Choose time'); ?></option>
                                                            <?php for($i=0; $i<24; $i++) :
                                                                if ($i<10) {
                                                                    $j = 0;
                                                                } else {
                                                                    $j = '';
                                                                }
                                                                ?>
                                                                <option value="<?php echo $j . $i . ':00';?>"><?php echo $j . $i . ':00';?></option>
                                                                <option value="<?php echo $j . $i . ':30';?>"><?php echo $j . $i . ':30';?></option>
                                                            <?php endfor; ?>
                                                        </select>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <a href="#" class="c-btn c-btn--epsilon c-btn--lg js-clone-opening-times-btn">
                                + <?php echo icl_t('Theme-form', 'Add showing'); ?>
                            </a>
                        </li>
                        <!--image-->
                        <li class="u-hard--sides" id = 'rentoutFormImage'>
                            <h2 class="u-flush">
                                <?php the_field('images-heading'); ?>
                            </h2>
                            <p><?php the_field('images-text'); ?></p>
                            <ul class="o-grid o-grid--matrix u-flush--bottom" id="preview-images">

                            </ul>
                            <label for="choose-file" class="c-btn c-btn--epsilon c-btn--lg" id = 'submitImgBtn'>
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
                        <!--extra-->
                        <li class="u-hard--sides" id = 'rentoutFormExtra'>
                            <h2 class="u-flush"><?php the_field('extras-heading'); ?></h2>
                            <p><?php the_field('extras-text'); ?></p>
                            <ul class="o-grid o-grid--matrix">
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[extras][]"  value="cleaning" id="chk-cleaning">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-cleaning">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'Cleaning'); ?>
                                    </label>
                                </li>
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[extras][]"  value="storage" id="chk-storage">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-storage">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'Storage'); ?>
                                    </label>
                                </li>
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
                                    <input class="c-styled-input-el u-hidden" type="checkbox" name="rentout[extras][]"  value="movers" id="chk-movers">
                                    <label class="c-styled-input-option c-styled-input-option--radio" for="chk-movers">
                                        <span class="c-styled-input-option__icon c-styled-input-option__icon--checkbox">
                                            <svg class="c-styled-input-option__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick-alt"></use>
                                            </svg>
                                        </span>
                                        <?php echo icl_t('Theme-form-options', 'Moving help'); ?>
                                    </label>
                                </li>
                            </ul>
                        </li>
                        <!--personal info-->
                        <li class="u-hard--sides" id = "rentoutFormPersonalInfo">
                            <h2 class="u-flush">
                                <?php the_field('your_info-heading'); ?>
                            </h2>
                            <p><?php the_field('your_info-text'); ?></p>
                            <ul class="o-grid o-grid--matrix">
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="firstname" <?php if( $val->rapCheckError('rentout-firstname') ) echo $error_style; ?>>
                                                <?php echo icl_t('Theme-form', 'Forename'); ?>:
                                            </label>
                                        </li>
                                        <li>
                                            <input required type="text" name="rentout[firstname]" id="firstname" class="c-text-input c-text-input--lg" placeholder="<?php echo icl_t('Theme-form', 'Forename'); ?>" value="<?php esc_html_e( $_POST['rentout']['firstname'] ); ?>">
                                        </li>
                                    </ul>
                                </li>
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="surname" <?php if( $val->rapCheckError('rentout-surname') ) echo $error_style; ?>>
                                                <?php echo icl_t('Theme-form', 'Surname'); ?>:
                                            </label>
                                        </li>
                                        <li>
                                            <input required type="text" name="rentout[surname]" id="surname" class="c-text-input c-text-input--lg" placeholder="<?php echo icl_t('Theme-form', 'Surname'); ?>" value="<?php esc_html_e( $_POST['rentout']['surname'] ); ?>">
                                        </li>
                                    </ul>
                                </li>
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="telephone" >
                                                <?php echo icl_t('Theme-form', 'Telephone'); ?>:
                                            </label>
                                        </li>
                                        <li>
                                            <input type="tel" name="rentout[telephone]" id="telephone" class="c-text-input c-text-input--lg" placeholder="<?php _e("+46 700 - 00 00 00"); ?>" value="<?php esc_html_e( $_POST['rentout']['telephone'] ); ?>">
                                        </li>
                                    </ul>
                                </li>
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="email" <?php if( $val->rapCheckError('rentout-email') ) echo $error_style; ?>>
                                                <?php echo icl_t('Theme-form', 'E-mail'); ?>:
                                            </label>
                                        </li>
                                        <li>
                                            <input required type="email" name="rentout[email]" id="email" class="c-text-input c-text-input--lg" placeholder="<?php _e("mail@mail.se"); ?>" value="<?php esc_html_e( $_POST['rentout']['email'] ); ?>">
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!--submit button-->
                        <li class="u-hard--sides" id = 'rentoutFormSubmitBtn'>
                            <button type="submit" class="c-btn c-btn--xl c-btn--alpha">
                                <?php echo icl_t('Theme-form', 'Send object'); ?>
                            </button>
                        </li>
                    </ul>
                </div>
            </form>
<!--            <div class = 'o-grid'>-->
<!--                <div class = 'o-grid__item u-1/3@sm-up'id = 'confirmedSidebar'>-->
<!--                    <div class="o-section" style = 'background: white; overflow:auto; height:750px; z-index: 99;'>-->
<!--                        <ul style = 'list-style: none; '>-->
<!--                            <li>-->
<!--                                <h2> Your property </h2>-->
<!--                                <p>Below here is a summary of your prospect</p>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <div class="c-svg-icon c-svg-icon--rentout-title">-->
<!--                                    <svg class="c-svg-icon__svg c-svg-icon--rentout-title__svg">-->
<!--                                        <use xlink:href="--><?php //bloginfo('template_directory'); ?><!--/build/img/sprite.svg#icon-rentout-address"></use>-->
<!--                                    </svg>-->
<!--                                    <strong>Address</strong>-->
<!--                                </div>-->
<!--                                <p id = 'confirmedAddress'></p>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <div class="c-svg-icon c-svg-icon--rentout-title">-->
<!--                                    <svg class="c-svg-icon__svg c-svg-icon--rentout-title__svg">-->
<!--                                        <use xlink:href="--><?php //bloginfo('template_directory'); ?><!--/build/img/sprite.svg#icon-rentout-property"></use>-->
<!--                                    </svg>-->
<!--                                    <strong>Property</strong>-->
<!--                                </div>-->
<!--                                <p id = 'confirmedProperty'></p>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <div class="c-svg-icon c-svg-icon--rentout-title">-->
<!--                                    <svg class="c-svg-icon__svg c-svg-icon--rentout-title__svg">-->
<!--                                        <use xlink:href="--><?php //bloginfo('template_directory'); ?><!--/build/img/sprite.svg#icon-rentout-date"></use>-->
<!--                                    </svg>-->
<!--                                    <strong>Rent out date</strong>-->
<!--                                </div>-->
<!--                                <p id = 'confirmedRentDate'></p>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <div class="c-svg-icon c-svg-icon--rentout-title">-->
<!--                                    <svg class="c-svg-icon__svg c-svg-icon--rentout-title__svg">-->
<!--                                        <use xlink:href="--><?php //bloginfo('template_directory'); ?><!--/build/img/sprite.svg#icon-rentout-price"></use>-->
<!--                                    </svg>-->
<!--                                    <strong>Rent out price</strong>-->
<!--                                </div>-->
<!--                                <p id = 'confirmedRentPrice'></p>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <div class="c-svg-icon c-svg-icon--rentout-title">-->
<!--                                    <svg class="c-svg-icon__svg c-svg-icon--rentout-title__svg">-->
<!--                                        <use xlink:href="--><?php //bloginfo('template_directory'); ?><!--/build/img/sprite.svg#icon-rentout-use"></use>-->
<!--                                    </svg>-->
<!--                                    <strong>Utilities</strong>-->
<!--                                </div>-->
<!--                                <p id = 'confirmedUtilities'></p>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <div class="c-svg-icon c-svg-icon--rentout-title">-->
<!--                                    <svg class="c-svg-icon__svg c-svg-icon--rentout-title__svg">-->
<!--                                        <use xlink:href="--><?php //bloginfo('template_directory'); ?><!--/build/img/sprite.svg#icon-rentout-openhouse"></use>-->
<!--                                    </svg>-->
<!--                                    <strong>Open House</strong>-->
<!--                                </div>-->
<!--                                <p id = 'confirmedOpenHouse'></p>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <div class="c-svg-icon c-svg-icon--rentout-title">-->
<!--                                    <svg class="c-svg-icon__svg c-svg-icon--rentout-title__svg">-->
<!--                                        <use xlink:href="--><?php //bloginfo('template_directory'); ?><!--/build/img/sprite.svg#icon-rentout-img"></use>-->
<!--                                    </svg>-->
<!--                                    <strong>Uploaded Images</strong>-->
<!--                                </div>-->
<!--                                <p> Preview in the left side form.</p>-->
<!--                            </li>-->
<!--                            <li>-->
<!--                                <div class="c-svg-icon c-svg-icon--rentout-title">-->
<!--                                    <svg class="c-svg-icon__svg c-svg-icon--rentout-title__svg">-->
<!--                                        <use xlink:href="--><?php //bloginfo('template_directory'); ?><!--/build/img/sprite.svg#icon-rentout-extra"></use>-->
<!--                                    </svg>-->
<!--                                    <strong>Additional Services</strong>-->
<!--                                </div>-->
<!--                                <p id = 'confirmedExtra'></p>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </section>

	</main>
</div>


<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>-->
<!--<script>-->
<!---->
<!--    function log(){-->
<!--        $('#rooms').-->
<!--    }-->
<!---->
<!--</script>-->

<?php get_footer(); ?>

<style>
    .confirmSidebarFixed {
        width: 355px;
        position: fixed;
        top: 0;
        z-index: 99;
    }
</style>



<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
<!--<script>-->
<!---->
<!--    var pricePerSquaremeter = {-->
<!--        Centrum:26.32,-->
<!--        Noord:15.35,-->
<!--        West:26.12,-->
<!--        'Nieuw-west':16.16,-->
<!--        Zuid:22.34,-->
<!--        Oost:19.41,-->
<!--        'Zuid-Oost':10.89-->
<!--    };-->
<!---->
<!--    function test(){-->
<!--        var selectedArea, Volume, value;-->
<!--        if($('#rentoutCountries option:selected').val() === 'Netherlands' || $('#rentoutCountries option:selected').val() === 'Nederland'){-->
<!--            selectedArea = $('#chosenArea').html();-->
<!--            Volume = $('#volume').val();-->
<!--            var unitPrice = pricePerSquaremeter[selectedArea];-->
<!--            value = parseInt(unitPrice * Volume);-->
<!--        }-->
<!--        console.log(Volume);-->
<!--        console.log(selectedArea);-->
<!--        console.log(typeof selectedArea);-->
<!--        console.log(unitPrice);-->
<!--        console.log(value)-->
<!--    }-->
<!---->
<!--</script>-->



































