<?php
/*
Template Name: Page landlord
*/
?>
<?php /*
if( ! is_user_logged_in() ) {
    wp_safe_redirect( icl_t('Theme-login', 'Login page link') );
    exit;
}
*/?>
<?php get_header(); ?>
<div class="c-page-content js-page-content" id="mainContent">
    <div class="c-site-header-placeholder">
    </div>
    
	<main role="main">
        <?php get_template_part('partials/subpage-banner'); ?>   
        
        <section class="o-section">
            <?php
            $val = $GLOBALS['simplerap'];
            $error_style = 'style="color:red"';
            ?>
            <form class="c-block-form" id="landlordform" method="post" enctype="multipart/form-data">
                <input type="hidden" name="rentoutform" value="true">
                <div class="o-site-wrap o-site-wrap--padding">
                    <ul class="c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]">
                        <li class="u-hard--sides">
                            <div class="o-grid u-text-center">
                                <div class="o-grid__item u-3/4@sm-up u-text-center">
                                    <h1><?php the_title(); ?></h1>
                                    <div class="o-paragraph-group u-txt-md">
                                        <?php the_content(); ?>
                                    </div>
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
                                            <input required type="text" name="rentout[area]" id="area" class="c-text-input c-text-input--lg" placeholder="<?php echo icl_t('Theme-form', 'Area placeholder'); ?>" value="<?php esc_html_e( $_POST['rentout']['area'] ); ?>">
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
                                                <li>
                                                    <input required class="c-styled-input-el u-hidden" type="radio" name="rentout[property-type]" value="villa" id="type-villa">
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
                                                    <input class="c-styled-input-el u-hidden" type="radio" name="rentout[property-type]"  value="apartment" id="type-apartment">
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
                                                    <input class="c-styled-input-el u-hidden" type="radio" name="rentout[property-type]"  value="terraced" id="type-terraced">
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
                                                <input required name="rentout[rooms]" id="rooms" type="number" placeholder="5" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php esc_html_e( $_POST['rentout']['rooms'] ); ?>">
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
                                                <input required name="rentout[volume]" id="volume" type="number" placeholder="85" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php esc_html_e( $_POST['rentout']['volume'] ); ?>">
                                                <span class="c-addon-group--inside__addon">
                                                    m<sup>2</sup>
                                                </span>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="address" <?php if( $val->rapCheckError('rentout-address') ) echo $error_style; ?>>
                                                <strong><?php echo icl_t('Theme-form', 'Address'); ?>:</strong>
                                            </label>
                                        </li>
                                        <li>
                                            <input required type="text" name="rentout[address]" id="address" class="c-text-input c-text-input--lg" placeholder="<?php echo icl_t('Theme-form', 'Address placeholder'); ?>" value="<?php esc_html_e( $_POST['rentout']['address'] ); ?>">
                                        </li>
                                    </ul>
                                </li>
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="postcode" <?php if( $val->rapCheckError('rentout-postcode') ) echo $error_style; ?>>
                                                <strong><?php echo icl_t('Theme-form', 'Zipcode and city'); ?>:</strong>
                                            </label>
                                        </li>
                                        <li>
                                            <input required type="text" name="rentout[postcode]" id="postcode" class="c-text-input c-text-input--lg" placeholder="75277 Uppsala" value="<?php esc_html_e( $_POST['rentout']['postcode'] ); ?>">
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
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="date-to" <?php if( $val->rapCheckError('rentout-date-to') ) echo $error_style; ?>>
                                                <strong><?php echo icl_t('Theme-form', 'To date'); ?>:</strong>
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
                                <li class="o-grid__item">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="price" <?php if( $val->rapCheckError('rentout-price') ) echo $error_style; ?>>
                                                <strong><?php echo icl_t('Theme-form', 'Price'); ?>:</strong>
                                            </label>
                                        </li>
                                        
                                        <li>
                                            <div class="c-addon-group c-addon-group--inside c-addon-group--inside--right">
                                                <input required name="rentout[price]" id="price" type="number" placeholder="129999" class="c-text-input c-text-input--lg c-addon-group--inside__input" value="<?php esc_html_e( $_POST['rentout']['price'] ); ?>">
                                                <span class="c-addon-group--inside__addon">
                                                    <?php echo icl_t('Theme-form', 'Price cost per month'); ?>
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
                                <li class="o-grid__item">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="description" <?php if( $val->rapCheckError('rentout-description') ) echo $error_style; ?>>
                                                <strong><?php echo icl_t('Theme-form', 'Description'); ?>:</strong>
                                            </label>
                                        </li>
                                        <li>
                                            <textarea required name="rentout[description]" id="description" type="number" placeholder="<?php echo icl_t('Theme-form', 'Description placeholder'); ?>" class="c-text-input c-text-input--textarea"><?php echo esc_textarea( $_POST['rentout']['description'] ); ?></textarea>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="u-hard--sides">
                            <h2 class="u-flush--bottom">
                                <?php the_field('utilities-heading'); ?>
                            </h2>
                            <p><?php the_field('utilities-text'); ?></p>
                            <ul class="o-grid o-grid--matrix">
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
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
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
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
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
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
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
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
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
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
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
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
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
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
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
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
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
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
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
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
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
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
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
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
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
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
                                <li class="o-grid__item u-1/2 u-1/3@xs-up u-1/4@sm-up u-1/5@lg-up">
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
                        <li class="u-hard--sides">
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
                                                        <strong><?php echo icl_t('Theme-form', 'Date'); ?>:</strong>
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
                                                        <strong><?php echo icl_t('Theme-form', 'Time'); ?>:</strong>
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
                        <li class="u-hard--sides">
                            <h2 class="u-flush">
                                <?php the_field('images-heading'); ?>
                            </h2>
                            <p><?php the_field('images-text'); ?></p>
                            <ul class="o-grid o-grid--matrix u-flush--bottom" id="preview-images">

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
                        <?php /*
                        <li class="u-hard--sides">
                            <h2 class="u-flush">
                                <?php the_field('your_info-heading'); ?>
                            </h2>
                            <p><?php the_field('your_info-text'); ?></p>
                            <ul class="o-grid o-grid--matrix">
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="firstname" <?php if( $val->rapCheckError('rentout-firstname') ) echo $error_style; ?>>
                                                <strong><?php echo icl_t('Theme-form', 'Forename'); ?>:</strong>
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
                                                <strong><?php echo icl_t('Theme-form', 'Surname'); ?>:</strong>
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
                                            <label for="telephone" <?php if( $val->rapCheckError('rentout-telephone') ) echo $error_style; ?>>
                                                <strong><?php echo icl_t('Theme-form', 'Telephone'); ?>:</strong>
                                            </label>
                                        </li>
                                        <li>
                                            <input required type="tel" name="rentout[telephone]" id="telephone" class="c-text-input c-text-input--lg" placeholder="+46700 00 00 00" value="<?php esc_html_e( $_POST['rentout']['telephone'] ); ?>">
                                        </li>
                                    </ul>
                                </li>
                                <li class="o-grid__item u-1/2@sm-up">
                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                        <li>
                                            <label for="email" <?php if( $val->rapCheckError('rentout-email') ) echo $error_style; ?>>
                                                <strong><?php echo icl_t('Theme-form', 'E-mail'); ?>:</strong>
                                            </label>
                                        </li>
                                        <li>
                                            <input required type="email" name="rentout[email]" id="email" class="c-text-input c-text-input--lg" placeholder="mail@mail.se" value="<?php esc_html_e( $_POST['rentout']['email'] ); ?>">
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        */ ?>
                        <li class="u-hard--sides">
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
                        <li class="u-hard--sides">
                            <button type="submit" class="c-btn c-btn--xl c-btn--alpha">
                                <?php echo icl_t('Theme-form', 'Send object'); ?>
                            </button>
                        </li>
                    </ul>
                </div>
            </form>
        </section>

	</main>
</div>

<?php get_footer(); ?>
