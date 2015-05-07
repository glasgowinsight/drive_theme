<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="core">

	<div id="content">

        	<div <?php post_class(); ?>  itemscope itemprop="blogPost" itemtype="http://schema.org/Article"> 

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

				<?php the_breadcrumb() ?>
            
            </div>
            
			<div style="clear: both;"></div>
 			
            
            <div class="entry" itemprop="text">
            
                <h1 class="post entry-title" itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    
                <div style="clear: both;"></div>
                    
				<?php if($rating) { get_template_part( '/includes/mag-rating' );  } else { }?>  
                
                <?php the_content(); ?>
                
                <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:','vergo') . '</span>', 'after' => '</div>' ) ); ?>

                <div style="clear: both;"></div>

            </div><!-- end .entry -->
            
			<?php 
                if (get_option('vergo_post_nextprev_dis') == 'true' );
                else 
                get_template_part('/includes/mag-nextprev');
            ?>
                        
            <?php 
                if (get_option('vergo_post_author_dis') == 'true' );
                else
                get_template_part('/includes/mag-authorinfo');
            ?>
            
            <?php 
                if (get_option('vergo_post_related_dis') == 'true' );
                else 
                get_template_part('/includes/mag-relatedposts');
            ?>

            <div style="clear: both;"></div>
                
            
            <?php comments_template(); ?>
            
            <div style="clear: both;"></div>
        
    	</div>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria','vergo');?>.</p>

	<?php endif; ?>

                <div style="clear: both;"></div>

        </div>

</div><!-- #core -->



    <div id="rightsidebar" itemscope itemtype="http://schema.org/WPSideBar">
    
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Post Sidebar") ) : ?>
        
        <?php endif; ?>
           
    </div><!-- #sidebar -->  