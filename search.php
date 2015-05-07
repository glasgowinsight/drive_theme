<?php get_header(); ?>

<div id="core">

	<div id="content">
            
		<?php if (have_posts()) : ?>
            
            <h2 class="leading gradient-light"><?php _e('Search Results for','vergo');?> "<?php echo $s; ?>"</h2>
    
            <div style="clear: both;"></div>

      		<ul class="archivepost">
          
    			<?php while (have_posts()) : the_post(); ?>
                                              		
            		<?php get_template_part('/includes/post-types/archivepost');?>
                    
   				<?php endwhile; ?>   <!-- end post -->
                    
     		</ul><!-- end latest posts section-->
            
            <div style="clear: both;"></div>

					<div class="pagination"><?php pagination('&laquo;', '&raquo;'); ?></div>

					<?php else : ?>
                    
						<!-- Not Found Handling -->
                            
                            <h1><?php _e('Sorry, no posts matched your criteria.','vergo');?></h1>
           						
                                <h4><?php _e('Perhaps You will find something interesting form these lists...','vergo');?></h4>
                        
								<?php get_template_part('/includes/uni-404-content');?>
                        
					<?php endif; ?>

        </div><!-- end #core .eightcol-->

</div><!-- #core -->

    
    <div id="rightsidebar">
    
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Homepage Sidebar") ) : ?>
        
        <?php endif; ?>
           
    </div><!-- #sidebar -->  
    
    <div style="clear: both;"></div>

<?php get_footer(); ?>