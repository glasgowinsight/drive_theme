<?php get_header(); ?>

<div id="core">

	<div id="content">
    
    <h2 class="leading  gradient-light"><?php single_cat_title(); ?><br/>
    <span><?php _e('','vergo');?></span></h2>
     

	<?php if ( have_posts() ) : ?>	
	
	  <?php $counter = 1; while ( have_posts() ) : the_post(); if($counter < 2): ?>
      
      
      
      <div class="catpost_big" itemscope itemprop="blogPost" itemtype="http://schema.org/Article"> 

			<?php 
			$video_input = get_post_meta($post->ID, 'vrg_video', true);
			$audio_input = get_post_meta($post->ID, 'vrg_audio', true);
			$rating = get_post_meta($post->ID, 'vrg_rating_main', true);
			?>

			<?php 	if(has_post_format('video')){
                            echo ($video_input);
                    }elseif(has_post_format('audio')){
                            echo ($audio_input);
                    }elseif(has_post_format('gallery')){
						if (get_option('vergo_post_gallery_dis') == 'true' );
						else
                            echo get_template_part( '/includes/post-types/gallery-slider' );
                    } else {
						if (get_option('vergo_post_image_dis') == 'true' );
						else
                           the_post_thumbnail('format-standard',array('itemprop' => 'image'));  
                                
            }?>
          
			<div style="clear: both;"></div>
           	
            <div class="postinfo gradient-light">
            
            	<?php echo vrg_meta(); ?> 
            
            </div>
            
			<div style="clear: both;"></div>
            
            <div class="entry gradient-light" itemprop="text">
            
            	<h1 class="post entry-title" itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

				<?php global $more; $more = 0; ?>
            
              	<?php the_excerpt(); ?>
          
          		<a class="mainbutton fr" href="<?php the_permalink(); ?>"><?php _e('Read More','vergo');?> <i class="icon-circle-arrow-right"></i></a>
              
            </div>
          
      </div>
      
      <?php else: ?>
      
      <div class="catpost gradient-light">
      
			<?php if ( has_post_thumbnail()) : ?>
                 <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                 <?php the_post_thumbnail( 'archives',array('title' => "")); ?>
                 </a>
            <?php endif; ?>
        
            <h2><a href="<?php the_permalink(); ?>"><?php echo vrg_icon() ?> <?php the_title(); ?></a></h2>
                        
            <?php echo vrg_meta(); ?> 
            
            <p class="teaser">
            
                <?php echo vergo_excerpt( get_the_excerpt(), '300'); ?>
                
            </p>
                                   
      </div>
      <?php endif; ?>
      <?php $counter++; endwhile; ?>
      
      
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