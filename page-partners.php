<?php
/*
Template Name: Partners
*/
?>

<?php get_header(); ?>
<div class="c-page-content js-page-content" id="mainContent">
    <div class="c-site-header-placeholder">
    </div>
    
	<main role="main">
        <?php get_template_part('partials/subpage-banner'); ?>        
        

        <article class="o-section u-hard--bottom u-bg-eta">
            <div class="o-site-wrap o-site-wrap--padding">
                <div class="o-grid">
                    <div class="o-grid__item u-5/12@sm-up">
                        <div class="o-section u-hard--top">
                            <div class="c-img-control-wrap js-img-control-wrap">
                                <div class="c-img-control-wrap__inner js-img-control-wrap__inner">
                                    <?php // 430x9999 ?>
                                    <?php // ensure data-attrs are populated with actual image dimensions. ?>
                                    <?php $image = get_field('image'); ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/build/img/blank.gif"
                                        class="c-img-control-wrap__img js-img-control"
                                        data-lg-src="<?php echo $image['sizes']['430x9999']; ?>"
                                        data-lg-width="<?php echo $image['sizes']['430x9999-width']; ?>"
                                        data-lg-height="<?php echo $image['sizes']['430x9999-height']; ?>"
                                        data-fluid="true"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="o-grid__item u-7/12@sm-up">
                        <div class="o-section u-hard--top">
                            <h1><?php the_field('heading'); ?></h1>
                            <?php the_field('text'); ?>
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
            </div>
        </article>

        <section class="o-section">
            <div class="o-site-wrap o-site-wrap--padding">
                <ul class="c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]">
                    <li class="u-hard--sides">
                        <div class="o-grid u-text-center">
                            <div class="o-grid__item u-3/4@sm-up u-text-center">
                                <h1><?php the_title(); ?></h1>
                                <?php the_post(); the_content(); ?>
                            </div>
                        </div>
                    </li>
                    <li class="u-hard--sides">
                        <ul class="[ o-grid o-grid--matrix o-grid--gutter-sm ] js-masonry">
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
                                <li class="o-grid__item u-1/2@xs-up u-1/3@sm-up u-1/4@md-up js-masonry__item">
                                    <article class="c-partner-module">
                                        <figure class="c-partner-module__logo">
                                            <div class="c-img-control-wrap u-center-block js-img-control-wrap">
                                                <div class="c-img-control-wrap__inner u-no-bg js-img-control-wrap__inner">
                                                    <?php // 380x140 ?>
                                                    <?php // data attrs should be 1/2 actual value for retina ?>
                                                    <?php $image = get_field('logo'); ?>
                                                    <img src="<?php bloginfo('template_directory'); ?>/build/img/blank.gif"
                                                         class="c-img-control-wrap__img js-img-control"
                                                         data-lg-src="<?php echo $image['sizes']['380x140']; ?>"
                                                         data-lg-width="<?php echo ($image['sizes']['380x140-width'] / 2); ?>"
                                                         data-lg-height="<?php echo ($image['sizes']['380x140-height'] / 2); ?>"
                                                         data-fluid="true"
                                                         alt="">
                                                </div>
                                            </div>
                                        </figure>
                                        <div class="c-partner-module__body">
                                            <h1 class="u-txt-md">
                                                <?php the_title(); ?>
                                            </h1>
                                            <?php the_content(); ?>
                                        </div>
                                    </article>
                                </li>
                            <?php endwhile; endif; wp_reset_postdata(); ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </section>

	</main>
</div>
<style>
.emplbody h2 { font-size:12px;}

.emplbody a , .emplbody a { font-size:11px;}  
</style>
<?php get_footer(); ?>
