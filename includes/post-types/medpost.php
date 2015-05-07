<li <?php post_class('blogposts'); ?>>

	<?php
    $video_input = get_post_meta($post->ID, 'vrg_video', true);
	$audio_input = get_post_meta($post->ID, 'vrg_audio', true);
	?>

	<?php 	if(has_post_format('video')){
                    echo ($video_input);
            }elseif(has_post_format('audio')){
                    echo ($audio_input);
            }elseif(has_post_format('gallery')){
                    echo get_template_part( '/includes/post-types/gallery-slider-blog' );
            } else {
                    if ( has_post_thumbnail()); ?>
                    
                    <div class="imgwrap">
            	
						<?php echo vrg_ratingbar() ?>
                        
                        <a href="<?php the_permalink(); ?>">  
  
                             <?php the_post_thumbnail('blog', array('class' => 'headimg')); ?>
      
                        </a> 
                        
                  	</div>       
                        
    <?php }?>
    
    <div style="clear: both;"></div>
           	
    <div class="postinfo gradient-light">
                    
		<?php echo vrg_meta(); ?>
    
    </div>

        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

        <div style="clear: both;"></div>

    	<p class="teaser"><?php echo vergo_excerpt( get_the_excerpt(), '380'); ?></p>
        
        
		<?php echo vrg_meta_more(); ?>
        
</li>