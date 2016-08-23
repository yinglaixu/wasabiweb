<?php
/*
Template Name: Blog 
*/



?>

<?php get_header(); ?>

<div class="c-page-content js-page-content" id="mainContent">
    <div class="c-site-header-placeholder">
    </div>
    
	<main role="main">
        <?php get_template_part('partials/subpage-banner'); ?>        

        <section class="o-section">
            <div class="o-site-wrap o-site-wrap--padding">
                <ul class="c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]">
<!--                    <li class="u-hard--sides">-->
<!--                        <div class="o-grid u-text-center">-->
<!--                            <div class="o-grid__item u-3/4@sm-up u-text-center">-->
<!--                                <h1>--><?php //the_title(); ?><!--</h1>-->
<!--                                --><?php //the_post(); the_content(); ?>
<!--                            </div>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                    <li class="u-hard--sides">-->
<!--                        <ul class="[ o-grid o-grid--matrix ] o-grid--equal-height u-soft--top">-->
<!--                            --><?php
//                            $args = [
//                                'post_type' => 'post',
//                                'post_status' => 'publish',
//                                'posts_per_page' => -1,
//                                'orderby' => 'modified',
//                                'order' => 'desc',
//                            ];
//                            $query = new WP_Query( $args );
//                            $grid = [ 'u-2/3@md-up', 'u-1/3@md-up', 'u-1/3@md-up', 'u-2/3@md-up', 'u-1/3@md-up' ];
//                            $i = -1;
//                            if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); $i++;
//
//                                ?>
<!--                                <li class="o-grid__item [ u-1/3@sm-up --><?php //echo $grid[$i]; ?><!-- ]">-->
<!--                                    <article class="c-partner-module">-->
<!--                                        <figure class="c-partner-module__logo">-->
<!--                                            <div class="c-img-control-wrap u-center-block js-img-control-wrap">-->
<!--                                                <div class="c-img-control-wrap__inner u-no-bg js-img-control-wrap__inner">-->
<!--                                                    --><?php //// 380x140 ?>
<!--                                                    --><?php //// data attrs should be 1/2 actual value for retina ?>
<!--                                                    --><?php //$image = get_field('post_image'); ?>
<!--                                                 -->
<!--                                                       -->
<!--                 --><?php //if($image!=""):?><!-- <img src="--><?php //echo $image;?><!--" alt="photo" >  --><?php //endif;?>
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                        </figure>-->
<!--                                        <div class="c-partner-module__body emplbody">-->
<!--                                            <h4>-->
<!--                                                --><?php //the_title(); ?>
<!--                                            </h4>-->
<!--                                          --><?php //// echo substr(strip_tags(get_the_content()),0,100); ?>
<!--<!--                                          <h4><a href="--><?php ////the_permalink()?><!--<!--">--><?php //// // echo _e('Read More');?><!--<!--</a></h4>-->
<!--                                        </div>-->
<!--                                    </article>-->
<!--                                </li>-->
<!--                            --><?php //endwhile; endif; wp_reset_postdata(); ?>
<!--                        </ul>-->
<!--                    </li>-->

                    <li class="u-hard--sides">
                        <ul class="[ o-grid o-grid--matrix o-grid--equal-height ] u-soft--top postList">
                            <?php
                            $args = [
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'posts_per_page' => -1,
                                'orderby' => 'date',
                                'order' => 'desc',
                            ];
                            $query = new WP_Query( $args );
                            $grid = [ 'u-1/3@md-up', 'u-1/3@md-up', 'u-1/3@md-up', 'u-1/3@md-up' ];
                            $i = -1;
                            if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); $i++;

                            ?>
                            <li class="o-grid__item [ u-1/3@sm-up <?php echo $grid[$i]; ?> ]" style="display: none;">
                                <article>
                                    <div class="portfolio-tag-media portfolio-item">
                                        <a href="<?php the_permalink(); ?>" class="thumb">
                                            <div class="c-img-control-wrap u-center-block js-img-control-wrap">
                                                <div class="c-img-control-wrap__inner u-no-bg js-img-control-wrap__inner">
                                                    <?php // 380x140 ?>
                                                    <?php // data attrs should be 1/2 actual value for retina ?>
                                                    <?php $image = get_field('post_image'); ?>


                                                    <?php if($image!=""):?> <img src="<?php echo $image;?>" alt="photo" >  <?php endif;?>
                                                </div>
                                            </div>
                                            <div class="portfolio-hover">
                                                <div class="portfolio-description">
                                                    <h4><?php the_title(); ?></h4>
                                                    <div>
                                                        <p><?php echo substr(strip_tags(get_the_content()),0,100); ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </article>
                            </li>
                            <?php endwhile; endif; wp_reset_postdata(); ?>
                        </ul>
                    </li>
                    <li class="u-hard--sides">
                        <button class="c-btn c-btn--xl c-btn--alpha" style="display: block; margin-left: auto; margin-right: auto;" id="loadMore">
                           Load more
                        </button>
                    </li>
                </ul>
            </div>
        </section>

	</main>
</div>

<?php get_footer(); ?>
