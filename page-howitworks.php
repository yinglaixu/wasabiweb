<?php
/*
Template Name: How it works
*/
?>

<?php get_header(); ?>

<div class="c-page-content js-page-content" id="mainContent">
    <div class="c-site-header-placeholder">
    </div>

    <main role="main">
        <?php get_template_part('partials/subpage-banner'); ?>

        <section>
            <div>
                <ul class="[ c-ui-list c-ui-list--dark ] u-hard--ends [ u-clean--top u-clean--bottom ]">
                    <li class="u-hard--sides">
                        <div class="o-flag">
                            <div class="o-flag__body u-block@sm-down u-push--bottom@sm-down">
                                <h1 class="u-flush--bottom">
<!--                                    --><?php //the_title(); ?>
                                </h1>
                            </div>
                            <div class="o-flag__component u-block@sm-down">
                                <!--  <?php get_template_part('partials/subpage-nav'); ?> -->
                            </div>
                        </div>
                    </li>
<!--                    <li class="u-hard"></li>-->
                </ul>
                <div id = "how-it-works_container">
                    <div id = "how-it-works_intro">
                        <div class = "o-site-wrap o-site-wrap--padding">
                            <div class = "o-grid o-grid--no-gutter">
                                <div class = "o-grid__item u-1/2@md-up">
                                    <article class = "how-it-works_step how-it-works_property">
                                        <div class = "o-grid o-grid--bottom">
                                            <div class = "o-grid__item u-text-center">
                                                <img class="how-it-works_icon" src="<?php bloginfo('template_directory'); ?>/build/img/list.svg" alt="">
                                            </div>
                                            <div class = "o-grid__item u-text-center">
                                                <h1><?php the_field('title-1'); ?>
                                            </div>
                                        </div>
                                        <p><?php the_field('content-1'); ?></p>
                                    </article>
                                </div>
                            </div>
                            <div class = "o-grid o-grid--no-gutter u-text-right">
                                <div class = "o-grid__item u-1/2@md-up">
                                    <article class = "how-it-works_step how-it-works_show">
                                        <div class = "o-grid o-grid--bottom">
                                            <div class = "o-grid__item u-text-center">
                                                <img class="how-it-works_icon" src="<?php bloginfo('template_directory'); ?>/build/img/home.svg" alt="">
                                            </div>
                                            <div class = "o-grid__item u-text-center">
                                                <h1><?php the_field('title-2'); ?>
                                            </div>
                                        </div>
                                        <p><?php the_field('content-2'); ?></p>
                                    </article>
                                </div>
                            </div>
                            <div class = "o-grid o-grid--no-gutter">
                                <div class = "o-grid__item u-1/2@md-up">
                                    <article class = "how-it-works_step how-it-works_sign">
                                        <div class = "o-grid o-grid--bottom">
                                            <div class = "o-grid__item u-text-center">
                                                <img class="how-it-works_icon" src="<?php bloginfo('template_directory'); ?>/build/img/pen.svg" alt="">
                                            </div>
                                            <div class = "o-grid__item u-text-center">
                                                <h1><?php the_field('title-3'); ?>
                                            </div>
                                        </div>
                                        <p><?php the_field('content-3'); ?></p>
                                    </article>
                                </div>
                            </div>
                            <div class = "o-grid o-grid--no-gutter u-text-right">
                                <div class = "o-grid__item u-1/2@md-up">
                                    <article class = "how-it-works_step how-it-works_paid">
                                        <div class = "o-grid o-grid--bottom">
                                            <div class = "o-grid__item u-text-center">
                                                <img class="how-it-works_icon" src="<?php bloginfo('template_directory'); ?>/build/img/paid.svg" alt="">
                                            </div>
                                            <div class = "o-grid__item u-text-center">
                                                <h1><?php the_field('title-4'); ?>
                                            </div>
                                        </div>
                                        <p><?php the_field('content-4'); ?></p>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id = "how-it-works_background">
                        <div class="how-it-works">
                            <div class="how-it-works__img_1"></div>
                        </div>
                        <div class="how-it-works">
                            <div class="how-it-works__img_2"></div>
                        </div>
                        <div class="how-it-works">
                            <div class="how-it-works__img_3"></div>
                        </div>
                    </div>
                </div>
                <div id = "how-it-works_contact" class = "o-section">
                    <div class = "o-site-wrap o-site-wrap--padding">
                        <div class = "o-grid o-grid--bottom">
                            <div class = "o-grid__item u-3/4@sm-up u-text-center">
                                <h3><?php echo icl_t('Theme-how-it-works', 'contact-text'); ?></br>
                                    <?php
                                        $email = get_field('email', 'options');
                                        if(ICL_LANGUAGE_CODE === 'nl'){
                                            $email = get_field('email-nl', 'options');
                                        }
                                    ?>
                                    <?php echo $email; ?>
                                </h3>
                            </div>
                            <div class = "o-grid__item u-1/4@sm-up">
                                <a href="<?php the_field('button-link'); ?>" class="[ c-btn c-btn--xl c-btn--full c-btn--brand ] u-txt-normal-weight">
                                    <?php the_field('button-text'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </main>
</div>

<?php get_footer(); ?>

<style scoped>

    .how-it-works__img_1{
        background-image: none;
    }
    @media (min-width: 481px) {
        /* 2000x270 */
        .how-it-works__img_1{
            background-image: url('<?php echo get_field('background-img_1')['url']; ?>');
        }
    }

    .how-it-works__img_2{
        background-image: none;
    }
    @media (min-width: 481px) {
        /* 2000x270 */
        .how-it-works__img_2{
            background-image: url('<?php echo get_field('background-img_2')['url']; ?>');
        }
    }

    .how-it-works__img_3{
        background-image: none;
    }
    @media (min-width: 481px) {
        /* 2000x270 */
        .how-it-works__img_3{
            background-image: url('<?php echo get_field('background-img_3')['url']; ?>');
        }
    }

</style>