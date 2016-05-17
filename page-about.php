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
                    <li class="u-hard"></li>
                </ul>
                <article>
                    <div class="o-grid">
                        <div class = "o-grid__item u-3/3@sm-up">
                            <div class="o-section u-hard--bottom">
                                <div>
                                    <div>
                                        <h2><?php echo icl_t('Theme-about-us', 'what we do'); ?></h2>
                                    </div>
                                    <p><?php the_content(); ?></p>
                                    <!-- the images -->
                                    <div>
                                        <ul class = "o-grid o-grid--matrix o-grid--equal-height">
                                            <li class = "o-grid__item u-1/3@sm-up">
                                                <div class = "about-item-wrap landlord">
                                                    <h1>200+</h1>
                                                    <h3><?php echo icl_t('Theme-about-us', 'intro-1'); ?></h3>
                                                    
                                                </div>
                                            </li>
                                            <li class = "o-grid__item u-1/3@sm-up">
                                                <div class = "about-item-wrap real-estate">
                                                    <h1>5000 m<sup>2+</sup></h1>
                                                    <h3><?php echo icl_t('Theme-about-us', 'intro-2'); ?></h3>
                                                    
                                                </div>
                                            </li>
                                            <li class = "o-grid__item u-1/3@sm-up">
                                                <div class = "about-item-wrap view">
                                                    <h1><?php echo icl_t('Theme-about-us', 'intro-4'); ?></h1>
                                                    <h3><?php echo icl_t('Theme-about-us', 'intro-3'); ?></h3>
                                                    
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div>
                                    <div class = "aboutme-sub-title">
                                        <h2><?php echo icl_t('Theme-about-us', 'who we are'); ?></h2>
                                    </div>
                               
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
                    </div>
                </article> 
            </div>
        
        </section> 

	</main>
</div>

<?php get_footer(); ?>

<style>
.empy img { border:2px solid #E49571; border-radius:50%;}
.c-partner-module { background:transparent;}
.o-flag__component img{ max-height:165px;max-width: 165px; }
.o-flag__component { width:200px;}
.o-flag__body {  width:100%;}
.about-item-wrap{ text-align: center;}
.about-item-wrap h1{ padding-top: 50px; padding-bottom: 30px; color: white;}
.about-item-wrap h2{ padding-top: 50px; padding-bottom: 30px; color: white;}
.about-item-wrap h3{ padding-bottom: 5px; color: white;}
.aboutme-sub-title{ margin-top: 50px; margin-bottom: 30px;}
.landlord {background-image: url("<?php bloginfo('template_directory'); ?>/img/media/landlord.png"); }
.real-estate {background-image: url("<?php bloginfo('template_directory'); ?>/img/media/real-estate.png"); }
.view {background-image: url("<?php bloginfo('template_directory'); ?>/img/media/view.png"); }
</style>
