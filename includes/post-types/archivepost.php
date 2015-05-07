<li <?php post_class('gradient-light'); ?>>
	

	<?php if ( has_post_thumbnail()) : ?>
         <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
         <?php the_post_thumbnail( 'archives',array('title' => "")); ?>
         </a>
    <?php endif; ?>

   	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php echo vrg_icon() ?></h2>
                
    <?php echo vrg_meta(); ?> 
    
    <p class="teaser">
    
		<?php echo vergo_excerpt( get_the_excerpt(), '260'); ?>
        
    </p>     
    
</li>