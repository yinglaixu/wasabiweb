<?php
/*
Template Name: Service
*/
?>

<?php get_header(); ?>
<div class="c-page-content js-page-content" id="mainContent">
    <div class="c-site-header-placeholder">
    </div>

	<main role="main">
        <?php get_template_part('partials/subpage-banner'); ?>

        <section>
            <div class="o-section o-site-wrap o-site-wrap--padding">
                <ul class="[ c-ui-list c-ui-list--dark ] u-hard--ends [ u-clean--top u-clean--bottom ]">
                    <li class="u-hard--sides">
                        <div class="o-flag">
                            <div class="o-flag__body u-block@sm-down u-push--bottom@sm-down">
                                <h1 class="u-flush--bottom">
                                    <?php the_title(); ?>
                                </h1>
                            </div>
                            <div class="o-flag__component u-block@sm-down">
                                <?php get_template_part( 'partials/subpage-nav' ); ?> 
                            </div>
                        </div>
                    </li>
                    <li class="u-hard"></li>
                </ul>
                <article>
                    <div class="o-grid">
                        <div class="o-grid__item u-2/3@sm-up">
                            <h4 class="o-section u-hard--bottom"> <?php the_field("heading"); ?></h4>
                            <div class="u-hard--bottom">
                                <ul class="[ c-ui-list c-ui-list--dark ] u-hard--ends [ u-clean--top u-clean--bottom ]">
                                    <li class="u-hard--sides" id="service-form">
                                        <h2><?php  echo get_field('service_title');?></h2>
                                        <?php
                                        $val = $GLOBALS['simplerap'];
                                        $error_style = 'style="color:red"';

                                        if( $val->rapCheckError('service-mail-fail') ) :
                                        ?>
                                            <span style="color: red">Något gick fel, försök igen lite senare eller ta kontakt med oss direkt via telefon/e-post</span>
                                        <?php endif; ?>

                                        <form class="c-block-form" method="post" action="#service-form">
                                            <input type="hidden" name="serviceform" value="true">
                                            <input type="hidden" name="formname" value="serviceform">
                                            <ul class="o-grid o-grid--matrix">
                                                <li class="o-grid__item u-1/2@sm-up">
                                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                                        <li>
                                                            <label for="name" <?php if( $val->rapCheckError('service-name') ) echo $error_style; ?>>
                                                                <strong><?php echo icl_t('Theme-form', 'Name'); ?>*:</strong>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input required type="text" name="service[name]" id="name" class="c-text-input c-text-input--lg" placeholder="<?php echo icl_t('Theme-form', 'Name placeholder'); ?>" value="<?php esc_html_e( $_POST['service']['name'] ); ?>">
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="o-grid__item u-1/2@sm-up">
                                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                                        <li>
                                                            <label for="email" <?php if( $val->rapCheckError('service-email') ) echo $error_style; ?>>
                                                                <strong><?php echo icl_t('Theme-form', 'E-mail'); ?>*:</strong>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input required type="email" name="service[email]" id="email" class="c-text-input c-text-input--lg" placeholder="<?php _e("mail@mail.se"); ?>" value="<?php esc_html_e( $_POST['service']['email'] ); ?>">
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="o-grid__item u-1/2@sm-up">
                                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                                        <li>
                                                            <label for="telephone">
                                                                <strong><?php echo icl_t('Theme-form', 'Telephone'); ?>:</strong>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input type="tel" name="service[telephone]" id="telephone" class="c-text-input c-text-input--lg" placeholder="<?php _e("+46 700 - 00 00 00"); ?>" value="<?php esc_html_e( $_POST['service']['telephone'] ); ?>">
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="o-grid__item u-1/2@sm-up">
                                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                                        <li>
                                                            <div>
                                                                <strong> Service:</strong>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="c-styled-select js-select">
                                                                <?php
                                                                $service = $_POST['service']['service'];
                                                                $service = $service ?: get_field('service_services')[0]['service'];
                                                                ?>
                                                                <label class="c-styled-select__label c-styled-select__label--sm">
                                                                    <span class="js-styled-select-text">
                                                                        <?php echo $service; ?>
                                                                    </span>
                                                                    <svg class="c-styled-select__chevron">
                                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-chevron"></use>
                                                                    </svg>
                                                                </label>
                                                                <select class="c-styled-select__select" name="service[service]">
                                                                    <?php if( have_rows('service_services') ) : while( have_rows('service_services') ) : the_row(); ?>
                                                                        <?php $current = get_sub_field('service'); ?>
                                                                        <option value="<?php echo $current; ?>" <?php if( $current === $service ) echo "selected"; ?>><?php echo $current; ?></option>
                                                                    <?php endwhile; endif; ?>
                                                                </select>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <!--                                country-->
                                                <li class="o-grid__item u-1/2@sm-up">
                                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                                        <li>
                                                            <label>
                                                                <strong><?php echo icl_t('Theme-form', 'Country'); ?>*:</strong>
                                                            </label>
                                                        </li>

                                                        <li>
                                                            <div class="c-styled-select js-select">
                                                                <?php
                                                                $country = $_POST['service']['country'];
                                                                $country = $country ?: get_field('service_countries')[0]['service_country'];
                                                                ?>
                                                                <label class="c-styled-select__label c-styled-select__label--sm">
                                                                    <span class="js-styled-select-text">
                                                                        <?php echo $country; ?>
                                                                    </span>
                                                                    <svg class="c-styled-select__chevron">
                                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-chevron"></use>
                                                                    </svg>
                                                                </label>
                                                                <select class="c-styled-select__select" name="service[country]">
                                                                    <?php if( have_rows('service_countries') ) : while( have_rows('service_countries') ) : the_row(); ?>
                                                                        <?php $current = get_sub_field('service_country'); ?>
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
                                                                <strong><?php echo icl_t('Theme-form', 'City'); ?>*:</strong>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <div class="c-styled-select js-select">
                                                                <?php
                                                                $city = $_POST['service']['city'];
                                                                $city = $city ?: get_field('service_cities')[0]['service_city'];
                                                                ?>
                                                                <label class="c-styled-select__label c-styled-select__label--sm">
                                                                    <span class="js-styled-select-text">
                                                                        <?php echo $city; ?>
                                                                    </span>
                                                                    <svg class="c-styled-select__chevron">
                                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-chevron"></use>
                                                                    </svg>
                                                                </label>
                                                                <select class="c-styled-select__select" name="service[city]">
                                                                    <?php if( have_rows('service_cities') ) : while( have_rows('service_cities') ) : the_row(); ?>
                                                                        <?php $current = get_sub_field('service_city'); ?>
                                                                        <option value="<?php echo $current; ?>" <?php if( $current === $city ) echo "selected"; ?>> <?php echo $current; ?> </option>
                                                                    <?php endwhile; endif; ?>
                                                                </select>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="o-grid__item u-1/2@sm-up">
                                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                                        <li>
                                                            <label for="address" <?php if( $val->rapCheckError('service-address') ) echo $error_style; ?>>
                                                                <strong><?php echo icl_t('Theme-form', 'Address'); ?>*:</strong>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input required type="text" name="service[address]" id="service-address" class="c-text-input c-text-input--lg" placeholder="<?php echo icl_t('Theme-form', 'Address placeholder'); ?>" value="<?php esc_html_e( $_POST['service']['address'] ); ?>">
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="o-grid__item u-1/2@sm-up">
                                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                                        <li>
                                                            <label for="squaremeters">
                                                                <strong> <?php echo icl_t('Theme-form', 'Size'); ?>*:</strong>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input required type="text" name="service[volume]" id="service-volume" class="c-text-input c-text-input--lg" placeholder="85" value="<?php esc_html_e( $_POST['service']['volume'] ); ?>">
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="o-grid__item">
                                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                                        <li>
                                                            <label for="message" <?php if( $val->rapCheckError('service-message') ) echo $error_style; ?>>
                                                                <strong><?php echo icl_t('Theme-form', 'Message'); ?>*:</strong>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <textarea required name="service[message]" id="message" class="c-text-input c-text-input--textarea" placeholder="<?php echo icl_t('Theme-form', 'Message'); ?>..."><?php echo esc_textarea( $_POST['service']['message'] ); ?></textarea>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="o-grid__item">
                                                    <button type="submit" class="c-btn c-btn--lg c-btn--full c-btn--alpha">
                                                        <?php echo icl_t('Theme-form', 'Send'); ?>
                                                    </button>
                                                </li>
                                            </ul>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="o-grid__item u-1/3@sm-up">
                            <div class="o-section">
                                <ul class="o-bare-list o-bare-list--spaced-half">
                                    <?php if( have_rows('usps') ) : while( have_rows('usps') ) : the_row(); ?>
                                        <li class="c-svg-icon c-svg-icon--tick">
                                            <svg class="c-svg-icon__svg c-svg-icon--tick__svg">
                                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick"></use>
                                            </svg>
                                            <?php the_sub_field('usp'); ?>
                                        </li>
                                    <?php endwhile; endif; ?>
                                </ul>
                                <div class="u-soft--top">
                                    <a href="<?php the_field('button-link'); ?>" class="c-btn c-btn--brand c-btn--md">
                                        <?php the_field('button-text'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>

	</main>
</div>

<?php get_footer(); ?>
