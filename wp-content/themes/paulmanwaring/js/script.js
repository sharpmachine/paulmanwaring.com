/* Author: 

*/

// Allows you to use the $ shortcut.  Put all your code  inside this wrapper
jQuery(document).ready(function($) {
	
	// Forces WordPress to place nice with dropdowns
 	$("li.dropdown > a").addClass('dropdown-toggle');
	$("li.dropdown > a").attr('data-toggle','dropdown');
	$("a.dropdown-toggle").append('<b class="caret"></b>');

	$('#slider').anythingSlider({
	  // Appearance
	  resizeContents      : true,      // If true, solitary images/objects in the panel will expand to fit the viewport

	  // Navigation
	  startPanel          : 1,         // This sets the initial panel
	  hashTags            : true,      // Should links change the hashtag in the URL?
	  buildArrows         : true,      // If true, builds the forwards and backwards buttons
	  buildNavigation     : false,      // If true, buildsa list of anchor links to link to each panel
	  buildStartStop	  : false,	
	  navigationFormatter : null,      // Details at the top of the file on this use (advanced use)
	  forwardText         : "&amp;raquo;", // Link text used to move the slider forward (hidden by CSS, replaced with arrow image)
	  backText            : "&amp;laquo;", // Link text used to move the slider back (hidden by CSS, replace with arrow image)

	  // Slideshow options
	  autoPlay            : true,      // This turns off the entire slideshow FUNCTIONALY, not just if it starts running or not
	  startStopped        : false,     // If autoPlay is on, this can force it to start stopped
	  pauseOnHover        : true,      // If true & the slideshow is active, the slideshow will pause on hover
	  resumeOnVideoEnd    : true,      // If true & the slideshow is active & a youtube video is playing, it will pause the autoplay until the video has completed
	  stopAtEnd           : false,     // If true & the slideshow is active, the slideshow will stop on the last page
	  startText           : "Start",   // Start button text
	  stopText            : "Stop",    // Stop button text
	  delay               : 3000,      // How long between slideshow transitions in AutoPlay mode (in milliseconds)
	  animationTime       : 600,       // How long the slideshow transition takes (in milliseconds)
	  easing              : "swing",   // Anything other than "linear" or "swing" requires the easing plugin		
	  onSlideComplete 	  : function(slider){
		$(".slide-jump").removeClass('current');
		$("a[data-slideto='" + slider.currentPage + "']").addClass('current');		
	  },
	  onInitialized	 	  : function(e, slider) {
		$("a[data-slideto='" + slider.currentPage + "']").addClass('current');				
	  }		
	
	});	
	
	$(".slide-jump").click(function(e){
	    $('#slider').anythingSlider( $(this).data("slideto") );
	    return false;
	});


});























