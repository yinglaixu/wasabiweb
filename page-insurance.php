<?php
/*
Template Name: Insurance page
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
                                    <?php  echo get_field('insurance_title');?>
                                </h1 class="u-flush--bottom">
                                <h3>
                                    <?php  echo get_field('insurance_subtitle');?>
                                </h3>
                            </div>
                        </div>
                    </li>
                    <li class="u-hard"></li>
                </ul>
                <article>
                    <div class="o-grid">
                        <div class = "o-grid__item u-1/2@sm-up">
                            <div class="o-section u-hard--bottom">
                                <div>
                                    <img class=" " src="<?php  echo get_field('insurance_example1_img');?>" alt="">
                                </div>
                                <p><?php  echo get_field('insurance_example1_text');?></p>
                            </div>
                        </div>
                        <div class = "o-grid__item u-1/2@sm-up">
                            <div class="o-section u-hard--bottom">
                                <div>
                                    <img class=" " src="<?php  echo get_field('insurance_example2_img');?>" alt="">
                                </div>
                                <p><?php  echo get_field('insurance_example2_text');?></p>
                            </div>
                        </div>
                    </div>
                </article> 
            </div>
        
        </section>

        <section class = 'map-wrap u-soft--top employ-map employ-map'>
            <div class = 'o-section o-site-wrap o-site-wrap--padding'>
                <?php the_content(); ?>
            </div>
        </section>

	</main>
</div>

<?php get_footer(); ?>

<style>

.aboutme-sub-title{ margin-top: 50px; margin-bottom: 30px;}

</style>
