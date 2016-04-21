<blockquote class="o-flag">
    <div class="o-flag__component o-flag__component--top">
        <div class="c-img-control-wrap js-img-control-wrap">
            <div class="c-img-control-wrap__inner u-circle js-img-control-wrap__inner">
                <?php // 170x170 ?>
                <?php // ensure data-attrs are populated with actual image dimensions. ?>
                <?php $image = get_field('image'); ?>
                <img src="<?php bloginfo('template_directory'); ?>/build/img/blank.gif"
                    class="c-img-control-wrap__img u-circle js-img-control"
                    data-lg-src="<?php echo $image['sizes']['170x170']; ?>"
                    data-lg-width="<?php echo $image['sizes']['170x170-width']; ?>"
                    data-lg-height="<?php echo $image['sizes']['170x170-height']; ?>"
                    data-sm-width="100"
                    data-sm-height="100"
                    data-fluid="false"
                    alt="">
            </div>
        </div>
    </div>
    <div class="o-flag__body">
        <ul class="o-bare-list o-bare-list--spaced u-soft--left">
            <li>
                <q><?php the_field('quote'); ?></q>
            </li>
            <li class="[ c-svg-icon c-svg-icon--person ] u-txt-brand u-txt-bold">
                <svg class="c-svg-icon__svg c-svg-icon--person__svg">
                    <use xlink:href="<?php bloginfo('template_directory'); ?>/build/img/sprite.svg#icon-person"></use>
                </svg> 
                <?php the_field('name'); ?>
            </li>
        </ul>
    </div>
</blockquote>
