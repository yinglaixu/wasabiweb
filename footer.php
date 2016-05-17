<div class="c-site-footer-wrap">
<!--     <div class="c-block-slider">
        <div class="o-site-wrap o-site-wrap--padding">
            <div id="block-slider">
                <div class="js-block-slider__wrap">
                    <ul class="[ o-grid o-grid--center ] js-block-slider__items">
                        <?php
                        $args = [
                            'post_type' => 'partner',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                            'orderby' => 'menu_order',
                            'order' => 'asc',
                        ];
                        $query = new WP_Query( $args );
                        if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
                        ?>
                            <li class="o-grid__item [ u-1/2 u-1/3@xs-up u-1/5@md-up ]">
                               <div class="c-img-control-wrap u-center-block js-img-control-wrap">
                                    <div class="c-img-control-wrap__inner u-no-bg js-img-control-wrap__inner">
                                        <?php // 250x100 ?>
                                        <?php // data attrs should be 1/2 actual value for retina ?>
                                        <?php $image = get_field('logo'); ?>
                                        <img src="<?php bloginfo('template_directory'); ?>/build/img/blank.gif"
                                            class="c-img-control-wrap__img js-img-control"
                                            data-lg-src="<?php echo $image['sizes']['250x100']; ?>"
                                            data-lg-width="<?php echo ($image['sizes']['250x100-width'] / 2); ?>"
                                            data-lg-height="<?php echo ($image['sizes']['250x100-height'] / 2); ?>"
                                            data-fluid="true"
                                            alt="">
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                    </ul>                    
                </div>                    
            </div>    
        </div>
        <div class="c-divider c-divider--angled">
            <img class="c-divider__img" src="<?php bloginfo('template_directory'); ?>/build/img/divider-angled-large.svg" alt="">                
        </div>    
    </div> -->

    <footer class="c-site-footer o-bare-links" role="contentinfo">
<!--        the first part of the footer-->
        <div class="[ o-site-wrap o-site-wrap--padding ] o-section">
            <div class="o-grid o-grid--matrix o-grid--equal-height">
                <div class="o-grid__item u-1/4@sm-up">
                    <ul class = "footer-icon">
                        <li>
                            <a href="<?php echo icl_get_home_url(); ?>" class="c-site-header__logo c-site-logo u-soft--bottom@md-down">
                                <img class="c-site-logo__img u-svg" src="<?php bloginfo('template_directory'); ?>/build/img/site-logo.svg" alt="<?php bloginfo('name'); ?>">
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="o-grid__item u-7/12@sm-up u-txt-xs">
                    <?php get_sidebar(); ?>
<!--                    <ul class="[ o-inline-list o-inline-list--spaced ] u-txt-uppercase">-->
<!--                        --><?php
//                        $args = array(
//                            'theme_location'  => 'footer',
//                            'container'       => false,
//                            'items_wrap'      => '%3$s'
//                        );
//                        wp_nav_menu($args);
//                        ?>
<!--                        <li class="u-block@xs-down u-push-half--top@sm-down">-->
<!--                            <a href="--><?php //echo icl_t('Theme-header', "Rent out link"); ?><!--" class="[ c-btn c-btn--sm c-btn--gamma ] u-txt-normal-weight">-->
<!--                                --><?php //echo icl_t('Theme-header', "Rent out"); ?>
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
                </div>

                <div class="o-grid__item u-1/6@sm-up">
                    <ul class = "footer-icon">
                        <li id = "footer-rent-out-button">
                            <a href="<?php echo icl_t('Theme-header', "Rent out link"); ?>" class="[ c-btn c-btn--sm c-btn--gamma ] u-txt-normal-weight">
                                <?php echo icl_t('Theme-header', "Rent out"); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="o-grid o-grid--matrix">
                <div class="o-grid_item">
                    <?php get_template_part('partials/social-follow-bar'); ?>
                </div>
            </div>
        </div>

<!--        the bottom footer with email and address-->
        <div class="c-site-footer__bottom">
        	<div class="o-site-wrap o-site-wrap--padding">
                <div class="c-site-footer__layout">
                    <div class="c-site-footer__layout-item">
                        <ul class="[ o-inline-list o-inline-list--spaced ] u-txt-zeta">
<!--                            <li class="u-txt-xs">-->
<!--                                <strong class="u-txt-eta">--><?php //echo icl_t('theme-form', "Telephone"); ?><!-- :</strong>-->
<!--                                <a href="tel:--><?php //the_field('telephone_link', 'options'); ?><!--">--><?php //the_field('telephone', 'options'); ?><!--</a>-->
<!--                            </li>-->
                            <li class="u-txt-xs">
                                <strong class="u-txt-eta"><?php echo icl_t('Theme-form', "E-mail"); ?> : </strong>
                                <a href="mailto:<?php the_field('email', 'options'); ?>"><?php the_field('email', 'options'); ?></a>
                            </li>
                            <li class="u-txt-xs">
                                <strong class="u-txt-eta"><?php echo icl_t('Theme-form', 'Address'); ?> : </strong>
                                <span><?php printf( '%s, %s %s', get_field('address', 'options'), get_field('zipcode', 'options'), get_field('city', 'options') ); ?>, <?php _e("Sverige"); ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="c-site-footer__layout-item c-site-footer__layout-item--right">
                        <ul class="o-inline-list o-breadcrumbs u-txt-zeta">
                            <li class="u-txt-xs">
                                Copyright <?php echo date(Y); ?> <?php the_field('company_name', 'options'); ?>
                            </li>
                            <li class="u-txt-xs" data-breadcrumb="|">Skapad med
                                <a href="http://wasabiweb.se" rel="nofollow" class="c-svg-icon c-svg-icon--heart" target="_blank" title="Webbyrån Wasabi Web i Uppsala producerade denna webbplats">
                                    <svg class="c-svg-icon__svg c-svg-icon--heart__svg">
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-heart"></use>
                                    </svg>
                                    av wasabiweb
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>                
        </div>
    </footer>
</div>

<div id="modal-dialog">
</div>
<div class="c-show-bp" id="showBp">
</div> 
<div class="c-load-spinner">
</div>

<?php wp_footer(); ?>



<!--[if IE]>
    <script src="<?php bloginfo('template_directory'); ?>/build/js/polyfills/ie-placeholder.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/build/js/polyfills/requestAnimationFrame.min.js"></script>
<![endif]-->
<!--[if lt IE 9]>
    <script src="<?php bloginfo('template_directory'); ?>/build/js/polyfills/respond.min.js"></script>
<![endif]-->

<!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
    window.$zopim||(function(d,s){var z=$zopim=function(c){
        z._.push(c)},$=z.s=
        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute('charset','utf-8');
        $.src='//v2.zopim.com/?3WUC6VbmJhTuP0bMT6M0trCoMbFqHWgU';z.t=+new Date;$.
            type='text/javascript';e.parentNode.insertBefore($,e)})(document,'script');
</script>
<!--End of Zopim Live Chat Script-->

<style>
    .widget_nav_menu{
        position: relative;
        margin-left: 50px;
        float: right;
    }
    .menu{
        list-style: none;
        margin-left: 0px;
    }
    #footer-rent-out-button{
        margin-top: 20px;
        float: right;
    }
    .footer-icon{
        list-style: none;
        margin-left: 0px;
    }
    .widget-title{
        font-size: 1rem;;
    }
</style>

</body>
</html>