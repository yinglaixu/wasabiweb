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
