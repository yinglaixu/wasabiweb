<aside class="c-site-module">
    <div class="c-site-module__inner">
        <div class="c-site-module__highlight">
            <img class="c-site-module__highlight-img" src="<?php bloginfo('template_directory'); ?>/build/img/divider-angled-small.svg" alt="">                
        </div>
        <div class="c-site-module__head c-site-module__head--brand">
            <div class="o-flag">
                <div class="o-flag__component">
                    <div class="c-site-module__person-photo c-img-control-wrap js-img-control-wrap">
                        <div class="c-img-control-wrap__inner u-circle js-img-control-wrap__inner">
                            <?php // 170x170 ?>
                            <?php // ensure data-attrs are populated with actual image dimensions. ?>
                            <?php $image = get_field('contact_module_image', 'options'); ?>
                            <img src="<?php bloginfo('template_directory'); ?>/build/img/blank.gif"
                                class="c-img-control-wrap__img u-circle js-img-control"
                                data-lg-src="<?php echo $image['sizes']['170x170']; ?>"
                                data-lg-width="85"
                                data-lg-height="85"
                                data-fluid="false"
                                alt="">
                        </div>
                    </div>
                </div>
                <div class="o-flag__body u-soft-half--left">
                    <ul class="o-bare-list">
                        <li>
                            <strong><?php echo icl_t('Theme-form', "Contact us"); ?></strong>
                        </li>
                        <li>
                            <a href="mailto:<?php the_field('email', 'options'); ?>" class="u-txt-xs"><?php the_field('email', 'options'); ?></a>
                        </li>
<!--                        <li>-->
<!--                            <a href="tel:--><?php //the_field('telephone_link', 'options'); ?><!--" class="u-txt-xs">--><?php //the_field('telephone', 'options'); ?><!--</a>-->
<!--                        </li>-->
                    </ul>
                </div>
            </div>
        </div>
        <div class="c-site-module__body o-paragraph-group">
        <div class="c-site-module__divider-arrow-down">
            <div class="c-site-module__divider-arrow-down-inner">
                <img src="<?php bloginfo('template_directory'); ?>/build/img/divider-arrow-down.svg" alt="">                
            </div>         
        </div>
            <h2 class="u-push-half--bottom"><?php echo icl_t('Theme-contact', 'Sidebar heading'); ?></h2>
            <p><?php echo icl_t('Theme-contact', 'Sidebar text'); ?></p>
        </div>
        <div class="c-btn c-btn--lg c-btn--full">
            &nbsp; <?php // placeholder for asbsolutely pos btn ?>
        </div>
        <a href="<?php echo icl_t('Theme-header', "Rent out link"); ?>" class="c-site-module__btn [ c-btn c-btn--brand c-btn--md c-btn--full ] u-sharp">
            <?php echo icl_t('Theme-header', "Rent out"); ?>
        </a>                                                
    </div>
</aside>