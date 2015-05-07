jQuery(window).load(function() {
/*global jQuery:false */
"use strict";
	
  jQuery('.widgetflexslider').flexslider({
    animation: "slide",
    animationLoop: true,
    itemWidth: 178,        
	slideshowSpeed: 10000, 
    itemMargin: 18,
    minItems: 2,
    maxItems: 4
  });
  
});