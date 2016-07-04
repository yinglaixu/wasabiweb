<?php
/*
Template Name: About/Text page
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
                                    <?php  echo get_field('employ_title');?>
                                </h1 class="u-flush--bottom">
                                <h3>
                                    <?php  echo get_field('employ_subtitle');?>
                                </h3>
                            </div>
                            <div class="o-flag__component u-block@sm-down">
                                <?php get_template_part('partials/subpage-nav'); ?>
                            </div>
                        </div>
                    </li>
                    <li class="u-hard"></li>
                </ul>
                <article>
                    <div class="o-grid">
                        <div class = "o-grid__item u-3/3@sm-up">
                            <div class="o-section u-hard--bottom">
                                <div>
                                    <div>
                                        <h2><?php  echo get_field('employ_title_1');?></h2>
                                    </div>
                                    <p><?php  echo get_field('employ_content_1');?></p>
                                </div>
<!--                                bosss-->
                                <div>
                                    <ul class="[ o-grid o-grid--matrix ] u-soft--top">
                                        <?php
                                        $args = [
                                            'post_type' => 'employee',
                                            'post_status' => 'publish',
                                            'posts_per_page' => -1,
                                            'orderby' => 'date',
                                            'order' => 'ASC',
                                        ];

                                        $args['meta_query'] = [
                                            [
                                                'key' => 'empl_is_assitant',
                                                'value' => 0,
                                                'compare' => '===',
                                            ]
                                        ];
                                        $query = new WP_Query( $args );
                                        if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
                                        ?>
                                            <li class="o-grid__item u-1/2@xs-up u-1/4@md-up">
                                                <?php get_template_part('partials/about-employee'); ?>
                                            </li>
                                        <?php endwhile; endif; wp_reset_postdata(); ?>
                                    </ul>
                                </div>
<!--                                assistants-->
                                <div>
                                    <div class = "aboutme-sub-title">
                                        <h2><?php  echo get_field('employ_title_2');?></h2>
                                    </div>
                                    <p><?php  echo get_field('employ_content_2');?></p>

                                    <ul class="[ o-grid o-grid--matrix ] u-soft--top">
                                        <?php
                                        $args = [
                                            'post_type' => 'employee',
                                            'post_status' => 'publish',
                                            'posts_per_page' => 6,
                                            'orderby' => 'date',
                                            'order' => 'ASC',
                                        ];

                                        $args['meta_query'] = [
                                            [
                                                'key' => 'empl_is_assitant',
                                                'value' => 0,
                                                'compare' => '!=',
                                            ]
                                        ];
                                        $query = new WP_Query( $args );
                                        if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
                                            ?>
                                            <li class="o-grid__item u-1/2@xs-up u-1/4@md-up">
                                                <?php get_template_part('partials/about-employee'); ?>
                                            </li>
                                        <?php endwhile; endif; wp_reset_postdata(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </article> 
            </div>
        
        </section>

        <section class = 'map-wrap u-soft--top employ-map employ-map'>
            <div class = 'o-section o-site-wrap o-site-wrap--padding'>
                <!--                                map-->
                <div class = 'o-grid'>
                    <ul class = 'o-grid__item u-1/4@sm-up u-soft--top' style = 'list-style: none; margin-left: 0px;'>
                        <li class = "employ-wrap--item">
                            <div class = "u-text-center">
                                <div class = "c-svg-icon c-svg-icon--aboutus-side">
                                    <svg class="c-svg-icon__svg c-svg-icon--aboutus-side__svg">
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-aboutus-landlord"></use>
                                    </svg>
                                    <strong><?php echo icl_t('Theme-about-us', 'intro-1'); ?></strong>
                                    <h2>200+</h2>
                                </div>
                            </div>
                        </li>
                        <li class = "employ-wrap--item">
                            <div class = "c-svg-icon c-svg-icon--aboutus-side u-text-center">
                                <svg class="c-svg-icon__svg c-svg-icon--aboutus-side__svg">
                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-aboutus-real-estate"></use>
                                </svg>
                                <strong><?php echo icl_t('Theme-about-us', 'intro-2'); ?></strong>
                                <h2>6000 m<sup>2+</sup></h2>
                            </div>
                        </li>
                        <li class = "employ-wrap--item">
                            <div class = "c-svg-icon c-svg-icon--aboutus-side u-text-center">
                                <svg class="c-svg-icon__svg c-svg-icon--aboutus-side__svg">
                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-aboutus-view"></use>
                                </svg>
                                <strong><?php echo icl_t('Theme-about-us', 'intro-3'); ?></strong>
                                <h2><?php echo icl_t('Theme-about-us', 'intro-4'); ?></h2>
                            </div>
                        </li>
                    </ul>
                    <div class = 'o-grid__item u-2/3@sm-up'>

                        <div class="c-svg-icon c-svg-icon--aboutus-map u-text-center">
                            <h1 style="color: #EE7844"> <?php  echo get_field('employ_map_title');?></h1>
                            <svg class="c-svg-icon__svg c-svg-icon--aboutus-map__svg">
                                <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-aboutus-map"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>

	</main>
</div>

<?php get_footer(); ?>

<style>

.aboutme-sub-title{ margin-top: 50px; margin-bottom: 30px;}

</style>
