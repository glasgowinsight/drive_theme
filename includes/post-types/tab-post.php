<div class="tab-post">

	<?php if ( has_post_thumbnail()) : ?>
    
         <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
         <?php the_post_thumbnail( 'featured',array('title' => "")); ?>
         </a>
         
    <?php endif; ?>

        <h3><a href="<?php the_permalink(); ?>"><?php echo short_title('...', 12);?></a></h3>
								
		<?php echo vrg_meta_small(); ?>
        
</div>