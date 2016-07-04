<blockquote class="employ-wrap">
    <article class=" ">
      
            <div class=" ">
                
                   
                    <?php $image = get_field('empl_photo'); ?>
                
                       
               <img src="<?php echo $image;?>" alt="photo">         
               
            </div>
       
        <div class="employ-wrap__inner">
            <p><?php  echo get_field('empl_name');?></p>
            <strong><?php  echo get_field('empl_city');?></strong>
            <h4>
                <?php the_title(); ?>
            </h4>
<!--            <h4><a href="mailto:--><?php // echo get_field('empl_email');?><!--">--><?php // echo get_field('empl_email');?><!--</a></h4>-->
        </div>
    </article>
    
</blockquote>
