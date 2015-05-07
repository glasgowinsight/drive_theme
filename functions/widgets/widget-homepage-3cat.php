<?php
add_action('widgets_init', 'vrg_home_3col_load_widgets');

function vrg_home_3col_load_widgets()
{
	register_widget('vrg_home_3col');
}

class vrg_home_3col extends WP_Widget {
	
	function vrg_home_3col()
	{
		$widget_ops = array('classname' => 'vrg_home_3col', 'description' => 'Home: 3 Categories widget.');

		$control_ops = array('id_base' => 'vrg_home_3col');

		$this->WP_Widget('vrg_home_3col', 'Vergo - Home: 3 Categories', $widget_ops, $control_ops);
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

		$title_3 = $instance['title_3'];
		$post_type_3 = 'all';
		$categories_3 = $instance['categories_3'];
		$posts_3 = $instance['posts_3'];
		$images_3 = true;
		
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
		<div class="widgetcol_three">
        
			<h2 class="widget_spec"><a href="<?php echo get_category_link($categories); ?>"><?php echo $title; ?></a></h2>
			
			<?php
			$recent_posts = new WP_Query(array(
				'showposts' => $posts,
				'cat' => $categories,
			));
			?>
			<?php $counter = 1; while($recent_posts->have_posts()): $recent_posts->the_post(); if($counter == 1): ?>
            
			<div class="widgetcol_big first">
            
            	<div class="imgwrap">
            	
					<?php echo vrg_ratingbar() ?>
                
                    <?php $video_input = get_post_meta(get_the_ID(), 'vrg_video', true);?>
                    
                    <?php if($video_input) {?>
                    
                            <?php echo ($video_input); ?>
                            
                    <?php } else {?>
                
                        <?php if ( has_post_thumbnail()) : ?>
                        
                             <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                             
                                <?php the_post_thumbnail( 'widgetcol_one',array('title' => "")); ?>
                                
                             </a>
                             
                        <?php endif; ?>
                     
                    <?php }?> 
                
                </div> 
                
				<h2><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php echo short_title('...', 22); ?></a></h2>

				<?php echo vrg_meta_small(); ?>

				<p class="teaser">
					<?php echo vergo_excerpt( get_the_excerpt(), '150'); ?>
                </p>
                
				<?php echo vrg_meta_more(); ?>
                
			</div>
            
			<?php else: ?>
            
			<div class="widgetcol_small first">

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
		
		<div class="widgetcol_three">
        
			<h2 class="widget_spec"><a href="<?php echo get_category_link($categories_2); ?>"><?php echo $title_2; ?></a></h2>

			<?php
			$recent_posts = new WP_Query(array(
				'showposts' => $posts_2,
				'cat' => $categories_2,
			));
			?>			
			<?php $counter = 1; while($recent_posts->have_posts()): $recent_posts->the_post(); if($counter == 1): ?>
            
			<div class="widgetcol_big">
            
            	<div class="imgwrap">
            	
					<?php echo vrg_ratingbar() ?>
                
                    <?php $video_input = get_post_meta(get_the_ID(), 'vrg_video', true);?>
                    
                    <?php if($video_input) {?>
                    
                            <?php echo ($video_input); ?>
                            
                    <?php } else {?>
                
                        <?php if ( has_post_thumbnail()) : ?>
                        
                             <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                             
                                <?php the_post_thumbnail( 'widgetcol_one',array('title' => "")); ?>
                                
                             </a>
                             
                        <?php endif; ?>
                     
                    <?php }?> 
                
                </div> 
                
				<h2><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php echo short_title('...', 22); ?></a></h2>
                
				<?php echo vrg_meta_small(); ?>

				<p class="teaser">
                    <?php echo vergo_excerpt( get_the_excerpt(), '150'); ?>
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
        
        
        
        
        
        
        
        
        		<?php
		$post_types = get_post_types();
		unset($post_types['page'], $post_types['attachment'], $post_types['revision'], $post_types['nav_menu_item']);
		
		if($post_type_3 == 'all') {
			$post_type_3_array = $post_types;
		} else {
			$post_type_3_array = $post_type;
		}
		?>
		
		<div class="widgetcol_three">
        
			<h2 class="widget_spec"><a href="<?php echo get_category_link($categories_3); ?>"><?php echo $title_3; ?></a></h2>

			<?php
			$recent_posts = new WP_Query(array(
				'showposts' => $posts_3,
				'cat' => $categories_3,
			));
			?>			
			<?php $counter = 1; while($recent_posts->have_posts()): $recent_posts->the_post(); if($counter == 1): ?>
            
			<div class="widgetcol_big">
            
            	<div class="imgwrap">
            	
					<?php echo vrg_ratingbar() ?>
                
                    <?php $video_input = get_post_meta(get_the_ID(), 'vrg_video', true);?>
                    
                    <?php if($video_input) {?>
                    
                            <?php echo ($video_input); ?>
                            
                    <?php } else {?>
                
                        <?php if ( has_post_thumbnail()) : ?>
                        
                             <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                             
                                <?php the_post_thumbnail( 'widgetcol_one',array('title' => "")); ?>
                                
                             </a>
                             
                        <?php endif; ?>
                     
                    <?php }?> 
                
                </div> 
                
				<h2><a href='<?php the_permalink(); ?>' title='<?php the_title(); ?>'><?php echo short_title('...', 22); ?></a></h2>
                
				<?php echo vrg_meta_small(); ?>

				<p class="teaser">
                    <?php echo vergo_excerpt( get_the_excerpt(), '150'); ?>
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
		
		$instance['title_3'] = $new_instance['title_3'];
		$instance['post_type_3'] = 'all';
		$instance['categories_3'] = $new_instance['categories_3'];
		$instance['posts_3'] = $new_instance['posts_3'];
		$instance['show_images_3'] = true;
		
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
        

		<h3>Column Three</h3>
		
		<p>
			<label for="<?php echo $this->get_field_id('title_3'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title_3'); ?>" name="<?php echo $this->get_field_name('title_3'); ?>" value="<?php echo $instance['title_3']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('categories_3'); ?>">Filter by Category:</label> 
			<select id="<?php echo $this->get_field_id('categories_3'); ?>" name="<?php echo $this->get_field_name('categories_3'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories_3']) echo 'selected="selected"'; ?>>all categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories_3']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('posts_3'); ?>">Number of posts:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts_3'); ?>" name="<?php echo $this->get_field_name('posts_3'); ?>" value="<?php echo $instance['posts_3']; ?>" />
		</p>
	<?php }
}
?>