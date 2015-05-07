<?php


if ( ! isset( $content_width ) )
	$content_width = 625;


//if ( ! is_admin() ) {
//show_admin_bar(true);
//}	
	
/*-----------------------------------------------------------------------------------
- Start Vergo Functions - Please refrain from editing this section 
----------------------------------------------------------------------------------- */

// Set path to Vergo Framework and theme specific functions
$functions_path = get_template_directory() . '/functions/';
$includes_path = get_template_directory() . '/functions/';

// Framework
require_once ($functions_path . 'admin-init.php');						// Framework Init

// Theme specific functionality
require_once ($includes_path . 'theme-options.php'); 					// Options panel settings and custom settings
require_once ($includes_path . 'theme-actions.php');					// Theme actions & user defined hooks
require_once ($includes_path . 'theme-scripts.php'); 					// Load JavaScript via wp_enqueue_script


//Add Custom Post Types
require_once ($includes_path . 'posttypes/post-metabox.php'); 			// custom meta box

/*-----------------------------------------------------------------------------------
- Loads all the .php files found in /admin/widgets/ directory
----------------------------------------------------------------------------------- */

	$preview_template = _preview_theme_template_filter();

	if(!empty($preview_template)){
		$widgets_dir = WP_CONTENT_DIR . "/themes/".$preview_template."/functions/widgets/";
	} else {
    	$widgets_dir = WP_CONTENT_DIR . "/themes/".get_option('template')."/functions/widgets/";
    }
    
    if (@is_dir($widgets_dir)) {
		$widgets_dh = opendir($widgets_dir);
		while (($widgets_file = readdir($widgets_dh)) !== false) {
  	
			if(strpos($widgets_file,'.php') && $widgets_file != "widget-blank.php") {
				include_once($widgets_dir . $widgets_file);
			
			}
		}
		closedir($widgets_dh);
	}
	
	

// Post thumbnail support
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(640, 265, true); 				// Normal post thumbnails
	add_image_size('slider', 785, 492, true); 				//(slider)
	add_image_size('carousel', 192, 130, true); 			//(homepage)
	add_image_size('carousel-big', 284, 200, true); 		//(homepage)
	add_image_size('widgetcol_one', 450, 320, true); 		//(homepage)
	add_image_size('blog', 450, 280, true); 				//(blog)
	add_image_size('archives', 300, 260, true); 			//(archives)
	add_image_size('format-standard', 807, 600, true);	 	//(blog - gallery post)
	add_image_size('tabs_big', 672, 397, true); 			//(tabs widget)
	add_image_size('tabs_small', 100, 70, true); 			//(tabs widget)
	add_image_size('featured', 85, 70, true); 				//(thummbs in some widgets)
	add_image_size('featured_alt', 85, 85, true); 			//(thummbs in some widgets)
}

function thumb_url(){
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 2100,2100 ));
return $src[0];
}


// Add Theme Support Functions
add_editor_style();
add_theme_support( 'post-formats', array( 'video', 'audio', 'gallery', 'image', 'quote', 'link', 'aside'  ) );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-background' );

// widgets
if ( function_exists('register_sidebar') ) 
{ 

// sidebar widget
register_sidebar(array('name' => 'Homepage Content','before_widget' => '','after_widget' => '','before_title' => '<h2 class="widget">','after_title' => '</h2>'));
register_sidebar(array('name' => 'Homepage Sidebar','before_widget' => '','after_widget' => '','before_title' => '<h2 class="widget">','after_title' => '</h2>'));
register_sidebar(array('name' => 'Post Sidebar','before_widget' => '','after_widget' => '','before_title' => '<h2 class="widget">','after_title' => '</h2>')); 

// footer widgets
register_sidebar(array('name' => 'Footer 1','before_widget' => '','after_widget' => '','before_title' => '<h2>','after_title' => '</h2>')); 
register_sidebar(array('name' => 'Footer 2','before_widget' => '','after_widget' => '','before_title' => '<h2>','after_title' => '</h2>')); 
register_sidebar(array('name' => 'Footer 3','before_widget' => '','after_widget' => '','before_title' => '<h2>','after_title' => '</h2>')); 
register_sidebar(array('name' => 'Footer 4','before_widget' => '','after_widget' => '','before_title' => '<h2>','after_title' => '</h2>')); 
}



// Make theme available for translation
	load_theme_textdomain( 'vergo', get_template_directory() . '/lang' );



// Shordcodes
require_once (get_template_directory().'/functions/admin-shortcodes.php' );				// Shortcodes
require_once (get_template_directory().'/functions/admin-shortcode-generator.php' ); 	// Shortcode generator 

// Use shortcodes in text widgets.
add_filter('widget_text', 'do_shortcode');

// navigation menu
function register_main_menus() {
	register_nav_menus(
		array(
			'main-menu' => "Main Menu",
			'secondary-menu' => "Seconadary Menu"
		)
	);
};
if (function_exists('register_nav_menus')) add_action( 'init', 'register_main_menus' );




// icons - font awesome
function vrg_icon() {
	
	if(has_post_format('video')) {return '<i title="video" class="format-icon icon-play-circle"></i>';
	}elseif(has_post_format('audio')) {return '<i title="audio" class="format-icon icon-music"></i>';
	}elseif(has_post_format('gallery')) {return '<i title="gallery" class="format-icon icon-picture"></i>';	
	}elseif(has_post_format('link')) {return '<i title="link" class="format-icon icon-signout"></i>';	
	}elseif(has_post_format('image')) {return '<i title="image" class="format-icon icon-camera"></i>';		
	}elseif(has_post_format('quote')) {return '<i title="quote" class="format-icon icon-quote-right"></i>';	
	}elseif(has_post_format('aside')) {return '<i title="rating" class="format-icon icon-star-half-empty"></i>';	
	} else {}	
	
}


// icons ribbons - font awesome
function vrg_ribbon() {
	
	if(has_post_format('video')) {return '<span class="ribbon"></span><span class="ribbon_icon"><i class="icon-play-circle"></i></span>';
	}elseif(has_post_format('audio')) {return '<span class="ribbon"></span><span class="ribbon_icon"><i class="icon-music"></i></span>';
	}elseif(has_post_format('gallery')) {return '<span class="ribbon"></span><span class="ribbon_icon"><i class="icon-picture"></i></span>';
	}elseif(has_post_format('link')) {return '<span class="ribbon"></span><span class="ribbon_icon"><i class="icon-signout"></i></span>';
	}elseif(has_post_format('image')) {return '<span class="ribbon"></span><span class="ribbon_icon"><i class="icon-camera"></i></span>';
	}elseif(has_post_format('quote')) {return '<span class="ribbon"></span><span class="ribbon_icon"><i class="icon-quote-right"></i></span>';
	} else {'';}	
	
}


// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'';
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views', 'vergo');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}


// Shorten post title
function short_title($after = '', $length) {
	$mytitle = explode(' ', get_the_title(), $length);
	if (count($mytitle)>=$length) {
		array_pop($mytitle);
		$mytitle = implode(" ",$mytitle). $after;
	} else {
		$mytitle = implode(" ",$mytitle);
	}
	return $mytitle;
}


// new excerpt function

function vrg_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
    add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
    add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
    }



add_filter( 'wp_get_attachment_link', 'gallery_prettyPhoto');

// Old Shorten Excerpt text for use in theme
function vergo_excerpt($text, $chars = 5000) {
	$text = $text." ";
	$text = substr($text,0,$chars);
	$text = substr($text,0,strrpos($text,' '));
	$text = $text."";
	return $text;
}

function trim_excerpt($text) {
     $text = str_replace('[', '', $text);
     $text = str_replace(']', '', $text);
     return $text;
    }
add_filter('get_the_excerpt', 'trim_excerpt');



// automatically add prettyPhoto rel attributes to embedded images
function gallery_prettyPhoto ($content) {
	return str_replace("<a", "<a rel='prettyPhoto[gallery]'", $content);
}

function insert_prettyPhoto_rel($content) {
	$pattern = '/<a(.*?)href="(.*?).(bmp|gif|jpeg|jpg|png)"(.*?)>/i';
  	$replacement = '<a$1href="$2.$3" rel=\'prettyPhoto\'$4>';
	$content = preg_replace( $pattern, $replacement, $content );
	return $content;
}
add_filter( 'the_content', 'insert_prettyPhoto_rel' );

// pagination

function pagination($prev = '&laquo;', $next = '&raquo;') {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => $prev,
        'next_text' => $next,
        'type' => 'plain'
);
    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = str_replace(' ', '+', array( 's' => get_query_var( 's' ) ));

    echo paginate_links( $pagination );
};

//Breadcrumbs
function the_breadcrumb() {
	if (!is_home()) {

		echo '<p class="meta"><a href="'. home_url().'">';
		echo 'Home';
		echo "</a> &raquo; ";
		if (is_category() || is_single()) {
		the_category(', ');
		if (is_single()) {
		echo " &raquo; ";
	echo short_title('...</p>', 9);
	}
	} elseif (is_page()) {
	echo the_title();}
	}
}



function attachment_toolbox($size = thumbnail) {

	if($images = get_children(array(
		'post_parent'    => get_the_ID(),
		'post_type'      => 'attachment',
		'numberposts'    => -1, // show all
		'post_status'    => null,
		'post_mime_type' => 'image',
	))) {
		foreach($images as $image) {
			$attimg   = wp_get_attachment_image($image->ID,$size);
			$atturl   = wp_get_attachment_url($image->ID);
			$attlink  = get_attachment_link($image->ID);
			$postlink = get_permalink($image->post_parent);
			$atttitle = apply_filters('the_title',$image->post_title);

			echo '<p><strong>wp_get_attachment_image()</strong><br />'.$attimg.'</p>';
			echo '<p><strong>wp_get_attachment_url()</strong><br />'.$atturl.'</p>';
		}
	}
}

// ratings

function vrg_rating() {
	$rinter = get_post_meta(get_the_ID(), 'vrg_rating_main', true);
	if ($rinter > 0) {
	return  $rinter;}
}


function vrg_rating_plus() {
	$rinter = get_post_meta(get_the_ID(), 'vrg_rating_main', true);
	if ($rinter > 0) {
	return  $rinter .'<span>&#37;</span>';}
}

function vrg_ratingbar() {
	$rinter = get_post_meta(get_the_ID(), 'vrg_rating_main', true);
	if ($rinter > 0) {
	return  '<span class="ratingbar">
				<span class="overrating" style="width:'.$rinter .'%"></span>
				<span class="overratingnr">'.__('Score: ', 'vergo') . $rinter .'&#37;</span>
			</span>';}
}

function vrg_ratings() {
	$rinter = get_post_meta(get_the_ID(), 'vrg_rating_main', true);
	if ($rinter >= 94 && $rinter <= 100) {return '	<span title="Rating: '.$rinter .'&#37;" class="rating_star">
														<i class="icon-star"></i>
														<i class="icon-star"></i>
														<i class="icon-star"></i>
														<i class="icon-star"></i>
														<i class="icon-star"></i>
													</span>';}
													
	if ($rinter >= 85 && $rinter < 94) {return '	<span title="Rating: '.$rinter .'&#37;" class="rating_star">
														<i class="icon-star"></i>
														<i class="icon-star"></i>
														<i class="icon-star"></i>
														<i class="icon-star"></i>
														<i class="icon-star-half-empty"></i>
													</span>';}
													
	if ($rinter >= 75 && $rinter < 84) {return '	<span title="Rating: '.$rinter .'&#37;" class="rating_star">
														<i class="icon-star"></i>
														<i class="icon-star"></i>
														<i class="icon-star"></i>
														<i class="icon-star"></i>
														<i class="icon-star-empty"></i>
													</span>';}
													
	if ($rinter >= 65 && $rinter < 74) {return '	<span title="Rating: '.$rinter .'&#37;" class="rating_star">
														<i class="icon-star"></i>
														<i class="icon-star"></i>
														<i class="icon-star"></i>
														<i class="icon-star-half-empty"></i>
														<i class="icon-star-empty"></i>
													</span>';}
													
	if ($rinter >= 55 && $rinter < 64) {return '	<span title="Rating: '.$rinter .'&#37;" class="rating_star">
														<i class="icon-star"></i>
														<i class="icon-star"></i>
														<i class="icon-star"></i>
														<i class="icon-star-empty"></i>
														<i class="icon-star-empty"></i>
													</span>';}
													
	if ($rinter >= 45 && $rinter < 54) {return '	<span title="Rating: '.$rinter .'&#37;" class="rating_star">
														<i class="icon-star"></i>
														<i class="icon-star"></i>
														<i class="icon-star-half-empty"></i>
														<i class="icon-star-empty"></i>
														<i class="icon-star-empty"></i>
													</span>';}

	if ($rinter >= 35 && $rinter < 44) {return '	<span title="Rating: '.$rinter .'&#37;" class="rating_star">
														<i class="icon-star"></i>
														<i class="icon-star"></i>
														<i class="icon-star-empty"></i>
														<i class="icon-star-empty"></i>
														<i class="icon-star-empty"></i>
													</span>';}

	if ($rinter >= 25 && $rinter < 34) {return '	<span title="Rating: '.$rinter .'&#37;" class="rating_star">
														<i class="icon-star"></i>
														<i class="icon-star-half-empty"></i>
														<i class="icon-star-empty"></i>
														<i class="icon-star-empty"></i>
														<i class="icon-star-empty"></i>
													</span>';}

	if ($rinter >= 15 && $rinter < 24) {return '	<span title="Rating: '.$rinter .'&#37;" class="rating_star">
														<i class="icon-star"></i>
														<i class="icon-star-empty"></i>
														<i class="icon-star-empty"></i>
														<i class="icon-star-empty"></i>
														<i class="icon-star-empty"></i>
													</span>';}

	if ($rinter > 0 && $rinter < 14) {return '	<span title="Rating: '.$rinter .'&#37;" class="rating_star">
														<i class="icon-star-half-empty"></i>
														<i class="icon-star-empty"></i>
														<i class="icon-star-empty"></i>
														<i class="icon-star-empty"></i>
														<i class="icon-star-empty"></i>
													</span>';}

	if ($rinter = 0 ) {return '';}											
}


function vrg_rating_cat() {
	$rcat = get_post_meta(get_the_ID(), 'vrg_rating_category', true);
	$rcatcustom = get_post_meta(get_the_ID(), 'vrg_rating_category_own', true);
	
		if($rcatcustom){
			return '<span class="nr customcat">'. $rcatcustom .'</span>';
		}elseif($rcat){
			return '<span class="nr '. $rcat .'">'. $rcat .'</span>';
		} else { }  
			
}


// meta sections
function vrg_meta_small() {
	?>    
	<p class="meta">
		<?php the_time(get_option('date_format')); ?>  &bull; 
		<i class="icon-file-alt"></i> <?php the_category(', ') ?>
		<?php if(vrg_ratings()){ ?> <?php echo vrg_ratings(); } else { }?></p>
    <?php
}

function vrg_meta() {
	?>    
	<p class="meta">
		<?php the_time(get_option('date_format')); ?> &bull; 
		<?php the_category(', ') ?>  &bull; 
        <?php _e('Views','vergo');?>: <?php echo getPostViews(get_the_ID()); ?>
		<?php if(vrg_ratings()){ ?> &bull; <?php echo vrg_ratings(); } else { }?></p>
    <?php
}

function vrg_meta_full() {
	?>    
	<p class="meta">
    	<?php _e('by','vergo');?> <span itemprop="author" itemscope itemptype="http://schema.org/Person"><?php the_author_posts_link(); ?></span> &bull; 
		<span itemprop="datePublished" name="pubdate"><?php the_time(get_option('date_format')); ?></span> &bull; 
		<span ><?php the_category(', ') ?></span>  &bull;
              <?php comments_popup_link( __('Comments (0)', 'vergo'), __('Comments (1)', 'vergo'), __('Comments (%)', 'vergo')); ?>  &bull; 
        <?php _e('Views','vergo');?>: <?php echo getPostViews(get_the_ID()); ?>
		<?php if(vrg_ratings()){ ?> &bull; <?php echo vrg_ratings(); } else { }?></p>
    <?php
}

function vrg_meta_more() {
	?>    
	<p class="meta more">
		<a class="fr" href="<?php the_permalink(); ?>"><?php _e('Read More','vergo');?> <i class="icon-circle-arrow-right"></i></a></p>
    <?php
}

function vrg_meta_post() {
	?><div class="metapost">
    <p class="meta"><?php _e('Written by','vergo');?>: <span itemprop="author" itemscope itemptype="http://schema.org/Person"><?php the_author_posts_link(); ?></span></p>
	<p class="meta"><?php _e('Published on','vergo');?>: <?php the_time(get_option('date_format')); ?> </p>
	<p class="meta"><?php _e('Filled Under','vergo');?>: <?php the_category(', ') ?>  </p>
    <p class="meta"><?php _e('Views','vergo');?>: <?php echo getPostViews(get_the_ID()); ?></p>
    <?php the_tags( '<p class="meta">',', ',  '</p>'); ?>
    </div>
    <?php
}

?>