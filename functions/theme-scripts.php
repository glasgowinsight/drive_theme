<?php
if ( ! is_admin() ) { add_action( 'wp_print_scripts', 'vergo_add_javascript' ); }

function vergo_add_javascript() {

		// Load Common scripts	
		wp_enqueue_script('jquery');
		wp_enqueue_script('css3-mediaqueries', get_template_directory_uri().'/js/css3-mediaqueries.js');
		wp_enqueue_script('superfish', get_template_directory_uri().'/js/superfish.js','','', true);
		wp_enqueue_script('jquery.hoverIntent.minified', get_template_directory_uri().'/js/jquery.hoverIntent.minified.js','','', true);
		wp_enqueue_script('prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js','','', true);
		wp_enqueue_script('jquery.flexslider-min', get_template_directory_uri() .'/js/jquery.flexslider-min.js','','', true);
		wp_enqueue_script('jquery.flexslider.start.main', get_template_directory_uri() .'/js/jquery.flexslider.start.main.js','','', true);
		wp_enqueue_script('jquery.simplyscroll.min', get_template_directory_uri() .'/js/jquery.simplyscroll.min.js','','', true);
		wp_enqueue_script('jquery.simplyscroll.start', get_template_directory_uri() .'/js/jquery.simplyscroll.start.js','','', true);
		wp_enqueue_script('ownScript', get_template_directory_uri() .'/js/ownScript.js','','', true);


		// Load Mobile script		
		if (get_option('vergo_res_mode_general') <> "true") {	
			wp_enqueue_script('mobile', get_template_directory_uri() .'/js/mobile.js','','', true);
		}
		
		// Load Home Top Slider scripts		
		if (get_option('vergo_top_carousel_dis') <> "true") { 
			if ( is_page_template('homepage.php')) { 	
				wp_enqueue_script('jquery.flexslider.start.carousel.static', get_template_directory_uri() .'/js/jquery.flexslider.start.carousel.static.js','','', true);
			}
		}
		
		// Load Blog Top Slider scripts		
		if (get_option('vergo_top_carousel_dis_blog') <> "true") { 
			if (is_home() || is_front_page()) { 	
				wp_enqueue_script('jquery.flexslider.start.carousel.static', get_template_directory_uri() .'/js/jquery.flexslider.start.carousel.static.js','','', true);
			}
		}
		
		// Load Home Sequence scripts		
		if (get_option('vergo_slider_dis') <> "true") { 
			if ( is_page_template('homepage.php')) { 		
					wp_enqueue_script('jquery.sequence-min', get_template_directory_uri() .'/js/jquery.sequence-min.js','','', true);
					wp_enqueue_script('jquery.sequence.start', get_template_directory_uri() .'/js/jquery.sequence.start.js','','', true);				
			} 
		}
		
		// Load Index Sequence scripts		
		if (get_option('vergo_slider_dis_blog') <> "true") { 
			if (is_home() || is_front_page()) { 		
					wp_enqueue_script('jquery.sequence-min', get_template_directory_uri() .'/js/jquery.sequence-min.js','','', true);
					wp_enqueue_script('jquery.sequence.start', get_template_directory_uri() .'/js/jquery.sequence.start.js','','', true);				
			} 
		}


		// Singular comment script		
		if ( is_singular() ) wp_enqueue_script( 'comment-reply','','', true );

	}
?>