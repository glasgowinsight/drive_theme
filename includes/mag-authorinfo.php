		<div style="clear: both;"></div>
        <div class="postauthor vcard author" itemprop="author" itemscope itemtype="http://schema.org/Person">
			<?php  echo get_avatar( get_the_author_meta('ID'), '75' );   ?>
        	<h3 class="additional"><?php _e('About the Author','vergo');?>: <span itemprop="name"><?php the_author_posts_link(); ?></span></h3>
 			<div class="authordesc"><?php the_author_meta('description'); ?></div>
		</div>
        
        <?php vrg_meta_post(); ?>
		<div style="clear: both;"></div>