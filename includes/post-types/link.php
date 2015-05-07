<li <?php post_class(); ?>>
            
		<h2><a href="<?php echo get_post_meta($post->ID, 'vrg_linkss', true); ?>"><?php echo vrg_icon() ?> <?php the_title(); ?></a></h2>
                    
		<?php echo vrg_meta(); ?>

    	<p class="teaser"><?php echo vergo_excerpt( get_the_excerpt(), '280'); ?></p>

</li>