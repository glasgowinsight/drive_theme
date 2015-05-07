jQuery(document).ready(function(){
/*global jQuery:false */
/*jshint devel:true, laxcomma:true, smarttabs:true */
"use strict";

		// hide .scrollTo_top first
			jQuery(".scrollTo_top").hide();
		// fade in .scrollTo_top
		jQuery(function () {
			jQuery(window).scroll(function () {
				if (jQuery(this).scrollTop() > 100) {
					jQuery('.scrollTo_top').fadeIn();
				} else {
					jQuery('.scrollTo_top').fadeOut();
				}
			});
	
			// scroll body to 0px on click
		jQuery('.scrollTo_top a').click(function(){
			jQuery('html, body').animate({scrollTop:0}, 500 );
			return false;
		});
		});


	  /* default hovers */

		jQuery('.seccol,.widgetflexslider li,.topflexslider li,.widgetcol_big,.tab-post,.fblock,.raws li').hover(function() {
			jQuery(this).find('img')
				.animate({opacity:'0.3'}, 300); 
		
			} , function() {
		
			jQuery(this).find('img')
				.animate({opacity:'1'}, 400); 
		});
		  
	  jQuery('.gallery-item img,li.format-image img').hover(function() {
		  jQuery(this).animate({opacity: 0.1}, "normal");
		  }, function() {
		  jQuery(this).animate({opacity: 1}, "normal");
		  });
		  


	/* Tooltips */
		jQuery("body").prepend('<div class="tooltip"><p></p></div>');
		var tt = jQuery("div.tooltip");
		
		jQuery(".flickr_badge_image a img,ul.social-menu li a,.rating img,.post-ratings img, .rating_star, .ribbon,.format-icon ").hover(function() {								
			var btn = jQuery(this);
			
			tt.children("p").text(btn.attr("title"));								
						
			var t = Math.floor(tt.outerWidth(true)/2),
				b = Math.floor(btn.outerWidth(true)/2),							
				y = btn.offset().top - 35,
				x = btn.offset().left - (t-b);
						
			tt.css({"top" : y+"px", "left" : x+"px", "display" : "block"});			
			   
		}, function() {		
			tt.hide();			
		});


	function lightbox() {
		// Apply PrettyPhoto to find the relation with our portfolio item
		jQuery("a[rel^='prettyPhoto']").prettyPhoto({
			// Parameters for PrettyPhoto styling
			animationSpeed:'slow',
			slideshow:5000,
			theme:'pp_default',
			show_title:false,
			overlay_gallery: false,
			social_tools: false
		});
	}
	
	if(jQuery().prettyPhoto) {
		lightbox();
	}

});