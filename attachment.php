<?php get_header(); ?>
    
    <div class="fullsingle">       
             
    	<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "full"); ?>
        
    	<p class="attachment">
        	<a href="<?php echo wp_get_attachment_url($post->id); ?>" title="<?php the_title(); ?>" rel="attachment">
            	<img style="max-width:100%; margin-bottom:30px;" src="<?php echo $att_image[0];?>" alt="<?php $post->post_excerpt; ?>" />
           	</a>
    	</p>
        
    	<?php else : endif; ?>                  
    	<div class="entry-caption"><?php if ( !empty($post->post_excerpt) ) the_excerpt() ?></div>
    
    </div><!-- .entry-content -->

<?php get_footer(); ?>