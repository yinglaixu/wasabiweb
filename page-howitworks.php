<?php
/*
Template Name: Frequent questions
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
                               <!--  <?php get_template_part('partials/subpage-nav'); ?> -->
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
                                    <p><?php the_content(); ?></p>
                                    <!-- the images -->
                                </div>
                            </div>
                        </div>
                    </div>
                </article> 
            </div>
        
        </section> 

	</main>
</div>

<?php get_footer(); ?>


