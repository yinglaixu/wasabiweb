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
        
        <section id="question-answer">
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
                <div class="o-grid">
<!--about renthia-->
                    <article class = "o-grid__item u-1/2@sm-up">
                            <div >
                                <div class="o-section u-hard--bottom">
                                    <div class="c-svg-icon c-svg-icon--rentout-title">
                                        <svg class="c-svg-icon__svg c-svg-icon--rentout-title__svg">
                                            <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-qa-about"></use>
                                        </svg>
                                        <h3><?php echo icl_t('Theme-qa', 'About Renthia'); ?></h3>
                                    </div>
                                    <ul class="o-bare-list" id="question-about-renthia">
                                        <?php
                                        if( have_rows('qa-about-renthia') ):
                                            while( have_rows('qa-about-renthia') ) : the_row();
                                            ?>
                                                <li class="u-push-half--bottom">
                                                    <a href="" class="toggle-slide"><?php the_sub_field('question'); ?></a>
                                                </li>
                                                <li class="u-push-half--bottom" style="display: none;">
                                                    <?php the_sub_field('answer'); ?>
                                                </li>
                                                <?php
                                            endwhile;
                                        endif;
                                        ?>
                                    </ul>
                                    <a href=" " class="toggle-more" style="display: none;"><?php echo icl_t('Theme-qa', 'View more'); ?></a>
                                    <a href=" " class="toggle-less" style="display: none;"><?php echo icl_t('Theme-qa', 'Hide'); ?></a>
                                </div>
                            </div>
                    </article>
<!--my account-->
                    <article class = "o-grid__item u-1/2@sm-up">
                        <div >
                            <div class="o-section u-hard--bottom">
                                <div class="c-svg-icon c-svg-icon--rentout-title">
                                    <svg class="c-svg-icon__svg c-svg-icon--rentout-title__svg">
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-qa-account"></use>
                                    </svg>
                                    <h3><?php echo icl_t('Theme-qa', 'My account'); ?></h3>
                                </div>
                                <ul class="o-bare-list" id="question-my-account">
                                    <?php
                                    if( have_rows('qa-my-account') ):
                                        while( have_rows('qa-my-account') ) : the_row();
                                            ?>
                                            <li class="u-push-half--bottom">
                                                <a href="" class="toggle-slide"><?php the_sub_field('question'); ?></a>
                                            </li>
                                            <li class="u-push-half--bottom" style="display: none;">
                                                <?php the_sub_field('answer'); ?>
                                            </li>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </ul>
                                <a href=" " class="toggle-more" style="display: none;"><?php echo icl_t('Theme-qa', 'View more'); ?></a>
                                <a href=" " class="toggle-less" style="display: none;"><?php echo icl_t('Theme-qa', 'Hide'); ?></a>
                            </div>
                        </div>
                    </article>
<!--payment-->
                    <article class = "o-grid__item u-1/2@sm-up">
                        <div >
                            <div class="o-section u-hard--bottom">
                                <div class="c-svg-icon c-svg-icon--rentout-title">
                                    <svg class="c-svg-icon__svg c-svg-icon--rentout-title__svg">
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-qa-payment"></use>
                                    </svg>
                                    <h3><?php echo icl_t('Theme-qa', 'Payment'); ?></h3>
                                </div>
                                <ul class="o-bare-list" id="question-payment">
                                    <?php
                                    if( have_rows('qa-payment') ):
                                        while( have_rows('qa-payment') ) : the_row();
                                            ?>
                                            <li class="u-push-half--bottom">
                                                <a href="" class="toggle-slide"><?php the_sub_field('question'); ?></a>
                                            </li>
                                            <li class="u-push-half--bottom" style="display: none;">
                                                <?php the_sub_field('answer'); ?>
                                            </li>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </ul>
                                <a href=" " class="toggle-more" style="display: none;"><?php echo icl_t('Theme-qa', 'View more'); ?></a>
                                <a href=" " class="toggle-less" style="display: none;"><?php echo icl_t('Theme-qa', 'Hide'); ?></a>
                            </div>
                        </div>
                    </article>
<!--contract/inventorylist/inspectionlist-->
                    <article class = "o-grid__item u-1/2@sm-up">
                        <div >
                            <div class="o-section u-hard--bottom">
                                <div class="c-svg-icon c-svg-icon--rentout-title">
                                    <svg class="c-svg-icon__svg c-svg-icon--rentout-title__svg">
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-qa-contract"></use>
                                    </svg>
                                    <h3><?php echo icl_t('Theme-qa', 'Contract/Inventory list/Inspection list'); ?></h3>
                                </div>
                                <ul class="o-bare-list" id="question-contract">
                                    <?php
                                    if( have_rows('qa-contract') ):
                                        while( have_rows('qa-contract') ) : the_row();
                                            ?>
                                            <li class="u-push-half--bottom">
                                                <a href="" class="toggle-slide"><?php the_sub_field('question'); ?></a>
                                            </li>
                                            <li class="u-push-half--bottom" style="display: none;">
                                                <?php the_sub_field('answer'); ?>
                                            </li>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </ul>
                                <a href=" " class="toggle-more" style="display: none;"><?php echo icl_t('Theme-qa', 'View more'); ?></a>
                                <a href=" " class="toggle-less" style="display: none;"><?php echo icl_t('Theme-qa', 'Hide'); ?></a>
                            </div>
                        </div>
                    </article>
<!--landlord-->
                    <article class = "o-grid__item u-1/2@sm-up">
                        <div >
                            <div class="o-section u-hard--bottom">
                                <div class="c-svg-icon c-svg-icon--rentout-title">
                                    <svg class="c-svg-icon__svg c-svg-icon--rentout-title__svg">
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-qa-landlord"></use>
                                    </svg>
                                    <h3><?php echo icl_t('Theme-qa', 'Landlord'); ?></h3>
                                </div>
                                <ul class="o-bare-list" id="question-landlord">
                                    <?php
                                    if( have_rows('qa-landlord') ):
                                        while( have_rows('qa-landlord') ) : the_row();
                                            ?>
                                            <li class="u-push-half--bottom">
                                                <a href="" class="toggle-slide"><?php the_sub_field('question'); ?></a>
                                            </li>
                                            <li class="u-push-half--bottom" style="display: none;">
                                                <?php the_sub_field('answer'); ?>
                                            </li>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </ul>
                                <a href=" " class="toggle-more" style="display: none;"><?php echo icl_t('Theme-qa', 'View more'); ?></a>
                                <a href=" " class="toggle-less" style="display: none;"><?php echo icl_t('Theme-qa', 'Hide'); ?></a>
                            </div>
                        </div>
                    </article>
<!--tenant-->
                    <article class = "o-grid__item u-1/2@sm-up">
                        <div >
                            <div class="o-section u-hard--bottom">
                                <div class="c-svg-icon c-svg-icon--rentout-title">
                                    <svg class="c-svg-icon__svg c-svg-icon--rentout-title__svg">
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-qa-tenant"></use>
                                    </svg>
                                    <h3><?php echo icl_t('Theme-qa', 'Tenant'); ?></h3>
                                </div>
                                <ul class="o-bare-list" id="question-tenant">
                                    <?php
                                    if( have_rows('qa-tenant') ):
                                        while( have_rows('qa-tenant') ) : the_row();
                                            ?>
                                            <li class="u-push-half--bottom">
                                                <a href="" class="toggle-slide"><?php the_sub_field('question'); ?></a>
                                            </li>
                                            <li class="u-push-half--bottom" style="display: none;">
                                                <?php the_sub_field('answer'); ?>
                                            </li>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </ul>
                                <a href=" " class="toggle-more" style="display: none;"><?php echo icl_t('Theme-qa', 'View more'); ?></a>
                                <a href=" " class="toggle-less" style="display: none;"><?php echo icl_t('Theme-qa', 'Hide'); ?></a>
                            </div>
                        </div>
                    </article>
<!--insurance-->
                    <article class = "o-grid__item u-1/2@sm-up">
                        <div >
                            <div class="o-section u-hard--bottom">
                                <div class="c-svg-icon c-svg-icon--rentout-title">
                                    <svg class="c-svg-icon__svg c-svg-icon--rentout-title__svg">
                                        <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-qa-insurance"></use>
                                    </svg>
                                    <h3><?php echo icl_t('Theme-qa', 'Insurance'); ?></h3>
                                </div>
                                <ul class="o-bare-list" id="question-insurance">
                                    <?php
                                    if( have_rows('qa-insurance') ):
                                        while( have_rows('qa-insurance') ) : the_row();
                                            ?>
                                            <li class="u-push-half--bottom">
                                                <a href="" class="toggle-slide"><?php the_sub_field('question'); ?></a>
                                            </li>
                                            <li class="u-push-half--bottom" style="display: none;">
                                                <?php the_sub_field('answer'); ?>
                                            </li>
                                            <?php
                                        endwhile;
                                    endif;
                                    ?>
                                </ul>
                                <a href=" " class="toggle-more" style="display: none;"><?php echo icl_t('Theme-qa', 'View more'); ?></a>
                                <a href=" " class="toggle-less" style="display: none;"><?php echo icl_t('Theme-qa', 'Hide'); ?></a>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section> 

	</main>
</div>

<?php get_footer(); ?>


<style>
    #question-answer a{
        text-decoration: none;
    }
    #question-answer h3{
        padding-top: 5px;
    }
</style>


