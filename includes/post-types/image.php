<li <?php post_class('blogposts'); ?>>

	<?php
            $large_image =  wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'fullsize', false, '' ); 
            $large_image = $large_image[0]; 
    ?>

    <a class="imgwrap" rel="prettyPhoto[gallery]"  href="<?php if($video_input) echo $video_input; else echo $large_image; ?>">  
    
        <?php the_post_thumbnail('format-image', array('class' => 'headimg')); ?>
             
    </a>

    <div style="clear: both;"></div>
       
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <?php echo vrg_icon() ?></a></h2>
                
    <?php echo vrg_meta(); ?>
        
</li>