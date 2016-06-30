<?php
$image = get_field('list-property_img');
if( $image ) :
?>
    <style scoped>
        /* 500x350 */
        .c-list-property__img {
           background-image: url('<?php echo $image['sizes']['500x350']; ?>');
        }
        @media (min-width: 481px) {
            /* 2000x850 */
            .c-list-property__img {
               background-image: url('<?php echo $image['sizes']['2000x850']; ?>');
            }
        }
    </style>
<!--    the subbanner, first section-->
    <div class="c-subpage-banner landlord-introduction-banner-to-left">
        <div class="c-list-property__img">
        </div>
        <div class="c-subpage-banner__overlay">
            <div class="o-site-wrap o-site-wrap--padding landlord-introduction-margin-top ">
                <div class = "o-grid o-grid--no-gutter">
                    <div class = "o-grid__item u-1/2@md-up">
                        <article class = "how-it-works_step how-it-works_show">
                            <div class = "o-grid o-grid--bottom">
                                <div class = "o-grid__item u-text-center">
                                    <h1><?php the_field('subbanner-title'); ?></h1>
                                </div>
                            </div>
                            <p><?php the_field('subbanner-content'); ?></p>
                            <a href="#listProperty" class="[ c-btn c-btn--xl c-btn--full c-btn--brand ] u-txt-normal-weight js-scroll" id = "listPropertyBtn">
                                <?php the_field('subbanner-btn-text'); ?>
                            </a>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    the introduction of how it works, second section-->
    <section class = "o-section">
        <div class = "o-site-wrap o-site-wrap-padding">
            <section class = "o-section u-bg-eta">
                <div class = "o-site-wrap o-site-wrap--padding">
                    <div class = "u-text-center">
                        <h2><?php the_field('title-howitworks'); ?></h2>
                    </div>
                    <ul class = "o-grid u-soft--left">
                        <?php $i = 0; if( have_rows('how-it-works-introduction') ) : while( have_rows('how-it-works-introduction') ) : the_row(); $i++; ?>
                            <li class="o-grid__item u-1/2@md-up landlord-introduction-padding">
                                <ul class="o-grid o-grid-bottom ">
                                    <li class = "o-grid__item u-1/6" >
                                        <div class="c-img-control-wrap u-center-block js-img-control-wrap">
                                            <div class="c-img-control-wrap__inner u-no-bg js-img-control-wrap__inner">
                                                <img src="<?php bloginfo('template_directory'); ?>/build/img/blank.gif"
                                                     class="c-img-control-wrap__img js-img-control"
                                                     data-lg-src="<?php echo the_sub_field('icon');?>"
                                                     data-lg-width="40"
                                                     data-lg-height="40"
                                                     data-fluid="false"
                                                     alt="">

                                            </div>
                                        </div>
                                    </li>
                                    <li class="o-grid__item u-3/4">
                                        <?php the_sub_field('heading'); ?>
                                    </li>
                                    <li class = "o-grid__item">
                                       <p><?php the_sub_field('text'); ?></p>
                                    </li>
                                </ul>
                            </li>
                        <?php endwhile; endif; ?>
                        <li class="o-grid__item u-text-right landlord-introduction-padding">
                            <a href="<?php the_field('how-it-works-introduction-btn-link'); ?>" class = "[c-btn c-btn--md c-btn--full c-btn--viewmore ] u-txt-normal-weigh" >
                                <?php the_field('how-it-works-introduction-btn-text'); ?>
                            </a>
                        </li>
                    </ul>

                </div>
            </section>
        </div>
    </section>

<!--    the introduction of the support, third section-->
    <section class = "o-section">
        <div class = "o-site-wrap o-site-wrap--padding">
            <div>
                <h2><?php the_field('title-support'); ?></h2>
            </div>
            <ul class = "o-grid">
                <?php $i = 0; if( have_rows('support-introduction') ) : while( have_rows('support-introduction') ) : the_row(); $i++; ?>
                    <li class="o-grid__item u-1/3@md-up">
                        <ul class="o-grid">
                            <li class = "o-grid__item" >
                                <div class="c-img-control-wrap js-img-control-wrap">
                                    <div class="c-img-control-wrap__inner u-no-bg js-img-control-wrap__inner">
                                        <img src="<?php bloginfo('template_directory'); ?>/build/img/blank.gif"
                                             class="c-img-control-wrap__img js-img-control"
                                             data-lg-src="<?php echo the_sub_field('icon');?>"
                                             data-lg-width="40"
                                             data-lg-height="40"
                                             data-fluid="false"
                                             alt="">

                                    </div>
                                </div>
                            </li>
                            <li class="o-grid__item">
                                <h3><?php the_sub_field('heading'); ?></h3>
                            </li>
                            <li class = "o-grid__item">
                                <p><?php the_sub_field('text'); ?></p>
                            </li>
                        </ul>
                    </li>
                <?php endwhile; endif; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>

<style>
    .c-list-property__img{
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-size: cover;
        background-position: center center;
    }
    .landlord-introduction-banner-to-left{
        text-align: left ;
    }
    .landlord-introduction-margin-top{
        margin-top:50px;
    }
    .landlord-introduction-padding{
        padding-left: 4rem;
        padding-right: 4rem;
        padding-top: 4rem;
    }
</style>