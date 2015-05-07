<div class="flexslider postslider">
        <ul class="slides">
			<?php    
				$args = array(
                    'orderby' => 'menu_order',
                    'post_type' => 'attachment',
                    'post_parent' => get_the_ID(),
                    'post_mime_type' => 'image',
                    'post_status' => null,
                    'posts_per_page' => -1
				);
				
				$attachments = get_posts( $args );
				 if ( $attachments ) {
					foreach ( $attachments as $attachment ) {
					   echo '<li>';
					   echo wp_get_attachment_image( $attachment->ID, 'blog');
					   echo '</li>';
					  }
				 }
             ?>
             
        </ul>
    </div> 