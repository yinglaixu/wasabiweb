<?php get_header(); ?>
<div class="c-page-content js-page-content" id="mainContent">
    <div class="c-site-header-placeholder">
    </div>
    
	<main role="main">
        <?php get_template_part('partials/subpage-banner'); ?>        
        

      

        <section class="o-section">
            <div class="o-site-wrap o-site-wrap--padding">
                <ul class="c-ui-list u-hard--ends [ u-clean--top u-clean--bottom ]">
                    <li class="u-hard--sides">
                        <div class="o-grid u-text-center">
                            <div class="o-grid__item u-3/4@sm-up u-text-center">
                                <h1><?php //the_title(); ?></h1>
                                <?php the_post(); the_content(); ?>
                            </div>
                        </div>
                    </li>
                    <li class="u-hard--sides">
                        <ul class="[ o-grid o-grid--matrix o-grid--gutter-sm ] js-masonry">
                            <?php
                           
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
                                                    <?php $image = get_field('post_image'); ?>
                                                 
                                                       
                 <?php if($image!=""):?> <img src="<?php echo $image;?>" alt="photo" style="max-height:234px; border-radius: 100%;box-shadow: 1px 1px 10px #000000;">  <?php endif;?>  
                                                </div>
                                            </div>
                                        </figure>
                                        <div class="c-partner-module__body emplbody">
                                            <h2>
                                                <?php the_title(); ?>
                                            </h2>
                                          <?php echo substr(get_the_content(),0,100); ?>
                                          <h4><a href="<?php the_permalink()?>"><?php  echo _e('Read More');?></a></h4>
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

<?php get_footer(); ?>
