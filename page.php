<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   
<div id="core">

	<div id="content">

        	<div <?php post_class(); ?>>

            <div class="entry" itemprop="text">

				<h1 class="post entry-title" itemprop="headline"><?php the_title(); ?></h1>
            
            	<?php the_content(); ?>
            
                <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:','vergo') . '</span>', 'after' => '</div>' ) ); ?>
                
                <?php the_tags( '<p class="tagssingle">','',  '</p>'); ?>
                
        	</div>                
            <div class="hrline"></div>   
              
            <?php comments_template(); ?>

    </div>



	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria','vergo');?>.</p>

	<?php endif; ?>

                <div style="clear: both;"></div>

        </div><!-- end #core .eightcol-->

</div><!-- #core -->



    <div id="rightsidebar">
    
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Post Sidebar") ) : ?>
        
        <?php endif; ?>
           
    </div><!-- #sidebar -->   

<?php get_footer(); ?>