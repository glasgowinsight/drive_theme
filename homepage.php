<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>
    
    <?php if (get_option('vergo_top_carousel_dis') <> "true") { 
    
    	get_template_part('/includes/sliders/flex-top-carousel' );
    
    } ?>
	
    <div style="clear: both;"></div>
    
    <?php if (get_option('vergo_slider_dis') <> "true") { 
    
    	get_template_part('/includes/sliders/sequence' );
    
    } ?>
    
    <div style="clear: both;"></div>

<div id="core">
    
    <div style="clear: both;"></div>

    <div id="content">
        
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Homepage Content") ) : ?>
        
            <h4>To set magazine homepage go to Dashboard > Apperance > Widgets<br/>and use custom widgets with "Vergo - Home" prefix</h4>
            
        <?php endif; ?>
           
    </div><!-- #homecontent -->

</div><!-- #core -->



    
    <div id="rightsidebar">
    
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Homepage Sidebar") ) : ?>
        
        <?php endif; ?>
           
    </div><!-- #sidebar -->  
    
    <div style="clear: both;"></div>
        
<?php get_footer(); ?>