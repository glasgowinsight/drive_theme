<div class="cont_inn gradient-light">
<div class="sequence-theme body2">
    <div id="sequence">

        <img class="sequence-prev" src="<?php echo get_template_directory_uri(); ?>/images/icons/bt-prev.png" alt="Previous Frame" />
        <img class="sequence-next" src="<?php echo get_template_directory_uri(); ?>/images/icons/bt-next.png" alt="Next Frame" />

		<?php 
        $featucat = get_cat_ID(get_option('vergo_slider_category'));
        $my_query = new WP_Query('showposts=5&cat='. $featucat .'');	 
        if ($my_query->have_posts()) :
    	?>

            <ul class="sequence-canvas">
            
				<?php while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID; ?>	
                
                <?php $video_input = get_post_meta($post->ID, 'vrg_video', true);?>
                
                    <li class="animate-in">
                    
                    	<?php if($video_input) {?>
              
             				<div class="model">
                                
                    			<?php echo vrg_ratingbar() ?>
							
								<?php echo ($video_input); ?>
                                
                            </div>
                      
              			<?php } else {?>
                    
                            <h2 class="title"><a href="<?php the_permalink(); ?>"><?php echo short_title('...', 10); ?></a></h2>
                            
                            <h3 class="subtitle"><?php echo vergo_excerpt( get_the_excerpt(), '180'); ?><br/>
                            
                            	<a class="fr" href="<?php the_permalink(); ?>"><?php _e('Read More','vergo');?> <i class="icon-circle-arrow-right"></i></a>
                            
                            </h3>
                            
                            <div class="model">
                                
                    			<?php echo vrg_ratingbar() ?>
                            
                                <a href="<?php the_permalink(); ?>">
                                
                                    <?php the_post_thumbnail('slider'); ?>
                                
                                </a>
                                
                            </div>
               			<?php }?> 
                        
                    </li>
                    
                <?php endwhile; ?>
            
            </ul>
        
        <?php endif; ?>


		<?php if ($my_query->have_posts()) :?>
        
        <ul class="sequence-pagination body2">
        
            <?php while ($my_query->have_posts()) : $my_query->the_post();$do_not_duplicate = $post->ID; ?>
            
            	<li class="gradient">
					<?php the_post_thumbnail('featured'); ?>
                	<?php vrg_meta_small(); ?>
                	<span><?php echo short_title('...', 15); ?> <?php echo vrg_icon() ?></span>
                </li>
            
           	<?php endwhile; ?>
            
        </ul>
        
        <?php endif; ?>

    </div>
</div>
</div>