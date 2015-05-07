jQuery(document).ready(function(){
/*global jQuery:false */
"use strict";
    var options = {
        nextButton: true,
        prevButton: true,
        pagination: true,
        animateStartingFrameIn: true,
        autoPlay: false,
        autoPlayDelay: 7000,
        preloader: true,
        preloadTheseFrames: [1]
    };
    
    var mySequence = jQuery("#sequence").sequence(options).data("sequence");
});