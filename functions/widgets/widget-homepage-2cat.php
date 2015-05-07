<?php
add_action('widgets_init', 'vrg_home_2col_load_widgets');

function vrg_home_2col_load_widgets()
{
	register_widget('vrg_home_2col');
}

class vrg_home_2col extends WP_Widget {
	
	function vrg_home_2col()
	{
		$widget_ops = array('classname' => 'vrg_home_2col', 'description' => 'Homepage 2 Categories widget.');

		$control_ops = array('id_base' => 'vrg_home_2col');

		$this->WP_Widget('vrg_home_2col', 'Vergo - Home: 2 Categories', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		
		
		$title = $instance['title'];
		$post_type = 'all';
		$categories = $instance['categories'];
		$posts = $instance['posts'];
		$images = true;

		$title_2 = $instance['title_2'];
		$post_type_2 = 'all';
		$categories_2 = $instance['categories_2'];
		$posts_2 = $instance['posts_2'];
		$images_2 = true;
		
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

		<div class="twinsbox gradient-light">
		
		<div class="widgetcol">
        
			<h2 class="widget widget_fix"><a href="<?php echo get_category_link($categories); ?>"><?php echo $title; ?></a></h2>
			
			<?php
			$recent_posts = new WP_Query(array(
				'showposts' => $posts,
				'cat' => $categories,
			));
			?>
            
           	<?php
				$big_count = 2;
				if(!$big_count) { $big_count = 1; }
				$counter = 1; while($recent_posts->have_posts()): $recent_posts->the_post(); 
				if($counter <= $big_count): 
				if($counter == $big_count) { $last = 'block-item-big-last'; } else { $last = ''; };
			?>
            
			<div class="widgetcol_big">
            
            	<div class="imgwrap">
                
                    <?php $video_input = get_post_meta(get_the_ID(), 'vrg_video', true);?>
                    
                    <?php if($video_input) {?>
                    
                            <?php echo ($video_input); ?>
                            
                    <?php } else {?>
                
                        <?php if ( has_post_thumbnail()) : ?>
            	
							<?php echo vrg_ratingbar() ?>
                        
                             <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                             
                                <?php the_post_thumbnail( 'widgetcol_one',array('title' => "")); ?>
                                
                             </a>
                             
                        <?php endif; ?>
                     
                    <?php }?> 
                
                </div> 
                
				<h2><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php echo short_title('...', 22); ?></a></h2>

				<?php echo vrg_meta_small(); ?>

				<p class="teaser">
					<?php echo vergo_excerpt( get_the_excerpt(), '160'); ?>
                </p>
                
				<?php echo vrg_meta_more(); ?>
                
                
			</div>
            
			<?php else: ?>
            
			<div class="widgetcol_small">

				<h3><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php echo short_title('...', 18); ?></a></h3>

				<?php echo vrg_meta_small(); ?>
                
			</div>
            
			<?php endif; $counter++; endwhile; ?>
			
		</div>
		
		<?php
		$post_types = get_post_types();
		unset($post_types['page'], $post_types['attachment'], $post_types['revision'], $post_types['nav_menu_item']);
		
		if($post_type_2 == 'all') {
			$post_type_2_array = $post_types;
		} else {
			$post_type_2_array = $post_type;
		}
		?>
		
		<div class="widgetcol">
        
			<h2 class="widget widget_fix"><a href="<?php echo get_category_link($categories_2); ?>"><?php echo $title_2; ?></a></h2>

			<?php
			$recent_posts = new WP_Query(array(
				'showposts' => $posts_2,
				'cat' => $categories_2,
			));
			?>			
			
			<?php
				$big_count = 2;
				if(!$big_count) { $big_count = 1; }
				$counter = 1; while($recent_posts->have_posts()): $recent_posts->the_post(); 
				if($counter <= $big_count): 
				if($counter == $big_count) { $last = 'block-item-big-last'; } else { $last = ''; };
			?>
            
			<div class="widgetcol_big">
            
            	<div class="imgwrap">
                
                    <?php $video_input = get_post_meta(get_the_ID(), 'vrg_video', true);?>
                    
                    <?php if($video_input) {?>
                    
                            <?php echo ($video_input); ?>
                            
                    <?php } else {?>
                
                        <?php if ( has_post_thumbnail()) : ?>
            	
						<?php echo vrg_ratingbar() ?>
                        
                             <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                             
                                <?php the_post_thumbnail( 'widgetcol_one',array('title' => "")); ?>
                                
                             </a>
                             
                        <?php endif; ?>
                     
                    <?php }?> 
                
                </div> 
                
				<h2><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php echo short_title('...', 22); ?></a></h2>
                
				<?php echo vrg_meta_small(); ?>

				<p class="teaser">
                    <?php echo vergo_excerpt( get_the_excerpt(), '160'); ?>
                </p>
                
				<?php echo vrg_meta_more(); ?>
                
			</div>
            
			<?php else: ?>
            
			<div class="widgetcol_small">

				<h3><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php echo short_title('...', 18); ?></a></h3>

				<?php echo vrg_meta_small(); ?>
                    
			</div>
			<?php endif; ?>
			<?php $counter++; endwhile; ?>
			
		</div>
        </div><div style="clear: both;"></div>
        
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
		$instance['show_images'] = true;
		
		$instance['title_2'] = $new_instance['title_2'];
		$instance['post_type_2'] = 'all';
		$instance['categories_2'] = $new_instance['categories_2'];
		$instance['posts_2'] = $new_instance['posts_2'];
		$instance['show_images_2'] = true;
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('show_excerpt' => null, 'title' => 'Recent Posts', 'post_type' => 'all', 'categories' => 'all', 'posts' => 4, 'title_2' => 'Recent Posts', 'post_type_2' => 'all', 'categories_2' => 'all', 'posts_2' => 4);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		
		<h3>Column One</h3>
		
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
		
		<h3 style='margin-top: 40px;'>Column Two</h3>
		
		<p>
			<label for="<?php echo $this->get_field_id('title_2'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title_2'); ?>" name="<?php echo $this->get_field_name('title_2'); ?>" value="<?php echo $instance['title_2']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('categories_2'); ?>">Filter by Category:</label> 
			<select id="<?php echo $this->get_field_id('categories_2'); ?>" name="<?php echo $this->get_field_name('categories_2'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories_2']) echo 'selected="selected"'; ?>>all categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories_2']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('posts_2'); ?>">Number of posts:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts_2'); ?>" name="<?php echo $this->get_field_name('posts_2'); ?>" value="<?php echo $instance['posts_2']; ?>" />
		</p>
	<?php }
}
?>