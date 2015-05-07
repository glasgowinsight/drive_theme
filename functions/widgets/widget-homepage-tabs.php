<?php
add_action('widgets_init', 'vrg_videotbs');

function vrg_videotbs()
{
	register_widget('vrg_videotbs');
}

class vrg_videotbs extends WP_Widget {
	
	function vrg_videotbs()
	{
		$widget_ops = array('classname' => 'vrg_videotbs', 'description' => 'Featured posts widget - Tabbed.');

		$control_ops = array('id_base' => 'vrg_videotbs');

		$this->WP_Widget('vrg_videotbs', 'Vergo - Home: Video Tabs', $widget_ops, $control_ops);
		
		function check_widget_videotabs() {
    		if( is_active_widget( '', '', 'vrg_videotbs' ) ) { // check if flex carousel widget is used
        		wp_enqueue_script('jquery.easytabs.min', get_template_directory_uri() .'/js/jquery.easytabs.min.js','','', true);
        		wp_enqueue_script('jquery.easytabs.start', get_template_directory_uri() .'/js/jquery.easytabs.start.js','','', true);
    }
}

add_action( 'init', 'check_widget_videotabs' );
    }
	
	function widget($args, $instance)
	{
		extract($args);
		
		$title = $instance['title'];
		$post_type = 'all';
		$categories = $instance['categories'];
		$posts = $instance['posts'];
		
		echo $before_widget;
		?>
		
		<?php
		$post_types = get_post_types();
		unset($post_types['page'], $post_types['attachment'], $post_types['revision'], $post_types['nav_menu_item']);
		
		if($post_type == 'all') {
			$post_type_array = $post_types;
		} else {
			$post_type_array = $post_type;
		}
		?>
			
			<?php
			$recent_posts = new WP_Query(array(
				'showposts' => $posts,
				'cat' => $categories,
			));
			?>
            
            <div class="twinsbox gradient-light body2">
            
            <h2 class="cntr"><a href="<?php echo get_category_link($categories); ?>"><?php echo $title; ?></a></h2>
            <div class="tab-container">
            
  				<ul class='etabs'>
  
					<?php  while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
                        <li class='tab'><a href="#tabbs-<?php the_ID(); ?>">
                        	<?php if ( has_post_thumbnail()) : ?>
								<?php the_post_thumbnail( 'tabs_small',array('title' => "")); ?>
                            <?php endif; ?>
                        </a></li>
        
                    <?php  endwhile; ?>
  
  				</ul>
  
  
				<?php  while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
                
  						<div id="tabbs-<?php the_ID(); ?>" class="tabitem">
                        
                        	<div class="inn">

								<?php $video_input = get_post_meta(get_the_ID(), 'vrg_video', true);?>
                                <?php if($video_input) {?>
                                        <?php echo ($video_input); ?>
                                <?php } else {?>
                        
									<?php if ( has_post_thumbnail()) : ?>
                                         <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                                         <?php the_post_thumbnail( 'tabs_big',array('title' => "")); ?>
                                         </a>
                                    <?php endif; ?>
                                    
                                <?php }?> 
                                
                            </div>  

  						</div>

				<?php  endwhile; ?>

			</div><!-- end .tab-container -->
		
        	</div>
            
		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['post_type'] = 'all';
		$instance['categories'] = $new_instance['categories'];
		$instance['posts'] = $new_instance['posts'];
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Recent Posts', 'post_type' => 'all', 'categories' => 'all', 'posts' => 6, 'show_excerpt' => null);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>">Filter by Category:</label> 
			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>all categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('posts'); ?>">Number of posts:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" />
		</p>
		

	<?php }
}
?>