<article>
    <div class="portfolio-tag-media portfolio-item">
        <a href="#" class="thumb">
            <div class="c-img-control-wrap u-center-block js-img-control-wrap">
                <div class="c-img-control-wrap__inner u-no-bg js-img-control-wrap__inner">
                    <?php // 380x140 ?>
                    <?php // data attrs should be 1/2 actual value for retina ?>
                    <?php $image = get_field('empl_photo'); ?>


                    <?php if($image!=""):?> <img src="<?php echo $image;?>" alt="photo" >  <?php endif;?>
                </div>
            </div>
            <div class="portfolio-hover">
                <div class="portfolio-description">
                    <p><?php  echo get_field('empl_name');?></p>
                    <strong><?php  echo get_field('empl_city');?></strong>
                    <h4>
                        <?php the_title(); ?>
                    </h4>
                </div>
            </div>
        </a>
    </div>
</article>