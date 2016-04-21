<?php
/*
Template Name: Startpage
*/
?>

<?php get_header(); ?>
<div class="c-page-content js-page-content" id="mainContent">
    <!--<div class="c-site-header-placeholder">
    </div>-->
    
	<main role="main">
        <?php $image = get_field('banner-image'); ?>
        <style scoped>
            /* 500x350 */
            .c-banner__img {
               background-image: url('<?php echo $image['sizes']['500x350']; ?>');
            }
            @media (min-width: 481px) {
                /* 2000x850 */
                .c-banner__img {
                   background-image: url('<?php echo $image['sizes']['2000x850']; ?>');
                }
            }
        </style>
        <section class="c-banner">
            <div class="c-banner__inner">
                <div class="c-divider c-divider--angled">
                    <img class="c-divider__img" src="<?php bloginfo('template_directory'); ?>/build/img/divider-angled-large.svg" alt="">                
                </div>
                <div class="c-banner__img">
                </div>
                <div class="c-banner__overlay">
                    <div class="[ o-site-wrap o-site-wrap--padding ] u-fill-height">
                        <div class="o-flag u-fill-height">
                            <div class="o-flag__body">
                                <div class="c-banner__content">
                                    <h1 class="c-banner__title">
                                        <?php the_field('banner-heading'); ?>
                                    </h1>
                                    <div class="c-banner__sub u-txt-lg">
                                        <p><?php the_field('banner-text'); ?></p>
                                    </div>
                                    <div class="c-banner__ctas">
                                        <ul class="o-grid o-grid--matrix">
                                            <li class="o-grid__item u-1/2@xs-up">
                                                <a href="<?php the_field('banner-first_button-link'); ?>" class="[ c-btn c-btn--xl c-btn--full c-btn--brand ] u-txt-normal-weight">
                                                    <?php the_field('banner-first_button-text'); ?>
                                                </a>
                                            </li>
                                            <li class="o-grid__item u-1/2@xs-up">
                                                <a href="<?php the_field('banner-second_button-link'); ?>" class="[ c-btn c-btn--xl c-btn--full c-btn--beta ] u-txt-normal-weight">
                                                    <?php the_field('banner-second_button-text'); ?>
                                                </a>
                                            </li>
                                        </ul>                                        
                                    </div>
                                </div>                                            
                            </div>
                        </div>
                    </div>
                </div>                            
            </div>
            <div class="c-banner__usps">
                <div class="o-site-wrap o-site-wrap--padding">
                    <ul class="c-banner__usps-inner [ o-inline-list o-inline-list--spaced ]">
                        <?php if( have_rows('banner-usps') ) : while( have_rows('banner-usps') ) : the_row(); ?>
                            <li class="c-banner__usps-item [ c-svg-icon c-svg-icon--tick ]">
                                <svg class="c-svg-icon__svg c-svg-icon--tick__svg">
                                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick"></use>
                                </svg>
                                <?php the_sub_field('text'); ?>
                            </li>
                        <?php endwhile; endif; ?>
                    </ul>                    
                </div>
            </div>
        </section>

        <article class="c-below-banner-article u-bg-eta">
            <div class="o-site-wrap o-site-wrap--padding">
                <div class="o-grid o-grid--matrix">
                    
                    <?php if( get_field( 'top-image' ) ) : ?>
                        <div class="o-grid__item u-1/2@sm-up">
                            
                            <div class="c-below-banner-article__media">
                                <div class="c-img-control-wrap js-img-control-wrap">
                                    <div class="c-img-control-wrap__inner js-img-control-wrap__inner">
                                        
                                        <?php 
                                            // 580x325
                                           // $image = get_field( 'top-image' ); 
										   echo do_shortcode('[rev_slider homslide]'); 
                                        ?>
                                        <?php /*?><img src="<?php bloginfo('template_directory'); ?>/build/img/blank.gif"
                                            class="c-region-block__img c-img-control-wrap__img js-img-control"
                                            data-lg-src="<?php echo $image['sizes']['580x325']; ?>"
                                            data-lg-width="<?php echo $image['sizes']['580x325-width']; ?>"
                                            data-lg-height="<?php echo $image['sizes']['580x325-height']; ?>"
                                            data-fluid="true"
                                            alt="<?php echo $image['alt']; ?>"><?php */?>
                                    </div>
                                </div>
                            </div>                  
                        </div>
                    <?php endif; ?>

                    <div class="o-grid__item u-1/2@sm-up">
                        <h1>
                            <?php the_field('top-heading'); ?>
                        </h1>
                        <?php the_post(); the_content(); ?>
                        <a href="<?php the_field('top-button-link'); ?>" class="c-btn c-btn--md c-btn--brand">
                            <?php the_field('top-button-text'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </article>

        <section class="u-bg-eta u-soft--top@md-up">
            <div class="c-stages o-section">
                <div class="o-site-wrap o-site-wrap--padding">
                    <ol class="o-grid o-grid--matrix">
                        <?php $i = 0; if( have_rows('procedure') ) : while( have_rows('procedure') ) : the_row(); $i++; ?>
                            <li class="c-stages__stage o-grid__item u-1/2@xs-up u-1/4@md-up">
                                <ul class="o-bare-list">
                                    <li class="c-stages__number">
                                        <?php echo $i; ?>
                                    </li>
                                    <li class="c-stages__title u-txt-lg">
                                        <?php the_sub_field('heading'); ?>
                                    </li>
                                    <li>
                                        <?php the_sub_field('text'); ?>
                                    </li>
                                </ul>
                            </li>
                        <?php endwhile; endif; ?>
                    </ol>                                    
                </div>
            </div>
            <div class="c-divider c-divider--curved">
                <img class="c-divider__img" src="<?php bloginfo('template_directory'); ?>/build/img/curved-divider-up.svg" alt="">                
            </div>
        </section>

        <section class="o-section u-bg-eta">
            <div class="[ o-site-wrap o-site-wrap--padding ] u-text-center">
                <div class="o-grid">
                    <div class="o-grid__item u-3/4@md-up u-text-center">
                        <h1>
                            <?php the_field('cities-heading'); ?>
                        </h1>
                        <p><?php the_field('cities-text'); ?></p>
                    </div>
                </div>
                <div class="[ o-grid o-grid--no-gutter ] u-soft--top">
                    <?php
                    $grid = [ 'u-1/4@md-up', 'u-1/2@md-up', 'u-1/4@md-up' ];
                    $i = -1;
                    if( have_rows('cities-cities') ) : while( have_rows('cities-cities') ) : the_row(); $i++;
                    ?>
                        <div class="o-grid__item [ u-1/3@sm-up <?php echo $grid[$i]; ?> ]">
                            <a href="<?php the_sub_field('link'); ?>" class="c-region-block o-ui-link">
                                <div class="c-region-block__inner">
                                    <div class="c-img-control-wrap js-img-control-wrap">
                                        <div class="c-img-control-wrap__inner js-img-control-wrap__inner">
                                            <?php // 800x421 ?>
                                            <?php // ensure data-attrs are populated with actual image dimensions. ?>
                                            <?php $image = get_sub_field('image'); ?>
                                            <img src="<?php bloginfo('template_directory'); ?>/build/img/blank.gif"
                                                class="c-region-block__img c-img-control-wrap__img js-img-control"
                                                data-lg-src="<?php echo $image['sizes']['800x421']; ?>"
                                                data-lg-width="<?php echo $image['sizes']['800x421-width']; ?>"
                                                data-lg-height="<?php echo $image['sizes']['800x421-height']; ?>"
                                                data-fluid="true"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="c-region-block__overlay">
                                    <div class="o-flag u-fill-height">
                                        <div class="o-flag__body">
                                            <div class="c-region-block__title u-txt-lg">
                                                <?php the_sub_field('city'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </section>

        <section>
            <div class="c-divider c-divider--curved">
                <img class="c-divider__img" src="<?php bloginfo('template_directory'); ?>/build/img/curved-divider-down.svg" alt="">                
            </div>
            <div class="o-section">
                <div class="[ o-site-wrap o-site-wrap--padding ] u-text-center">
                    <div class="o-grid">
                        <div class="o-grid__item u-3/4@md-up u-text-center">
                            <h1>
                                <?php the_field('wwd-heading'); ?>
                            </h1>
                            <p><?php the_field('wwd-text'); ?></p>
                        </div>
                    </div>
                    <ul class="o-grid o-grid--matrix o-grid--equal-height">
                        <li class="o-grid__item u-1/2@sm-up">
                            <div class="c-site-module u-bg-eta">
                                <div class="c-site-module__highlight">
                                    <img class="c-site-module__highlight-img" src="<?php bloginfo('template_directory'); ?>/build/img/divider-angled-small.svg" alt="">                
                                </div>
                                    <div class="c-site-module__inner">

                                        <div class="[ c-site-module__head c-site-module__head--brand ] u-txt-xl">
                                            <?php the_field('wwd-rent_out-heading'); ?>
                                        </div>
                                        <div class="c-site-module__body">
                                            <ul class="o-bare-list o-bare-list--spaced-half">
                                                <?php if( have_rows('wwd-rent_out-usps') ) : while( have_rows('wwd-rent_out-usps') ) : the_row(); ?>
                                                    <li class="c-svg-icon c-svg-icon--tick">
                                                        <svg class="c-svg-icon__svg c-svg-icon--tick__svg">
                                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick"></use>
                                                        </svg> 
                                                        <?php the_sub_field('usp'); ?>
                                                    </li>
                                                <?php endwhile; endif; ?>
                                            </ul>                                         
                                        </div>
                                        <div class="c-btn c-btn--lg c-btn--full">
                                            &nbsp; <?php // placeholder for asbsolutely pos btn ?>
                                        </div>
                                        <a href="<?php the_field('wwd-rent_out-button-link'); ?>" class="c-site-module__btn [ c-btn c-btn--brand c-btn--lg c-btn--full ] u-sharp">
                                            <?php the_field('wwd-rent_out-button-text'); ?>
                                        </a>                                                
                                        
                                    </div>
                            </div>
                        </li>
                        <li class="o-grid__item u-1/2@sm-up">
                            <div class="c-site-module c-site-module--no-highlight">
                                <div class="c-site-module__inner">

                                    <div class="[ c-site-module__head c-site-module__head--alpha ] u-txt-xl">
                                        <?php the_field('wwd-searching-heading'); ?>
                                    </div>
                                    <div class="c-site-module__body">
                                        <ul class="o-bare-list o-bare-list--spaced-half">
                                            <?php if( have_rows('wwd-searching-usps') ) : while( have_rows('wwd-searching-usps') ) : the_row(); ?>
                                                <li class="c-svg-icon c-svg-icon--tick">
                                                    <svg class="c-svg-icon__svg c-svg-icon--tick__svg">
                                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-tick"></use>
                                                    </svg> 
                                                    <?php the_sub_field('usp'); ?>
                                                </li>
                                            <?php endwhile; endif; ?>
                                        </ul>                                         
                                    </div>
                                    <div class="c-btn c-btn--lg c-btn--full">
                                        &nbsp; <?php // placeholder for asbsolutely pos btn ?>
                                    </div>
                                    <a href="<?php the_field('wwd-searching-button-link'); ?>" class="c-site-module__btn [ c-btn c-btn--alpha c-btn--lg c-btn--full ] u-sharp">
                                        <?php the_field('wwd-searching-button-text'); ?>
                                    </a>                                    
                                    
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>                
            </div>
            <div class="c-divider c-divider--curved">
                <img class="c-divider__img" src="<?php bloginfo('template_directory'); ?>/build/img/curved-divider-up.svg" alt="">                
            </div>
        </section>

        <section class="o-section u-bg-eta">
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
        </section>

	</main>
</div>

<?php get_footer(); ?>
