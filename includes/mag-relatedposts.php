			<ul class="related body2">	
				
			<?php
			$backup = $post;
			$tags = wp_get_post_tags($post->ID);
			if ($tags) { $tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

				$args=array(
					'tag__in' => $tag_ids,
					'post__not_in' => array($post->ID),
					'showposts'=>3, // Number of related posts that will be shown.
					'ignore_sticky_posts'=>1
				);
				$my_query = new wp_query($args);
				if( $my_query->have_posts() ) { echo ''; while ($my_query->have_posts()) { $my_query->the_post();
			?>
            <li>
                        
				<?php if ( has_post_thumbnail()) : ?>
                
                     <a href="<?php the_permalink(); ?>" title="<?php the_title();?>" >
                     
                            <?php the_post_thumbnail( 'carousel-big',array('title' => "")); ?>
                            
                     </a>
                     
                <?php endif; ?>
                    
                <h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 16); ?></a></h3>

			</li>
			<?php
					}
					echo '';
				}
			}
			$post = $backup;
			wp_reset_query(); 
			?>
			</ul>
			<div style="clear: both;"></div>