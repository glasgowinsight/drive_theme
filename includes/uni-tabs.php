<div id="hometab" class="gradient-light">

<ul id="serinfo-nav">

        <li class="li01"><a href="#serpane0"><?php _e('Latest','vergo');?></a></li>
        <li class="li02"><a href="#serpane1"><?php _e('Popular','vergo');?></a></li>
        <li class="li03"><a href="#serpane2"><?php _e('Random','vergo');?></a></li>
        <li class="li04"><a href="#serpane3"><?php _e('Tags','vergo');?></a></li>

</ul>

<ul id="serinfo">

  		<li id="serpane0">	
        	<?php 
			$the_query = new WP_Query('orderby=post_date&posts_per_page=6');	
			while ($the_query->have_posts()) : $the_query->the_post(); $do_not_duplicate = $post->ID;
			?>	
        		<?php get_template_part("/includes/post-types/tab-post"); ?>
            <?php endwhile; ?>	<?php wp_reset_query(); ?>
  		</li>


  		<li id="serpane1">
			<?php $pc = new WP_Query('orderby=comment_count&posts_per_page=6'); ?>
			<?php while ($pc->have_posts()) : $pc->the_post(); ?>
        		<?php get_template_part("/includes/post-types/tab-post"); ?>
            <?php endwhile; ?><?php wp_reset_query(); ?>
  		</li>
        
        
        
     	<li id="serpane2">	
        	<?php $rand = new WP_Query('orderby=rand&posts_per_page=6'); ?>
			<?php while ($rand->have_posts()) : $rand->the_post(); ?>	
        		<?php get_template_part("/includes/post-types/tab-post"); ?>
             <?php endwhile; ?><?php wp_reset_query(); ?>
        </li>
        
        
        
  		<li id="serpane3">
           <?php wp_tag_cloud('smallest=7&largest=22&'); ?><?php wp_reset_query(); ?>
        </li>
     



</ul>

</div>
<div style="clear: both;"></div>