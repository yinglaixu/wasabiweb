<?php
/*
Template Name: Support
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
                            <div class="o-section u-hard--bottom">
                                <ul class="[ c-ui-list c-ui-list--dark ] u-hard--ends [ u-clean--top u-clean--bottom ]">
                                    <li class="u-hard--sides">
                                        <?php the_content(); ?>
                                        <ul class="o-bare-list o-bare-list--spaced">
                                            <li>
                                                <ul class="o-inline-list o-inline-list--spaced-double u-bleed--top u-bleed--bottom">
                                                    
                                                    <?php if( get_field( 'support_email' ) ) : ?>
                                                        <li class="u-soft--ends">
                                                            <a href="mailto:<?php the_field('support_email'); ?>" class="c-alpha-link c-svg-icon c-svg-icon--contact">
                                                                <svg class="c-svg-icon__svg c-svg-icon--contact__svg">
                                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-mail-circle"></use>
                                                                </svg>
                                                                <?php the_field( 'support_email' ); ?>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php if( get_field( 'telephone', 'options' ) ) : ?>
                                                        <li class="u-soft--ends">
                                                            <a href="tel:<?php the_field('telephone_link', 'options'); ?>" class="c-alpha-link c-svg-icon c-svg-icon--contact">
                                                                <svg class="c-svg-icon__svg c-svg-icon--contact__svg">
                                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-telephone-circle"></use>
                                                                </svg>
                                                                <?php the_field( 'telephone', 'options' ); ?>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                </ul>
                                            </li>
                                            <li>
                                                <ul class="o-bare-list">
                                                    <li><?php the_field('address', 'options'); ?></li>
                                                    <li><?php echo sprintf("%s %s", get_field('zipcode', 'options'), get_field('city', 'options')); ?></li>
                                                    <li><?php echo icl_t('Theme', 'Sweden'); ?></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="u-hard--sides" id="support-form">
                                        <h2><?php _e("Kontakta oss") ?></h2>
                                        <?php
                                        $val = $GLOBALS['simplerap'];
                                        $error_style = 'style="color:red"';

                                        if( $val->rapCheckError('support-mail-fail') ) :
                                        ?>
                                            <span style="color: red">Något gick fel, försök igen lite senare eller ta kontakt med oss direkt via telefon/e-post</span>
                                        <?php endif; ?>

                                        <form class="c-block-form" method="post" action="#support-form">
                                            <input type="hidden" name="supportform" value="true">
                                            <input type="hidden" name="formname" value="supportform">
                                            <ul class="o-grid o-grid--matrix">
                                                <li class="o-grid__item u-1/2@sm-up">
                                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                                        <li>
                                                            <label for="name" <?php if( $val->rapCheckError('support-name') ) echo $error_style; ?>>
                                                                <strong><?php echo icl_t('Theme-form', 'Name'); ?>*:</strong>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input required type="text" name="support[name]" id="name" class="c-text-input c-text-input--lg" placeholder="<?php echo icl_t('Theme-form', 'Name placeholder'); ?>" value="<?php esc_html_e( $_POST['support']['name'] ); ?>">
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="o-grid__item u-1/2@sm-up">
                                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                                        <li>
                                                            <label for="email" <?php if( $val->rapCheckError('support-email') ) echo $error_style; ?>>
                                                                <strong><?php echo icl_t('Theme-form', 'E-mail'); ?>*:</strong>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <input required type="email" name="support[email]" id="email" class="c-text-input c-text-input--lg" placeholder="<?php _e("mail@mail.se"); ?>" value="<?php esc_html_e( $_POST['support']['email'] ); ?>">
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
                                                            <input type="tel" name="support[telephone]" id="telephone" class="c-text-input c-text-input--lg" placeholder="<?php _e("+46 700 - 00 00 00"); ?>" value="<?php esc_html_e( $_POST['support']['telephone'] ); ?>">
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="o-grid__item u-1/2@sm-up">
                                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                                        <li>
                                                            <div>
                                                                <strong><?php echo icl_t('Theme-form', 'Problem'); ?>:</strong>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="c-styled-select js-select">
                                                                <?php
                                                                $problem = $_POST['support']['problem'];
                                                                $problem = $problem ?: get_field('support_problems')[0]['problem'];
                                                                ?>
                                                                <label class="c-styled-select__label c-styled-select__label--sm">
                                                                    <span class="js-styled-select-text">
                                                                        <?php echo $problem; ?>
                                                                    </span>
                                                                    <svg class="c-styled-select__chevron">
                                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-chevron"></use>
                                                                    </svg>
                                                                </label>
                                                                <select class="c-styled-select__select" name="support[problem]">
                                                                    <?php if( have_rows('support_problems') ) : while( have_rows('support_problems') ) : the_row(); ?>
                                                                        <?php $current = get_sub_field('problem'); ?>
                                                                        <option value="<?php echo $current; ?>" <?php if( $current === $problem ) echo "selected"; ?>><?php echo $current; ?></option>
                                                                    <?php endwhile; endif; ?>
                                                                </select>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="o-grid__item">
                                                    <ul class="o-bare-list o-bare-list--spaced-sixth">
                                                        <li>
                                                            <label for="message" <?php if( $val->rapCheckError('support-message') ) echo $error_style; ?>>
                                                                <strong><?php echo icl_t('Theme-form', 'Message'); ?>*:</strong>
                                                            </label>
                                                        </li>
                                                        <li>
                                                            <textarea required name="support[message]" id="message" class="c-text-input c-text-input--textarea" placeholder="<?php echo icl_t('Theme-form', 'Message'); ?>..."><?php echo esc_textarea( $_POST['support']['message'] ); ?></textarea>
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
                            <div class="o-section u-hard--bottom u-soft--left@lg-up">
                                <ul class="o-bare-list o-bare-list--spaced-half">
                                    <li>
                                        <?php get_template_part('partials/contact-module'); ?>
                                    </li>
                                    <li>
                                        <?php get_template_part('partials/social-follow-bar'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        </section>

	</main>
</div>

<?php get_footer(); ?>
