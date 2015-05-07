jQuery(window).load(function() {
/*global jQuery:false */
"use strict";
	
  jQuery('.topflexslider').flexslider({
    animation: "slide",
    animationLoop: true,
    itemWidth: 267,        
	slideshowSpeed: 10000, 
    itemMargin: 22,
    minItems: 2,
    maxItems: 4
  });
  
});