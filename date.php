<?php get_header(); ?>

<div id="core">

	<div id="content">
            
            	<?php if (have_posts()) : ?>
    
		<?php $post = $posts[0]; ?>
        
			<?php if (is_category()) { ?>
            
            <h2 class="leading gradient-light"><?php _e('Archive for the','vergo');?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e('Category','vergo');?></h2>
            
            <?php } elseif( is_tag() ) { ?>
            
            <?php } elseif (is_day()) { ?>
            
            <h2 class="leading gradient-light"><?php _e('Archive for','vergo');?> <?php the_time('F jS, Y'); ?></h2>
            
            <?php } elseif (is_month()) { ?>
            
            <h2 class="leading gradient-light"><?php _e('Archive for','vergo');?> <?php the_time('F, Y'); ?></h2>
            
            <?php } elseif (is_year()) { ?>
            
            <h2 class="leading gradient-light"><?php _e('Archive for','vergo');?> <?php the_time('Y'); ?></h2>
            
            <?php } elseif (is_author()) { ?>
            
            <h2 class="leading gradient-light"><?php _e('Author Archive','vergo');?></h2>
            
            <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
            
            <?php } ?>
    
            <div style="clear: both;"></div> 

      		<ul class="archivepost">
          
    			<?php while (have_posts()) : the_post(); ?>
                                              		
            		<?php get_template_part('/includes/post-types/archivepost');?>
                    
   				<?php endwhile; ?>   <!-- end post -->
                    
     		</ul><!-- end latest posts section-->
            
            <div style="clear: both;"></div>
            
					<div class="pagination"><?php pagination('&laquo;', '&raquo;'); ?></div>

					<?php else : ?>
			

                        <h1>Sorry, no posts matched your criteria.</h1>
                        <?php get_search_form(); ?><br/>
					<?php endif; ?>

    
        </div><!-- end #core .eightcol-->

</div><!-- #core -->

    
    <div id="rightsidebar">
    
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Homepage Sidebar") ) : ?>
        
        <?php endif; ?>
           
    </div><!-- #sidebar -->  
    
    <div style="clear: both;"></div>

<?php get_footer(); ?>