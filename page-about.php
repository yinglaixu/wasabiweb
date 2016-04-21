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
                                    <?php the_title(); ?>
                                </h1>
                            </div>
                            <div class="o-flag__component u-block@sm-down">
                                <?php get_template_part('partials/subpage-nav'); ?>
                            </div>
                        </div>
                    </li>
                    <li class="u-hard--sides">
                        <div class="c-img-control-wrap js-img-control-wrap">
                            <div class="c-img-control-wrap__inner js-img-control-wrap__inner">
                                <?php // 1170x9999 ?>
                                <?php // ensure data-attrs are populated with actual image dimensions. ?>
                                <?php $image = get_field('top_image'); ?>
                                <img src="<?php bloginfo('template_directory'); ?>/build/img/blank.gif"
                                    class="c-img-control-wrap__img js-img-control"
                                    data-lg-src="<?php echo $image['sizes']['1170x9999']; ?>"
                                    data-lg-width="<?php echo $image['sizes']['1170x9999-width']; ?>"
                                    data-lg-height="<?php echo $image['sizes']['1170x9999-height']; ?>"
                                    data-fluid="true"
                                    alt="">
                            </div>
                        </div>
                    </li>
                </ul>
                <article>
                    <div class="o-grid">
                        <div class = "o-grid__item u-3/3@sm-up">
                            <div class="o-section u-hard--bottom">
                                <h3><?php the_field('heading'); ?></h3>
                            </div>
                            <div>
                                <div class = "aboutme-sub-title">
                                    <h2>WHAT WE DO</h2>
                                </div>
                                <p><?php the_content(); ?></p>
                                <!-- the images -->
                                <div>
                                    <ul class = "o-grid o-grid--matrix o-grid--equal-height">
                                        <li class = "o-grid__item u-1/3@sm-up">
                                            <div class = "about-item-wrap landlord">
                                                <h1>125<sup>+</sup></h1>
                                                <h3>Total Landlords We Current Help</h3>
                                                
                                            </div>
                                        </li>
                                        <li class = "o-grid__item u-1/3@sm-up">
                                            <div class = "about-item-wrap real-estate">
                                                <h1>3200 m<sup>2+</sup></h1>
                                                <h3>Real Estates Square Meters We Are Taking Care Of</h3>
                                                
                                            </div>
                                        </li>
                                        <li class = "o-grid__item u-1/3@sm-up">
                                            <div class = "about-item-wrap view">
                                                <h1>Over 15000 Times</h1>
                                                <h3>Monthly Views Of Apartments</h3>
                                                
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                            <div>
                                <div class = "aboutme-sub-title">
                                    <h2>WHO WE ARE</h2>
                                </div>
                                <div class="o-site-wrap o-site-wrap--padding">
<!--                                     <h1 class="u-text-center">
                                        <?php echo icl_t('Theme', 'What says Renthias clients'); ?>
                                    </h1> -->
                                    <ul class="[ o-grid o-grid--matrix ] u-soft--top">
                                        <?php
                                        $args = [
                                               'post_type' => 'employee',
                                               'post_status' => 'publish',
                                               'posts_per_page' => -1,
                                               'orderby' => 'date',
                                               'order' => 'ASC',
                                        ];
                                        $query = new WP_Query( $args );
                                        if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
                                        ?>
                                            <li class="o-grid__item u-1/2@md-up">
                                                <?php get_template_part('partials/about-employee'); ?>
                                            </li>
                                        <?php endwhile; endif; wp_reset_postdata(); ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- the old main page -->
<!--                         <div class="o-grid__item u-3/3@sm-up">
                            <div class="o-section u-hard--bottom">
                                <h1><?php the_field('heading'); ?></h1>
                                <?php the_post(); the_content(); ?>
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
                            </div>
                        </div> -->

                        <!-- hide the sidebar here -->
                        <div class="o-grid__item u-1/3@sm-up">
                            <div class="o-section u-hard--bottom u-soft--left@lg-up">
                                <ul class="o-bare-list o-bare-list--spaced-half">
                                    <li>
                                        <?php //get_template_part('partials/contact-module'); ?>
                                    </li>
                                    <li>
                                        <?php //get_template_part('partials/social-follow-bar'); ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
<!--              <div class="c-divider c-divider--curved">
                <img class="c-divider__img" src="<?php bloginfo('template_directory'); ?>/build/img/curved-divider-up.svg" alt="">
            </div>  -->
        
        </section>

<!--           <section class="o-section u-bg-eta">
            <div class="o-site-wrap o-site-wrap--padding">
                <h1 class="u-text-center">
                    <?php echo icl_t('Theme', 'What says Renthias clients'); ?>
                </h1>
                <ul class="[ o-grid o-grid--matrix ] u-soft--top">
                    <?php
                    $args = [
                        'post_type' => 'testimonial',
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
                        'orderby' => 'rand',
                    ];
                    $query = new WP_Query( $args );
                    if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
                    ?>
                        <li class="o-grid__item u-1/2@md-up">
                            <?php get_template_part('partials/testimonial'); ?>
                        </li>
                    <?php endwhile; endif; wp_reset_postdata(); ?>
                </ul>
            </div>
        </section>  -->

	</main>
</div>

<?php get_footer(); ?>

<style>
.empy img { border:2px solid #E49571; border-radius:50%;}
.c-partner-module { background:transparent;}
.o-flag__component img{ max-height:165px;max-width: 165px; }
.o-flag__component { width:200px;}
.o-flag__body {  width:70%;}
.about-item-wrap{ text-align: center;}
.about-item-wrap h1{ padding-top: 50px; padding-bottom: 30px; color: white;}
.about-item-wrap h2{ padding-top: 50px; padding-bottom: 30px; color: white;}
.about-item-wrap h3{ padding-bottom: 5px; color: white;}
.aboutme-sub-title{ margin-top: 50px; margin-bottom: 30px;}
.landlord {background-image: url("<?php bloginfo('template_directory'); ?>/img/media/landlord.png"); }
.real-estate {background-image: url("<?php bloginfo('template_directory'); ?>/img/media/real-estate.png"); }
.view {background-image: url("<?php bloginfo('template_directory'); ?>/img/media/view.png"); }
</style>
