<?php
/*
Template Name: 404
*/
?>
<?php get_header(); ?>

<div id="core">

	<div id="content">
    
        <h2 class="leading"><?php _e('Nothing found here!','vergo');?><br/>
        
        <span><?php _e('Perhaps You will find something interesting form these lists...','vergo');?></span></h2>
    
    	<div class="entry">
                
                <div class="hrline"></div>
                
                <?php get_template_part('/includes/uni-404-content');?>
    
        </div>
        
	</div>

</div><!-- #core -->

    <div id="rightsidebar">
    
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Homepage Sidebar") ) : ?>
        
        <?php endif; ?>
           
    </div><!-- #sidebar -->  
    
    <div style="clear: both;"></div>

<?php get_footer(); ?>