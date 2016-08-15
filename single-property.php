<?php get_header(); ?>
<div class="c-page-content js-page-content" id="mainContent">
    <div class="c-site-header-placeholder">
    </div>
    
    <main role="main">

        <article>
            <div class="o-section o-site-wrap o-site-wrap--padding">
                <div class="c-slider-wrap">
                    <div class="c-slider js-slider hard--bottom" id="single-property-slider">
                        <?php
                        $number_slides = count( get_field('images') );
                        if( have_rows('images') ) : while( have_rows('images') ) : the_row();
                         ?>
                            <div class="c-slider__slide"> 
                                <div class="c-img-control-wrap js-img-control-wrap">
                                    <div class="c-img-control-wrap__inner js-img-control-wrap__inner">
                                        <?php // 1170x700 ?>
                                        <?php // ensure data-attrs are populated with actual image dimensions. ?>
                                        <?php $image = get_sub_field('image'); ?>
                                        <img src="<?php bloginfo('template_directory'); ?>/build/img/blank.gif"
                                            class="c-img-control-wrap__img js-img-control"
                                            data-lg-src="<?php echo $image['sizes']['1170x700']; ?>"
                                            data-lg-width="<?php echo $image['sizes']['1170x700-width']; ?>"
                                            data-lg-height="<?php echo $image['sizes']['1170x700-height']; ?>"
                                            data-sm-src="<?php echo $image['sizes']['500x299']; ?>"
                                            data-sm-width="<?php echo $image['sizes']['500x299-width']; ?>"
                                            data-sm-height="<?php echo $image['sizes']['500x299-height']; ?>"
                                            data-fluid="true"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; endif; ?>
                    </div>
                    <?php if ($number_slides > 1) : ?>
                    <button class="c-slider-toggle c-slider-toggle--left" id="single-property-slider-left-arrow">
                        <svg class="c-slider-toggle__chevron c-slider-toggle__chevron--left">
                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-chevron"></use>
                        </svg> 
                    </button>
                    <button class="c-slider-toggle c-slider-toggle--right" id="single-property-slider-right-arrow">
                        <svg class="c-slider-toggle__chevron">
                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-chevron"></use>
                        </svg> 
                    </button>
                    <?php endif; ?>
                </div>

                <div class="o-grid">
                    <div class="o-grid__item u-2/3@sm-up">
                        <div class="o-section u-hard--bottom">
                            <ul class="[ c-ui-list c-ui-list--dark ] u-hard--ends [ u-clean--top u-clean--bottom ]">
                                <li class="u-hard--sides">
                                    <h1 class="u-push-half--bottom"><?php the_field('area'); ?></h1>
                                    <ul class="o-inline-list o-breadcrumbs">
                                        <li class="u-txt-md">
                                            <?php the_field('overview_text'); ?>
                                        </li>
                                        <li data-breadcrumb="|" class="u-txt-md">
                                            <?php the_field('address'); ?>
                                        </li>
                                    </ul>
                                </li>
                                <li class="u-hard--sides">
                                    <h2 class="u-push-half--bottom">
                                        <?php echo icl_t('Theme-properties', 'Housing'); ?>
                                    </h2>
                                    <ul class="o-grid o-grid--matrix">
                                        <?php
                                        $from = new DateTime( get_field( 'date_from' ) );
                                        if( get_field('date_to') ) {
                                            $to = new DateTime( get_field( 'date_to' ) );
                                            $to = date( 'd F Y', $to->getTimestamp() );
                                        } else {
                                            $to = icl_t('Theme-properties', 'Until further notice');
                                        }
                                        ?>
                                        <li class="o-grid__item u-1/2@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-calendar"></use>
                                                </svg>
                                                <strong><?php echo icl_t('Theme-properties', 'Available from'); ?>:</strong> <?php echo date( 'd F Y', $from->getTimestamp() ); ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-calendar"></use>
                                                </svg>
                                                <strong><?php echo icl_t('Theme-properties', 'Available to'); ?>:</strong> <?php echo $to; ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-box"></use>
                                                </svg>
                                                <strong><?php echo icl_t('Theme-form', 'Rooms'); ?>:</strong> <?php the_field('rooms'); ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-arrows"></use>
                                                </svg>
                                                <strong><?php echo icl_t('Theme-properties', 'Size'); ?>:</strong><?php the_field('volume'); ?> m<sup>2</sup>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="u-hard--sides">
                                    <h2 class="u-push-half--bottom">
                                        <?php echo icl_t('Theme-properties', 'Utilities'); ?>
                                    </h2>
                                    <?php $utils = get_field('utilities'); ?>
                                    <ul class="o-grid o-grid--matrix">
                                        <li class="o-grid__item u-1/2@xs-up u-1/3@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail <?php if( ! in_array('furniture', $utils) ) echo 'is-not-available'; ?>">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg c-svg-icon--property-detail__svg--short">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-sofa"></use>
                                                </svg>
                                                <?php echo icl_t('Theme-form-options', 'Furniture'); ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@xs-up u-1/3@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail <?php if( ! in_array('heat', $utils) ) echo 'is-not-available'; ?>">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-thermometer"></use>
                                                </svg>
                                                <?php echo icl_t('Theme-form-options', 'Heat'); ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@xs-up u-1/3@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail <?php if( ! in_array('water', $utils) ) echo 'is-not-available'; ?>">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-water"></use>
                                                </svg>
                                                <?php echo icl_t('Theme-form-options', 'Water'); ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@xs-up u-1/3@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail <?php if( ! in_array('dishwasher', $utils) ) echo 'is-not-available'; ?>">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-dishwasher"></use>
                                                </svg>
                                                <?php echo icl_t('Theme-form-options', 'Dishwasher'); ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@xs-up u-1/3@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail <?php if( ! in_array('wheelchair', $utils) ) echo 'is-not-available'; ?>">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-wheelchair"></use>
                                                </svg>
                                                <?php echo icl_t('Theme-form-options', 'Wheelchair access'); ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@xs-up u-1/3@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail <?php if( ! in_array('pets', $utils) ) echo 'is-not-available'; ?>">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-dog"></use>
                                                </svg>
                                                <?php echo icl_t('Theme-form-options', 'Pets'); ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@xs-up u-1/3@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail <?php if( ! in_array('shower', $utils) ) echo 'is-not-available'; ?>">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-shower"></use>
                                                </svg>
                                                <?php echo icl_t('Theme-form-options', 'Shower'); ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@xs-up u-1/3@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail <?php if( ! in_array('smoking', $utils) ) echo 'is-not-available'; ?>">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg c-svg-icon--property-detail__svg--short"> 
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-cigarette"></use>
                                                </svg>
                                                <?php echo icl_t('Theme-form-options', 'Smoking'); ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@xs-up u-1/3@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail <?php if( ! in_array('washing_machine', $utils) ) echo 'is-not-available'; ?>">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-washing-machine"></use>
                                                </svg>
                                                <?php echo icl_t('Theme-form-options', 'Washing machine'); ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@xs-up u-1/3@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail <?php if( ! in_array('toilet', $utils) ) echo 'is-not-available'; ?>">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-toilet"></use>
                                                </svg>
                                                <?php echo icl_t('Theme-form-options', 'Toilet'); ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@xs-up u-1/3@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail <?php if( ! in_array('wifi', $utils) ) echo 'is-not-available'; ?>">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-wifi"></use>
                                                </svg>
                                                <?php echo icl_t('Theme-form-options', 'Wi-Fi'); ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@xs-up u-1/3@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail <?php if( ! in_array('tv', $utils) ) echo 'is-not-available'; ?>">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tv"></use>
                                                </svg>
                                                <?php echo icl_t('Theme-form-options', 'TV'); ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@xs-up u-1/3@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail <?php if( ! in_array('parking', $utils) ) echo 'is-not-available'; ?>">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-parking"></use>
                                                </svg>
                                                <?php echo icl_t('Theme-form-options', 'Parking'); ?>
                                            </div>
                                        </li>
                                        <li class="o-grid__item u-1/2@xs-up u-1/3@md-up">
                                            <div class="c-svg-icon c-svg-icon--property-detail <?php if( ! in_array('electricity', $utils) ) echo 'is-not-available'; ?>">
                                                <svg class="c-svg-icon__svg c-svg-icon--property-detail__svg">
                                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-electricity"></use>
                                                </svg>
                                                <?php echo icl_t('Theme-form-options', 'Electricity'); ?>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li class="o-paragraph-group u-hard--sides">
                                    <h2 class="u-push-half--bottom">
                                        <?php echo icl_t('Theme-properties', 'About the property'); ?>
                                    </h2>
                                    <?php the_content(); ?>
                                </li>
                                <li class="u-hard--sides js-gallery">
                                    <h2 class="u-push-half--bottom">
                                        <?php echo icl_t('Theme-properties', 'Gallery'); ?>
                                    </h2>
                                    <div class="c-gallery [ o-grid o-grid--matrix ] js-gallery">
                                        <?php
                                        $total_imgs = count( get_field('images') );
                                        $rest_images = $total_imgs - 4;
                                        ?>
                                        <?php $i=0; if( have_rows('images') ) : while( have_rows('images') ) : the_row(); $i++; ?>
                                            <figure class="c-gallery__item o-grid__item u-1/2 u-1/3@xs-up u-1/4@md-up" itemprop="associatedMedia">
                                                <?php // 500x299thumbnail the large image can be any reasonable size ?>
                                                <?php // data-size takes the dimensions of the large image ?>
                                                <?php $image = get_sub_field('image'); ?>
                                                <a href="<?php echo $image['sizes']['2500x9999']; ?>"
                                                    itemprop="contentUrl" 
                                                    data-size="<?php printf('%sx%s', $image['sizes']['2500x9999-width'], $image['sizes']['2500x9999-height'] ); ?>">
                                                    <img src="<?php echo $image['sizes']['500x299']; ?>"
                                                        itemprop="thumbnail"
                                                        alt="">
                                                </a>
                                                <figcaption>
                                                    <?php the_sub_field('caption'); ?>
                                                </figcaption>
                                                <?php if ($i === 4 && $rest_images > 0 ) : ?>
                                                    <?php $str = sprintf("+ %d  till", $rest_images); ?>
                                                    <div class="c-gallery-item__overlay c-gallery-item__overlay@md-up">
                                                        <div class="o-flag u-fill-height">
                                                            <div class="o-flag__body u-text-center u-txt-md">
                                                                <?php echo $str; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif;  ?>
                                            </figure>                                                
                                        <?php endwhile; endif; ?>
                                    </div>
                                </li>
                                <li class="u-hard--sides">
                                    <h2 class="u-push-half--bottom">
                                        <?php echo icl_t('Theme-properties', 'Location'); ?>
                                    </h2>
                                    <div class="c-googlemap">
                                        <div class="c-googlemap__inner">
                                            <div class="c-googlemap__map js-googlemap"
                                                data-marker-url="<?php bloginfo('template_directory'); ?>/build/img/map-marker.png"
                                                data-map-settings="<?php bloginfo('template_directory'); ?>/json-settings/googlemaps/single-property-map.json">
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="o-grid__item u-1/3@sm-up">
                        <div class="o-section u-hard--bottom u-soft--left@lg-up">
                            <ul class="o-bare-list o-bare-list--spaced-half">
                                <li>
                                    <?php get_template_part('partials/contact-module-single-property'); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </article>  

        <section class="o-section u-border--top">
            <div class="o-site-wrap o-site-wrap--padding">
                <h1>
                    <?php echo icl_t('Theme-properties', 'Related properties'); ?>
                </h1>
                <ul class="c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]">
                    <?php
                    $country = wp_get_post_terms( $post->ID, 'property-countries' )[0]->slug;
                    $city = wp_get_post_terms( $post->ID, 'property-cities' )[0]->slug;
                    $args = [
                        'post_type' => 'property',
                        'post_status' => 'publish',
                        'meta_key' => 'price',
                        'orderby' => 'meta_value_num',
                        'order' => 'asc',
                        'no_found_rows' => true,
                        'post__not_in' => [ $post->ID ],
                        'tax_query' => [
                            'relation' => 'AND',
                            [
                                'taxonomy'  => 'property-countries',
                                'field'     => 'slug',
                                'terms'     => [ $country ],
                            ],
                            [
                                'taxonomy'  => 'property-cities',
                                'field'     => 'slug',
                                'terms'     => [ $city ],
                            ],
                        ]
                    ];
                    $query = new WP_Query( $args );
                    $i = 1; if( $query->have_posts() ) : while( $query->have_posts() && $i < 6 ) : $query->the_post();
                    ?>
                        <li class="u-hard--sides">
                            <?php get_template_part('partials/property-overview'); ?>
                        </li>
                    <?php $i++; endwhile; endif; wp_reset_postdata(); ?>
                </ul>
            </div>
        </section>

	</main>
</div>
<div class="photoswipe-wrap">
    <?php get_template_part('partials/photoswipe-placeholder'); ?>
</div>

<script>var mapInformationForListing = <?php echo ww_get_map_information_single(); ?></script>

<?php get_footer(); ?>
