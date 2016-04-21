<?php
/*
Template Name: Employee
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
                    <li class="u-hard--sides">
                        <div class="o-grid u-text-center">
                            <div class="o-grid__item u-3/4@sm-up u-text-center">
                                <h1><?php the_title(); ?></h1>
                                <?php the_post(); the_content(); ?>
                            </div>
                        </div>
                    </li>
                    <li class="u-hard--sides">
                        <ul class="[ o-grid o-grid--matrix ] u-soft--top">
                        
                            <?php
                            $args = [
                                'post_type' => 'employee',
                                'post_status' => 'publish',
                                'posts_per_page' => -1,
                                'orderby' => 'menu_order',
                                'order' => 'asc',
                            ];
                            $query = new WP_Query( $args );
                            if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
                                ?>
                                <li class="o-grid__item">
                                <blockquote class="o-flag">
                                    <article class="c-partner-module empy">
                                      
                                            <div class="o-flag__component o-flag__component--top">
                                                
                                                   
                                                    <?php $image = get_field('empl_photo'); ?>
                                                
                                                       
                                               <img src="<?php echo $image;?>" alt="photo">         
                                               
                                            </div>
                                       
                                        <div class="o-flag__body">
                                            <h2>
                                                <?php the_title(); ?>
                                            </h2>
                                            
                                            <h3><?php  echo get_field('empl_name');?></h3>
                                            <h4><a href="mailto:<?php  echo get_field('empl_email');?>"><?php  echo get_field('empl_email');?></a></h4>
                                            <?php the_content(); ?>
                                        </div>
                                    </article>
                                    </blockquote>
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

<style>
.empy img { border:2px solid #E49571; border-radius:50%;}
.c-partner-module { background:transparent;}
.o-flag__component img{ max-height:165px;max-width: 165px; }
.o-flag__component { width:200px;}
.o-flag__body {  width:70%;}
</style>
